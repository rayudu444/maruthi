<?php session_start(); 
include("../db.php");
date_default_timezone_set("Asia/Kolkata");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>TRAVELS</title>
<link rel="stylesheet" type="text/css" href="css/styles.css" />
<link rel="stylesheet" href="css/font-awesome.css">
<link rel="stylesheet" href="css/font-awesome.min.css">
<link rel="shortcut icon" href="../images/ico/favicon.ico">
<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
<script src="js/main.js" type="text/javascript"></script>
<link type="text/css" href="css/jquery-ui-1.8.19.custom.css" rel="stylesheet" />
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.8.19.custom.min.js"></script>
<script>
 jQuery(window).load(function(){
  $("#preloader").fadeOut("slow");
});
 </script>
<script type="text/javascript">
		$(function() {
		var dates = $("#txtFrom, #txtTo").datepicker({
		minDate: '0',
		maxDate: '',
		dateFormat:"yy-mm-dd",
		onSelect: function(selectedDate) {
		var option = this.id == "txtFrom" ? "minDate" : "maxDate",
		instance = $(this).data("datepicker"),
		date = $.datepicker.parseDate(
		instance.settings.dateFormat ||
		$.datepicker._defaults.dateFormat,
		selectedDate, instance.settings);
		dates.not(this).datepicker("option", option, date);
		}
		});
		});
		</script>
</head>

<body>
<div id="preloader"> <img src="images/preloader.gif" alt="Preloader"> </div>
<section class="main">
  <header>
    <div class="sub-header">
      <div class="logo"><a href="index.html"><img src="images/logo.png"/></a></div>
      <div class="clear"></div>
    </div>
  </header>
  <div class="border-bg"><img src="images/line.png"/></div>