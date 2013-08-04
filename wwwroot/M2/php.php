<?PHP
//$result = mysql_query("SELECT pricelist FROM mytable");
//
//while ($row = mysql_fetch_array($result, MYSQL_ASSOC))
//{
//    $pricelistarray = json_decode($row['pricelist']);  
//}
$pricelistarray = json_decode('{"com":"$5","net":"$15","org":"$37","ca":"$47","us":"$12"}');

foreach($pricelistarray as $pricekey => $price)
{
    $$pricekey = $price;
    echo ".".$pricekey." domains are currently: ".$$pricekey;
    echo "<br>\n";
}

?>

Store like this in db:
["com":$5,"net":$15,"org":$37,"ca":$47,"us":$12]

