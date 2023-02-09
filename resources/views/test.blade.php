<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <title></title>
  </head>
  <body>


  </body>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
  <script type="text/javascript">

var data={};
  $.ajax({
     url: "http://139.59.21.147:8080/api/products/search-product/test",
     type: "GET",
     beforeSend: function(xhr){xhr.setRequestHeader('x-access-token', 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpZCI6MjAsImlhdCI6MTY0ODI5MDIwMywiZXhwIjoxNjQ4Mzc2NjAzfQ.V71PSlw42m58crDqUVz8RfMt9kq2db7rOlMQTOALA5E');},
     success: function() { alert('Success!' + authHeader); }
  });
  </script>
</html>
