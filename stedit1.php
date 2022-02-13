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
          $q = "UPDATE student SET STUDENT_NAME='".$_POST['stdname']."', DATE_OF_BIRTH='".$_POST['dob']."', GENDER = '".$_POST['gender']."'  WHERE STUDENT_ID = ".$_POST['stdid']."";
          $r = $con->query($q) or die('QueryFailed'.$con->error);
          if($r)
          {
              echo "<h1>UPDATE SUCCESSFULL!!!</h1>";
          }
          else
	       {
		      echo "Record not Updated!<br>";
           }
          ?>
</body>
</html>