<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hamaray Bachchey</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
<?php
    //Here is the following variables that store my servername and password and username
    $SERVERNAME = "localhost";
    $USERNAME = "root";
    $PASSWORD = "";
    $DBNAME = "project";
    $con = new mysqli($SERVERNAME,$USERNAME,$PASSWORD,$DBNAME);
    //Here I should check the condition whether it is connected or not
    if ($con -> connect_errno) {
        echo "FAILED TO CONNECT: " . $con -> connect_error;
        exit();
      }
	  $ID = $_POST['STUDENTID'];
	  $PRE = $_POST['CURRENTID'];
	  $NEW = $_POST['NEWID'];
	  $CLASS = "SELECT STUDENT_ID,STUDENT_NAME from student  where STUDENT_ID=$ID";
	  $QUERYID=$con->query($CLASS);
	  $RUN = $QUERYID -> fetch_array(MYSQLI_ASSOC);
	  $SELECTED_ID = $RUN["STUDENT_ID"];
	  $NAME = $RUN['STUDENT_NAME'];
	  if ($RUN)
	  {
		$PRECLASS = "SELECT sec.CLASS_ID,sec.GENDER from sectiontable sec,student s where s.STUDENT_ID=$SELECTED_ID and s.SECTION_ID = sec.SECTION_ID";
		$PRECLASSID = $con->query($PRECLASS) or die('PRECLASS FAILED'.$con->error);
		$RUN1 = $PRECLASSID->fetch_array(MYSQLI_ASSOC);
		$GEN = $RUN1['GENDER'];
		if ($RUN1)
		{	
			if ($PRE != $RUN1["CLASS_ID"])
			{
				echo "<h2>";
				echo"<center>";
				echo "$NAME";
				echo "IS NOT IN THIS CLASS";
				echo"</center>";
				echo"</h2>";
			}
			else{
				
				$NEWCLASS = "SELECT sec.SECTION_ID from sectiontable sec where sec.CLASS_ID = $NEW and sec.GENDER ='$GEN'" ;
				$NEWCLASSID = $con->query($NEWCLASS) or die ('NEWCLASS QUERY FAILED'.$con->error);
				$RUN2 = $NEWCLASSID->fetch_array(MYSQLI_ASSOC);
				if ($RUN2)
				{
					$SECTION = $RUN2['SECTION_ID'];
					$QUERY= "UPDATE Student SET SECTION_ID = $SECTION where STUDENT_ID = $SELECTED_ID";
					$QUERYID1=$con->query($QUERY) or die('UPDATEQUERY FAILED'.$con->error);
					
					if ($QUERYID1)
					{
						echo "<h2>";
						echo"<center>";
						echo "CLASS CHANGED SUCCESSFULLY";
						echo"</center>";
						echo "</h2>";						
					}
					
				}
				else 
				{
					echo "<h2>";
					echo"<center>";
					echo "$NEW";
					echo "CLass doesnot exist";
					echo"</center>";
					echo "</h2>";
				}
			}
		}
	}
	
?>
</body>
</html>