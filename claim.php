<?php
$room=$_POST['room'];
if(strlen($room)>20 or strlen($room)<2)
{
    $message="Please enter name between 2 and 20";
    echo '<script language="javascript">';
  echo 'alert("'.$message.'");';  
  echo'window.location="http://localhost/chatroom"';
  echo '</script>';
}
else if(!ctype_alnum($room))
{


$message="Please choose an alphanumeric room name";
    echo '<script language="javascript">';
  echo 'alert("'.$message.'");';  
  echo'window.location="http://localhost/chatroom"';
  echo '</script>';
}
else{
    //connect to database
    include 'dbconnect.php';
}
$sql =" select * from `rooms` where roomname='$room';";
$result= mysqli_query($conn,$sql);
if($result)
{


if(mysqli_num_rows($result)>0)
{
    $message="Room is already created";
    echo '<script language="javascript">';
    echo 'alert("'.$message.'");';  
    echo'window.location="http://localhost/chatroom";';
    echo '</script>';
}
else{
    $sql="INSERT INTO `rooms` ( `roomname`, `stime`) VALUES ( '$room', current_timestamp());";
    if(mysqli_query($conn,$sql))
    {
        $message="Room is successfully created";
        echo '<script language="javascript">';
        echo 'alert("'.$message.'");';  
        echo'window.location="http://localhost/chatroom/rooms.php?roomname='.$room.'";';
        echo '</script>';
    }
    
}
}
else{
    echo "error:".mysqli_error($conn);
}

?>