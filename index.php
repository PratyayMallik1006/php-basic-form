<?php
$insert = false;
if(isset($_POST['name'])){
    // Set connection variables
    $server = "localhost";
    $username="root";
    $password="";

    // Create database connection
    $con = mysqli_connect($server, $username, $password);

    if(!$con){
        die("Connection to this databse failed due to ".
        mysqli_connect_err());
    }
    // echo "Success connecting to the db"

    // collect post variables
    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $desc = $_POST['desc'];

    $sql ="INSERT INTO `volunteer`.`volunteers` (`name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) 
    VALUES ('$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());";
    
    // execute the query
    if($con->query($sql) == true){
        //echo "Successfully inserted";
        $insert = true;
    }
    else {
        echo "Error: $sql <br> $con->error";
    }

    $con->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Bootstrap core CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
 crossorigin="anonymous">

 <link rel="stylesheet" href="style.css">
    <title>Volunteer Form</title>
</head>
<body>
    <div class="container">
    <h1 class="h1 mb-1 fw-normal">COVID-19 volunteer form</h1>
        <p>Enter your details below to help frontline workers</p>
        <?php
        if($insert == true){
        echo "<p class='submitMsg'>Registered successfully</p>";
        }
        ?>
        <form action="index.php" method="post">
            <input type="text" class="form-control top" name="name" id="name" placeholder="Enter your name">
            <input type="text" class="form-control middle" name="age" id="age" placeholder="Enter your age">
            <input type="text" class="form-control middle" name="gender" id="gender" placeholder="gender">
            <input type="email"class="form-control middle"name="email" id="email" placeholder="email">
            <input type="phone"class="form-control middle"name="phone" id="phone" placeholder="phone number">
            <textarea name="desc" class="form-control bottom" id="desc" cols="30" rows="10" placeholder="Details you want us to know"></textarea>
            <button type="submit" class="w-100 btn btn-lg btn-primary">Submit</button>
            
        </form>
    </div>
    
    <script src="index.js"></script>

    
</body>
</html>