<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Form</title>
<style>
*{
	margin:0;
	padding:0;
}
body{
	font-family: Arial, Helvetica, sans-serif;
}
.clear{
	clear:both;
}
.car-form{
	width:480px;
	margin:10px auto;
	background:#ccc;
	border-radius:5px;
	padding:10px;
}
.car-form form{
	width:330px;
	margin:auto;
	display:block;
}
.car-form form label{
	display:block;
	margin-bottom:10px;
}
.car-form form label span{
	width: 100px;
	display: block;
	float: left;
	color: #4D4B4B;
	font-size: 14px;
	line-height: 32px;
	font-weight: bold;
}
.car-form form label input{
	width:200px;
	height:30px;
	border-radius:5px;
	border:2px solid #999;
	display:block;
	float:left;
	color:#000;
}
.car-form form button{
	width:100px;
	height:30px;
	margin:auto;
	color:#fff;
	background:#333;
	outline:none;
	border:none;
	border-radius:5px;
	display:block;
	margin-top:10px;
}
.car-form h1{
	font-size:18px;
	color:#333;
	text-align:center;
	border-bottom:2px solid #333;
	padding-bottom:10px;
	margin-bottom:20px;
}
.admin_success{ text-align:center; font-weight:bold; color:green; font-size:18px;}
.admin_faile{ text-align:center; font-weight:bold; color:red; font-size:18px;}
</style>
</head>

<body>
	<div class="car-form">
	    <h1>Fare Chart</h1>
		<?php 
		include("db.php");
		if(isset($_POST['submit'])){
		extract($_POST);
		$query="insert into farechart (id,duration,kms,hatch_back,sedan,suv) values 
	(id,'".$duration."','".$kms."','".$hatchback."','".$sedan."','". $suv."')";
		 $result=mysql_query($query);
			if($result){
			echo"<div class='admin_success'>Successfully Registered...</div>";
			}else{
			echo"<div class='admin_faile'>Registration Failed...</div>";
			}
		}
		
		?>
		
    	<form method="post" action="">
        	<label>
            	<span>Duration</span>
                <input type="text" name="duration" />
                <div class="clear"></div>
            </label>
            <div class="clear"></div>
            <label>
	            <span>KMs</span>
                <input type="text" name="kms" />
                <div class="clear"></div>
            </label>
            <div class="clear"></div>
            <label>
                <span>Hatch Back</span>
                <input type="text" name="hatchback" />
                <div class="clear"></div>
			</label>
            <div class="clear"></div>
            <label>
                <span>Sedan</span>
                <input type="text" name="sedan" />
                <div class="clear"></div>
			</label>
            <div class="clear"></div>
            <label>
                <span>SUV</span>
                <input type="text" name="suv" />
                <div class="clear"></div>
			</label>
            <div class="clear"></div>
            <button type="submit" name="submit" >Submit</button>
        </form>
		<div class="clear"></div>
    </div>
</body>
</html>
