<?php

function changeDateFormat($date,$format)
{
    return \Carbon\Carbon::createFromFormat('Y-m-d', $date)->format($format);    
}

function changeDate($date)
{
     
    return \Carbon\Carbon::createFromFormat('Y-m-d', explode(' ',$date)[0])->format('d-m-Y') .' '.explode(':',explode(' ',$date)[1])[0] .':'.explode(':',explode(' ',$date)[1])[1]  ;    

}

function timeAgo($timestamp){
    $datetime1=new DateTime("now");
    $datetime2=date_create($timestamp);
    $diff=date_diff($datetime1, $datetime2);
    $timemsg='';
    if($diff->y > 0){
        $timemsg = $diff->y .' year'. ($diff->y > 1?"'s":'');

    }
    else if($diff->m > 0){
     $timemsg = $diff->m . ' month'. ($diff->m > 1?"'s":'');
    }
    else if($diff->d > 0){
     $timemsg = $diff->d .' day'. ($diff->d > 1?"'s":'');
    }
    else if($diff->h > 0){
     $timemsg = $diff->h .' hour'.($diff->h > 1 ? "'s":'');
    }
    else if($diff->i > 0){
     $timemsg = $diff->i .' minute'. ($diff->i > 1?"'s":'');
    }
    else if($diff->s > 0){
     $timemsg = $diff->s .' second'. ($diff->s > 1?"'s":'');
    }

$timemsg = $timemsg.' ago';
return $timemsg;
}


function dayCount($day)
{


switch ($day) {
  case "Monday":
    return 0;
    break;
  case "Tuesday":
    return 1;

    break;
  case "Wednesday":
    return 2;

    break;
    case "Thursday":
        return 3;
        break;
      case "Friday":
        return 4;
    
        break;
      case "Saturday":
        return 5;    
        break;
        case "Sunday":
          return 6;      
          break;
  default:
    echo "Your favorite color is neither red, blue, nor green!";
}
}

?>