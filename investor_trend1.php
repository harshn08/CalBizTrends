<?php
$services_json = json_decode(getenv("VCAP_SERVICES"),true);
$mysql_config = $services_json["mysql-5.1"][0]["credentials"];
$username = $mysql_config["username"];
$password = $mysql_config["password"];
$hostname = $mysql_config["hostname"];
$port = $mysql_config["port"];
$db = $mysql_config["name"];

$con = mysql_connect("$hostname:$port", $username, $password);
//$db_selected = mysql_select_db($db, $link);
//$con = mysql_connect("127.0.0.1","root","root");

if (!$con) {
  die('Could not connect: ' . mysql_error());
}

mysql_select_db($db, $con);

//$a=1;
$query1=mysql_query("SELECT count(`company_name`) as number , `company_category_code` FROM `rounds_ca` WHERE `funding_round_type` = 'angel' where `funded_year` = 2012
group by company_category_code
order by number 
desc limit 15");

$query1=mysql_query("SELECT count(`company_name`) as number , `company_category_code` FROM `rounds_ca` WHERE `funding_round_type` = 'angel' where `funded_year` = 2013
group by company_category_code
order by number 
desc limit 15");
$category1 = array();
$category1['name'] = 'Business_type';

$series1= array();
$series1['name'] = '2013';

$series2=array();
$series2['name']='2012';

$series4=array();
$series4['name']='2011';

$series3=array();
$series3['name']='2014';
//if($a==1)
//
//while($r = mysql_fetch_array($query1))
    $category1['data'][0] = "Angel";
	$category1['data'][1] = "Series-a";
	$category1['data'][2] = "Series-b";
	$category1['data'][3] = "Series-c+";
	
	
    $series1['data'][]=824;
	 $series1['data'][]=600;
	  $series1['data'][]=219;
	   $series1['data'][]=248;
	   
	   $series2['data'][]=774;
	 $series2['data'][]=456;
	  $series2['data'][]=164;
	   $series2['data'][]=243;
	   
	   $series3['data'][]=138;
	 $series3['data'][]=130;
	  $series3['data'][]=67;
	   $series3['data'][]=72;
	   
	     $series4['data'][]=591;
	 $series4['data'][]=421;
	  $series4['data'][]=209;
	   $series4['data'][]=235;
	

$result = array();
array_push($result,$category1);
array_push($result,$series1);

//array_push($result,$category2);
array_push($result,$series2);
array_push($result,$series3);
array_push($result,$series4);

//array_push($result,$category3);
//array_push($result,$series3);

//array_push($result,$category4);
//array_push($result,$series4);

print json_encode($result, JSON_NUMERIC_CHECK);

mysql_close($con);
?> 
