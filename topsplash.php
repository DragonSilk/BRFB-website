<?php
$db = $_SESSION['DB'];

$DoSplash = $_SESSION['DoSplash'];

if (!isset ($DoSplash))
{
  $sql = "select Splash, Title from Events where BeginDisplayDate <= curdate() and EndDisplayDate >= curdate() and Enabled = 1 and EnableSplash = 1 order by EventDate ASC";
  $results = $db->query ($sql);
  $row = $results->fetch_assoc();
  $Splash = $row['Splash'];
  $Title = $row['Title'];
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251"/>
<meta content="community band cleveland,cleveland marching band,cleveland concert band,volunteer marching band,gay marching band,gay cleveland marching band,gay concert band,cleveland gay community groups,gay arts groups,gay performing,arts groups,gay community band,blazing river freedom band,cleveland arts organizations,lesbian marching band,lesbian concert band,lesbian cleveland marching band,lesbian cleveland concert band,cleveland lesbian gay allies concert marching band,community marching band,gay musicians,gay cleveland musicians, band, cleveland, pride, concert, marching, clgacmb, lgba, music, perform, lesbian, gay, straight, bisexual, chicago, columbus, indianapolis, lansing, cincinnati, rochester, aids walk, gay games, inauguration, classical, jazz, broadway, diverse, non profit, events, gallery, upcoming shows, fccc, community, freedom band" name="keywords"/>
<meta content="Open to all wind, brass, percussion, and string players!  We are a diverse group of musicians who gather to develop our musicianship skills and perform for LGBT and other events. Members have a wide range of skills and talents including those who hadn't played for years! Our mission is dedicated to the promotion of music as a medium of communication amongst the people, while improving the quality of artistry and musicianship of our members." name="description" />
<link href="brfbcss.css" rel="stylesheet" type="text/css"/>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<!-- #BeginEditable "doctitle" -->
<title>Blazing River Freedom Band</title>
<!-- #EndEditable -->
<?php
if (strlen($Splash) > 0)
{
  $_SESSION['DoSplash'] = 'NO';
?>
<script>
function clicker(){
	var thediv=document.getElementById('displaybox');
	if(thediv.style.display == "none"){
		thediv.style.display = "";
		thediv.innerHTML = "<table width='100%' height='100%'><tr><td align='center' valign='middle' width='100%' height='100%'><a href='#' onclick='return clicker();'>Go To Site</a><br /><br /><img src='<?=$Splash?>' alt='<?=$Title?>'></td></tr></table>";
	}else{
		thediv.style.display = "none";
		thediv.innerHTML = '';
	}
	return false;
}
</script>

<?php
}
?>
</head>

<body scroll="auto" onLoad="clicker();">
<div id="displaybox" style="display:none;"></div>
<div align="center" valign="top">
<table cellspacing="5" cellpadding="5">
