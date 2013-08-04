<?php #radio
require $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require $_SERVER['DOCUMENT_ROOT'] . '/classes/mysql_db_class.php';


class form {  //build a form

    function __construct() {	
			$this->error = ""; // last form error
			
			$this->style_radio_display = "radio_display";
			$this->style_radio_container = "radio_container";
			$this->style_radio = "radio_dial";
			$this->style_radio_label = "label_radio_dial";
			
			}
			
			
	function spit_form_radio($array) { // display html radio dials 
			if (is_array($array)) { // ensure value is an array
		
				if (isset($array[0]['display'])) { // if set then display optional radio display info
					echo "<div id=\"" . $this->style_radio_display . "\">\n";
					echo $array[0]['display'] . "\n";
					echo "</div>\n\n";
					}
					
				$c=0; // counter
				
				foreach ($array as $radio) { // walk through all options
		
					echo "<div id=\"" . $this->style_radio_container . "\">\n	<input type=\"radio\" class=\"" . $this->style_radio . "\" name=\"" . $radio['name'] . "\" id=\"" . $radio['name'] . "_" . $c . "\" value=\"" . $radio['value'] . "\"";

					if ($radio['value'] == $radio['post']) { //select radio
						echo " checked"; 
						}
			
					echo " />\n	<label class=\"" . $this->style_radio_label . "\" for=\"" . $radio['name'] ."_" . $c . "\">" . 
					$radio['label'] . "</label>\n";
					echo "</div>\n\n";
					
					$c++;
					} // end foreach
		
			} else {
		
				$this->error = "Radio Function expects an Array!";
				return false;
		
				}
			} //end function
			
			
	} //end class
	

//Hand Coded Array (Inclded for your review of the array structure.  In this example, I actually pull the array from my database.  See below)

 	$fav_color = array(

			array(
			display => 'What is your favorite color?',
			label => 'Red',
			name => 'fav_color',
			value => 'red'
			),		
			array(
			label => 'Red Orange',
			name => 'fav_color',
			value => 'red orange'
			),
			array(
			label => 'Orange',
			name => 'fav_color',
			value => 'orange'
			),
			array(
			label => 'Yellow Orange',
			name => 'fav_color',
			value => 'yellow orange'
			),
			array(
			label => 'Yellow',
			name => 'fav_color',
			value => 'yellow'
			),
			array(
			label => 'Yellow Green',
			name => 'fav_color',
			value => 'yellow green'
			),
			array(
			label => 'Green',
			name => 'fav_color',
			value => 'green'
			),
			array(
			label => 'Blue Green',
			name => 'fav_color',
			value => 'blue green'
			),
			array(
			label => 'Blue',
			name => 'fav_color',
			value => 'blue',
			post => 'blue'
			),
			array(
			label => 'Blue Violet',
			name => 'fav_color',
			value => 'blue violet',
			),
			array(
			label => 'Violet',
			name => 'fav_color',
			value => 'violet',
			),
			array(
			label => 'Red Violet',
			name => 'fav_color',
			value => 'red violet'
			)
			
			);
			
// Pulling the Array from the Database

$_conx = new database();

$mysql_query = "SELECT *			
	FROM fav_color
	LIMIT 40
	";
		
$mssql_query = "SELECT TOP 40 *			
	FROM fav_color
	";
		
$fav_color_bonus = $_conx->select($mysql_query);

echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Strict//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd\">\n";
echo "<html xmlns=\"http://www.w3.org/1999/xhtml\">\n";
echo "<head>\n";
echo "<title>Servermill | Radio Demo</title>\n";
echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=iso-8859-1\" />\n";

echo "<style type=\"text/css\">\n";
echo "#radio_display {font-style:italic; margin:0em 0em 1em 0em;}\n";
echo "#radio_container {margin:0em 0em 0em 1em;}\n";
echo "</style>\n";

echo "</head>\n\n";
echo "<body>\n";

$_radio = new form();
$_radio->spit_form_radio($fav_color_bonus);

echo "</body>\n";
echo "</html>\n";

?>