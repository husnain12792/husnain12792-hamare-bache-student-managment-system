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
      $SERVERNAME = "localhost";
      $USERNAME = "root";
      $PASSWORD = "";
      $DBNAME = "project";
      $con = new mysqli($SERVERNAME,$USERNAME,$PASSWORD,$DBNAME);
      $NAME=$_POST['A_name'];
      $CNIC=$_POST['A_cnic'];
      $RELATION=$_POST['A_relation'];
      $PREGNANT=$_POST['A_pregnant'];
	  $CONTACT=$_POST['A_contact'];
	  $REASON=$_POST['A_reason'];
    
      $Query="INSERT INTO accompanying_student (ACCOMPANYING_NAME,ACCOMPANYING_CNIC,CONTACT,PREGNANT,RELATION,REASON)
		VALUES ('$NAME','$CNIC',$CONTACT,'$PREGNANT','$RELATION','$REASON')";
      $RUN = mysqli_query($con,$Query)or die ("QUERY FAILED".$con->error);
      //$START = mysqli_fetch_assoc($RUN) ;
      if($RUN)
	 {
			echo "RECORD INSERTED";
	 }
	 else
	 {
		 echo "RECORD NOT INSERTED!<br>";
	 }
    ?>
</body>
</html>