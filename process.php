<?php 
// Establishing the connection

$mysqli = new mysqli('localhost', 'root', '', 'task') or die($mysqli_error($mysqli));

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $dob = $_POST['dob'];
    $age = $_POST['age'];

    $mysqli->query("INSERT INTO details(name, email, number, dob, age) 
                    VALUES ('$name','$email','$number','$dob','$age')")or 
                    die ($mysqli -> error);
                    $_SESSION['message'] = "Details are saved";
                    $_SESSION['msg_type'] = "SUCCESS!!!";
                    header("location: index.php");

}

// To delete the data from database
if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    $mysqli->query("DELETE FROM details WHERE id = $id") or die($mysqli_error($mysqli));
    $_SESSION['message'] = "Details are deleted";
                    $_SESSION['msg_type'] = "DELETED!!!";
                    header("location: index.php");
}
// To update email from database
if(isset($_GET['update'])){

    $id = $_GET['update'];
    $email = $_POST['email'];
    
    $mysqli->query("UPDATE details SET email = '$email' WHERE id = $id") or die($mysqli_error($mysqli));
   
    header('location:index.php');
    }
   
   
?>
