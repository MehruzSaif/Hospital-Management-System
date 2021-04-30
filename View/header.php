<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- <link rel="stylesheet" href="css/style.css"> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
    *{
      box-sizing:border-box;
    }
     html{
       height:100%;
       
     }

      body{
        position:relative;
        background:url(image/hospital-bg.jpg) no-repeat center;
        min-height:100%;
        }
      body:after{
        content:'';
        position:absolute;
        top:0;
        left:0;
        width:100%;
        min-height:100%;
        background:rgba(0,0,0,0.5);
        z-index:-1;
      }
    
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="#">Hospital Management System</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample07" aria-controls="navbarsExample07" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExample07">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="appointments.php">Appointments</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="doctors.php">Doctors</a>
        </li> 
      </ul>
      <ul class="navbar-nav">
      <?php if($_SESSION['is_logged_in'] ): ?>
          <li class="nav-item">
            <a class="nav-link" href="#"><?php echo $_SESSION['admin_data']['name'] ;?></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="logout.php">Logout</a>
          </li>
        <?php else: ?>  
        <li class="nav-item">
            <a class="nav-link" href="#">Login</a>
          </li>
        <?php endif; ?>

      </ul>
    </div>
  </div>
</nav>
