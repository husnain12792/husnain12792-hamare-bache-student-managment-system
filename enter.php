<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hamaray Bachchey</title>
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
    // Here I declared and store the data from HTML file
    $STUDENT_NAME = $_POST['name'];
    $STUDENT_DATEOFBIRTH = $_POST['dateofbirth'];
    $STUDENT_GENDER = $_POST['gender'];
    $STUDENT_PARENT = $_POST['porg'];
    // HERE WHEN PARENT SELECTED THEN THE BELOW INFORMATION IS TAKEN
    $parentid;
    if ($STUDENT_PARENT == "parents")
    {
            $MOTHERNAME = $_POST['mothername'];
            $MOTHERCONTACT = $_POST['mothercontact'];
            $MOTHERCNIC =  $_POST['mothercnic'];
            $MOTHEREMAIL =  $_POST['motheremail'];
            $MOTHERADDRESS =  $_POST['motheraddress'];



            $FATHERNAME = $_POST['fathername'];
            $FATHERCONTACT = $_POST['fathercontact'];
            $FATHERCNIC =  $_POST['fathercnic'];
            $FATHEREMAIL =  $_POST['fatheremail'];
            $FATHERADDRESS =  $_POST['fatheraddress'];



            $CHILDS = 1;

            $QUERY1 = "SELECT * FROM parent where MA_CNIC = $MOTHERCNIC and FA_CNIC = $FATHERCNIC";
            $CHECKED = $con->query($QUERY1) or die("QUERY FAILED1". $con -> error);
            $CHECKED1 = $CHECKED->fetch_array(MYSQLI_ASSOC);
            if($CHECKED1)
            {
                if ($CHECKED1)
                {
                    $parentid = $CHECKED1['PARENT_ID'];
                    $CHILDS = $CHECKED1['NUMBER_OF_CHILDS'];
                    $CHILDS = $CHILDS + 1;
                    $QUERYUPDATED = "UPDATE PARENT SET NUMBER_OF_CHILDS = $CHILDS where MA_CNIC = $MOTHERCNIC and FA_CNIC = $FATHERCNIC";
                    $QUERYID= $con->query($QUERYUPDATED); 		
	               // $RUN = mysqli_fetch_assoc($QUERYID);
                }
                
            }     
            else{
               $QUERY2 = "INSERT INTO MOTHER(MOTHER_NAME,MOTHER_CNIC,MOTHER_EMAIL,MOTHER_ADDRESS,MOTHER_CONTACT) VALUES ('$MOTHERNAME','$MOTHERCNIC','$MOTHEREMAIL', '$MOTHERADDRESS','$MOTHERCONTACT')";
               $QUERYID = $con->query($QUERY2) or die ("QUERY FAILED2". $con -> error); 		
              // $RUN = mysqli_fetch_assoc($QUERYID);
                
                $QUERY3 = "INSERT INTO FATHER(FATHER_NAME,FATHER_CNIC,FATHER_EMAIL,FATHER_ADDRESS,FATHER_CONTACT) VALUES ('$FATHERNAME','$FATHERCNIC','$FATHEREMAIL', '$FATHERADDRESS','$FATHERCONTACT')";
                $QUERYID= $con->query($QUERY3) or die ("QUERY FAILED3". $con -> error); 		
               // $RUN = mysqli_execute($QUERYID);
                $QUERY4 = "INSERT INTO PARENT (FA_CNIC,MA_CNIC,NUMBER_OF_CHILDS) VALUES ('$FATHERCNIC','$MOTHERCNIC',$CHILDS)";
                $QUERYID = $con->query($QUERY4) or die ("QUERY FAILED4". $con -> error); 		
               // $RUN = mysqli_execute($QUERYID);
                    
                $QUERY5 = "SELECT PARENT_ID from PARENT where MA_CNIC = $MOTHERCNIC and FA_CNIC = $FATHERCNIC";
                $QUERYID = $con->query($QUERY5) or die ("QUERY FAILED5". $con -> error); 		
                if ($QUERYID){
                    $RS_ARR= $QUERYID->fetch_array(MYSQLI_ASSOC);
                    if ($RS_ARR){
                        $parentid = $RS_ARR['PARENT_ID'];
                    }
                }
                
                }
    }
    else if ($STUDENT_PARENT == "guardian")
    {
        $GAURDIANCNIC = $_POST['gcnic'];
        $GAURDIANNAME = $_POST['gname'];
        $GAURDIANCONTACT = $_POST['gcontact'];
        $GAURDIANGENDER = $_POST['ggender'];
        $GAURDIANRELATION = $_POST['grelation'];
        $QUERY = "INSERT INTO Guardian(GAURDIAN_NAME,GAURDIAN_CNIC,GAURDIAN_GENDER,GAURDIAN_CONTACT,GAURDIAN_RELATION) VALUES (' $GAURDIANNAME',' $GAURDIANCNIC',' $GAURDIANGENDER',  $GAURDIANCONTACT,' $GAURDIANRELATION')";
        $QUERYID = mysqli_prepare($con, $QUERY); 		
        $RUN = mysqli_execute($QUERYID);
    }
    $COURSEID;
    $Q = "SELECT COURSE_ID from COURSE where STATUSED = 'Available'";
    $R = $con->query($Q);
    if ($R)
    {
        $RSARR = $R->fetch_array(MYSQLI_BOTH);
        if ($RSARR)
        {
            $COURSEID = $RSARR['COURSE_ID'];
        }
    }
    $NOW = date('Y');
    $DOB = strtotime($STUDENT_DATEOFBIRTH);
    $DIFFERENCE = date('Y',$DOB);
    $TEMPORARY = $NOW-$DIFFERENCE;
    $Q = "SELECT * from classtable";
    $R = $con->query($Q);
    $SECTIONID;
    if ($R)
    {
        while($RSARR = mysqli_fetch_assoc($R))
        {
            $TEMP = explode('-', $RSARR['RANGED']);
            if ($TEMPORARY > $TEMP[0])
            {
                $T = "SELECT SECTION_ID FROM sectiontable where CLASS_ID = '1' and SECTION_NAME='A'";
                $QUERYID12 = $con->query($T) or die("Query Section id failed".$con->error);
                if ($QUERYID12)
                {
                    $RSARR1 = mysqli_fetch_assoc($QUERYID12);
                    if ($RSARR1)
                    {
                        
                        //echo $RSARR1['SECTION_ID'];
                        $SECTIONID = $RSARR1['SECTION_ID'];
                        $UP = "UPDATE `sectiontable` SET NUM_STUDENTS = NUM_STUDENTS + 1 WHERE SECTION_ID = $SECTIONID";
                        $QUERYUP = $con->query($UP)or die("Query Section id failed".$con->error);
                    }
                }
                $UP = "UPDATE `classtable` SET NUM_STUDENTS = NUM_STUDENTS + 1 WHERE CLASS_ID =' ".$RSARR['CLASS_ID']." ' ";
                $QUERYUP = $con->query($UP) or die("Query Section id failed".$con->error);
                break;
            }
        }
    }
    $R = "INSERT INTO student(STUDENT_NAME,DATE_OF_BIRTH,GENDER,COURSE_ID,GAURDIAN_PARENT,GAURDIAN_CNIC,PARENT_ID,SECTION_ID) VALUES ('$STUDENT_NAME','$STUDENT_DATEOFBIRTH','$STUDENT_GENDER',$COURSEID,'$STUDENT_PARENT','NULL',$parentid,$SECTIONID)";
    $QUERY = $con->query($R) or die ("QUERY FAILED ".$con->error);
    $STDID;
    $Q = "SELECT MAX(STUDENT_ID) MAX FROM student";
    $QUERY =$con->query($Q);
    if ($QUERY)
    {
        $RSARR = $QUERY->fetch_array(MYSQLI_ASSOC);
        if ($RSARR)
        {
            $STDID = $RSARR['MAX'];
        }
    }
    $R = "INSERT INTO fees (AMOUNT,DISCOUNT,FULLY_PAID,STUDENT_ID) VALUES(10000,0,'Yes',$STDID)";
    $QUERY = $con->query($R);
    if ($QUERY)
    {
        echo "Student has been admitted in the Organization!!!";
        echo "<br>";
        echo "FEES: 10000<br>";
    }
    ?>
</body>
</html>