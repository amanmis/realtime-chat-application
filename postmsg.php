<?php
 include 'dbconnect.php';

 $msg= $_POST['text'];
 $room =$_POST['room'];
 $ip= $_POST['ip'];
 $sql ="INSERT INTO `msgs` ( `msg`, `room`, `ip`, `timestam`) VALUES ( '$msg', '$room', '$ip', current_timestamp());";
 mysqli_query($conn,$sql);
 mysqli_close($conn);
?>