<?PHP

Function Longformwriteropenfield($var,$name,$uniqueid)
{
    
$serverName = "localhost\SPICE";

$connectionInfo = array( "Database"=>"SpiceData", "UID"=>"SpiceWriter2012", "PWD"=>"p1c3righttwoohonetwo");
$conn = sqlsrv_connect( $serverName, $connectionInfo );
    if (isset($var))
    {
        //strip single quote
        if(strstr($brand,'\''))
        {
        
            $var = str_replace('\'','',$var);
        }
        
        //strip double quote
        if(strstr($var,'\"'))
        {
        
            $var = str_replace('\"','',$var);
        }	
        //strip percentage
        if(strstr($var,'%'))
        {
        
            $var = str_replace('%','',$var);
        }
        //strip asterisk
        if(strstr($var,'*'))
        {
        
            $var = str_replace('*','',$var);
        }
        //strip underscore
        if(strstr($var,'_'))
        {
        
            $var = str_replace('_','',$var);
        }
        //strip ampersand
        if(strstr($var,'&'))
        {
        
            $var = str_replace('\'','',$var);
        }	
        //strip dash
        if(strstr($var,'-'))
        {
        
            $var = str_replace('-','',$var);
        }
        
        //strip space
        if(strstr($var,' '))
        {
        
            $var = str_replace(' ','',$var);
        }
        //strip comma
        if(strstr($var,','))
        {
        
            $var = str_replace(',','',$var);
        }
    
        //strip period
        if(strstr($var,'.'))
        {
        
            $var = str_replace('.','',$var);
        }
    
        //strip parenthasis open
        if(strstr($var,'('))
        {
        
                $var = preg_replace('/\(|\)/','',$var);
        }
        
        //strip parenthasis close
        if(strstr($var,')'))
        {
                $var = preg_replace('/\(|\)/','',$var); 
        }
        $$name = $var;
        $query = "UPDATE data set [$key]='$var' WHERE data.uniqueid='$uniqueid'";
        $results = sqlsrv_query($conn,$query);
    }
}

Function Checksetnotempty($var)
{
if (isset($$var))
$mystring = $var;
$findme   = '1';
$pos = strpos($mystring, $findme);
if ($pos == 1)
}



?>