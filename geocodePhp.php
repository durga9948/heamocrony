<? php
echo "enterd";
$host = 'localhost';  
$user = 'root';  
$pass = '';  
$dbname = 'heamocrony';  
$conn = mysqli_connect($host, $user, $pass,$dbname);  
echo "enterd";
if(!$conn){  
  die('Could not connect: '.mysqli_connect_error());  
}  
$lat=$_POST['latitude'];
$lng=$_POST['longitude'];
echo $lat;
$sql = "insert into addresslatlng(latitude,longitude) values('$lat','$lng')";
if(mysqli_query($conn, $sql)){  
 echo "Success";  
}else{  
echo "Could not insert record: ". mysqli_error($conn);  
}  
mysqli_close($conn);  
?>  