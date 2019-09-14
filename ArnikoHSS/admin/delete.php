<?php include('../db.php');?>
<?php
$postid = $_GET['symbol'];
?>
<?php  
  if ($conn->connect_error) {
    echo 'Problem Connecting to the Database'; // again database  not connecting then i show this
    } 
    else {
    $sql = "DELETE FROM `result` WHERE `result`.`symbol` = $postid "; //simple database query
    $result = $conn->query($sql);
    header('Location: result.php'); // again reddirect to  post.php
    }
?>