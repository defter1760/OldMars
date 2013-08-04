<?php
  $app_id = '434857599899867';
  $app_secret = 'd5be025b8bc8aa99a8755ec36f69ee1f';
  $my_url = 'https://dfwms01.initiativelegal.com/fb/examples/ians2.php';

  $code = $_REQUEST["code"];


$enc = urlencode('SELECT uid FROM user WHERE strpos(name, \'stuff\') > 0 ');
$contents = file_get_contents("https://api.facebook.com/method/fql.query?query=$enc");


 
 //auth user
 if(empty($code)) {
    $dialog_url = 'https://www.facebook.com/dialog/oauth?client_id=' 
    . $app_id . '&redirect_uri=' . urlencode($my_url) ;
    echo("<script>top.location.href='" . $dialog_url . "'</script>");
  }

  //get user access_token
  $token_url = 'https://graph.facebook.com/oauth/access_token?client_id='
    . $app_id . '&redirect_uri=' . urlencode($my_url) 
    . '&client_secret=' . $app_secret 
    . '&code=' . $code;
  $access_token = file_get_contents($token_url);
 
  // Run fql query
  $fql_query_url = 'https://graph.facebook.com/'
    . '/fql?q=SELECT+pic+FROM+user+WHERE+uid=547238711'
    . '&' . $access_token;
  //$fql_query_url = 'https://graph.facebook.com/'
  //  . '/fql?q=SELECT+uid2+FROM+friend+WHERE+uid1=me()'
  //  . '&' . $access_token;    
  $fql_query_result = file_get_contents($fql_query_url);
  $fql_query_obj = json_decode($fql_query_result, true);

  //display results of fql query
  echo '<pre>';
  print_r("query results:");
  
  print_r($fql_query_obj);
echo "<br><br><br>";
print_r($fql_query_url);
  echo '</pre>';

  // Run fql multiquery
#  $fql_multiquery_url = 'https://graph.facebook.com/'
#    . 'fql?q={"all+friends":"SELECT+work+FROM+user",'
#    . '"my+name":"SELECT+name+FROM+user+WHERE+uid=me()"}'
#    . '&' . $access_token;
    
##
##  $fql_multiquery_url = 'https://graph.facebook.com/'
##    . 'fql?q={"all+friends":"SELECT+uid2+FROM+friend+WHERE+uid1=me()",'
##    . '"my+name":"SELECT+name+FROM+user+WHERE+uid=me()"}'
##    . '&' . $access_token;
##
#  $fql_multiquery_result = file_get_contents($fql_multiquery_url);
#  $fql_multiquery_obj = json_decode($fql_multiquery_result, true);

  //display results of fql multiquery
  echo '<pre>';
#  print_r($fql_multiquery_url);
  print_r("multi query results:");
echo "<br><br>";
#  print_r($fql_multiquery_obj);
  echo '</pre>';
echo "<br><br>";  
echo $enc;  
   
?>