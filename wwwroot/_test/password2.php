<?PHP 
/*
|-----------------
| Chip Download Class
|------------------
*/
 
require_once("class.chip_password_generator.php");
 
/*
|-----------------
| Class Instance
|------------------
*/
 
$args = array(
    'length'                =>   17,
    'alpha_upper_include'   =>   TRUE,
    'alpha_lower_include'   =>   FALSE,
    'number_include'        =>   TRUE,
    'symbol_include'        =>   FALSE,
    );
$object = new chip_password_generator( $args );
 
/*
|-----------------
| Generate Password
|------------------
*/
 
$password = $object->get_password();
 
echo $password;
?>