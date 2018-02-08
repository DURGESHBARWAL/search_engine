<!DOCTYPE html>
<html>
	<head>
		<title>Result Page</title>
	<style type="text/css">
				
		.results{ margin-left:12%;
		          margin-right:12%;
				  margin-top:10px;
				  }
			
	</style>
		
	</head>
<body bgcolor="#F5DEB3">

<form action="result.php" method="get">
				<span><b>Wite the Search Statement :</b></span>
				<input type="text" name="user_keyword" size="120%" />
				<input type="submit" name="result" value="Search It">
	</form>
	<a href="search.html"><button>Go Back</button></a>

<?php
		
	$link = new mysqli("localhost","root","","search");
	
	if(isset($_GET['search'])){
		
	 $get_value = $_GET['user_query'];
	 
	 if($get_value==''){
			echo "<center><b>Go back and write something</b></center>";
			exit ();
			}
	 
	 $result_query = "SELECT * FROM sites WHERE site_keywords like '%$get_value%'";
	 
	 $run_query = $link->query($result_query);
	 
	 if($run_query->num_rows == 0){
		 echo "<center><b>No result found i the database</b></center>";
			exit ();
			
	 }
	 while($row_result= $run_query->fetch_assoc()){
		
			$site_title= $row_result['site_title'];
			$site_link= $row_result['site_link'];
			$site_desc= $row_result['site_desc'];
			$site_image= $row_result['site_images'];
			
		echo "<div class='results'>
				<h2>".$site_title."</h2>
				<a href='$site_link' target='_blank'>".$site_link."</a>
				<p align='justify'>".$site_desc."</p>
				<img src='images/$site_image' width='100' height='100' />
				
		</div>";
	}
	}
?>


</body>
	

</html>