<!DOCTYPE html>
<html lang="en">
<head>
  <title>Arniko Admin Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <script src="script/script.js"></script>
  <style>
    /* Remove the navbar's default margin-bottom and rounded borders */ 
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }
    
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 450px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      padding-top: 20px;
      background-color: #f1f1f1;
      height: 100%;
    }
    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }
    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height:auto;} 
    }
  </style>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">Arniko HSS Admin</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="index.php">Home</a></li>
        <li><a href="result.php">Results</a></li>
        <li class="active"><a href="faculties.php">Faculties</a></li>
        <li><a href="#">Contact</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="admin/"><span class="glyphicon glyphicon-log-in"></span> Admin</a></li>
      </ul>
    </div>
  </div>
</nav>
  
<div class="container-fluid text-center">    
  <div class="row content">
    <div class="col-sm-2 sidenav"></div>
    <div class="col-sm-8 text-left"> 
      <h1>Update Faculties</h1>
      <p>The Admin Panel for customizing Database.</p>
      <hr>
      <h3>Faculties</h3>
      <a href="addnewfac.php">Add New</a>
    <table class='table table-bordered '>
      <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Action</th>
    </tr>
    <?php  
    include('../db.php');
    if ($conn->connect_error) {
        echo 'Problem Connecting to the Database';
        } 
        else {
        $sql = "SELECT name,email,phone,id  FROM faculties";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                $id = $row["id"];
                $name = $row["name"];
                $email = $row["email"];
                $phone = $row['phone'];
                ?>
            <tr>
                <td><?php echo $name;?></td>
                <td><?php echo $email;?></td>
                <td><?php echo $phone;?></td>
                <td> <a href="deletefaculty.php?id=<?php echo $id;?>"> Delete</a>
                <br><a href="editfaculty.php?id=<?php echo $id;?>"> Edit</a>
                </td>
            </tr>
            <?php
        }
    }
    }
        ?>
        </table>
    </div>
    <div class="col-sm-2 sidenav">
        
    </div>
  </div>
</div>

<footer class="container-fluid text-center">
  <p>Created by Sulav Parajuli &copy;2019</p>
</footer>

</body>
</html>