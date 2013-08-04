<html>
    <head>
    <style>
        form{
      margin:15px;
      padding:5px;
      border-bottom:1px solid #ddd;
    }
      form input[type=submit]{display:none;}

      div#results{
        padding:10px 0px 0px 15px;
       }

      div#results div.result{
           padding:10px 0px;
           margin:10px 0px 10px;
       }

      div#results div.result a.readMore{color:green;}

      div#results div.result h2{
       font-size:19px;
       margin:0px 0px 5px;
       padding:0px;
       color:#1111CC;
       font-weight:normal;
       }

      div#results div.result h2 a{
        text-decoration:none;
       border-bottom:1px solid #1111cc;
      }

      div#results div.result p{
       margin:0;
      padding:0;
}

      span.highlight{
       background:#FCFFA3;
       padding:3px;
       font-weight:bold;
}
    </style>
        <title>Instant Search</title>
        <script type="text/javascript" src="../jquery.js"></script>
</head>
    <body>
       //Form
        <form method="get" action="">
            <input type="text" id="q" name="q" />
            <input type="submit" value="Search" />
        </form>

        //Result’s Container
       <div id="results"></div>
        <?PHP
        #echo $row['uniqueid'];
        #echo "<br>";
        ?>
    </body>
</html>
<script type="text/javascript">
    var runningRequest = false;
    var request;
   //Identify the typing action
    $('input#q').keyup(function(e){
        e.preventDefault();
        var $q = $(this);

        if($q.val() == ''){
            $('div#results').html('');
            return false;
        }

        //Abort opened requests to speed it up
        if(runningRequest){
            request.abort();
        }

        runningRequest=true;
        request = $.getJSON('search.php',{
            q:$q.val()
        },function(data){           
            showResults(data,$q.val());
            runningRequest=false;
        });

//Create HTML structure for the results and insert it on the result div
function showResults(data, highlight){
           var resultHtml = '';
            $.each(data, function(i,item){
                resultHtml+='<div class="result">';
                resultHtml+='<h2><a href="#">'+item.title+'</a></h2>';
                resultHtml+='<p>'+item.post.replace(highlight, '<span class="highlight">'+highlight+'</span>')+'</p>';
                resultHtml+='<a href="#" class="readMore">Read more..</a>'
                resultHtml+='</div>';
            });

            $('div#results').html(resultHtml);
        }

        $('form').submit(function(e){
            e.preventDefault();
        });
    });
</script>

<?php
if(!empty($_GET['q'])) {
    search();
}
function search() {
    $serverName = "localhost\SPICE";
    $connectionInfo = array( "Database"=>"SpiceData", "UID"=>"SpiceWriter2012", "PWD"=>"p1c3righttwoohonetwo");
    $con = sqlsrv_connect( $serverName, $connectionInfo );
    #$con = mysql_connect('localhost','root', '');
    #mysql_select_db('mydb', $con);

    $q = $_GET['q'];
    $query = "SELECT * FROM Status WHERE LastName LIKE '%{$q}%' OR FirstName LIKE '%{$q}%'";
    
    $sql = sqlsrv_query($con,$query);
#            SELECT
#           p.title, SUBSTR(p.post,1,300) as post
#       FROM Stats p
#       WHERE p.title LIKE '%{$q}%' OR p.post LIKE '%{$q}%'
#       ");

    //Create an array with the results
#   $results=array();
while($row = sqlsrv_fetch_array($sql)){
    echo $row['uniqueid'];
    echo "<br>";
}
#    while($v = sqlsrv_fetch_object($con,$query)){
#        $results[] = array(
#          'title'=>$v->title,
#          'post'=>$v->post
#       );
#   }

    //using JSON to encode the array
#   echo json_encode($results);
}
?>