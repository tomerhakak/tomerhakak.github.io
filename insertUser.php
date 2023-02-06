
<?php
$con=new mysqli("localhost","root","","work");



if (empty($_POST["Username"])){
    die("Username is required");
    header("Location:home.html");
}

if(! filter_var($_POST["Email"])){
    die("Valid email is required");
}
if ($_POST["Email"] !== $_POST["Email_confirmation"]) {
    die("Email must match");
}


if (strlen($_POST["Password"])<8){
    die("password must be at least 8 characters");
}    

if( ! preg_match("/[a-z]/i", $_POST["Password"])){
    die("password must conain at last one letter");
}

if( ! preg_match("/[0-9]/", $_POST["Password"])){
    die("password must conain at last one number");
}
if ($_POST["Password"] !== $_POST["password_confirmation"]) {
    die("Passwords must match");
}



$Username = $_POST["Username"];
$Email =$_POST["Email"];
$Password=$_POST["Password"];





$sql="SELECT * FROM `user` WHERE Email=?";
$stm=$con->prepare($sql);
$stm->bind_param("s",$Email);
$stm->execute();
$res=$stm->get_result();
if ($res->num_rows>0){
    echo "The email is already registered";
}
else{
    $sql="SELECT * FROM `user` WHERE Username=?";
    $stm=$con->prepare($sql);
    $stm->bind_param("s",$Username);
    $stm->execute();
    $res1=$stm->get_result();
    if ($res1->num_rows>0){
        echo "The username is already registered";
    }
    else{    
        $sql = "INSERT INTO `user`(`Username`, `Email`, `Password`) VALUES ('".$Username."','".$Email."','".$Password."')";
        if($con->query($sql)){
            echo "<script>alert('Registration was successful')</script>";
        }else{
            echo "<script>aler(Registration not successful)</script>";
        }
    }    
}
?>













