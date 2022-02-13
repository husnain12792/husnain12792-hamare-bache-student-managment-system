<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hamaray Bachchey</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<body>
<?php
  $SERVERNAME = "localhost";
  $USERNAME = "root";
  $PASSWORD = "";
  $DBNAME = "project";
  $con = new mysqli($SERVERNAME,$USERNAME,$PASSWORD,$DBNAME);
  if ($con -> connect_errno)
   {
     echo "FAILED TO CONNECT: " . $con -> connect_error;
     exit();
   }
       if (empty($_POST['username'])||empty($_POST['userpassword']))
       {
           $error = "FULL BOTH FIELDS";
       }
       else
       {
           $user = $_POST['username'];
           $pass = $_POST['userpassword'];
           $sql = "SELECT ID FROM signin WHERE username = '$user' and passwo = '$pass'";
           $result = $con->query($sql) or die ('Error'.$con->error);
           $result1 =$result->fetch_array(MYSQLI_ASSOC); 
           if ($result1==1)
           {
               echo "you successfully log in"
           }
           else
           {
               echo "INCORRECT USER NAME AND PASSWORD";
           }
       }
?>
</body>
</html>