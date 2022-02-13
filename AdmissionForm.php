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
         .box{
             margin-left: 500px;
             border: 2px solid;
             height: 200px;
             width: 200px;
         }
         .box H5{
            margin-top: 70px;
         }
         .box input{
             margin-top: 56px;
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
                 <li><a href="#">1.Student Admission Form</a></li>
                 <li><a href="./StudentAccompanyaingform.php">2.Student Accompanying Form</a></li>
                 <li><a href="./ClassForm.php">3.Class Assignment Form</a></li>
                 <li><a href="./studentperclass.php">4.Studentperclass</a></li>
                 <li><a href="./Repo.php">5.Repo</a></li>
                 <li><a href="./Repo2.php">6.Repo2</a></li>
             </ul>
        </div>
    </div>
    <form action="enter.php" method="POST" enctype="multipart/form-data">
          <br>
          <br>
          <br>  
        <h3 class="text-center text-success mb-5 font-weight-bold">STUDENTS INFORMATION:</h3>
        <TABLE class="table">
        <TR >
            <TH class="text-center text-success">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ENTER YOUR FULL NAME</TH>
            <TD><input  style="width:40%;"type="text" name="name"></TD>
        </TR>
        <TR >
            <TH  class="text-center text-success">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;DATE OF BIRTH</TH>
            <TD><input  style="width:40%;"type="DATE" name="dateofbirth"></TD>
        </TR>
        <TR>
            <TH  class="text-center text-success">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;GENDER</TH>
            <TD>
               
                <input type="radio"  name="gender" value="M">
                <label for="M">Male</label><br>
                <input type="radio" name="gender" value="F">
                <label for="F">Female</label><br>

            </TD>
        </TR>
        <TR>
            <TH  class="text-center text-success">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SELECT BEST OPTION</TH>
            <TD>
                <input type="radio"  name="porg" value="parents">
                <label for="parents">Parents</label><br>
                <input type="radio" name="porg" value="guardian">
                <label for="guardian">Guardian</label><br>
            </TD>
        </TR>
        
        </TABLE>
        <br>
        <div class=" box text-success text-center color-success">
        <H5>UPLOAD YOUR IMAGE:</H5>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="file" name = "image">
        </div>
        <br>
        <br>
        <br>
        <br>
        <H5 class="text-success text-center font-weight-bold">MOTHER INFO</H5>
      <TABle class="table">
        <TR >
            <TH class="text-center text-success">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ENTER YOUR MOTHER NAME</TH>
            <TD><input  style="width:40%;"type="text" name="mothername"></TD>
        </TR>
        <TR>
            <TH class="text-center text-success ">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;MOTHER CONTACT NUMBER</TH>
            <TD><input  style="width:40%;"type="number" name="mothercontact"></TD>
        </TR>
        <TR>
            <TH class="text-center text-success ">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;MOTHER CNIC</TH>
            <TD><input  style="width:40%;"type="text" name="mothercnic"></TD>
        </TR>
        <TR>
            <TH class="text-center text-success ">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;MOTHER EMAIL</TH>
            <TD><input  style="width:40%;"type="email" name="motheremail"></TD>
        </TR>
        <TR>
            <TH class="text-center text-success ">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;MOTHER ADDRESS</TH>
            <TD><input  style="width:40%;"type="text" name="motheraddress"></TD>
        </TR>
      </TABle>

      <br>
      <br>
      <br>
      <H5 class="text-success text-center font-weight-bold">FATHER INFO</H5>
    <TABle class="table">
      <TR >
          <TH class="text-center text-success">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ENTER YOUR FATHER NAME</TH>
          <TD><input  style="width:40%;"type="text" name="fathername"></TD>
      </TR>
      <TR>
          <TH class="text-center text-success ">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;FATHER CONTACT NUMBER</TH>
          <TD><input  style="width:40%;"type="number" name="fathercontact"></TD>
      </TR>
      <TR>
          <TH class="text-center text-success ">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;FATHER CNIC</TH>
          <TD><input  style="width:40%;"type="text" name="fathercnic"></TD>
      </TR>
      <TR>
          <TH class="text-center text-success ">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;FATHER EMAIL</TH>
          <TD><input  style="width:40%;"type="EMAIL" name="fatheremail"></TD>
      </TR>
      <TR>
          <TH class="text-center text-success ">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;FATHER ADDRESS</TH>
          <TD><input  style="width:40%;"type="text" name="fatheraddress"></TD>
      </TR>
    </TABle>
    <br>
      <br>
      <br>
      <H5 class="text-success text-center font-weight-bold">GUARDIAN INFO</H5>
    <TABle class="table">
      <TR >
          <TH class="text-center text-success">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ENTER YOUR GAURDIAN NAME</TH>
          <TD><input  style="width:40%;"type="text" name="gname"></TD>
      </TR>
      <TR>
          <TH class="text-center text-success ">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;GAURDIAN CONTACT NUMBER</TH>
          <TD><input  style="width:40%;"type="text" name="gcontact"></TD>
      </TR>
      <TR>
          <TH class="text-center text-success ">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;GAURDIAN CNIC</TH>
          <TD><input  style="width:40%;"type="text" name="gcnic"></TD>
      </TR>
      <TR>
        <TH class="text-center text-success ">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;GAURDIAN GENDER</TH>
        <TD><input  style="width:40%;"type="text" name="ggender"></TD>
    </TR>
    <TR>
        <TH class="text-center text-success ">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;GAURDIAN RELATION</TH>
        <TD><input  style="width:40%;"type="text" name="grelation"></TD>
    </TR>
      <TR>
          <TH class="text-center text-success ">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;GAURDIAN EMAIL</TH>
          <TD><input  style="width:40%;"type="EMAIL" name="gemail"></TD>
      </TR>
      <TR>
          <TH class="text-center text-success ">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;GAURDIAN ADDRESS</TH>
          <TD><input  style="width:40%;"type="text" name="gaddress"></TD>
      </TR>
    </TABle>
    <div class="border border-light p-3 mb-4">
        <div class="text-center">
          <button type="submit" class="btn btn-success" name="submit">SUBMIT</button>
        </div>
      </div>
    </form>
</body>
</html>