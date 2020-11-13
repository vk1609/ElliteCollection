<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>


<?php
require_once 'process.php'

?>
<div class="col-lg-6 m-auto">
 
 <form method="post">
 
 <br><br><div class="card">
 
 <div class="card-header bg-dark">
 <h3 class="text-white text-center">  Update Operation </h3>
 </div><br>

 <label> Email: </label>
 <input type="text" name="email" class="form-control"> <br>

 <button class="btn btn-success" type="submit" name="update"> <a href="edit.php">Submit</a>  </button><br>
<a href="index.php">enter</a>
 </div>
 </form>
 </div>
</body>
</html>