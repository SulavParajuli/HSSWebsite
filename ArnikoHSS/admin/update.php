<?php include('../db.php');?>
<?php

$symbol = test_input($_GET['symbol']);
$percent = test_input($_GET['percent']);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
else {
$sql = "UPDATE `result` 
SET `symbol` = '$symbol', `percent` = '$percent'
  WHERE `result`.`symbol` = $symbol; ";

if ($conn->query($sql) === TRUE) {
    header('Location: result.php');
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}
$conn->close();
function test_input($data) {
    include('../db.php');
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    $data = mysqli_real_escape_string($conn, $data);
    return $data;
  }
?>