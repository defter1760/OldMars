<?PHP    

$GB0[] = 'A';
$GB0[] = 'B';
$GB0[] = 'C';
$GB0[] = 'D';
$GB0[] = 'E';
$GB0[] = 'F';
$GB0[] = 'G';
$GB0[] = 'H';
$GB0[] = 'I';

$GB1[] = 'A';
$GB1[] = 'B';
$GB1[] = 'C';
$GB1[] = 'D';
$GB1[] = 'E';
$GB1[] = 'F';
$GB1[] = 'G';
$GB1[] = 'H';
$GB1[] = 'I';

$GB2[] = 'A';
$GB2[] = 'B';
$GB2[] = 'C';
$GB2[] = 'D';
$GB2[] = 'E';
$GB2[] = 'F';
$GB2[] = 'G';
$GB2[] = 'H';
$GB2[] = 'I';

$GB[] = '0';
$GB[] = '1';
$GB[] = '2';


echo "<br><br>digraph G {<br><br>";



foreach($GB as $key => $gbkey)
{

if ($gbkey == '0')
{
    $seed1 = '1';
    $seed2 = '2';
}
if ($gbkey == '1')
{
    $seed1 = '2';
    $seed2 = '0';
}
if ($gbkey == '2')
{
    $seed1 = '0';
    $seed2 = '1';
}
    foreach($GB1 as $key => $value)
    {
        
        switch ($value)
            {
                case ($value == 'A'):
                    echo "GB".$gbkey."".$value." -> GB".$seed1."B;<br>";
                    echo "GB".$gbkey."".$value." -> GB".$gbkey."B;<br>";
                    echo "GB".$gbkey."".$value." -> GB".$seed2."G;<br>";
                    echo "GB".$gbkey."".$value." -> GB".$gbkey."G;<br>";
                break;
                case ($value == 'B'):
                    echo "GB".$gbkey."".$value." -> GB".$seed1."C;<br>";
                    echo "GB".$gbkey."".$value." -> GB".$gbkey."C;<br>";
                    echo "GB".$gbkey."".$value." -> GB".$seed2."H;<br>";
                    echo "GB".$gbkey."".$value." -> GB".$gbkey."H;<br>";
                break;
                case ($value == 'C'):
                    echo "GB".$gbkey."".$value." -> GB".$seed1."A;<br>";
                    echo "GB".$gbkey."".$value." -> GB".$gbkey."A;<br>";
                    echo "GB".$gbkey."".$value." -> GB".$seed2."I;<br>";
                    echo "GB".$gbkey."".$value." -> GB".$gbkey."I;<br>";
                break;
                case ($value == 'D'):
                    echo "GB".$gbkey."".$value." -> GB".$seed1."E;<br>";
                    echo "GB".$gbkey."".$value." -> GB".$gbkey."E;<br>";
                    echo "GB".$gbkey."".$value." -> GB".$seed2."A;<br>";
                    echo "GB".$gbkey."".$value." -> GB".$gbkey."A;<br>";
                break;
                case ($value == 'E'):
                    echo "GB".$gbkey."".$value." -> GB".$seed1."F;<br>";
                    echo "GB".$gbkey."".$value." -> GB".$gbkey."F;<br>";
                    echo "GB".$gbkey."".$value." -> GB".$seed2."B;<br>";
                    echo "GB".$gbkey."".$value." -> GB".$gbkey."B;<br>";
                break;
                case ($value == 'F'):
                    echo "GB".$gbkey."".$value." -> GB".$seed1."D;<br>";
                    echo "GB".$gbkey."".$value." -> GB".$gbkey."D;<br>";
                    echo "GB".$gbkey."".$value." -> GB".$seed2."C;<br>";
                    echo "GB".$gbkey."".$value." -> GB".$gbkey."C;<br>";
                break;
                case ($value == 'G'):
                    echo "GB".$gbkey."".$value." -> GB".$seed1."H;<br>";
                    echo "GB".$gbkey."".$value." -> GB".$gbkey."H;<br>";
                    echo "GB".$gbkey."".$value." -> GB".$seed2."D;<br>";
                    echo "GB".$gbkey."".$value." -> GB".$gbkey."D;<br>";
                break;
                case ($value == 'H'):
                    echo "GB".$gbkey."".$value." -> GB".$seed1."I;<br>";
                    echo "GB".$gbkey."".$value." -> GB".$gbkey."I;<br>";
                    echo "GB".$gbkey."".$value." -> GB".$seed2."E;<br>";
                    echo "GB".$gbkey."".$value." -> GB".$gbkey."E;<br>";
                break;
                case ($value == 'I'):
                    echo "GB".$gbkey."".$value." -> GB".$seed1."G;<br>";
                    echo "GB".$gbkey."".$value." -> GB".$gbkey."G;<br>";
                    echo "GB".$gbkey."".$value." -> GB".$seed2."F;<br>";
                    echo "GB".$gbkey."".$value." -> GB".$gbkey."F;<br>";
                break;
            }

}
}
    
echo "<br><br>}";    
?>