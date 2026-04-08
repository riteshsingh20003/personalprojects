<?php
if(!isset($_SESSION)) { 
  session_start(); 
}
?> 
<html>
<head>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <link rel="stylesheet" href="http://localhost/Project/tourism/PhpFile/myProject.css">
  <link rel="stylesheet" href="header.css">

  </head>
  <?php


  if(isset($_SESSION['Email'])){
    echo '<div class="link" id="link">';
    echo '<div id="containerRight" class="anchor">';
    echo '<a href="http://localhost/Project/tourism/PhpFile/myProject.php"><img src="http://localhost/ujash/Project/tourism/admin/images/home.png" id="icon"></a>';
    echo '<a href="http://localhost/Project/tourism/PhpFile/myProfile.php" id="alogin" class="anchor1">My Profile</a>';
    echo '<a href="http://localhost/Project/tourism/PhpFile/forget.php" id="cpassword" class="anchor1">Change Password</a>';
    echo '<a href="http://localhost/Project/tourism/PhpFile/tourHistory.php" id="history" class="anchor1">Tour History</a>';
    echo '<a href="http://localhost/Project/tourism/PhpFile/issues.php" id="tickets" class="anchor1">Issue Tickets</a>';
    echo '<div id="RightSide">';
    echo '<b id="welcome"> Welcome :- '.$_SESSION['Email'].'</b>';
    echo '<a href="http://localhost/Project/tourism/PhpFile/logout.php" id="logout" class="anchor1"><strong>/</strong> Logout</a>';
    echo '</div>';
    echo '</div>';
    echo '</div>';

  }
  else{    
    
  }
?>
<body>
  
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand"  href="http://localhost/Project/tourism/PhpFile/myProject.php#"> 
          <div id="blink">
          <h1>
            
            <a href="" class="typewrite" data-period="2000" data-type='[ "Hi, Im Ujash.", "I am Creative.", "I Love  Design.", "I Love Travelling" ]'>
              <span class="wrap"></span>
            </a>
          </h1>
        </div>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <div id="leftNav">
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link" href="http://localhost/Project/tourism/PhpFile/myProject.php#">Home <span class="sr-only">(current)</span></a>
          </li>
          <?php if(!isset($_SESSION['Email'])){
            echo '
            <li class="nav-item dropdown">
              <a class="nav-link" href="http://localhost/Project/tourism/admin/">
                Admin Login
              </a>
              </li>
              ';
          }
              else{
              echo '<li class="nav-item dropdown">
             <a class="nav-link" href="http://localhost/Project/tourism/PhpFile/writeIssue.php">
                Write Issue
              </a>
              </li>';
              }
              ?>
          <li class="nav-item dropdown">
            <a class="nav-link" href="http://localhost/Project/tourism/PhpFile/packages.php">
              Packages
            </a>

          </li>
          
          <li class="nav-item dropdown">
            <a class="nav-link" href="http://localhost/Project/tourism/PhpFile/page.php?type=privacy">
              Privacy Policy
            </a>
          </li>
        
          <li class="nav-item">
            <a class="nav-link" href="http://localhost/Project/tourism/PhpFile/myProject.php#quickLinks">Contact US</a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" href="http://localhost/Project/tourism/PhpFile/page.php?type=about">About US</a>
          </li>
        </ul>
      </div>
      <?php
      if(isset($_SESSION['Email'])){
        echo ' <div class="container-dark" id="LinkButton">
        <button class="btn btn-primary"> <a href="http://localhost/Project/tourism/admin/"><small>Admin Login</small></a></button>   
       </div>';
       } 
      else{   
        
     echo '<div class="container-dark" id="LinkButton">
             <button class="btn btn-primary"> <a href="http://localhost/Project/tourism/login/login.html">SignUp</a></button>
             <button class="btn btn-primary"> <a href="http://localhost/Project/tourism/login/login.html">Login</a></button>    
      </div>';
      }
      ?>
      </div>
    </nav>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="animation.js"></script>
</body>
</html>
  