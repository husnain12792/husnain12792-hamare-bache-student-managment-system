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
          $x=$_POST['inputnum'];
          if (is_numeric($x))
          {
              
              $empp=$x;	
              $query1="SELECT PARENT_ID,FA_CNIC ,MA_CNIC,NUMBER_OF_CHILDS from parent  where FA_CNIC = $empp OR MA_CNIC = $empp";
              $query_id1 = $con->query( $query1)or die('query1 is failed'.$con->error); 		
              $row1=$query_id1->fetch_array(MYSQLI_ASSOC);			
              echo  $S_PP_ID = $row1['PARENT_ID'];
              if($row1)
                  {
                        echo 'HELLO';
                          $S_PP_ID = $row1['PARENT_ID'];
                          $FF_CNIC = $row1['FA_CNIC'];
                          $MM_CNIC = $row1['MA_CNIC'];
                          $no_of_cc=$row1['NUMBER_OF_CHILDS'];
                          $query2="SELECT FATHER_NAME from father where FATHER_CNIC = $FF_CNIC";
                          $query_id2 = $con->query($query2)or die('query2 is failed'.$con->error); 		
                          $row2=$query_id2->fetch_array(MYSQLI_ASSOC);
                          $FF_NAME=$row2['FATHER_NAME'];
                          $query3="SELECT MOTHER_NAME from MOTHER where MOTHER_CNIC = $MM_CNIC";
                          $query_id3 = $con->query( $query3)or die('query3 is failed'.$con->error); 		
                          $row3=$query_id3->fetch_array(MYSQLI_ASSOC);
                          $MM_NAME=$row3['MOTHER_NAME'];
                          $query4="SELECT s.SECTION_ID,s.STUDENT_ID,s.STUDENT_NAME,s.DATE_OF_BIRTH,s.GENDER from student s where s.PARENT_ID = $S_PP_ID";
                          $query_id4 = $con->query($query4)or die('query3 is failed'.$con->error); 		
                          $row4=$query_id4->fetch_array(MYSQLI_ASSOC);
                          
                          echo "$row4";
                          
                          
                      if ($row4)
                      {
                              
                          $student_id = $row4['STUDENT_ID'];
                          $query5="SELECT s.CLASS_ID from sectiontable s,student ss where s.SECTION_ID = ss.SECTION_ID and ss.SECTION_ID = $student_id";
                          $query_id5 = $con->query($query5)OR die('query5 failed'.$con->error); 		
                        
                          $row5=$query_id5->fetch_array(MYSQLI_ASSOC);
                          
                          //echo "$row5[0]";
                          
                          echo"$student_id";
                          
                          $qquery1="SELECT g.ACCOMPANYING_NAME from accompanying_student g where g.STUDENT_ID = $student_id";
                          $qquery_id1 = $con->query($qquery1)or die('qquery1 is failed'.$con->error); 		
                          $qrow1=$qquery_id1->fetch_array(MYSQLI_ASSOC);
                          $GU = $qrow1['ACCOMPANYING_NAME'];
                          echo"$GU";
                          
                          
                          
                          
                  echo "<Form action='dispo2.php' method='post'>";
                  echo "<center>";
                  echo "<label for='Name'>Your Entered CNIC/PARENT CNIC:";
                  echo "<input type='text' name='S_Name' value='$empp' required/>";
                  echo "</center>";
                  echo "<br>";
                  echo "<center>";
                  echo "<label for='Name'>HUSBAND:";
                  echo "<input type='text' name='S_Name' value='$FF_NAME' required/>";
                  echo "</center>";
                  echo "<br>";
                  echo "<center>";
                  echo "<label for='Name'>WIFE:";
                  echo "<input type='text' name='S_Name' value='$MM_NAME' required/>";
                  echo"</center>";
                  echo"<br>";
                  echo "<center>";
                  echo "<label for='Name'>Total Children:";
                  echo "<input type='text' name='S_Name' value='$no_of_cc' required/>";
                  echo"</center>";
                  echo"<br>";
                  echo"</Form>";
                          
                          
                          
  
  
                      echo"<center>";
                      echo "<b>THEIR CHILDREN WHO ARE STUDYING HERE ARE:</b>";
                      echo"</center>";
                      echo "<br>";						
  
                      
                      echo"<center>";
                      echo "<b>Student's NAME</b> &nbsp&nbsp&nbsp&nbsp";
                      echo "<b>Student's DOB</b> &nbsp&nbsp&nbsp&nbsp";
                      echo "<b>Student's GENDER</b>&nbsp&nbsp&nbsp&nbsp";	
                      echo "<b>Student's CLASS</b>&nbsp&nbsp&nbsp&nbsp";	
                      echo "<b>Assosiated Guardian</b>";	
                      echo"</center>";
                      echo "<br>";						
                      echo "<hr>";
                          echo"&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
                          echo"&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
                          echo"&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
                          echo"&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
                          echo"&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
                          
                          echo $row4["STUDENT_NAME"];
                          echo"&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";						
                          echo"&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
                          echo $row4["DATE_OF_BIRTH"];
                          echo"&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
                          echo $row4["GENDER"];
                          echo"&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
                          echo"&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
                          echo $row5["CLASS_ID"];
                          echo"&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
                          if($GU)
                          {
                              while($qrow1=$qquery_id1->fetch_array(MYSQLI_ASSOC))
                              {
                              echo "$GU";
                              echo "&nbsp&nbsp&nbsp";
                              }
                          }
                          else 
                          echo "NO ASSOSIATED GUARDIAN";	
                          echo"<br>";
                          echo"<br>";	
                          
                      while($row4 =$query_id4->fetch_array(MYSQLI_ASSOC))
                      {
  
                          $section_id = $row4['SECTION_ID'];
                          $query5 = "SELECT s.CLASS_ID from sectiontable s where s.SECTION_ID = $section_id";
                          $query_id5 = $con->query($query5)or die('query5 is failed'.$con->error); 			
                          $row5=$query_id5->fetch_array(MYSQLI_ASSOC);
  
                          $student_ID = $row4['STUDENT_ID'];
                          $query6 = "SELECT g.ACCOMPANYING_NAME from accompanying_gaurdian g,student s where g.STUDENT_ID = $student_ID";
                          $query_id6 = $con->query($query6)or die('query6 is failed'.$con->error); 			
                          $row6=$query_id6->fetch_array(MYSQLI_ASSOC);
                          if($row6)
                          $GU = $row6['ACCOMPANYING_NAME'];
                          else 
                          $GU = "NO ASSOSIATED GUARDIAN";	
                          
                          $class_id = $row5["CLASS_ID"];
  
                          echo"&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";						
                          echo"&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
                          echo"&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
                          echo"&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
                          echo"&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
                          echo $row4["STUDENT_NAME"];
                          echo"&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";						
                          echo"&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
                          echo $row4["DATE_OF_BIRTH"];
                          echo"&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
                          echo $row4["GENDER"];
                          echo"&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
                          echo"&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
                          echo $class_id;
                          echo"&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
                          if($GU)
                          {
                              echo "$GU";
                              echo "&nbsp&nbsp&nbsp";							
                              while($qrow1=$qquery_id1->fetch_array(MYSQLI_ASSOC))
                              {
                              echo "$GU";
                              echo "&nbsp&nbsp&nbsp";
                              }
                          }
                          else 
                          echo "NO ASSOSIATED GUARDIAN";	
  
                          echo"<br>";
                          echo"<br>";
                      }
                      }
                      else {
                  echo "<Form action='dispo2.php' method='post'>";
                  echo "<center>";
                  echo "<label for='Name'>Your Entered CNIC/PARENT CNIC:";
                  echo "<input type='text' name='S_Name' value='$empp' required/>";
                  echo "</center>";
                  echo "<br>";
                  echo "<center>";
                  echo "<label for='Name'>HUSBAND:";
                  echo "<input type='text' name='S_Name' value='$FF_NAME' required/>";
                  echo "</center>";
                  echo "<br>";
                  echo "<center>";
                  echo "<label for='Name'>WIFE:";
                  echo "<input type='text' name='S_Name' value='$MM_NAME' required/>";
                  echo"</center>";
                  echo"<br>";
                  echo "<center>";
                  echo "<label for='Name'>Total Children:";
                  echo "<input type='text' name='S_Name' value='$no_of_cc' required/>";
                  echo"</center>";
                  echo"<br>";
                  echo "<center>";
                  echo"<b>No Student is in the Organization</b>";
                  echo"</center>";
                  echo"<br>";
                  echo"</Form>";
  
                          echo"<br>";					
                      }
                  }
              else{
               die('Wrong Input Could not Find 1:'.$con->error); 
              }	
              
          }
          else 
          {
              $empp=$x;	
              $query123="SELECT f.FATHER_CNIC from father f where f.FATHER_NAME = '$empp'";
              $query_id123 = $con->query( $query123)or die('ERROR IN FATHER QUERY'.$con->error); 		
              $row123=$query_id123->fetch_array(MYSQLI_ASSOC);			
              
              if ($row123)
              {
                  $empp =$row123["FATHER_CNIC"];
                  //echo"$empp";
              }
              else
              {
                  $query12="SELECT m.MOTHER_CNIC from mother m where m.MOTHER_NAME = '$empp'";
                  $query_id12 = $con->query($query12)or die('QUERY12 IS FAILED'.$con->error); 		
                  $row12=$query_id12->fetch_array(MYSQLI_ASSOC);						
                  $empp =$row12["MOTHER_CNIC"];
                  //echo "$empp";
              }
              
              if($row123 || $row12)
              {
              $query1="SELECT p.PARENT_ID,p.FA_CNIC ,p.MA_CNIC,p.NUMBER_OF_CHILDS from Parent p where p.FA_CNIC = $empp OR p.MA_CNIC = $empp";
              $query_id1 = $con->query( $query1)or die ('query123 is failed'.$con->error); 		
              $row1=$query_id1->fetch_array(MYSQLI_ASSOC);			
          
              
              if($row1)
                  {
                          $S_PP_ID = $row1["PARENT_ID"];
                          $FF_CNIC = $row1["FA_CNIC"];
                          $MM_CNIC = $row1["MA_CNIC"];
                          $no_of_cc=$row1["NUMBER_OF_CHILDS"];
                          
  
                          $query2="SELECT FATHER_NAME from FATHER where FATHER_CNIC = $FF_CNIC";
                          $query_id2 = $con->query($query2)or die ('query2 is failed'.$con->error); 		
                         
                          $row2=$query_id2->fetch_array(MYSQLI_ASSOC);
  
                          $FF_NAME=$row2["FATHER_NAME"];
  
  
                          $query3="SELECT MOTHER_NAME from MOTHER where MOTHER_CNIC = $MM_CNIC";
                          $query_id3 = $con->query( $query3)or die('MOTHER QUERY IS FAILED'.$con->error); 		
                          $row3=$query_id3->fetch_array(MYSQLI_ASSOC);
  
                          $MM_NAME=$row3["MOTHER_NAME"];
  
  
                          $query4="SELECT s.SECTION_ID,s.STUDENT_ID,s.STUDENT_NAME,s.DATE_OF_BIRTH,s.GENDER from student s where s.PARENT_ID = $S_PP_ID";
                          $query_id4 = $con->query( $query4); 		
                          $row4=$query_id4->fetch_array(MYSQLI_ASSOC);
                      //	echo "$row4";
                          
                      if ($row4)
                      {
                              
                          $student_id = $row4["STUDENT_ID"];
                          $query5="SELECT s.CLASS_ID from sectiontable s,student ss where s.SECTION_ID = ss.SECTION_ID and ss.SECTION_ID = $student_id";
                          $query_id5 = $con->query($query5)or die('ERROR IN QUERY5'.$con->error); 		
                          $row5=$query_id5->fetch_array(MYSQLI_ASSOC);
                          
                          //echo "$row5[0]";
                          
                          echo"$student_id";
                          
                          $qquery1="SELECT g.ACCOMPANYING_NAME from accompanying_gaurdian g where g.STUDENT_ID = $student_id";
                          $qquery_id1 = $con->query($qquery1)or die ('ERROR IN ACCOMPANYING QUERY'.$con->error); 		
                          $qrow1=$qquery_id1->fetch_array(MYSQLI_ASSOC);
                          
                          
                          $GU = $qrow1["ACCOMPANYING_NAME"];
                          echo"$GU";
                          
                          
                          
                          
                  echo "<Form action='dispo.php' method='post'>";
                  echo "<center>";
                  echo "<label for='Name'>Your Entered CNIC/PARENT CNIC:";
                  echo "<input type='text' name='S_Name' value='$empp' required/>";
                  echo "</center>";
                  echo "<br>";
                  echo "<center>";
                  echo "<label for='Name'>HUSBAND:";
                  echo "<input type='text' name='S_Name' value='$FF_NAME' required/>";
                  echo "</center>";
                  echo "<br>";
                  echo "<center>";
                  echo "<label for='Name'>WIFE:";
                  echo "<input type='text' name='S_Name' value='$MM_NAME' required/>";
                  echo"</center>";
                  echo"<br>";
                  echo "<center>";
                  echo "<label for='Name'>Total Children:";
                  echo "<input type='text' name='S_Name' value='$no_of_cc' required/>";
                  echo"</center>";
                  echo"<br>";
                  echo"</Form>";
                          
                          
                          
  
  
                      echo"<center>";
                      echo "<b>THEIR CHILDREN WHO ARE STUDYING HERE ARE:</b>";
                      echo"</center>";
                      echo "<br>";						
  
                      
                      echo"<center>";
                      echo "<b>Student's NAME</b> &nbsp&nbsp&nbsp&nbsp";
                      echo "<b>Student's DOB</b> &nbsp&nbsp&nbsp&nbsp";
                      echo "<b>Student's GENDER</b>&nbsp&nbsp&nbsp&nbsp";	
                      echo "<b>Student's CLASS</b>&nbsp&nbsp&nbsp&nbsp";	
                      echo "<b>Assosiated Guardian</b>";	
                      echo"</center>";
                      echo "<br>";						
                      echo "<hr>";
                          echo"&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
                          echo"&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
                          echo"&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
                          echo"&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
                          echo"&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
                          
                          echo $row4["STUDENT_NAME"];
                          echo"&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";						
                          echo"&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
                          echo $row4["DATE_OF_BIRTH"];
                          echo"&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
                          echo $row4["GENDER"];
                          echo"&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
                          echo"&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
                          echo $row5["CLASS_ID"];
                          echo"&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
                          if($GU)
                          {
                              while($qrow1=$qquery_id1->fetch_array(MYSQLI_ASSOC))
                              echo "$GU";
                              echo "&nbsp&nbsp&nbsp";
                          }
                          else 
                          echo "NO ASSOSIATED GUARDIAN";	
                          echo"<br>";
                          echo"<br>";	
                          
                      while($row4 =$query_id4->fetch_array(MYSQLI_ASSOC))
                      {
  
                          $section_id = $row4["SECTION_ID"];
                          $query5 = "SELECT s.CLASS_ID from sectiontable s where s.SECTION_ID = $section_id";
                          $query_id5 = $con->query($query5)or die('ERROR IN QUERY5'.$con->error); 			
                          $row5=$query_id5->fetch_array(MYSQLI_ASSOC);
  
                          $student_ID = $row4["STUDENT_ID"];
                          //echo "student_ID";
  
                          $query6 = "SELECT g.ACCOMPANYING_NAME from accompanying_gaurdian g,student s where g.STUDENTT_ID = $student_ID";
                          $query_id6 = $con->query($query6) or die('ERROR IN QUERY6'.$con->error); 			
                          $row6=$query_id6->fetch_array(MYSQLI_ASSOC);
                          if($row6)
                          $GU = $row6["ACCOMPANYING_NAME"];
                          else 
                          $GU = "NO ASSOSIATED GUARDIAN";	
                          
                          $class_id = $row5["CLASS_ID"];
  
                          echo"&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";						
                          echo"&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
                          echo"&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
                          echo"&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
                          echo"&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
                          echo $row4["STUDENT_NAME"];
                          echo"&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";						
                          echo"&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
                          echo $row4["DATE_OF_BIRTH"];
                          echo"&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
                          echo $row4["GENDER"];
                          echo"&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
                          echo"&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
                          echo $class_id;
                          echo"&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
                          if($GU)
                          {
                              echo "$GU";
                              echo "&nbsp&nbsp&nbsp";							
                              while($qrow1=$qquery_id1->fetch_array(MYSQLI_ASSOC))
                              echo "$GU";
                              echo "&nbsp&nbsp&nbsp";
                          }
                          else 
                          echo "NO ASSOSIATED GUARDIAN";	
  
                          echo"<br>";
                          echo"<br>";
                      }
                      }
                      else {
                  echo "<Form action='dispo2.php' method='post'>";
                  echo "<center>";
                  echo "<label for='Name'>Your Entered CNIC/PARENT CNIC:";
                  echo "<input type='text' name='S_Name' value='$empp' required/>";
                  echo "</center>";
                  echo "<br>";
                  echo "<center>";
                  echo "<label for='Name'>HUSBAND:";
                  echo "<input type='text' name='S_Name' value='$FF_NAME' required/>";
                  echo "</center>";
                  echo "<br>";
                  echo "<center>";
                  echo "<label for='Name'>WIFE:";
                  echo "<input type='text' name='S_Name' value='$MM_NAME' required/>";
                  echo"</center>";
                  echo"<br>";
                  echo "<center>";
                  echo "<label for='Name'>Total Children:";
                  echo "<input type='text' name='S_Name' value='$no_of_cc' required/>";
                  echo"</center>";
                  echo"<br>";
                  echo "<center>";
                  echo"<b>No Student is in the Organization</b>";
                  echo"</center>";
                  echo"<br>";
                  echo"</Form>";
  
                          echo"<br>";					
                      }
                  }
              else{
               die('Wrong Input Could not Find 2: '); 
              }	
          }
              else{
               die('Wrong Input Could not Find 3: '); 
              }	
              
          }
      ?>
</body>
</html>