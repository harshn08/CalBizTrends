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


/*$result = mysql_query("SELECT category_code, founded_year, SUM( funding_total_usd ) 
FROM view5
GROUP BY category_code, founded_year");

$rows = array();
while($r = mysql_fetch_array($result)) {
	$row[0] = $r[0];
	$row[1] = $r[1];
	array_push($rows,$row);
}*/
$query1=mysql_query("SELECT category_code, truncate(sum( funding_total_usd /1000000000 ) , 1 )  AS funding
FROM companies
WHERE state_code='CA' 
GROUP BY category_code");
//$query2=mysql_query("SELECT `SUM( funding_total_usd )` FROM view6 WHERE founded_year=2011");
//$query3=mysql_query("SELECT `SUM( funding_total_usd )` FROM view6 WHERE founded_year=2012");
//$query4=mysql_query("SELECT `SUM( funding_total_usd )` FROM view6 WHERE founded_year=2013");
$category = array();
$category['name'] = 'Business_type';

$series1 = array();
$series1['name'] = 'funding';

//$series2 = array();
//$series2['name'] = '2012';

//$series3 = array();
//$series3['name'] = '2013';
while($r = mysql_fetch_array($query1)) {
    $category['data'][] = $r['category_code'];
    $series1['data'][]=$r['funding'];
}
//alert($category['data'][0]);
//alert($category['data'][1]);


//while($r = mysql_fetch_array($query2)) {
  //  $series1['data'][] = $r['SUM( funding_total_usd )'];
//}
//while($r = mysql_fetch_array($query3)) {
  //  $series2['data'][] = $r['SUM( funding_total_usd )'];
//}
//while($r = mysql_fetch_array($query4)) {
  //  $series3['data'][] = $r['SUM( funding_total_usd )'];   
//}
$result = array();
array_push($result,$category);
array_push($result,$series1);
print json_encode($result, JSON_NUMERIC_CHECK);

mysql_close($con);
?> 
