<?PHP

$brand = $_REQUEST['brand'];
$table = $_REQUEST['table'];

require_once 'Client/spiceAPIClient.php';
require_once 'login.php';

$spiceClient=new spiceAPIClient();
$obj=new spiceAPIObj();

$obj->type=$table;
$obj->company=$brand;

$result=$spiceClient->load($obj);
if(spiceAPIClient::isError($result))
die($result->getMessage());

print_r($result);

?>
