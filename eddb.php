<?php 
if(isset($_GET['edit']))
{
	$id1 = $_GET['id1'];

	//$id1=$_GET['id1'];
	//echo $id1;
	try
	{
		$mysqli11 = new mysqli("localhost","root","","demodatabase");
		$sql1="select * from demo where id=$id1";
		$res=mysqli_query($mysqli11,$sql1);
		while($row1=mysqli_fetch_array($res))
		{
			$id_1=$row1['id'];
			$name_1=$row1['name'];    	
			$email_1=$row1['email'];
			$mobile_1=$row1['mobile'];
			$gender_1=$row1['gender'];
			$city_1=$row1['city'];
			$hobbies_1=$row1['hobbies'];
			$address_1=$row1['address'];
			$photo_1 = $row1['photo'];	echo $photo_1;
		//	$pic = $_FILES['photo']['name'];
		
		}
	//	$filename = $_FILES['photo']['name'];
 //   $filetmpname = $_FILES['updatefile']['tmp_name'];?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Example</title>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <style>
  body{ font-family:Times New Roman;
}
label{font-weight:bold;}
</style>
</head>
 
<body>
   
    
    <form name="form1" method="post" action="demoinsertdatabase.php" enctype="multipart/form-data">
     
		<div class="form-group">
		<label for="name">Name
		<input type="text" class="form-control" name="name" value="<?php echo $name_1;?>"></label>
		</div>
		<div class="form-group">
		<label for="name">Email
		<input type="text" class="form-control" name="email" value="<?php echo $email_1;?>"></label>
		</div>
		<div class="form-group">
		<label for="name">Mobile
		<input type="text" class="form-control" name="mobile" value="<?php echo $mobile_1;?>"></label>
		</div>
		 <div class="form-check-inline">
<label class="form-check-label">Gender

<input type="radio" class="form-check-input" name="gender" id="male" value="Male" <?php if($gender_1=="Male"){ echo "checked";}?>/>Male
<input type="radio" class="form-check-input" name="gender" id="female" value="Female" <?php if($gender_1=="Female"){ echo "checked";}?> >Female
</label>
</div>

<div class="form-group">
<label for="city">City
		 <select class="form-control" name="city" id="city" >
		 <option value="">Select</option>
		 <option <?php if($city_1 == 'Shimoga') echo "selected"; ?>>Shimoga</option>
		 <option <?php if($city_1 == 'Bangalore') echo "selected"; ?>>Bangalore</option>
		 <option <?php if($city_1 == 'Mysore') echo "selected"; ?>>Mysore</option>
		 <option <?php if($city_1 == 'Mangalore') echo "selected"; ?>>Mangalore</option>
		 </select></label>
		 </div>
<?php $hob=explode(",",$hobbies_1); ?>
<div class="form-check">
		 <label class="form-check-label">Hobbies</label><br>
		 <input type="checkbox" class="form-check-input" name="hobbies[ ]" value="News" <?php if(in_array("News",$hob)){echo "checked";}?>>News<br>
		 <input type="checkbox" class="form-check-input" name="hobbies[ ]" value="Sports" <?php if(in_array("Sports",$hob)){echo "checked";}?>>Sports<br>
		 <input type="checkbox" class="form-check-input" name="hobbies[ ]" value="Movies"<?php if(in_array("Movies",$hob)){echo "checked";}?>>Movies<br>
		 <input type="checkbox" class="form-check-input" name="hobbies[ ]" value="Painting" <?php if(in_array("Painting",$hob)){echo "checked";}?>>Painting<br>
		 <input type="checkbox" class="form-check-input" name="hobbies[ ]" value="others" <?php if(in_array("others",$hob)){echo "checked";}?>>others<br>
</div>	
 <div class="form-group">
		 <label for="address">Address
		 <textarea class="form-control" rows="1" name="address" id="address" value= ><?php echo $address_1;?></textarea></label>
		 </div>	 
<div class="form-group">
		 <label for="photo">Upload Photo
		 
		 <input type="file" class="form-control"  name="updatefile" id="updatefile" ></label>
		 </div>	 
		<input type="hidden" name="id" value=<?php echo $id_1;?>>
				<input type="hidden" name="photo_1" value="<?php echo $photo_1;?>">
		<input type="submit" class=" btn btn-primary" name="update" value="Update">
    </form>
</body>
</html>
		
	<?php	//echo $sql1;
	
		
	}
	catch(Exception $e)
	{
	echo "DB error".$e;
	}
	
}

?>