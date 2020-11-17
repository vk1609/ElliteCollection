<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>

        <?php require_once 'process.php' ?>
        <?php
        if(isset($_SESSION['message'])){ ?>
        <div>
        <?php 
        echo $_SESSION['message'];
        unset($_SESSION['message']);
        ?>
        </div>
<?php } ?>
        <?php
        $mysqli = new mysqli('localhost', 'root', '', 'task') or die($mysqli_error($mysqli));
        $result = $mysqli->query("SELECT * FROM details")or die($mysqli->error);
    
    ?>
    <div>
    <table id = "table">
    <thead>
    <tr>
    <th>Name</th>
    <th>Email</th>
    <th>Number</th>
    <th>dob</th>
    <th>Age</th>
    <th colspan = "2">Action</th></tr>
    
    </thead>
        //Below code is to display the data 
     <?php 
    while ($row = $result->fetch_assoc()){

        
    ?>  
     
    <tr>
    <td><?php echo $row['name']; ?></td>
    <td><?php echo $row['email'] ;?></td>
    <td><?php echo $row['number']; ?></td>
    <td><?php echo $row['dob']; ?></td>
    <td><?php echo $row['age']; ?></td>
    <td><button class="button">
    <a href="index.php?delete=<?php echo $row['id']; ?>">Delete</a>
     
      </button>
      <button class="button">
    <a href="edit.php?edit=<?php echo $row['id']; ?>">Update</a>
     
      </button>
  
      </td>
    </tr>
<?php } ?>

    </table>
    </div>
   
   


    
//Below code is to enter the details of user

        <form action="index.php" method = "POST">
        <label for="">NAME</label>  </br>
        <input type="text" name = "name" placeholder = "NAME"></br>
        <label for="">EMAIL</label>  </br>
        <input type="text" name = "email" placeholder = "EMAIL"></br>
        <label for="">MOBILE-NUMBER</label> </br>
        <input type="text" name = "number" placeholder = "MOBILE NUMBER"></br>
        <label for="">DATEOFBIRTH</label>  </br>
        <input type="date" name = "dob" placeholder = "DOB"></br>
        <label for="">AGE</label>  </br>
        <input type="text" name = "age" value = >

        <input type = "submit" name = "submit" >
        <div class="g-recaptcha" data-sitekey="6LcSa-IZAAAAALUXyYPpdydm0_rl7QArTS2EjMPs"></div>
        </form>
        <script src='https://www.google.com/recaptcha/api.js'></script>
        <?php
    if (isset($_POST['submit'])) {
       
        $secretKey = "6LccCSMUAAAAAKkTzemiArEQkQ5hKcgKJG8NQO0-";
        $responseKey = $_POST['g-recaptcha-response'];
        $userIP = $_SERVER['REMOTE_ADDR'];

        $url = "https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$responseKey&remoteip=$userIP";
        $response = file_get_contents($url);
        $response = json_decode($response);
        if ($response->success)
            echo "Verification success";
        else
            echo "Verification failed!";
    }
?>
     

    </body>
</html>
