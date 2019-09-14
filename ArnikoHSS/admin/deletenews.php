<?php include('../db.php');?>
<?php
$postid = $_GET['id'];
?>
<?php  
  if ($conn->connect_error) {
    echo 'Problem Connecting to the Database'; // again database  not connecting then i show this
    } 
    else {
    $sql = "DELETE FROM `news` WHERE `news`.`id` = $postid "; //simple database query
    $result = $conn->query($sql);
    header('Location: news.php'); // again reddirect to  post.php
    }
?>