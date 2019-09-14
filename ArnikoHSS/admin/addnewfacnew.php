<?php include('../db.php');?>
<?php
// get the name, phone, and email
$name = test_input($_GET['name']);
$email = test_input($_GET['email']);
$phone = test_input($_GET['phone']);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error); // database connection fails 
} 
else {
    $sql = "INSERT INTO faculties (name,email,phone) 
      VALUES ('$name','$email', '$phone')"; //sql query to insert new record
    if ($conn->query($sql) === TRUE) {
        header('Location: faculties.php'); // after success redirect to post.php
    } else {
        echo "Error: ".$conn->error; // after unsuccess show error
    }
}
$conn->close();
function test_input($data) {
    // short and sweet function to strip illegal characters
    // can be done more efficiently
    include('../db.php');
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    $data = mysqli_real_escape_string($conn, $data);
    return $data;
  }
?>