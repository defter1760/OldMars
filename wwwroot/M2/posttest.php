<?PHP

print_r($_POST);
    echo "\n<br>\n";
    echo "\n<dd>\n";
    echo "\n<br>\n";
    echo "\n<dd>\n";
foreach ($_POST as $key => $value)
{
    echo "\n";
    echo $key;
    echo "\n<br>\n";
    echo "\n<dd>\n";
    echo $value;
    echo "\n</dd>\n";
}

?>