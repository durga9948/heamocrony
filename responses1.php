<?php 
$host = 'localhost';  
$user = 'root';  
$pass = '';  
$dbname = 'heamocrony';  
$conn = mysqli_connect($host, $user, $pass,$dbname);  
if(!$conn){  
  die('Could not connect: '.mysqli_connect_error());  
} 
session_start();
$bg=$_SESSION['bgRequire'];
$l=$_GET['len'];
echo $l;
$results= json_decode(stripslashes($_POST['results']));
//echo json_encode($results);
$destinationList=json_decode(stripslashes($_POST['destinationList']));
//echo $results;
for($j=0 ; $j<$l; $j++){
	//echo "inside for";
	$sql2="update donor set distance= $results[$j].distance.text where address=$destinationList[$j]";
	mysqli_query($conn,$sql2);
}
if($bg=='A+') 
$sql3="select * from donor where blood_group in ('A-','A+','O-','O+') order by distance";
if($bg=='A-') 
$sql3="select * from donor where blood_group in ('A-','O-') order by distance";
if($bg=='B+') 
$sql3="select * from donor where blood_group in ('B-','B+','O-','O+') order by distance";
if($bg=='B-') 
$sql3="select * from donor where blood_group in ('B-','O-') order by distance";
if($bg=='AB+') 
$sql3="select * from donor order by distance";
if($bg=='AB-') 
$sql3="select * from donor where blood_group in ('AB-','A-','O-','B-') order by distance";
if($bg=='O+') 
$sql3="select * from donor where blood_group in ('O-','O+') order by distance";
if($bg=='O-') 
$sql3="select * from donor where blood_group in ('O-') order by distance";
 		$res3=mysqli_query($conn,$sql3);
 		$donors = mysqli_fetch_all($res3,MYSQLI_ASSOC);
 		mysqli_free_result($res3);
		$sql4="update donor set distance=0 ";
		mysqli_query($conn,$sql4);
		mysqli_close($conn);
?>
<!DOCTYPE html>
<html>
<head>  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
  <body>
  <h4 class="center grey-text">Eligible donars</h4>
  <div class="container">
    <div class="row">
      <?php foreach($donors as $don){ ?>
        <div class="col s6 md3">
          <div class="card z-depth-0">
            <div class="card-content center">
              <h6><?php echo htmlspecialchars($don['name']); ?></h6>
              <div>Ph.no:<?php echo htmlspecialchars($don['ph_no']); ?></div>
              <div>Email_id:<?php echo htmlspecialchars($don['email_id']); ?></div>
              <div>Distance in km:<?php echo htmlspecialchars($don['distance']); ?></div>
              <div>Blood group:<?php echo htmlspecialchars($don['blood_group']); ?></div>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>
  </body>
</html>