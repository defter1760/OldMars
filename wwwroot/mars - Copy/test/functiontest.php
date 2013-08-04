<?PHP

$FirstName = 'Bob';

function checkvariable($varname,$vardata)
{
    if(isset($$vardata))
    {
    echo "Set:varname<br>".$vardata."<br>".$varname."<br>".$varname."<br>";
    }
    else
    {
        echo $varname;
        echo $$varname;
        echo "<br>";
        echo "Not set.";
    }

}

#checkvariable('FirstName',$FirstName);
//
//class Cat
//{
//    public function speak()
//    {
//        echo "Meow";
//    }   
//}
//Cat::speak();
?>
<?PHP

$radio = array(
    '4EmployeeHourly' => array(
        'Yes',
        'No',
        'Both hourly and salaried'
    )
);
$question = "When you worked for Macys were you an hourly employee?";
foreach($radio as $name => &$values)
{
    echo "<br>";
    echo $question;
    echo "<br>";
    foreach($values as &$value)
    {
        $checked = isset($_POST[$name]) && $_POST[$name] == $value ? ' checked' : '';
 
        echo '<input type="radio" name="'. $name .'" value="'. $value .'"'. $checked .' /> '. $value;
    }
}
//staticly set firstname as bob
$FirstName = 'Bob';
//////
echo "<br>";
$radio = array(
    'FirstName' => array(
        'Bob',
        'Ian',
        'Both hourly and salaried'
    )
);
$question = "What is your FirstName?";
foreach($radio as $name => &$values)
{
    echo "<br>";
    echo $question;
    echo "<br>";
    foreach($values as &$value)
    {
        $checked = isset($FirstName) && $FirstName == $value ? ' checked' : '';
 
        echo '<input type="radio" name="'. $name .'" value="'. $value .'"'. $checked .' /> '. $value;
    }
}

?>

<?PHP


?>