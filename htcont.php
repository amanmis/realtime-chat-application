<?php
$room= $_POST['room'];
include 'dbconnect.php';
$sql="select msg,timestam,ip from msgs where room='$room'";
$res="";
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0)
{
    while($row=mysqli_fetch_assoc($result))
    {
        $res=$res.'<div class ="container">';
        $res=$res.$row['ip'];
        $res=$res."says <p>".$row['msg'];
        $res=$res.'</p> <span class="time-right">'.$row["timestam"].'</span></div>';

    }
}
echo $res;

?>