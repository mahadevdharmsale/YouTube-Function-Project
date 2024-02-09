
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  
  </head>
  
  <body class="bg-light">
  <nav class="navbar navbar-expand-lg bg-danger text-white">
  <i class="fa fa-youtube-play" aria-hidden="true"></i><a class="navbar-brand">MyTube</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto text-white">
      
		<li class="nav-item ">
        <a class="nav-link text-white" href="user.php">Sign In</a>
      </li>
      
      <?php
      session_start();
      if(isset($_SESSION['login']))
      {
      ?>
     <li class="nav-item">
        <a class="nav-link text-white" href="upload.php">Upload</a>
      </li>
      
      
      
      
   
    <li class="nav-item">
        <a class="nav-link text-white" href="logout.php">Log Out</a>
      </li>
      <?php
      }
      ?>
	  </ul>
		 </div>
	</nav>
    <div class="py-2">
    <form class="form-inline my-2 my-lg-0" action="" method="post">
        <input class="form-control mr-sm-2 w-75" type="search" name="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-danger my-2 my-sm-0" type="submit"  name="submit">Search</button>

      </form>
   </div>

</body>
   <style>

</style>
<?php
require_once("config.php");
$path="videos/";
if(isset($_POST['submit']))
{
  $a=$_POST['search'];
$qry=$DBcon->query("SELECT * FROM tb_content WHERE  c_title LIKE '%$a%' OR c_date LIKE '%$a%'");
  if($qry->num_rows){
    foreach($qry as $row)
    {
?>


<div class="cont" style="float:left;">
<div class="row justify-content-center">
  <div class="col-xs-1-12" style="width: 24rem;">
    <div class="card">
     <video src="videos/<?php echo $row['c_video']; ?>" href="view.php?video=<?php echo $row['c_id'];?>" ></video>
      <div class="card-body bg-light">
        <h4 class="card-title text-dark "><?=$row['c_title'];?></h4>
        <p class="card-text text-dark"><?=$row['c_disc'];?></p><h7>Posted on :<?=$row['c_date'];?></h7>
        <h5 class="card-title text-dark "> channel:<?=$row['c_channel'];?></h5>

      </div>
    </div>
  </div>
  </div>
  </div>
  <?php
    }}
  }
  ?>
  <?php
  if(!isset($_POST['sumbit']))
 $qry=$DBcon->query("SELECT * FROM tb_content");
 if($qry->fetch_array()>0){
     foreach($qry as $row){
 ?>
 <div class="cont" style="float:left;"> <div class="row justify-content-center">
  <div class="col-xs-1-12" style="width:24rem;">
    <div class="card">
     <video src="videos/<?php echo $row['c_video']; ?>" ></video>
      <div class="card-body bg-light">
        <h4 class="card-title text-dark "><?=$row['c_title'];?></h4>
        <p class="card-text text-dark"><?=$row['c_disc'];?></p><h7>Posted on :<?=$row['c_date'];?> 
      <h5 class="card-title text-dark "> channel:<?=$row['c_channel'];?></h5>
        <a href="view.php?video=<?php echo $row['c_id'];?>" class="stretched-link"></a>       </div>
        
      </div>
  </div>
  </div>
  </div>
  </div>
  <?php
  }}

  ?>
<style>
	.div{
		te
	}
</style>