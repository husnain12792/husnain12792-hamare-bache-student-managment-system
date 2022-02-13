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
          $Q = "SELECT CLASS_ID,NUM_STUDENTS from classtable ";
          $QUERYID = $con->query($Q) or die('classtable query failed'.$con->error);
          $ROW1=$QUERYID->fetch_array(MYSQLI_ASSOC);
          echo "CLASS NO "."&nbsp&nbsp&nbsp"."NUMBER OF STUDENTS"."<br>";
          if ($ROW1)
          {
            echo $ROW1['CLASS_ID']."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp".$ROW1['NUM_STUDENTS']."<br>"; 
          }
          while($ROW1 = $QUERYID->fetch_array(MYSQLI_ASSOC))
          {
            echo $ROW1['CLASS_ID']."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp".$ROW1['NUM_STUDENTS']."<br>"; 
          }
          echo"<hr>";
          $Q1 = "SELECT NUM_STUDENTS,SECTION_NAME,GENDER from sectiontable ";
          $QUERYID = $con->query($Q1);
          echo "SECTION NAME "."&nbsp&nbsp&nbsp"."NUM_STUDENTS"."&nbsp&nbsp&nbsp"."GENDER"."<br>";
          while($ROW2=$QUERYID->fetch_array(MYSQLI_ASSOC))
          {
            echo $ROW2['SECTION_NAME'];
            echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
            echo $ROW2['NUM_STUDENTS'];
            echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";							
            echo $ROW2['GENDER'];
            echo "<br>";
          }
          ?>
          <form action="REPORT12.php" method="post">
			<center><input type = "text" name = "inputnum" placeholder = "Enter Class Number" required/></center>
			<br>
			<center><input type = "submit" name = "submit" value = "Search"></center>
		    </form>
</body>
</html>