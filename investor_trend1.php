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

$a=1;
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
if($a==1)
{
//while($r = mysql_fetch_array($query1))
    $category1['data'][0] = "software";
	$category1['data'][1] = "Mobile";
	$category1['data'][2] = "web";
	$category1['data'][3] = "enterprise";
	
	
    $series1['data'][]=100;
	 $series1['data'][]=200;
	  $series1['data'][]=50;
	   $series1['data'][]=300;
	   
	   $series2['data'][]=1000;
	 $series2['data'][]=2000;
	  $series2['data'][]=50;
	   $series2['data'][]=3000;
	
	}
//}
else
{
//while($r = mysql_fetch_array($query1)) 
 $category1['data'][0] = "software";
	$category1['data'][1] = "Mobile";
	$category1['data'][2] = "webb";
	$category1['data'][3] = "enterprise";
	
	
    $series1['data'][]=100;
	 $series1['data'][]=200;
	  $series1['data'][]=50;
	   $series1['data'][]=300;
	   
	   $series2['data'][]=1000;
	 $series2['data'][]=2000;
	  $series2['data'][]=50;
	   $series2['data'][]=3000;
	
}

/*
$category2 = array();
$category2['name'] = 'Business_type';

$series2= array();
$series2['name'] = '2013';

	
	while($r = mysql_fetch_array($query2)) {
    $category2['data'][] = $r['Type'];
    $series2['data'][]=$r['raised'];
}

$query3=mysql_query("SELECT count( `company_name` ) AS number, `company_category_code` 
FROM `rounds_ca` 
WHERE `funding_round_type` = 'angel'
AND `funded_year` = '2012'
GROUP BY company_category_code
ORDER BY number DESC 
LIMIT 15 ");

$category3 = array();
$category3['name'] = 'Business_type';

$series3= array();
$series3['name'] = '2012';

	
	while($r = mysql_fetch_array($query3)) {
    $category3['data'][] = $r['Type'];
    $series3['data'][]=$r['raised'];
}

$query4=mysql_query("SELECT count( `company_name` ) AS number, `company_category_code` 
FROM `rounds_ca` 
WHERE `funding_round_type` = 'series-a'
GROUP BY company_category_code
ORDER BY number DESC 
LIMIT 15 ");

$category1 = array();
$category1['name'] = 'Business_type';

$series1= array();
$series1['name'] = 'All';


while($r = mysql_fetch_array($query1)) {
    $category1['data'][] = $r['Type'];
    $series1['data'][]=$r['raised'];
	}

$query5=mysql_query("SELECT count( `company_name` ) AS number, `company_category_code` 
FROM `rounds_ca` 
WHERE `funding_round_type` = 'series-a'
AND `funded_year` = '2013'
GROUP BY company_category_code
ORDER BY number DESC 
LIMIT 15 ");

$category2 = array();
$category2['name'] = 'Business_type';

$series2= array();
$series2['name'] = '2013';

	
	while($r = mysql_fetch_array($query2)) {
    $category2['data'][] = $r['Type'];
    $series2['data'][]=$r['raised'];
}

$query3=mysql_query("SELECT count( `company_name` ) AS number, `company_category_code` 
FROM `rounds_ca` 
WHERE `funding_round_type` = 'angel'
AND `funded_year` = '2012'
GROUP BY company_category_code
ORDER BY number DESC 
LIMIT 15 ");

$category3 = array();
$category3['name'] = 'Business_type';

$series3= array();
$series3['name'] = '2012';

	
	while($r = mysql_fetch_array($query3)) {
    $category3['data'][] = $r['Type'];
    $series3['data'][]=$r['raised'];
}

*/

$result = array();
array_push($result,$category1);
array_push($result,$series1);

//array_push($result,$category2);
array_push($result,$series2);

//array_push($result,$category3);
//array_push($result,$series3);

//array_push($result,$category4);
//array_push($result,$series4);

print json_encode($result, JSON_NUMERIC_CHECK);

mysql_close($con);
?> 
