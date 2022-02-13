<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hamaray Bachchey</title>
    <style>
        body{
            margin: 0;
            padding: 0;
            font-family:sans-serif;
            background-color:	#4BB543;
        }
        .login-box{
            width:280px;
            position:absolute;
            top:50%;
            left:50%;
            transform:translate(-50%,-50%);
            color:white;
        }
        h1{
            width:280px;
            position:absolute;
            top:10%;
            left:10%;
            transform:translate(-50%,-50%);
            color:white;
            float:left;
            font-size:40px;
            border-bottom: 6px solid white;
            margin-left:510px;
            padding:20px 0;
        }
        .login-box h3{
            float:left;
            font-size:40px;
            border-bottom: 6px solid;
            margin-bottom:10px;
            padding:13px 0;
        }
        .textbox{
            width:100%;
            overflow:hidden;
            font-size:15px;
            padding:8px 0;
            margin:8px 0;
            border-bottom:1px solid;
        }
        .textbox label{
            width: 10px;
            float: left;
            text-align: center;
        }
        .textbox input{
            border:none;
            outline:none;
            background:none;
            padding-left:90px;
            color:white;
            font-size:18px;
            width:80px;
            float:left;
            margin-bottom:-40px;
        }
        a{
            list-style: none;
            text-decoration: none;
        }
        .btn{
            width:100%;
            background:none;
            border:2px solid white;
            color:white;
            padding:5px;
            font-size:18px;
            cursor:pointer;
            margin:12px 0;
        }
        h4{
            text-align:center;
            font-size:12px;
        }
    </style>
</head>
<body>
        <h1>Welcome&nbsp;Back</h1>
        <div class="login-box">
            <form action="" method="post">
            <h3>Sign in</h3>
                <div class="textbox">
                    <label for="">Username</label>
                    <input type="text" name="username">
                </div>
                <div class="textbox">
                    <label for="">Password</label>
                    <input type="password" name="userpassword" required>
                </div>
                
                <a href="./AdmissionForm.php">
                <input class="btn" type="button" value="sign in" required>
                </a>
                <h4 class="text-center">Don't have an account?</h4>
                <a href="./Sign up.php">
                <input class="btn" type="button" value="sign up" >
                </a>
            </form>
        </div>
</body>
</html>