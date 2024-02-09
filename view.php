<head>
    <title></title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <nav class="navbar navbar-expand navbar-light bg-danger">
    <div class="nav navbar-nav">
        <a class="nav-item nav-link text-white" href="index.php">MyTube<span class="fa fa-youtube-play text-white"></span></a>
    </div>
</nav>
<?php
session_start();
require_once("config.php");
$get=$_GET['video'];
if(isset($_POST['like'])){
  $a=$_POST['like'];
  $qry=$DBcon->query("UPDATE tb_content SET c_likes='$a' WHERE c_id='$get'");
}

$get=$_GET['video'];
$qry=$DBcon->query("SELECT * FROM tb_content WHERE c_id='$get'");
while($row=$qry->fetch_array()){
    
    ?>
    <form method="post">
    <video src="videoes/<?php echo $row['c_video'];?>" height="70%" width="100%" controls autoplay></video>
    <h1><?=$row['c_title'];?></h1>
    <h1><?=$row['c_disc'];?></h1>
    <h6>Date posted on<?=$row['c_date'];?></h6>
</form>
<hr>
    <?php
}
?>
<?php
$path="videoes/";

$qry=$DBcon->query("SELECT * FROM tb_content");
if($qry->fetch_array()>0){
    foreach($qry as $row){
?>
<div class="cont" style="float:left;">
<div class="row justify-content-center">
  <div class="col-xs-1-12" style="width:24rem;">
    <div class="card">
     <video src="videos/<?php echo $row['c_video']; ?>" ></video>
      <div class="card-body bg-light">
        <h4 class="card-title text-dark "><?=$row['c_title'];?></h4>
        <p class="card-text text-dark"><?=$row['c_disc'];?></p><h7>Posted on :<?=$row['c_date'];?></h7>
        <a href="view.php?video=<?php echo $row['c_id'];?>" class="stretched-link"></a>
      </div>
    </div>
  </div>
  </div>
  </div>
<?php
    }
  }
?>