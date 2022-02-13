<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hamaray Bachchey</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family:sans-serif;
         }
         .navigation{
             position: fixed;
             display: flex;
             justify-content: center;
             align-items: center;
             flex-direction: row;
             flex-wrap: wrap;
             width: 100%;
             height: 50px;
             z-index: 1;
         }
         .naye{
            display: flex;
            justify-content: right;
            list-style: none;
            margin-left: 20%;
         }
         .h2{
             flex:1 1 auto;
             letter-spacing: 1px;
             font-weight: bold;
         }
         a{
             margin: 15px;
             color: white;
             text-decoration: none;
         }
         .rolling{
             float: left;
             width:100%;
         }
         .panel{
             height: 120vh;
             width: 250px;
             position: fixed;
             z-index: 999;
             padding: 20px;
             
         }
         .panel ul{
             display: block;
             margin-top: 40px;
          
         }
         .panel ul li{
             padding: 15px 0;
             list-style: none;
             margin-bottom: 10px;
          
             
         }
         .panel ul li a{
            color: white;
            font-size:18px;
            text-decoration: none;
         }
         .panel ul li a:hover{
             display: block;
             background-color: white;
             color: #4BB543;
             cursor:pointer;
             width: 200px;
             border: 10px solid white;
             
         }
        </style>
</head>
<body>
    <div class="navigation bg-success">
        <h2 class="text-white text-center">Hamaray Bachchey</h2>
        <ul class="naye">
            <li>
            <a href="./Project.php">
                <input class="btn btn-light bg-success text-white mt-2 " type="submit" value="Log-out">
            </a>
            </li>
        </ul>
    </div>
    <div class="rolling bg-success">
        <div class="panel bg-success">
             <ul>
                 <li><a href="./AdmissionForm.php">1.Student Admission Form</a></li>
                 <li><a href="#">2.Student Accompanying Form</a></li>
                 <li><a href="./ClassForm.php">3.Class Assignment Form</a></li>
                 <li><a href="./studentperclass.php">4.Studentperclass</a></li>
                 <li><a href="./Repo.php">5.Repo</a></li>
                 <li><a href="./Repo2.php">6.Repo2</a></li>
             </ul>
        </div>
    </div>
        
    <form action="StudentAccompanyaingform.php" method="POST">
        <br>
        <br>
        <br>  
        <H5 class="text-success text-center font-weight-bold">Student Accompanying Form</H5>
        <p class="text-success text-center font-weight-bold">Input Student Information</p>
      <TABle class="table">
        <TR >
            <TH class="text-center text-success">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;STUDENT NAME</TH>
            <TD><input  style="width:40%;"type="text" name="ST_NAME"></TD>
        </TR>
        <TR>
            <TH class="text-center text-success ">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;STUDENT ROLL NUMBER</TH>
            <TD><input  style="width:40%;"type="NUMBER" name="ST_ID"></TD>
        </TR>
        <TR>
            <TH class="text-center text-success ">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;STUDENT SECTION</TH>
            <TD><input  style="width:40%;"type="text" name="SE_ID"></TD>
        </TR>
      </TABle>
      <div class="border border-light p-3 mb-4">
        <div class="text-center">
          <button type="submit" class="btn btn-success">SEARCH STUDENT</button>
        </div>
      </div>
      </form>
      <form action="insert.php" method="POST">
      <H5 class="text-success text-center font-weight-bold">Input Accompanying Gaurdian Information</H5>
      <TABle class="table">
        <TR >
            <TH class="text-center text-success">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;GAURDIAN NAME</TH>
            <TD><input  style="width:40%;"type="text" name="A_name"></TD>
        </TR>
        <TR>
            <TH class="text-center text-success ">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;GAURDIAN CNIC</TH>
            <TD><input  style="width:40%;"type="text" name="A_cnic"></TD>
        </TR>
        <TR>
            <TH class="text-center text-success ">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;RELATION</TH>
            <TD><input  style="width:40%;"type="text" name="A_relation"></TD>
        </TR>
        <TR>
            <TH class="text-center text-success ">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CONTACT</TH>
            <TD><input  style="width:40%;"type="text" name="A_contact"></TD>
        </TR>
        <TR>
            <TH class="text-center text-success ">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;PREGNANT</TH>
            <TD><input  style="width:40%;"type="text" name="A_pregnant"></TD>
        </TR>
        <TR>
            <TH class="text-center text-success ">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;REASON</TH>
            <TD> <input type = "text" name = "A_reason" class = "box"/></textarea></TD>
        </TR>
      </TABle>
      <div class="border border-light p-3 mb-4">
        <div class="text-center">
          <button type="submit" class="btn btn-success">SUBMIT</button>
        </div>
      </div>
      </form>
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
         $no = $_POST['ST_ID'];
         $name = $_POST['ST_NAME'];
         $sec = $_POST['SE_ID'];
         $Q = "SELECT * from student where STUDENT_ID = $no and STUDENT_NAME='$name' and SECTION_ID=$sec";
         $R = $con->query($Q);
         if($R)
		    {
                    echo "<hr>";
					$rs_arr = $R->fetch_array(MYSQLI_ASSOC);
					if ($rs_arr){
						echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;STUDENT AVAILABLE!!!";
						echo "<br>";
						echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;NOW INPUT THE DATA OF ACC_GUARDIAN!!";

					}
					else{
						echo "THE ENTERED STUDENT IS NOT FOUND IN THE TABLE!!!";
					}
            }
            else
            {
               echo "Record not found!<br>";
            }

      ?>
</body>
</html>