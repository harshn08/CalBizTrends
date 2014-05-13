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
$query1=mysql_query("SELECT investor_category_code, SUM( raised_amount_usd )/1000000 AS amount
FROM investments
GROUP BY investor_category_code
ORDER BY amount DESC 
LIMIT 5");
$query2=mysql_query("SELECT  `company_category_code` , SUM( raised_amount_usd )/1000000 AS amount 
FROM  `investments` 
GROUP BY company_category_code
ORDER BY SUM( raised_amount_usd )/1000000 DESC 
LIMIT 5");
$query3=mysql_query("SELECT SUM( raised_amount_usd )/1000000 AS amount
FROM  `investments` 
WHERE investor_category_code =  'hardware' && company_category_code =  'mobile'");

$query4=mysql_query("SELECT SUM( raised_amount_usd )/1000000 AS amount
FROM  `investments` 
WHERE investor_category_code =  'hardware' && company_category_code =  'biotech'");

$query5=mysql_query("SELECT SUM( raised_amount_usd )/1000000 AS amount
FROM  `investments` 
WHERE investor_category_code =  'hardware' && company_category_code =  'software'");

$query6=mysql_query("SELECT SUM( raised_amount_usd )/1000000 AS amount
FROM  `investments` 
WHERE investor_category_code =  'hardware' && company_category_code =  'ecommerce'");

$query7=mysql_query("SELECT SUM( raised_amount_usd )/1000000 AS amount
FROM  `investments` 
WHERE investor_category_code =  'hardware' && company_category_code =  'cleantech'");


$query8=mysql_query("SELECT SUM( raised_amount_usd )/1000000 AS amount
FROM  `investments` 
WHERE investor_category_code =  'web' && company_category_code =  'mobile'");

$query9=mysql_query("SELECT SUM( raised_amount_usd )/1000000 AS amount
FROM  `investments` 
WHERE investor_category_code =  'web' && company_category_code =  'biotech'");

$query10=mysql_query("SELECT SUM( raised_amount_usd )/1000000 AS amount
FROM  `investments` 
WHERE investor_category_code =  'web' && company_category_code =  'software'");

$query11=mysql_query("SELECT SUM( raised_amount_usd )/1000000 AS amount
FROM  `investments` 
WHERE investor_category_code =  'web' && company_category_code =  'ecommerce'");

$query12=mysql_query("SELECT SUM( raised_amount_usd )/1000000 AS amount
FROM  `investments` 
WHERE investor_category_code =  'web' && company_category_code =  'cleantech'");

$query13=mysql_query("SELECT SUM( raised_amount_usd )/1000000 AS amount
FROM  `investments` 
WHERE investor_category_code =  'software' && company_category_code =  'mobile'");

$query14=mysql_query("SELECT SUM( raised_amount_usd )/1000000 AS amount
FROM  `investments` 
WHERE investor_category_code =  'software' && company_category_code =  'biotech'");

$query15=mysql_query("SELECT SUM( raised_amount_usd )/1000000 AS amount
FROM  `investments` 
WHERE investor_category_code =  'software' && company_category_code =  'software'");

$query16=mysql_query("SELECT SUM( raised_amount_usd )/1000000 AS amount
FROM  `investments` 
WHERE investor_category_code =  'software' && company_category_code =  'ecommerce'");

$query17=mysql_query("SELECT SUM( raised_amount_usd )/1000000 AS amount
FROM  `investments` 
WHERE investor_category_code =  'software' && company_category_code =  'cleantech'");

$query18=mysql_query("SELECT SUM( raised_amount_usd )/1000000 AS amount
FROM  `investments` 
WHERE investor_category_code =  'biotech' && company_category_code =  'mobile'");

$query19=mysql_query("SELECT SUM( raised_amount_usd )/1000000 AS amount
FROM  `investments` 
WHERE investor_category_code =  'biotech' && company_category_code =  'biotech'");

$query20=mysql_query("SELECT SUM( raised_amount_usd )/1000000 AS amount
FROM  `investments` 
WHERE investor_category_code =  'biotech' && company_category_code =  'software'");

$query21=mysql_query("SELECT SUM( raised_amount_usd )/1000000 AS amount
FROM  `investments` 
WHERE investor_category_code =  'biotech' && company_category_code =  'ecommerce'");

$query22=mysql_query("SELECT SUM( raised_amount_usd )/1000000 AS amount
FROM  `investments` 
WHERE investor_category_code =  'biotech' && company_category_code =  'cleantech'");

//$query3=mysql_query("SELECT `SUM( funding_total_usd )` FROM view6 WHERE founded_year=2012");
//$query4=mysql_query("SELECT `SUM( funding_total_usd )` FROM view6 WHERE founded_year=2013");
$category = array();
$category['name'] = 'company_type';

//$series1 = array();
//$series1['name'] =  'investors';

$series3=array();
$series3['name']=	'hardware';


$r = mysql_fetch_array($query3);
$series3['data'][0]=$r['amount'];

$r = mysql_fetch_array($query4);
$series3['data'][1]=$r['amount'];

$r = mysql_fetch_array($query5);
$series3['data'][2]=$r['amount'];

$r = mysql_fetch_array($query6);
$series3['data'][3]=$r['amount'];

$r = mysql_fetch_array($query7);
$series3['data'][4]=$r['amount'];

$series4=array();
$series4['name']=	'web';


$r = mysql_fetch_array($query8);
$series4['data'][0]=$r['amount'];

$r = mysql_fetch_array($query9);
$series4['data'][1]=$r['amount'];

$r = mysql_fetch_array($query10);
$series4['data'][2]=$r['amount'];

$r = mysql_fetch_array($query11);
$series4['data'][3]=$r['amount'];

$r = mysql_fetch_array($query12);
$series4['data'][4]=$r['amount'];

$series5=array();
$series5['name']=	'software';


$r = mysql_fetch_array($query13);
$series5['data'][0]=$r['amount'];

$r = mysql_fetch_array($query14);
$series5['data'][1]=$r['amount'];

$r = mysql_fetch_array($query15);
$series5['data'][2]=$r['amount'];

$r = mysql_fetch_array($query16);
$series5['data'][3]=$r['amount'];

$r = mysql_fetch_array($query17);
$series5['data'][4]=$r['amount'];

$series6=array();
$series6['name']=	'biotech';


$r = mysql_fetch_array($query18);
$series6['data'][0]=$r['amount'];

$r = mysql_fetch_array($query19);
$series6['data'][1]=$r['amount'];

$r = mysql_fetch_array($query20);
$series6['data'][2]=$r['amount'];

$r = mysql_fetch_array($query21);
$series6['data'][3]=$r['amount'];

$r = mysql_fetch_array($query22);
$series6['data'][4]=$r['amount'];
//$series2 = array();
//$series2['name'] = '2012';

//$series3 = array();
//$series3['name'] = '2013';
while($r = mysql_fetch_array($query2)) {
    $category['data'][] = $r['company_category_code'];
   // $series1['data'][]=$r['investor_category_code'];
}
//while($r = mysql_fetch_array($query1)) {
    //$category['data'][] = $r['company_category_code'];
  // $series1['data'][]=$r['investor_category_code'];
//}
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
array_push($result,$series3);
array_push($result,$series4);
array_push($result,$series5);
array_push($result,$series6);


//array_push($result,$series2);
print json_encode($result, JSON_NUMERIC_CHECK);

mysql_close($con);
?> 
