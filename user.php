<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
   
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	  
</head>
  <body>
  <nav class="nav bg-danger">
      <a class="nav-link text-white" href="index.php"><i class="fa fa-youtube-play text-white" aria-hidden="true"></i>Mytube</a>
    </nav>
    
<div class="form-group">
  <form action="" method="post">
  <?php
    if(isset($msg)){
      echo $msg;
    }
    
    ?>
    <h2 for="form-group">Create Account</h2>
  <label for="form-group">UserName/ChannelName</label>
  <input type="text" name="name" id="" class="form-control" placeholder="" aria-describedby="helpId">
      <label for="">Email Address</label>
      <input type="email"class="form-control" name="em" id="" aria-describedby="helpId" placeholder="">
        <label for="">Mobile No</label>
      <input type="number"
        class="form-control" name="phone" id="" aria-describedby="helpId" placeholder="">
        <label for="">Password</label>
      <input type="password"
        class="form-control" name="pass" id="" aria-describedby="helpId" placeholder="">
    <button class="form-control btn btn-danger" name="create">Create</button>
  </form>
<center><h2>OR</h2></center>
<form action="" method="post">
<div class="form-group">
    <h2 for="form-group">Login</h2>
  <label for="form-group">Email Address/contact</label>
  <input type="text" name="eemail" id="" class="form-control" placeholder="" aria-describedby="helpId">
      <label for="">Password</label>
      <input type="password"
        class="form-control" name="password" id="" aria-describedby="helpId" placeholder="">
        <button class="form-control btn btn-danger" name="log">Login</button>

</form>
</div>      

</body>
</html>
<?php

require_once("config.php");
if(isset($_POST['create'])){
  $a=$_POST['name'];
  $email=$_POST['em'];
  $c=$_POST['phone'];
  $e=$_POST['pass'];
  $d=password_hash($e,PASSWORD_DEFAULT);
$checkemail=$DBcon->query("SELECT * FROM tb_register WHERE r_mail='$email'");
$count=$checkemail->num_rows;
if($count==0){
  $qry=$DBcon->query("INSERT INTO tb_register (r_name,r_mail,r_mobile,r_password)VALUES('$a','$email','$c','$d')");
if($qry==true){
  $msg="successfully reistered";
}
}
else{
  $msg="email already registered";
}
}
?>
<?php
session_start();
if(isset($_SESSION['login'])!=""){
  header("location:index.php");
  exit;
}
if(isset($_SESSION['login']))
{
	header("location:index.php");
}
if(isset($_POST['log'])){
  $email=$_POST['eemail'];
  $password=$_POST['password'];
  $sql=$DBcon->query("SELECT * FROM tb_register WHERE r_mail='$email' OR r_mobile='$email'");
  $row=$sql->fetch_array();
  $count=$sql->num_rows;
  if(password_verify($password,$row['r_password']) && $count==1){
    $_SESSION['login']=$email;
    //$_SESSION['ch']=$row['r_name'];
    header("location:index.php");
    

}
$DBcon->close();
}
?>
 
