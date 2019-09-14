<?php include('../db.php');?>
<?php

$name = test_input($_GET['name']);
$id = test_input($_GET['id']);
$email = test_input($_GET['email']);
$phone = test_input($_GET['phone']);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
else {
$sql = "UPDATE `faculties` 
SET `name` = '$name', `email` = '$email', `phone` = '$phone'
  WHERE `faculties`.`id` = $id; ";

if ($conn->query($sql) === TRUE) {
    header('Location: faculties.php');
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