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
            $option = $_POST['option'];
            $input = $_POST['input'];
            if ($option == "none")
            {
              echo "You haven't select any type to search student. PLease go back and select any type.";
            }
            else
            {
              if ($option == "id")
              {
                  $Q = "SELECT STUDENT_ID, STUDENT_NAME, DATE_OF_BIRTH, GENDER from student where STUDENT_ID =".$input;
                  $R = $con->query($Q);
                  $rs_arr = $R->fetch_array(MYSQLI_ASSOC);
                   if($rs_arr){
                       echo "<TABLE border = 0>";
                       echo "<TR><TD width = 15%>ST_ID</TD><TD width = 15%>NAME</TD><TD width = 15%>AGE</TD><TD width = 15%>GENDER</TD></TR><TD width = 20%></TD>";
                       echo "<TR><TD>".$rs_arr['STUDENT_ID']."</TD><TD>".$rs_arr['STUDENT_NAME']."</TD>";
                       $NOW = date('Y');
                       $DOB = strtotime($rs_arr['DATE_OF_BIRTH']);
                       $DIFFERENCE = date('Y',$DOB);
                       $TEMPORARY = $NOW-$DIFFERENCE;
                       echo "<TD>".$TEMPORARY."</TD>";
                       echo "<TD>".$rs_arr['GENDER']."</TD>";
                       $_SESSION['STUDENTID'] = $rs_arr['STUDENT_ID'];
                       echo "<TD></TD><TD><a href='stedit.php?username=".$rs_arr['STUDENT_ID']."'>EDIT</a></TD>";
                       echo "<TD></TD><TD><a href='stdelete.php?username=".$rs_arr['STUDENT_ID']."'>DELETE</a></TD></TR>";
                   }
                    echo "</TABLE>"; 
              }
              else if ($option == "name")
              {
                $Q1 = "SELECT STUDENT_ID, STUDENT_NAME, DATE_OF_BIRTH, GENDER from student where STUDENT_ID =".$input;
                $QUERY2 = $con->query($Q1)or die ('QUERY FAILED'.$con->error); 	
                 while( $rs_arr1 = $QUERY2->fetch_array(MYSQLI_ASSOC))
                 {
                     echo "<TABLE border = 0>";
                     echo "<TR><TD width = 15%>ST_ID</TD><TD width = 15%>NAME</TD><TD width = 15%>AGE</TD><TD width = 15%>GENDER</TD></TR><TD width = 20%></TD>";
                     echo "<TR><TD>".$rs_arr1['STUDENT_ID']."</TD><TD>".$rs_arr1['STUDENT_NAME']."</TD>";
                     $NOW = date('Y');
                     $DOB = strtotime($rs_arr1['DATE_OF_BIRTH']);
                     $DIFFERENCE = date('Y',$DOB);
                     $TEMPORARY = $NOW-$DIFFERENCE;
                     echo "<TD>".$TEMPORARY."</TD>";
                     echo "<TD>".$rs_arr1['GENDER']."</TD>";
                    echo "<TD></TD><TD><a href='stedit.php?username=".$rs_arr1['STUDENT_ID']."'>EDIT</a></TD>";
                    echo "<TD></TD><TD><a href='stdelete.php?username=".$rs_arr1['STUDENT_ID']."'>DELETE</a></TD></TR>";
                 }
                 echo "</TABLE>";
            }
            }
        ?>
</body>
</html>