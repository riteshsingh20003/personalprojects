<?php
if(!isset($_SESSION)){
    session_start();
}
include "header.php";
include "connection.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        #container1 form{
            background-color:black;
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
        }
        #container1 h2{
            color:white;

            text-align:center;
        }
        #container1{
            width:70%;
            display:block;
            margin:auto;
            position:relative;
            top:20px;
        }
        #container1 input[type="text"],#container1 select{
            display:block;
            margin-top:30px;
            margin-left:22%;
            width:60%;
        }
        #container1 input[type="submit"]{
            display:block;
            /* margin:auto; */
            margin-top:30px;
            margin-left:43%;
            width:150px;
            font-size:18px;
        }
        #success{
            width:40%;
            display:block;
            margin:auto;
            text-align:center;
        }
    </style>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Issue</title>
</head>
<body>
    <div id="container1" class="form-group">

        <?php
        if(isset($_POST['submit'])){
            
            $email = $_SESSION['Email'];
            $issue = $_POST['issue'];
            $desc= $_POST['Description'];
            $sql = "INSERT INTO `tblissues` (`UserEmail`, `Issue`, `Description`) VALUES ('$email', '$issue', '$desc');";
            $result = mysqli_query($conn,$sql);
            if($result){
            echo '<div class="alert alert-success" id="success">Thank You</div>';
            }
            
        }
        ?>



        <form action="http://localhost/Project/tourism/PhpFile/writeIssue.php" method="post">
            <h2>Write Problem</h2>
            <select class="form-control" aria-label="Default select example" name="issue">
             <option selected>Select Problem</option>
             <option value="Booking">Booking</option>
             <option value="Cancellation">Cancellation</option>
             <option value="Refund">Refund</option>
             <option value="Other">Other</option>
           </select>
           <br>
           <input type="text" class="form-control" name="Description" placeholder="Description">
           <input type="submit" class="btn btn-primary" name="submit" Value="Submit">
        </form>
    </div>
</body>
</html>
<?php
include "footer1.php";
?>