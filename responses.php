<?php
$host = 'localhost';  
$user = 'root';  
$pass = '';  
$dbname = 'heamocrony';  
$conn = mysqli_connect($host, $user, $pass,$dbname);  
if(!$conn){  
  die('Could not connect: '.mysqli_connect_error());  
} 
$bg=$_POST['bgRequire'];
if($bg=='A+') 
$sql="select * from donor where blood_group in ('A-','A+','O-','O+')";
if($bg=='A-') 
$sql="select * from donor where blood_group in ('A-','O-')";
if($bg=='B+') 
$sql="select * from donor where blood_group in ('B-','B+','O-','O+')";
if($bg=='B-') 
$sql="select * from donor where blood_group in ('B-','O-')";
if($bg=='AB+') 
$sql="select * from donor";
if($bg=='AB-') 
$sql="select * from donor where blood_group in ('AB-','A-','O-','B-')";
if($bg=='O+') 
$sql="select * from donor where blood_group in ('O-','O+')";
if($bg=='O-') 
$sql="select * from donor where blood_group in ('O-')";
$res=mysqli_query($conn,$sql);
if(mysqli_query($conn, $sql)){  
}else{  
echo "Not able to send it: ". mysqli_error($conn);  
}  
$result=mysqli_fetch_all($res,MYSQLI_ASSOC);




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
			<?php foreach($result as $resu){ ?>
				<div class="col s6 md3">
					<div class="card z-depth-0">
						<div class="card-content center">
							<h6><?php echo htmlspecialchars($resu['name']); ?></h6>
							<div>Ph.no:<?php echo htmlspecialchars($resu['ph_no']); ?></div>
							<div>Email_id:<?php echo htmlspecialchars($resu['email_id']); ?></div>
							<div>Distance in km:<?php echo htmlspecialchars($resu['distance']); ?></div>
							<div>Blood group:<?php echo htmlspecialchars($resu['blood_group']); ?></div>
						</div>
					</div>
				</div>
			<?php } ?>
		</div>
	</div>
</body>
</html>