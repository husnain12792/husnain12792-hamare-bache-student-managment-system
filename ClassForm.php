<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hamaray Bachchey</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
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
<body>
<?php
    //Here is the following variables that store my servername and password and username
    $SERVERNAME = "localhost";
    $USERNAME = "root";
    $PASSWORD = "";
    $DBNAME = "project";
    $mysqli = new mysqli($SERVERNAME,$USERNAME,$PASSWORD,$DBNAME);
    //Here I should check the condition whether it is connected or not
    if ($mysqli -> connect_errno) {
        echo "FAILED TO CONNECT: " . $mysqli -> connect_error;
        exit();
      }
    ?>
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
                 <li><a href="./StudentAccompanyaingform.php">2.Student Accompanying Form</a></li>
                 <li><a href="#">3.Class Assignment Form</a></li>
                 <li><a href="./studentperclass.php">4.Studentperclass</a></li>
                 <li><a href="./Repo.php">5.Repo</a></li>
                 <li><a href="./Repo2.php">6.Repo2</a></li>
             </ul>
        </div>
    </div>
    <form action="changeinfo.php" method="post">
    <br>
    <br>
    <br>  
    <H5 class="text-success text-center font-weight-bold">Class Assignment Form</H5>
    <p class="text-success text-center font-weight-bold">Input Student Information</p>
  <TABle class="table">
    <TR >
        <TH class="text-center text-success">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;STUDENT ID</TH>
        <TD><input  style="width:40%;"type="NUMBER" name="STUDENTID"></TD>
    </TR>
    <TR >
        <TH class="text-center text-success">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CURRENT CLASS ID</TH>
        <TD><input  style="width:40%;"type="NUMBER" name="CURRENTID"></TD>
    </TR>
    <TR>
        <TH class="text-center text-success">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;NEW CLASS ID</TH>
        <TD><input  style="width:40%;"type="NUMBER" name="NEWID"></TD>
    </TR>
    <TR>
        <TH class="text-center text-success ">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;REASON</TH>
        <TD><textarea name="REASON" id="" cols="30" rows="10" class="form-control" placeholder="Message"></textarea></TD>
    </TR>
    <TR >
        <TH class="text-center text-success">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;APPROVED BY</TH>
        <TD><input  style="width:40%;"type="text" name="APPROVEDNAME"></TD>
    </TR>
  </TABle>
  <div class="border border-light p-3 mb-4">
    <div class="text-center">
      <button type="submit" class="btn btn-success" value="SUBMIT">SUBMIT</button>
    </div>
  </div>
</form>
</body>
</html>