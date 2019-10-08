<?php
session_start();
$host = 'localhost';  
$user = 'root';  
$pass = '';  
$dbname = 'heamocrony';  
$conn = mysqli_connect($host, $user, $pass,$dbname);  
if(!$conn){  
  die('Could not connect: '.mysqli_connect_error());  
}  
$name=$_POST['name'];
$date=$_POST['date'];
$BloodGroup=$_POST['BloodGroup'];
$phno=$_POST['phno'];
$gender=$_POST['gender'];
$email=$_POST['mail'];
$area=$_POST['address'];
 $current_year = date('Y'); // Get Current Year
 $dob = date_parse($date); // Yours Dob
 $year = $dob["year"]; // Get dob Year "1995" 
 $age = ($current_year - $year); // 2017-1995 is Yours Age 
$sql = "insert into donor(name,age,blood_group,ph_no,gender,email_id,address) values('$name','$age','$BloodGroup','$phno','$gender','$email','$area')";
if(mysqli_query($conn, $sql)){  
 echo "Success";  
}else{  
echo "Could not insert record: ". mysqli_error($conn);  
}  
mysqli_close($conn);  
?>  