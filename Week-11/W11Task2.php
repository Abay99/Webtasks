<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		.red{
			border:2px solid black;
			border-radius: 10px;
			width: 400px;
			display: flex;
			flex-direction: row;
		}
		.red2{
			margin-left: 40px;
		}
		img{
			margin-left: 5px;
			margin-top: 3px;
		}
		form{
			display: flex;
			flex-direction: row;
		}
	</style>
</head>
<body>
<form action="t2.php">
<select name="sel">
	<option value="Toyota">Toyota</option>
	<option value="Audi">Audi</option>
</select>
<br/>
<input type="submit" value="Filter">
</form>
<br/>

<?php
$con=mysqli_connect("127.0.0.1","root","","project");
$sql="select * from cars,makers where cars.maker_id=makers.maker_id";
$sel=$_GET["sel"];
$query=mysqli_query($con,$sql);
$num=mysqli_num_rows($query);
for ($i=0; $i <$num ; $i++) { 
	$result=mysqli_fetch_array($query);
	$img=$result['image'];
	$img2=base64_encode($img);
	$maker=$result['title'];
	$model=$result['model'];
	$price=$result['price'];
	
	if($maker==$sel){
	print "<div class=\"red\">
	 <img src=\"data:image;base64,".$img2."\" width=150 height=100/>
	 <div class=\"red2\">
	 <p> ".$maker." ".$model."</p>
	 <p> Year: 2011 </p>
	 <p> Price: ".$price."$</p>
	 </div>
	 </div><br/>";}
}
?>
</body>
</html>