<!DOCTYPE html>
<html>
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
          echo "<br>";
          $x=$_POST["inputnum"];
          $query1="SELECT s.NUM_STUDENTS from classtable s where CLASS_ID=$x";
          $R = $con->query($query1)or die('classtable query is failed'.$con->error);
          $ROW1=$R->fetch_array(MYSQLI_ASSOC);
          if ($ROW1)
          {
            $No_stds = $ROW1['NUM_STUDENTS'];
            echo "Class No ";
			echo $x;
			echo "<br>";
			echo "Number of students : ";
			echo $No_stds;
			echo "<br>";
            $Q12 = "SELECT s.NUM_STUDENTS,s.SECTION_NAME,s.GENDER from sectiontable s where s.CLASS_ID=$x";
            $QUERY =$con->query($Q12) or die ('section table query failed'.$con->error);
            echo "SECTION NAME "."&nbsp&nbsp&nbsp"."Number of students"."&nbsp&nbsp&nbsp"."GENDER"."<br>";
            $ROW = $QUERY->fetch_array(MYSQLI_ASSOC);
            if ($ROW)
            {
                            echo $ROW['SECTION_NAME'];
							echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
							echo $ROW['NUM_STUDENTS'];
							echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";							
                            echo $ROW['GENDER'];
							echo "<br>";
            }
            while($ROW = $QUERY->fetch_array(MYSQLI_ASSOC)) 
						 { 
							echo $ROW['SECTION_NAME'];
							echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
							echo $ROW['NUM_STUDENTS'];
							echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";							
                            echo $ROW['GENDER'];
							echo "<br>";

						 }
					
          }
          else{
            die('Wrong Input Could not Find: '); 
            echo'SOMETHING WENT WRONG'; 
           }
          ?>
    </body>
</html>