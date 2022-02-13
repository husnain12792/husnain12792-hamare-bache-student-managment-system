<!DOCTYPE HTML>
<HTML>
    <HEAD>
        <TITLE>SEARCH</TITLE>
    </HEAD>
    <center><h2>HAMAREY BACHCHEY</h2></center>
     <center><h2>STUDENT PER CLASS FORM</h2></center>
    <br><br>
<BODY>
    <?php
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
    else
    {
        $STUDENTID = $_GET['username'];
        $q = "DELETE from A_GAURDIAN where STUDENT_ID = $STUDENTID";
        $query_id = $con->query($q);
        $q1 = "DELETE from fees where STUDENT_ID = $STUDENTID";
        $query_id = $con->query($q1);
        $q3 = "DELETE from  history where STUDENT_ID = $STUDENTID";
        $query_id = $con->query($q3);
        $q4 = "DELETE from student where STUDENT_ID = $STUDENTID";
        $query_id = $con->query($q4);
        if ($query_id)
        {
            echo "<hr>";
            echo "Deletion Successfull!!!<br>";
        }
        else
        {
            echo "Record not found!<br>";
        }

    }
    ?>
</BODY>
</HTML>