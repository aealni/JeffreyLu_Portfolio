<?php 

include 'connect.php';

if(isset($_POST['signUp'])){
    $fName=$_POST['fName'];
    $lName=$_POST['lName'];
    $username=$_POST['username'];
    $password=$_POST['password'];
    $password=md5($password);

     $checkusername="SELECT * From users where username='$username'";
     $result=$conn->query($checkusername);
     if($result->num_rows>0){
        echo "username Address Already Exists !";
     }
     else{
        $insertQuery="INSERT INTO users(fName,lName,username,password)
                       VALUES ('$fName','$lName','$username','$password')";
            if($conn->query($insertQuery)==TRUE){
                header("location: login.php?registered=true");
            }
            else{
                echo "Error:".$conn->error;
            }
     }
   

}

if(isset($_POST['signIn'])){
   $username=$_POST['username'];
   $password=$_POST['password'];
   $password=md5($password) ;
   
   $sql="SELECT * FROM users WHERE username='$username' and password='$password'";
   $result=$conn->query($sql);
   if($result->num_rows>0){
    session_start();
    $row=$result->fetch_assoc();
    $_SESSION['username']=$row['username'];
    header("location: homepage.php");
    exit();
   }
   else{
    echo "Not Found, Incorrect username or Password";
   }

}
?>