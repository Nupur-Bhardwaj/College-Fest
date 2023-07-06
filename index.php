<?php
$insert = false;
if(isset($_POST['name'])){
  // Set connection variables
  $server = "localhost";
  $username = "root";
  $password = "";

  // Create a database connection
  $con = mysqli_connect($server, $username, $password);

  // Check for connection success
  if(!$con){
      die("connection to this database failed due to" . mysqli_connect_error());
  }
   //echo "Success connecting to the db";
   
   $name = $_POST['name'];
   $phone = $_POST['phone'];
   $mailid = $_POST['mailid'];
   $age = $_POST['age'];
   $gender = $_POST['gender'];
   $desc = $_POST['desc'];
   


   $sql="INSERT INTO `fest`.`college_fest` ( `name`, `phone`, `email`, `age`, `gender`, `others`, `date`) VALUES ('$name', '$phone', '$mailid ', '$age', '$gender', '$desc', current_timestamp());";
   //echo $sql;

    // Execute the query
    if($con->query($sql) == true){
        //echo "Successfully inserted";

        // Flag for successful insertion
        $insert = true;
    }
    else{
        echo "ERROR: $sql <br> $con->error";
    }

    // Close the database connection
    $con->close();
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WELCOME AMIGOS! </title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <img class='bg' src="college_background.jpg" alt="king's college">
    <div class="container">
        <h1>Hola amigos</h1>
        <p>Fill down the given form to tell us that you will ne joining us!!</p>
       <?php
       if($insert==true){
        echo "<p>thanks !!</p>";
       }
        ?>
        <form action="index.php" method="post">
            <input class="input-class" type="text" name="name" id="name" placeholder="Enter name">
            <input class="input-class" type="phone" name="phone" id="phone" placeholder="Enter phone no">
            <input class="input-class" type="email" name="mailid" id="mailid" placeholder="Enter email address">
            <input class="input-class" type="number" name="age" id="age" placeholder="Enter your age">
            <input class="input-class" type="text" name="gender" id="gender" placeholder="gender">
            <textarea name="desc" id="des" cols="35" rows="10" placeholder="Enter any additional info"></textarea>
            <button class="btn">Submit</button>
            <button class="btn">Reset</button>
        </form>
    </div>
    <script src="index.js"></script>
<!--INSERT INTO `college_fest` (`sno`, `name`, `phone`, `email`, `age`, `gender`, `others`, `date`) VALUES ('1', 'test', '999999999', 'test@testing.com', '14', 'female', 'testing.....', current_timestamp());-->

</body>
</html>