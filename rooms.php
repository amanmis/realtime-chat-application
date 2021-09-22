<?php
$roomname=$_GET['roomname'];

include 'dbconnect.php';
$sql =" select * from `rooms` where roomname='$roomname'";
$result=mysqli_query($conn,$sql);



?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="css/cover.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
<style>
body {
  margin: 0 auto;
  max-width: 800px;
  padding: 0 20px;
}

.container {
  border: 2px solid #dedede;
  background-color: #f1f1f1;
  border-radius: 5px;
  padding: 10px;
  margin: 10px 0;
}

.darker {
  border-color: #ccc;
  background-color: #ddd;
}

.container::after {
  content: "";
  clear: both;
  display: table;
}

.container img {
  float: left;
  max-width: 60px;
  width: 100%;
  margin-right: 20px;
  border-radius: 50%;
}

.container img.right {
  float: right;
  margin-left: 20px;
  margin-right:0;
}

.time-right {
  float: right;
  color: #aaa;
}

.time-left {
  float: left;
  color: #999;
}
.anyclass{
    height: 350px;
    overflow-y:scroll;
}
#submitmsg{
    border:2px solid black;
}
</style>
</head>
<body>

<h2>Chat Messages-<?php echo $roomname;?></h2>

<div class="container">
    <div class="anyclass">
  
</div>
</div>
<input type="text" name="usermsg" class="form-control" id="usermsg" placeholder="Type message"><br>
<button class="btn btn-default" name="Submit" id="submitmsg">Send</button>


<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script type="text/javascript">
setInterval(runFunction,1000);
function runFunction()
{
    $.post("htcont.php",{room:'<?php echo $roomname?>'},function(data,status)
    {
        document.getElementsByClassName('anyclass')[0].innerHTML=data;
    })
}
 var input = document.getElementById("usermsg");

// Execute a function when the user releases a key on the keyboard
input.addEventListener("keyup", function(event) {
  // Number 13 is the "Enter" key on the keyboard
  event.preventDefault();
  if (event.keyCode === 13) {
    // Cancel the default action, if needed
   
    // Trigger the button element with a click
    document.getElementById("submitmsg").click();
  }
});
$("#submitmsg").click(function(){
    var clientmsg=$("#usermsg").val();
  $.post("postmsg.php", {text:clientmsg,room:'<?php echo $roomname ?>',ip:'<?php echo $_SERVER['REMOTE_ADDR']?>'},function(data,status) {
      document.getElementsByClassName('anyclass')[0].innerHTML=data;});
    $("#usermsg").val("");
       return false;
  
  
}); 

</script>
</body>
</html>
