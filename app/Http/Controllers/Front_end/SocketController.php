<?php



namespace App\Http\Controllers\Front_end;

use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Front_end\AstrologyApiClient;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use url;
use Validator;
use Redirect;
use Auth;
use App;
use Session;



class SocketController extends Controller implements MessageComponentInterface

{
    protected $clients;

    public function __construct()
    {
        $this->clients = new \SplObjectStorage;
        $this->users = [];
    }


    public function index()
    {
           
        echo "test";
    }

    public function onOpen(ConnectionInterface $conn)
    {
        $this->clients->attach($conn);

        $querystring = $conn->httpRequest->getUri()->getQuery();

        parse_str($querystring, $queryarray);

        if(isset($queryarray['token']))
        {
            DB::table('users')->where('token', $queryarray['token'])->update([ 'connection_id' => $conn->resourceId, 'user_status' => 'Online' ]);

            $user_id = DB::table('users')->select('id')->where('token', $queryarray['token'])->get();

            $data['id'] = $user_id[0]->id;

            $data['status'] = 'Online';

            $this->users[$conn->resourceId] = $conn;

            foreach($this->clients as $client)
            {
                if($client->resourceId != $conn->resourceId)
                {
                    $client->send(json_encode($data));
                }
            }

        }


    }

    public function onMessage(ConnectionInterface $conn, $msg)
    {
       $data= json_decode($msg);
       if(isset($data->type))
       {
        
        $send_data=[];

         if($data->type == 'load_get_connection_id')
         {
            // $condition_1 = ['from_user_id'=>$data->from_user_id,'to_user_id'=>$data->to_user_id];
            // // $condition_2 = ['from_user_id'=>$data->to_user_id,'to_user_id'=>$data->from_user_id];
            // $user_id_data = DB::table('chat_requests')->orWhere($condition_1)->where('status','Approve')->get();
            // // $user_id_data = DB::table('chat_requests')->orWhere($condition_1)->orWhere($condition_2)->where('status','Approve')->get();
       
            $sender_connection_id = DB::table('users')->select('connection_id')->where('id',$data->from_user_id)->first();
            $receiver_connection_id = DB::table('users')->select('connection_id')->where('id',$data->to_user_id)->first();
            $send_data['load_get_connection_id']=true;
            foreach($this->clients as $client)
            {
                $send_data['response_process_chat_request']=true;

                if($client->resourceId == $sender_connection_id->connection_id )
                {
                    $send_data['data']=$data->from_user_id;
                }

                if($client->resourceId == $receiver_connection_id->connection_id )
                {
                    $send_data['data']=$data->to_user_id;

                }

                $client->send(json_encode($send_data));
            }

         }

         if($data->type == 'request_send_message')
         {
            $insert=['from_user_id'=>$data->from_user_id,'to_user_id'=>$data->to_user_id,'chat_message'=>$data->message,'message_status'=>'Not Send'];
             $chat_message_id= DB::table('message')->insertGetId($insert);
             echo $chat_message_id;
            
            $sender_connection_id = DB::table('users')->select('connection_id')->where('id',$data->from_user_id)->first();
            $receiver_connection_id = DB::table('users')->select('connection_id')->where('id',$data->to_user_id)->first();
      
          
            foreach($this->clients as $client)
            {
                $send_data['response_process_chat_request']=true;

                if($client->resourceId == $receiver_connection_id->connection_id || $client->resourceId == $sender_connection_id->connection_id)
                {
                    $send_data['message']=$data->message;
                    $send_data['from_user_id']=$data->from_user_id;
                    $send_data['to_user_id']=$data->to_user_id;
                    $send_data['chat_message_id'] = $chat_message_id;
                    if($client->resourceId == $receiver_connection_id->connection_id )
                    {
                       
                        DB::table('message')->where('id',$chat_message_id)->update(['message_status'=>'Send']);
                        $send_data['message_status']='Send';


                    }else{
                     
                            $send_data['message_status']='Not Send';



                    }

                        $client->send(json_encode($send_data));
    
                }

            }

         }

         if($data->type == 'request_chat_history')
         {
            $condition_1 = ['from_user_id'=>$data->from_user_id,'to_user_id'=>$data->to_user_id];
            $condition_2 = ['from_user_id'=>$data->to_user_id,'to_user_id'=>$data->from_user_id];
             $sql = "SELECT * FROM message a WHERE (a.from_user_id = '$data->from_user_id' AND a.to_user_id = '$data->to_user_id') OR (a.from_user_id = '$data->to_user_id' AND a.to_user_id = '$data->from_user_id') ORDER BY id ASC";
           $chat_data = DB::select(DB::raw($sql));
                 $send_data['chat_history']=$chat_data;
           
           $sender_connection_id = DB::table('users')->select('connection_id')->where('id',$data->from_user_id)->first();
           $receiver_connection_id = DB::table('users')->select('connection_id')->where('id',$data->from_user_id)->first();

           foreach($this->clients as $client)
           {
               $send_data['response_chat_history']=true;

               if($client->resourceId == $receiver_connection_id->connection_id)
               {
                $client->send(json_encode($send_data));

   
               }

           }


          }

          if($data->type == 'update_chat_status')
          {
            DB::table('message')->where('id',$data->chat_message_id)->update(['message_status'=>$data->chat_message_status]);
            $sender_connection_id = DB::table('users')->select('connection_id')->where('id',$data->from_user_id)->first();
            $receiver_connection_id = DB::table('users')->select('connection_id')->where('id',$data->from_user_id)->first();
 
            foreach($this->clients as $client)
            {
                $send_data['response_update_chat_status']=true;
 
                if($client->resourceId == $sender_connection_id->connection_id)
                {
                    $send_data['update_message_status']=$data->chat_message_status;
                    $send_data['chat_message_id']=$data->chat_message_id;
                 $client->send(json_encode($send_data));
 
    
                }
 
            }
          }
       }
    }

    public function onClose(ConnectionInterface $conn)
    {
        $this->clients->detach($conn);

        $querystring = $conn->httpRequest->getUri()->getQuery();

        parse_str($querystring, $queryarray);

        if(isset($queryarray['token']))
        {
            DB::table('users')->where('token', $queryarray['token'])->update([ 'connection_id' => 0, 'user_status' => 'Offline' ]);

            $user_id = DB::table('users')->select('id', 'updated_at')->where('token', $queryarray['token'])->get();

            $data['id'] = $user_id[0]->id;

            $data['status'] = 'Offline';

            $updated_at = $user_id[0]->updated_at;

            if(date('Y-m-d') == date('Y-m-d', strtotime($updated_at))) //Same Date, so display only Time
            {
                $data['last_seen'] = 'Last Seen at ' . date('H:i');
            }
            else
            {
                $data['last_seen'] = 'Last Seen at ' . date('d/m/Y H:i');
            }

            foreach($this->clients as $client)
            {
                if($client->resourceId != $conn->resourceId)
                {
                    $client->send(json_encode($data));
                }
            }
        }
    }

    public function onError(ConnectionInterface $conn, \Exception $e)
    {
        echo "An error has occurred: {$e->getMessage()} \n";

        $conn->close();
    }

    
}