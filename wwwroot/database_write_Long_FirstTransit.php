<?php
$serverName = "localhost\SPICE";
#$_REQUEST['case'] = "Firsttransit";
if (isset($_REQUEST['case']))
{           //case is set start
    $case = $_REQUEST['case'];
    $case = "Firsttransit";
    $url = $_POST['source_url'];
    $connectionInfo = array( "Database"=>$case, "UID"=>"SpiceWriter2012", "PWD"=>"p1c3righttwoohonetwo");
#$connectionInfo = array( "Database"=>"SpiceData", "UID"=>"SpiceWriter2012", "PWD"=>"p1c3righttwoohonetwo");
$conn = sqlsrv_connect( $serverName, $connectionInfo );
        
        foreach (array_keys($_POST) as $keys)
        {
            $query1 = "IF NOT EXISTS
            (SELECT * from INFORMATION_SCHEMA.COLUMNS where TABLE_NAME = '$url'
            and COLUMN_NAME = '$keys' ) ALTER TABLE [$url] ADD [$keys] varchar(max) NULL";
            $results = sqlsrv_query($conn,$query1);
            
            $val = $_POST[$keys];
            //$query2 = "select TOP 1 numid from [$url] order by numid desc;
            //$results2 = sqlsrv_query($conn,$query);
            //while($row = sqlsrv_fetch_array($results))
            //{
            //
            //}
            foreach (array_values($_POST) as $vals)
            {
                if ($keys == 'id')
                {
                    $id = $vals;
                    $query = "INSERT INTO [$url] ($keys) VALUES ('$vals');";
                    $results = sqlsrv_query($conn,$query);
                        echo "IF".$keys." -> ".$vals." ".$url.";
                }
                else
                {
                    $query = "UPDATE [$url] [$keys]=[$vals] where id=[$id];";
                    $results = sqlsrv_query($conn,$query);
                echo "ELSE!".$keys." -> ".$vals." ".$url;
                }

            }
        }

    print('<pre>');
    print_r($_POST);
    print('</pre>');
    print_r(array_keys($_POST));
    echo "<br><br>";
    print_r(array_values($_POST));

    $text = print_r($colarray, true);
    $text = $text.'<br><br><br>'.print_r($colvals, true);
    
    $message = '
    <br>
    '.$text.'
    
    
    ';
    
    require_once('class.phpmailer.php');

    
    $mail = new PHPMailer(true); // the true param means it will throw exceptions on errors, which we need to catch
    
    $mail->IsSMTP(); // telling the class to use SMTP
    
    try {
      $mail->Host       = "mail1.domain.initiativelegal.com"; // SMTP server
      $mail->SMTPDebug  = 0;                     // enables SMTP debug information (for testing)
      $mail->SMTPAuth   = true;                  // enable SMTP authentication
      $mail->Port       = 25;                    // set the SMTP port for the GMAIL server
      $mail->Username   = "macyslawsuit"; // SMTP account username
      $mail->Password   = "PLS1234!";        // SMTP account password
      $mail->AddReplyTo('macyslawsuit@initiativelegal.com', 'Macy\'s Lawsuit');
      $mail->AddAddress("ihutchings@initiativelegal.com", "NEW MATTERS");
      $mail->SetFrom('macyslawsuit@initiativelegal.com', 'Macy\'s Lawsuit');
      $mail->Subject = 'an array';
      $mail->MsgHTML($message);
      $mail->Send();
      echo "</p>\n";
    }
    
    //catch (phpmailerException $e) 
    //{
    //  echo $e->errorMessage(); //Pretty error messages from PHPMailer
    //} 
    
    catch (Exception $e) 
    
    {
      #echo $e->getMessage(); //Boring error messages from anything else!
    }
    
    }           //case is set end
    else
    {
        
}

?>