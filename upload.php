<?php

include("lock.php");
include("config.php");
$path="videoes/";
$format=array("mp4","MP4","mkv","MKV");
if(isset($_SESSION['login'])){
$check=$_SESSION['login'];
$qry=$DBcon->query("SELECT * FROM tb_register WHERE r_mail='$check' OR r_mobile='$check'");
$row=$qry->fetch_array();
if(isset($_POST['btn-submit'])){
    $a=$_POST['title'];
    $b=$_POST['desc'];
    $c=$_POST['date'];
	$d=$row['r_name'];
	$time=time();
	$actual_video=$_FILES ['video']['name'];
	$revideo=$time.$actual_video;
	$size=$_FILES ['video']['size'];
	$tmp=$_FILES ['video']['tmp_name'];
	$ext=explode(".",$actual_video);

	
		
	if(in_array($ext[1],$format)){
		if(move_uploaded_file($tmp,$path.$revideo)){
			$qy=$DBcon->query("INSERT INTO tb_content(c_title,c_disc,c_video,c_date,c_channel)VALUES('$a','$b','$revideo','$c','$d')");
			
			echo "<emmbed style='width:50%;'src='$path/$revideo'>";
		}
		else{
			echo "not";
		}
	}
}
}
?>


<html lang="en">
  <head>
	<title>Title</title>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
	  
	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	
	<nav class="nav bg-danger">
      <a class="nav-link text-white" href="index.php"><i class="fa fa-youtube-play text-white" aria-hidden="true"></i>Mytube</a>
    </nav>
	<div class="container py-3">
		<div class="card border border-danger">
	<form action="" method="post" enctype="multipart/form-data">
	<div class="form-grpup text-center  ">
		<h5 class="form-title">Select File</h5>
		<center><a href="" target="ft"><i class="fa fa-upload" aria-hidden="true"></i></a></center>
<input type="file" name="video" class="form-control py-2 " id="ft">
<h5 class="form-title">Title</h5>

<input type="text" name="title" class="form-control py-4">
<h5 class="form-title">Description</h5>

 <input type="text" name="desc" class="form-control py-4">
 <input type="hidden" name="date" value="<?php echo date('Y-m-d');?>" class="py-3"> 
 <br>
 <button name="btn-submit" class="form-control btn btn-danger" style="width: 12rem;">submit</button> 
</div>
</div>
</div>
</form> 
