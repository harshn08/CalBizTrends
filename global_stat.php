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


$query1=mysql_query("SELECT Type, (raised_amount/1000000) as raised
FROM  `top_investment` 
WHERE YEAR =1 
GROUP BY TYPE 
ORDER BY  `raised` DESC limit 15");

$category1 = array();
$category1['name'] = 'Business_type';

$series1= array();
$series1['name'] = 'All';


while($r = mysql_fetch_array($query1)) {
    $category1['data'][] = $r['Type'];
    $series1['data'][]=$r['raised'];
	}

$query2=mysql_query("SELECT Type, (raised_amount/1000000) as raised
FROM  `top_investment` 
WHERE YEAR =2013 GROUP BY TYPE 
ORDER BY  `raised` DESC limit 15");

$category2 = array();
$category2['name'] = 'Business_type';

$series2= array();
$series2['name'] = '2013';

	
	while($r = mysql_fetch_array($query2)) {
    $category2['data'][] = $r['Type'];
    $series2['data'][]=$r['raised'];
}

$query3=mysql_query("SELECT Type, (raised_amount/1000000) as raised
FROM  `top_investment` 
WHERE YEAR =2012 GROUP BY TYPE 
ORDER BY  `raised` DESC limit 15");

$category3 = array();
$category3['name'] = 'Business_type';

$series3= array();
$series3['name'] = '2012';

	
	while($r = mysql_fetch_array($query3)) {
    $category3['data'][] = $r['Type'];
    $series3['data'][]=$r['raised'];
}

$query4=mysql_query("SELECT Type, (raised_amount/1000000) as raised
FROM  `top_investment` 
WHERE YEAR =2011 GROUP BY TYPE 
ORDER BY  `raised` DESC limit 15");

$category4 = array();
$category4['name'] = 'Business_type';

$series4= array();
$series4['name'] = '2011';

	
	while($r = mysql_fetch_array($query4)) {
    $category4['data'][] = $r['Type'];
    $series4['data'][]=$r['raised'];
}

$result = array();
array_push($result,$category1);
array_push($result,$series1);

array_push($result,$category2);
array_push($result,$series2);

array_push($result,$category3);
array_push($result,$series3);

array_push($result,$category4);
array_push($result,$series4);

print json_encode($result, JSON_NUMERIC_CHECK);

mysql_close($con);
?> 
