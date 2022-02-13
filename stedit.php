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
          $STUDENTID = $_GET['username'];
          $q = "SELECT STUDENT_ID, STUDENT_NAME, DATE_OF_BIRTH, GENDER from student where STUDENT_ID = $STUDENTID";
          $query_id = $con -> query($q) ;
          if ($query_id)
          {
            echo "<hr>";
            $rs_arr = $query_id->fetch_array(MYSQLI_ASSOC);
            if ($rs_arr){
                echo "<form action = 'stedit1.php' method = 'post'>";
                echo " STD ID: <input type='text' name='stdid' value = '".$rs_arr['STUDENT_ID']."'required> STD NAME : <input type='text' name='stdname' value = '".$rs_arr['STUDENT_NAME']."' required>";
                echo "<br><br>";
                echo "DOB: <input type='text' name='dob' value = '".$rs_arr['DATE_OF_BIRTH']."'required> GENDER : <input type='text' name='gender' value = '".$rs_arr['GENDER']."' required>";
                echo "<br><br>";
                echo "<input type = 'submit' value = 'UPDATE'>";
                echo "</form>";

            }
            else{
                echo "THE ENTERED EMPLOYEE IS NOT FOUND IN THE TABLE!!!";
            }
          }
          else
	       {
		      echo "Record not found!<br>";
	       }
        ?>
</body>
</html>