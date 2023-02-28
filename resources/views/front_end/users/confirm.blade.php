<html>

<head></head>
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<style>
    body {
  font-family: sans-serif;
  display: grid;
  height: 100vh;
  place-items: center;
  background:url('https://collabdoor.com/public//front_img/back.png');
  background-size: cover;
  opacity: 0.8;
}

.base-timer {
  position: relative;
  width: 200px;
  height: 200px;
}

.base-timer__svg {
  transform: scaleX(-1);
}

.base-timer__circle {
  fill: none;
  stroke: none;
}

.base-timer__path-elapsed {
  stroke-width: 7px;
  stroke: grey;
}

.base-timer__path-remaining {
  stroke-width: 7px;
  stroke-linecap: round;
  transform: rotate(90deg);
  transform-origin: center;
  transition: 1s linear all;
  fill-rule: nonzero;
  stroke: currentColor;
}

.base-timer__path-remaining.green {
  color: rgb(65, 184, 131);
}

.base-timer__path-remaining.orange {
  color: orange;
}

.base-timer__path-remaining.red {
  color: red;
}

.base-timer__label {
  position: absolute;
  width: 200px;
  height: 200px;
  top: 0;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 48px;
}
</style>

<body>
    <div class="row">
        <div class="col-md-4"><img src="{{url('/')}}/images/profile_image{{Auth::guard('users')->user()->profile_image}}"  style="border-radius:50px;" alt="">
      <p style="font-size:20px;font-weight:600;margin-left:40px;padding:20px;">{{Auth::guard('users')->user()->name}}</p>
    </div>
        <div class="col-md-4"><div id="app"></div></div>
        <div class="col-md-4">
            <img src="{{url('/')}}/images/profile_image{{$user->profile_image}}" style="border-radius:50px;margin-left:50px;" alt="">
      <p  style="font-size:20px;font-weight:600;margin-top:10px;margin-left:50px;padding:20px;">{{$user->name}}</p>
        </div>
    </div>

    <p style="font-size:22px;font-weight:600;"> Wait for astrologer to connect we will redirect you shortly </p> 
      <span>Do not refresh or back</span>  
</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script>
    
const FULL_DASH_ARRAY = 283;
const WARNING_THRESHOLD = 10;
const ALERT_THRESHOLD = 5;

const COLOR_CODES = {
  info: {
    color: "green"
  },
  warning: {
    color: "orange",
    threshold: WARNING_THRESHOLD
  },
  alert: {
    color: "red",
    threshold: ALERT_THRESHOLD
  }
};

const TIME_LIMIT = 120;
let timePassed = 0;
let timeLeft = TIME_LIMIT;
let timerInterval = null;
let remainingPathColor = COLOR_CODES.info.color;

document.getElementById("app").innerHTML = `
<div class="base-timer">
  <svg class="base-timer__svg" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
    <g class="base-timer__circle">
      <circle class="base-timer__path-elapsed" cx="50" cy="50" r="45"></circle>
      <path
        id="base-timer-path-remaining"
        stroke-dasharray="283"
        class="base-timer__path-remaining ${remainingPathColor}"
        d="
          M 50, 50
          m -45, 0
          a 45,45 0 1,0 90,0
          a 45,45 0 1,0 -90,0
        "
      ></path>
    </g>
  </svg>
  <span id="base-timer-label" class="base-timer__label">${formatTime(
    timeLeft
  )}</span>
</div>
`;

startTimer();

function onTimesUp() {
  clearInterval(timerInterval);
}

function startTimer() {
  timerInterval = setInterval(() => {
    timePassed = timePassed += 1;
    timeLeft = TIME_LIMIT - timePassed;
    document.getElementById("base-timer-label").innerHTML = formatTime(
      timeLeft
    );
    setCircleDasharray();
    setRemainingPathColor(timeLeft);

    if (timeLeft === 0) {
      onTimesUp();
    }
  }, 1000);
}

function formatTime(time) {
  const minutes = Math.floor(time / 60);
  let seconds = time % 60;

  if (seconds < 10) {
    seconds = `0${seconds}`;
  }

  return `${minutes}:${seconds}`;
}

function setRemainingPathColor(timeLeft) {
  const { alert, warning, info } = COLOR_CODES;
  if (timeLeft <= alert.threshold) {
    document
      .getElementById("base-timer-path-remaining")
      .classList.remove(warning.color);
    document
      .getElementById("base-timer-path-remaining")
      .classList.add(alert.color);
  } else if (timeLeft <= warning.threshold) {
    document
      .getElementById("base-timer-path-remaining")
      .classList.remove(info.color);
    document
      .getElementById("base-timer-path-remaining")
      .classList.add(warning.color);
  }
}

function calculateTimeFraction() {
  const rawTimeFraction = timeLeft / TIME_LIMIT;
  return rawTimeFraction - (1 / TIME_LIMIT) * (1 - rawTimeFraction);
}

function setCircleDasharray() {
  const circleDasharray = `${(
    calculateTimeFraction() * FULL_DASH_ARRAY
  ).toFixed(0)} 283`;
  document
    .getElementById("base-timer-path-remaining")
    .setAttribute("stroke-dasharray", circleDasharray);
}
</script>
<script>
var intervalId = window.setInterval(function() {
    checkIsaccepted()
}, 5000);

function checkIsaccepted() {
    var base_url = location.protocol+'//'+location.host

    var url = base_url+'/user/chat-accepted'

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: url,
        type: 'GET',
        data: {
            data: {{$id}}
        },
        dataType: 'json',
        success: function(result) {
         console.log(result)
                if(result !=0)
                {

                    if(result.status=='Approve')
                    {
                      var  url ='http://134.209.229.112/astrology/user/chats/'+result.from_user_id+'/'+result.to_user_id +'?key='+result.key;
                      location.href = url

                    //   window.open(
                    //     'https://support.wwf.org.uk/earth_hour/index.php?type=individual',
                    //     '_blank' // <- This is what makes it open in a new window.
                    //     );

                    }
                //   console.log(result.to_user_id)
                //   console.log(result.key)

                }

        }
    });


}
</script>

</html>