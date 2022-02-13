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
          $x=$_POST["inputnum"];
          if (is_numeric($x))
          {
              $empp=$x;	
              $query1="SELECT s.STUDENT_NAME,f.FATHER_NAME ,m.MOTHER_NAME  from student s,mother m,father f,parent p where s.PARENT_ID = p.PARENT_ID and p.FA_CNIC = f.FATHER_CNIC and p.MA_CNIC = m.MOTHER_CNIC and s.STUDENT_ID =".$empp;
              $query_id1 = $con->query($query1) or die ('Query1 is Failed'.$con->error);		
              $row1=$query_id1->fetch_array(MYSQLI_ASSOC);
  
              $query2="SELECT s.STUDENT_NAME,g.GAURDIAN_NAME from student s,gaurdian g where s.GAURDIAN_CNIC = g.GAURDIAN_CNIC and s.STUDENT_ID =".$empp;
              $query_id2 =$con->query($query2)or die ('Query1 is Failed'.$con->error); 		
              $row2=$query_id2->fetch_array(MYSQLI_ASSOC);
              if($row1)
                  {
                          $S_NAME = $row1["STUDENT_NAME"];
                          $F_NAME = $row1["FATHER_NAME"];
                          $M_NAME = $row1["MOTHER_NAME"];           
                          $sub_query1="SELECT s2.STUDENT_NAME ,sec1.CLASS_ID as STUDENT_CLASS,sec2.CLASS_ID from student s1,student s2,sectiontable sec1,sectiontable sec2 where s1.PARENT_ID = s2.PARENT_ID and s1.STUDENT_ID <> s2.STUDENT_ID and s1.SECTION_ID = sec1.SECTION_ID and s2.SECTION_ID = sec2.SECTION_ID and s2.STUDENT_ID > s1.STUDENT_ID and s1.STUDENT_ID= $empp";
                          $sub_query_id1 = $con->query($sub_query1) or die ('Sub_query1 is failed'.$con->error); 		
                          $sub_row1=$sub_query_id1->fetch_array(MYSQLI_ASSOC);
                  echo "<Form action='dispo.php' method='post'>";
                  echo "<center>";
                  echo "<label for='Name'>Student Name:";
                  echo "<input type='text' name='S_Name' value='$S_NAME' required/>";
                  echo "</center>";
                  echo "<br>";
                  echo "<center>";
                  echo "<label for='Name'>FATHER Name:";
                  echo "<input type='text' name='S_Name' value='$F_NAME' required/>";
                  echo "</center>";
                  echo "<br>";
                  echo "<center>";
                  echo "<label for='Name'>MOTHER Name:";
                  echo "<input type='text' name='S_Name' value='$M_NAME' required/>";
                  echo"</center>";
                  echo"<br>";
                  echo"</Form>";
                  
                  
                      if ($sub_row1)
                      {
                          $S_SIBLING = $sub_row1['STUDENT_NAME'];
                          echo "<Form action='dispos.php' method='post'>";
                          echo "<center>";
                          echo "<label for='Name'>SIBLING Name:";
                          echo "<input type='text' name='S_Name' value='$S_SIBLING' required/>";
                          echo "</center>";
                          echo "<br>";
                          echo"</Form>";
                      }
  
                      else 
                      {
                          $S_SIBLING = "No Sibling in this ORG";
                          echo "<Form action='Display.php' method='post'>";
                          echo "<center>";
                          echo "<label for='Name'>SIBLING:";
                          echo "<input type='text' name='S_Name' value='$S_SIBLING' required/>";
                          echo "</center>";
                          echo "<br>";
                          echo"</Form>";
                      }
  
                  
                  }
              else if($row2)
              {
                  $S_NAME = $row2["STUDENT_NAME"];
                  $G_NAME = $row2["GAURDIAN_NAME"];
                  
                          $sub_query1="SELECT s2.STUDENT_NAME ,sec1.CLASS_ID as STUDENT_CLASS,sec2.CLASS_ID from student s1,student s2,sectiontable sec1,sectiontable sec2 where s1.PARENT_ID = s2.PARENT_ID and s1.STUDENT_ID <> s2.STUDENT_ID and s1.SECTION_ID = sec1.SECTION_ID and s2.SECTION_ID = sec2.SECTION_ID and s2.STUDENT_ID > s1.STUDENT_ID and s1.STUDENT_ID= $empp";
                          $sub_queryid = $con->query($sub_query);
                          $sub_row1=$sub_queryid->fetch_array(MYSQLI_ASSOC);
                  
                  
                  echo "<Form action='dispo.php' method='post'>";
                  echo "<center>";
                  echo "<label for='Name'>Student Name:";
                  echo "<input type='text' name='S_Name' value='$S_NAME' required/>";
                  echo "</center>";
                  echo "<br>";
                  echo "<center>";
                  echo "<label for='Name'>Guardian Name:";
                  echo "<input type='text' name='S_Name' value='$G_NAME' required/>";
                  echo "</center>";
                  echo "<br>";
                  echo"</Form>";
                  
                  
                      if ($sub_row1)
                      {
                          $S_SIBLING = $sub_row1["STUDENT_NAME"];
                          echo "<Form action='Display.php' method='post'>";
                          echo "<center>";
                          echo "<label for='Name'>SIBLING Name:";
                          echo "<input type='text' name='S_Name' value='$S_SIBLING' required/>";
                          echo "</center>";
                          echo "<br>";
                          echo"</Form>";
                      }
  
                      else 
                      {
                          $S_SIBLING = "No Sibling in this ORG";
                          echo "<Form action='Display.php' method='post'>";
                          echo "<center>";
                          echo "<label for='Name'>SIBLING:";
                          echo "<input type='text' name='S_Name' value='$S_SIBLING' required/>";
                          echo "</center>";
                          echo "<br>";
                          echo"</Form>";
                      }
                                  
              }
              else{
               die('Wrong Input Could not Find: '); 
              }	
              
                  $class_query="SELECT s.CLASS_ID from sectiontable s,student ss where ss.STUDENT_ID = $empp and ss.SECTION_ID = s.SECTION_ID";
                  $class_query_id=$con->query($class_query) or die ('Class query failed'.$con->error);
                  $class_row1=$class_query_id->fetch_array(MYSQLI_ASSOC);
      
                          $CLASS=$class_row1["CLASS_ID"];
      
                          echo "<Form action='dispo.php' method='post'>";
                          echo "<center>";
                          echo "<label for='Name'>STUDENT's Current CLASS:";
                          echo "<input type='text' name='S_Name' value='$CLASS' size='2' required/ >";
                          echo "</center>";
                          echo "<br>";
                          echo"</Form>";
  
  
                  echo "<b>CLASS HISTORY:</b>";
      
                  $classhistory_query="SELECT h.CLASS,h.SECTION_ID,h.COURSE_NAME from history h where h.STUDENT_ID = $empp";
                  $classhistory_query_id=$con->query($classhistory_query)or die('HISTORY QUERY FAILED'.$con->error);
                  $classhistory_row1=$classhistory_query_id->fetch_array(MYSQLI_ASSOC);
                  if($classhistory_row1)
                  {
                      echo"$classhistory_row1";
                      echo "<br>";
                      echo"<center>";
                      echo "<b>Student's Previous CLASSES</b> &nbsp&nbsp&nbsp&nbsp";
                      echo "<b>Student's Previous SECTIONES</b> &nbsp&nbsp&nbsp&nbsp";
                      echo "<b>Student's Previous Courses</b>";			
                      echo"</center>";
                      echo "<br>";
                      echo "<hr>";
                          echo"&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
                          echo"&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
                          echo"&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
                          echo"&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
                          echo"&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
                          echo"&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
                          echo $classhistory_row1["CLASS"];
                          echo"&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";						
                          echo"&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
                          echo $classhistory_row1["SECTION_ID"];
                          echo"&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
                          echo"&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";						
                          echo"&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
                          echo $classhistory_row1["COURSE_NAME"];
                          echo"(";
                          echo $classhistory_row1["UPDATE_DATE"];
                          echo")";
                      
                          echo"<br>";
                          echo"<br>";
                          if ($classhistory_row1 =$classhistory_query_id->fetch_array(MYSQLI_ASSOC))
                          {
                            echo"&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
                            echo"&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
                            echo"&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
                            echo"&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
                            echo"&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
                            echo"&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
                            echo $classhistory_row1["CLASS"];
                            echo"&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";						
                            echo"&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
                            echo $classhistory_row1["SECTION_ID"];
                            echo"&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
                            echo"&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";						
                            echo"&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
                            echo $classhistory_row1["COURSE_NAME"];
                            echo"(";
                            echo $classhistory_row1["UPDATE_DATE"];
                            echo")";						
                            echo"<br>";
                          }
                      while($classhistory_row1 =$classhistory_query_id->fetch_array(MYSQLI_ASSOC))
                      {
                          echo"&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
                          echo"&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
                          echo"&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
                          echo"&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
                          echo"&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
                          echo"&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
                          echo $classhistory_row1["CLASS"];
                          echo"&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";						
                          echo"&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
                          echo $classhistory_row1["SECTION_ID"];
                          echo"&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
                          echo"&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";						
                          echo"&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
                          echo $classhistory_row1["COURSE_NAME"];
                          echo"(";
                          echo $classhistory_row1["UPDATE_DATE"];
                          echo")";						
                          echo"<br>";
                      }
                  }
                  else 
                      echo "THIS IS A NEW STUDENT";
              
          }
          else 
          {
              $empp=$x;	
              $query1="SELECT s.STUDENT_NAME,f.FATHER_NAME ,m.MOTHER_NAME  from student s,mother m,father f,parent p where s.PARENT_ID = p.PARENT_ID and p.FA_CNIC = f.FATHER_CNIC and p.MA_CNIC = m.MOTHER_CNIC and s.STUDENT_NAME = '$empp'";
              $query_id1 = $con->query($query1) or die ('ELSE QUERY FAILED'.$con->error); 		
              $row1=$query1->fetch_array(MYSQLI_ASSOC);
  
              $query2="SELECT s.STUDENT_NAME,g.GAURDIAN_NAME from student s,gaurdian g where s.GAURDIAN_CNIC = g.GAURDIAN_CNIC and s.STUDENT_NAME ='$empp'";
              $query_id2 = $con->query($query2)or die ('ELSE QUERY2 FAILED'.$con->error); 		
              $row2=$query->fetch_array(MYSQLI_ASSOC);
              
              if($row1)
                  {
                          $S_NAME = $row1["STUDENT_NAME"];
                          $F_NAME = $row1["FATHER_NAME"];
                          $M_NAME = $row1["MOTHER_NAME"];
                          $sub_query1="SELECT s2.STUDENT_NAME ,sec1.CLASS_ID as STUDENT_CLASS,sec2.CLASS_ID from student s1,student s2,sectiontable sec1,sectiontable sec2 where s1.PARENT_ID = s2.PARENT_ID and s1.STUDENT_ID <> s2.STUDENT_ID and s1.SECTION_ID = sec1.SECTION_ID and s2.SECTION_ID = sec2.SECTION_ID and s2.std_id > s1.STUDENT_ID and s1.STUDENT_NAME='$empp'";
                          $sub_query_id1 = $con->query($sub_query1); 		
                          $sub_row1=$sub_query_id1->fetch_array(MYSQLI_ASSOC);
                  echo "<Form action='dispo.php' method='post'>";
                  echo "<center>";
                  echo "<label for='Name'>Student Name:";
                  echo "<input type='text' name='S_Name' value='$S_NAME' required/>";
                  echo "</center>";
                  echo "<br>";
                  echo "<center>";
                  echo "<label for='Name'>FATHER Name:";
                  echo "<input type='text' name='S_Name' value='$F_NAME' required/>";
                  echo "</center>";
                  echo "<br>";
                  echo "<center>";
                  echo "<label for='Name'>MOTHER Name:";
                  echo "<input type='text' name='S_Name' value='$M_NAME' required/>";
                  echo"</center>";
                  echo"<br>";
                  echo"</Form>";
  
  
                      if ($sub_row1)
                      {
                          $S_SIBLING = $sub_row1["STUDENT_NAME"];
                          echo "<Form action='dispo.php' method='post'>";
                          echo "<center>";
                          echo "<label for='Name'>SIBLING Name:";
                          echo "<input type='text' name='S_Name' value='$S_SIBLING' required/>";
                          echo "</center>";
                          echo "<br>";
                          echo"</Form>";
                      }
  
                      else 
                      {
                          $S_SIBLING = "No Sibling in this ORG";
                          echo "<Form action='dispo.php' method='post'>";
                          echo "<center>";
                          echo "<label for='Name'>SIBLING:";
                          echo "<input type='text' name='S_Name' value='$S_SIBLING' required/>";
                          echo "</center>";
                          echo "<br>";
                          echo"</Form>";
                      }
  
                  }
              else if($row2)
              {
                  $S_NAME = $row2["STUDENT_NAME"];
                  $G_NAME = $row2["GAURDIAN_NAME"];
                  
                          $sub_query1="SELECT s2.STUDENT_NAME ,sec1.CLASS_ID as STUDENT_CLASS,sec2.CLASS_ID from student s1,student s2,sectiontable sec1,sectiontable sec2 where s1.PARENT_ID = s2.PARENT_ID and s1.STUDENT_ID <> s2.STUDENT_ID and s1.SECTION_ID = sec1.SECTION_ID and s2.SECTION_ID = sec2.SECTION_ID and s2.STUDENT_ID > s1.STUDENT_ID and s1.STUDENT_NAME='$empp'";
                          $sub_query_id1 = $con->query($sub_query1)or die ('ELSE SUB-QUERY FAILED'.$con->error); 		
                          $sub_row1= $sub_query_id1->fetch_array(MYSQLI_ASSOC);
      
                  
                  echo "<Form action='dispo.php' method='post'>";
                  echo "<center>";
                  echo "<label for='Name'>Student Name:";
                  echo "<input type='text' name='S_Name' value='$S_NAME' required/>";
                  echo "</center>";
                  echo "<br>";
                  echo "<center>";
                  echo "<label for='Name'>Guardian Name:";
                  echo "<input type='text' name='S_Name' value='$G_NAME' required/>";
                  echo "</center>";
                  echo "<br>";
                  echo"</Form>";
                  
                      if ($sub_row1)
                      {
                          $S_SIBLING = $sub_row1["STUDENT_NAME"];
                          echo "<Form action='dispo.php' method='post'>";
                          echo "<center>";
                          echo "<label for='Name'>SIBLING Name:";
                          echo "<input type='text' name='S_Name' value='$S_SIBLING' required/>";
                          echo "</center>";
                          echo "<br>";
                          echo"</Form>";
                      }
  
                      else 
                      {
                          $S_SIBLING = "No Sibling in this ORG";
                          echo "<Form action='dispo.php' method='post'>";
                          echo "<center>";
                          echo "<label for='Name'>SIBLING:";
                          echo "<input type='text' name='S_Name' value='$S_SIBLING' required/>";
                          echo "</center>";
                          echo "<br>";
                          echo"</Form>";
                      }
              }
              else{
               die('Wrong Input Could not Find: '); 
              }	
              
                          $main="SELECT s.STUDENT_ID from student s where s.STUDENT_NAME = '$empp'";
                          $main_id=$con->query($main)or die ('MAIN QUERY FAILED'.$con->error);
                          $main_row1=$main_id->fetch_array(MYSQLI_ASSOC);
                  
                          $new_empp=$main_row1["STUDENT_ID"];
              
                          $class_query="SELECT s.CLASS_ID from sectiontable s,student ss where ss.STUDENT_ID = $new_empp and ss.SECTION_ID = s.SECTION_ID";
                          $class_query_id=$con->query($class_query);
                          $class_row1=$class_query_id->fetch_array(MYSQLI_ASSOC);
                          $CLASS=$class_row1["CLASS_ID"];
      
                          echo "<Form action='dispo.php' method='post'>";
                          echo "<center>";
                          echo "<label for='Name'>STUDENT's Current CLASS:";
                          echo "<input type='text' name='S_Name' value='$CLASS' size='2' required/ >";
                          echo "</center>";
                          echo "<br>";
                          echo"</Form>";
  
                  echo "<b>CLASS HISTORY:</b>";
      
                  $classhistory_query="SELECT h.CLASS,h.SECTION_ID,h.COURSE_NAME,h.UPDATE_DATE from history h where h.STUDENT_ID = $new_empp";
                  $classhistory_query_id=$con->query($classhistory_query)or die('ERROR IN CLASS HISTORY QUERY'.$con->error);
                  $classhistory_row1=$classhistory_query_id->fetch_array(MYSQLI_ASSOC);  
                  if($classhistory_row1)
                  {
                      echo"$classhistory_row1";
                      echo "<br>";
                      echo"<center>";
                      echo "<b>Student's Previous CLASSES</b> &nbsp&nbsp&nbsp&nbsp";
                      echo "<b>Student's Previous SECTIONES</b> &nbsp&nbsp&nbsp&nbsp";
                      echo "<b>Student's Previous Courses</b>";			
                      echo"</center>";
                      echo "<br>";
                      echo "<hr>";
                          echo"&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
                          echo"&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
                          echo"&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
                          echo"&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
                          echo"&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
                          echo"&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
                          echo $classhistory_row1["CLASS"];
                          echo"&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";						
                          echo"&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
                          echo $classhistory_row1["SECTION_ID"];
                          echo"&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
                          echo"&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";						
                          echo"&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
                          echo $classhistory_row1["COURSE_NAME"];
                          echo"(";
                          echo $classhistory_row1["UPDATE_DATE"];
                          echo")";
                          echo"<br>";
                          echo"<br>";
                          if ($classhistory_row1 =$classhistory_query_id->fetch_array(MYSQLI_ASSOC))
                          {
                            echo"&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
                            echo"&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
                            echo"&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
                            echo"&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
                            echo"&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
                            echo"&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
                            echo $classhistory_row1["CLASS"];
                            echo"&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";						
                            echo"&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
                            echo $classhistory_row1["SECTION_ID"];
                            echo"&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
                            echo"&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";						
                            echo"&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
                            echo $classhistory_row1["COURSE_NAME"];
                            echo"(";
                            echo $classhistory_row1["UPDATE_DATE"];
                            echo")";						
                            echo"<br>";
                          }
                      while($classhistory_row1 =$classhistory_query_id->fetch_array(MYSQLI_ASSOC))
                      {
                          echo"&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
                          echo"&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
                          echo"&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
                          echo"&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
                          echo"&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
                          echo"&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
                          echo $classhistory_row1["CLASS"];
                          echo"&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";						
                          echo"&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
                          echo $classhistory_row1["SECTION_ID"];
                          echo"&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
                          echo"&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";						
                          echo"&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
                          echo $classhistory_row1["COURSE_NAME"];
                          echo"(";
                          echo $classhistory_row1["UPDATE_DATE"];
                          echo")";						
                          echo"<br>";
                      }
                  }
                  else 
                      echo "THIS IS A NEW STUDENT";
          }
  
       

?>
</body>
</html>