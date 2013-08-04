<?PHP
    $fp = fopen("abc.doc", 'w+'); 
    $str = "<strong>php script to create doc file<strong>"; 

    fwrite($fp, $str); 

    fclose($fp); 
	
$sample1 = 'abc.doc';
$sample = file_get_contents($sample1);
echo "<br><br>";
echo $sample;
?>