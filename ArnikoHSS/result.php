<?php
$resvar = $_GET['symbol'];
include("db.php");
if ($conn->connect_error) {
    echo 'Problem Connecting to the Database';
    } 
else {
    $sql = "SELECT percent FROM result WHERE symbol=$resvar";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
       while ($row = $result->fetch_assoc()) {
           $res  = "Your obtained ".$row['percent']."%";
       }         
    }
    else{
        $res = "No Results Found";
    }
}
echo $res;
?>