<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hamaray Bachchey</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<body>
        <center><h2>HAMAREY BACHCHEY</h2></center>
        <center><h2>STUDENT PER CLASS FORM</h2></center>
        <br>
        <br>
        <form name="searchform" action = "search.php" method = "post">
            <input type = "text" name = "input">
            <select name="option">
                <option value = "none">NONE</option>
                <option value = "id">ID</option>
                <option value="name">NAME</option>
            </select>
            <button type="submit" name = "search">SEARCH</button>
            <br><br>
        </form>
        <form align = "right" action="AdmissionForm.html" method ="post">
            <button type="submit" name = "add">+ADD</button>
        </form>
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
            else{
                $Q = "SELECT CLASS_ID FROM classtable";
                $Queryid = $con->query($Q) or die ("QUERY CLASS FAILED".$con->error);
                while($rs_arr = $Queryid->fetch_array(MYSQLI_ASSOC))
                {
                    $Q1 = "SELECT * from sectiontable where CLASS_ID =".$rs_arr['CLASS_ID']."";
                    $Queryid2 = $con->query($Q1);
                    while ($rs_arr1 = $Queryid2->fetch_array(MYSQLI_ASSOC))
                    {
                        echo "<h3>CLASS".$rs_arr['CLASS_ID'].$rs_arr1['SECTION_NAME']."</h3><br>";
                        echo "<TABLE border = 0>";
                        echo "<TR><TD width = 15%>ST_ID</TD><TD width = 15%>NAME</TD><TD width = 15%>AGE</TD><TD width = 15%>GENDER</TD></TR><TD width = 20%></TD>";
                        $Q2 = "SELECT STUDENT_ID, STUDENT_NAME, DATE_OF_BIRTH, GENDER from student where SECTION_ID =".$rs_arr1['SECTION_ID'];
                        $Queryid3 = $con->query($Q2);
                        while ($rs_arr2 = $Queryid3->fetch_array(MYSQLI_ASSOC))
                        {
                            echo "<TR><TD>".$rs_arr2['STUDENT_ID']."</TD><TD>".$rs_arr2['STUDENT_NAME']."</TD>";
                            $NOW = date('Y');
                            $DOB = strtotime($rs_arr2['DATE_OF_BIRTH']);
                            $DIFFERENCE = date('Y',$DOB);
                            $TEMPORARY = $NOW-$DIFFERENCE;
                            echo "<TD>".$TEMPORARY."</TD>";
                            echo "<TD>".$rs_arr2['GENDER']."</TD>";
                            $_SESSION['STUDENTID'] = $rs_arr2['STUDENT_ID'];
                            echo "<TD></TD><TD><a href='stedit.php?username=".$rs_arr2['STUDENT_ID']."'>EDIT</a></TD>";
                            echo "<TD></TD><TD><a href='stdelete.php?username=".$rs_arr2['STUDENT_ID']."'>DELETE</a></TD></TR>";
                        }
                    }
                }
            }
        ?>
</body>
</html>