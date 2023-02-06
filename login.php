<?php
$con=new mysqli("localhost","root","","work");

$Email =$_POST["Email_login"];
$Password=$_POST["Password_login"];



$sql="SELECT * FROM `user` WHERE Email=?";
$stm=$con->prepare($sql);
$stm->bind_param("s",$Email);
$stm->execute();
$res=$stm->get_result();
if ($res->num_rows==1){
    $sql="SELECT * FROM `user` WHERE Password=?";
    $stm=$con->prepare($sql);
    $stm->bind_param("s",$Password);
    $stm->execute();
    $res1=$stm->get_result();
    if ($res1->num_rows==1){
        echo "hi " ;
    }else{ 
       echo "The password is not good";}
    
}else{
    echo "The email is not registered";
}