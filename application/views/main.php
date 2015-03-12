<script>
function updateTime() {
  document.getElementById("time").innerHTML = (new Date()).toLocaleTimeString();
}
window.onload = function() {
  setInterval(updateTime, 1000);
  updateTime();
};
</script>

<link href="<?=base_url('assets/css/clock_in.css')?>" rel="stylesheet" />

<div id="clock-in">

<header>
  <img src="<?=base_url('assets/img/logo.png')?>" style="width:300px;" />
  <h1>FRC Team 5517</h1>
  <h4>Current Time: <span id="time"></span></h4>
</header>

<input id="student-number" type="password" placeholder="Enter Member ID" autofocus />
<br />
<button id="in">Clock In</button>
<button id="out">Clock Out</button>
<br />
<button id="stats">View My Stats</button>
<br />
<br />
<button id="mentor-login">Mentor Login</button>
</div>