<!DOCTYPE html>

<html>
		<head>
			<title>Search  Engine in PHP</title>
		</head>
<body bgcolor="gray">
		<form action="insert_site.php" method="post" enctype="multipart/form-data">
			
			<table bgcolor="orange" width="500" border="2" cellspacing="2" align="center">
				<tr>
					<td align="center" colspan="5"><h2>Inserting New Website :</h2></td>
				</tr>
						
				<tr>
					<td align="right"><b>Site Title :</b></td>
					<td><input type="text" name="site_title" /></td>
				</tr>
				
				<tr>
					<td align="right"><b>Site Link :</b></td>
					<td><input type="text" name="site_link" /></td>
				</tr>
				
				<tr>
					<td align="right"><b>Site Keywords :</b></td>
					<td><input type="text" name="site_keywords" /></td>
				</tr>
				
				<tr>
					<td align="right"><b>Site Description:</b></td>
					<td><textarea cols="20" rows="8" name="site_desc"></textarea></td>
				</tr>
				
				<tr>
					<td align="right"><b>Site images :</b></td>
					<td><input type="file" name="site_imag" /></td>
				</tr>
				
				<tr>
					
					<td align="center" colspan="5"><input type="submit" name="submit" value="Add site now:" /></td>
				</tr>
			
			
			
			</table>
		
		</form>

</body>

</html>


<?php
	$link = new mysqli("localhost","root","","search");
	//mysqli_select_db($link,"search");
	
	if(isset($_POST['submit'])){
		
		 $site_title = $_POST['site_title'];
		 $site_link = $_POST['site_link'];
		 $site_keywords = $_POST['site_keywords'];
		 $site_desc=$_POST['site_desc'];
		 $site_image = $_FILES['site_imag']['name'];
		 $site_image_tmp = $_FILES['site_imag']['tmp_name'];
		
	if($site_title=='' || $site_link=='' ||$site_desc==''||$site_keywords==''||
	$site_image==''){
		echo "<script>alert('Please fill comlplete form')</script>";
		
		exit();
	}
	else{
	
	
	$sql = "INSERT INTO sites (site_title,site_link,site_keywords,site_desc,site_images) 
	VALUES ('$site_title','$site_link','$site_keywords','$site_desc','$site_image')";
	
	move_uploaded_file($site_image_tmp,"images/{$site_image}");
	
	if($link->query($sql) === TRUE){
		echo "<script>alert('Data inserted succesfully')</script>";
		}
	else{echo "Not inserted";}
	}

	}
		$link->close();

?>






















