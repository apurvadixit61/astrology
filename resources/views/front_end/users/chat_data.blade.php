<html>
<head>

</head>
<body>
    <div id="divCounter"></div>
    <script type="text/javascript">
    if (sessionStorage.getItem("counter")) {
      if (sessionStorage.getItem("counter") >= 10) {
        var value = 0;
      } else {
        var value = sessionStorage.getItem("counter");
      }
    } else {
      var value = 0;
    }
    document.getElementById('divCounter').innerHTML = value;

    var counter = function () {
      if (value >= 10) {
        sessionStorage.setItem("counter", 0);
        value = 0;
      } else {
        value = parseInt(value) + 1;
        sessionStorage.setItem("counter", value);
      }
      document.getElementById('divCounter').innerHTML = value;
    };

    var interval = setInterval(counter, 1000);
  </script>
</body>
    
</html>