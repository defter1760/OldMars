<?PHP
require("mgmtheader.php");
?>

<link rel="stylesheet" href="https://macyslawsuit.com/wp-content/themes/MacysV3/css/marsParent.css" type="text/css" />

<a name="top"></a>

<div id="graphLinks">
	<a href="#attorney">Attorney / Client</a>
	<a href="#pages">Pages / Hits</a>
	<a href="#accepted">Accepted Attorney-Client Agreements</a>
	<a href="#incoming">Incoming Attorney-Client Agreements</a>
	<a href="#outgoing">Outgoing Attorney-Client Agreements</a>
	<a href="#mailroomproductivity">Mailroom Productivity</a>
</div>



<?PHP
//start of clients per attorney graph

	echo "<table class='graphsTable clear' align='left' width='100%' border='0'>";
		echo "<tr>";
			echo "<td  height='525px' width='525px' align='left'>";
				echo "<a name='attorney'></a>";	
				echo "<iframe  align='middle' marginheight='5%' width='100%' height='100%' name='focusstealer' src='";
				echo "http://sqlsrv.domain.initiativelegal.com/pchart213/examples/example.drawBarChart.palette.mine.php' frameborder='0' ";
				echo '"';
				echo "></iframe>";
			echo "</td>";
	echo "<a name='pages'></a>";
			echo "<td  height='525px' align='left'>"
				;echo "<iframe align='middle' marginheight='5%' width='100%' height='100%' name='focusstealer' src='";
				echo "http://sqlsrv.domain.initiativelegal.com/pchart213/examples/example.drawBarChart.palette.webhits2.php' frameborder='0' ";
				echo '"';
				echo "></iframe>";
			echo "</td>";		
		echo "</tr>";		
		echo "<tr>";		
			echo "<td>";	
				echo  "<a class='topLink clear' href='#top'>Back to top &raquo;</a>";
			echo "</td>";	
		echo "</tr>";				
	echo "</table>";



	echo "<table class='graphsTable clear' align='left' width='100%' border='0'>";
			echo "<tr>";
					echo "<td  height='560px' align='left'>";
						echo "<a name='mailroomproductivity'></a>";
						echo "<iframe  align='middle' marginheight='5%' width='100%' height='100%' name='focusstealer' src='";
						echo "http://sqlsrv.domain.initiativelegal.com/pchart213/examples/example.draw2DRingValues.AgeDemographics.php' frameborder='0' ";
						echo '"';
						echo "></iframe>";
					echo "</td>";
			echo "</tr>";					
			echo "<tr>";		
				echo "<td>";	
					echo  "<a class='topLink clear' href='#top'>Back to top &raquo;</a>";
				echo "</td>";	
			echo "</tr>";
	echo "</table>";
	echo "<table class='graphsTable clear' align='left' width='100%'>";
		echo "<tr>";
			echo "<td height='250px' align='left'>";
				echo "<a name='accepted'></a>";
				echo "<iframe  align='middle' marginheight='5%' width='100%' height='100%' name='focusstealer' src='";
				echo "http://sqlsrv.domain.initiativelegal.com/pchart213/examples/example.drawThreshold.labels.retainersacceptedpermonth.php' frameborder='0' ";
				echo '"';
				echo "></iframe>";
			echo "</td>";		
		echo "<tr>";		
			echo "<td>";	
				echo  "<a class='topLink clear' href='#top'>Back to top &raquo;</a>";
			echo "</td>";	
		echo "</tr>";				
	echo "</table>";


	echo "<table class='graphsTable clear' align='left' width='100%'>";
		echo "<tr>";
			echo "<td  height='650px'   align='left'>";
				echo "<a name='incoming'></a>";
				echo "<iframe  align='middle' marginheight='5%' width='100%' height='100%' name='focusstealer' src='";
				echo "http://sqlsrv.domain.initiativelegal.com/pchart213/examples/example.drawThreshold.labels.retainersreceivedperday.php' frameborder='0' ";
				echo '"';
				echo "></iframe>";
			echo "</td>";		
		echo "<tr>";		
			echo "<td>";	
				echo  "<a class='topLink clear' href='#top'>Back to top &raquo;</a>";
			echo "</td>";	
		echo "</tr>";				
	echo "</table>";
	

	echo "<table class='graphsTable clear' align='left' width='100%'>";
		echo "<tr>";
			echo "<td  height='650px' align='left'>";
				echo "<a name='outgoing'></a>";
				echo "<iframe  align='middle' marginheight='5%' width='100%' height='100%' name='focusstealer' src='";
				echo "http://sqlsrv.domain.initiativelegal.com/pchart213/examples/example.drawThreshold.labels.retainerssentperday.php' frameborder='0' ";
				echo '"';
				echo "></iframe>";
			echo "</td>";		
		echo "<tr>";		
			echo "<td>";	
				echo  "<a class='topLink clear' href='#top'>Back to top &raquo;</a>";
			echo "</td>";	
		echo "</tr>";				
	echo "</table>";
	
		echo "<table class='graphsTable clear' align='left' width='100%'>";
		echo "<tr>";
			echo "<td  height='650px' align='left'>";
				echo "<a name='mailroomproductivity'></a>";
				echo "<iframe  align='middle' marginheight='5%' width='100%' height='100%' name='focusstealer' src='";
				echo "http://sqlsrv.domain.initiativelegal.com/pchart213/examples/example.drawThreshold.labels.mailroomfourteenday.php' frameborder='0' ";
				echo '"';
				echo "></iframe>";
			echo "</td>";		
#		echo "<tr>";

					
			echo "<tr>";		
				echo "<td>";	
					echo  "<a class='topLink clear' href='#top'>Back to top &raquo;</a>";
				echo "</td>";	
			echo "</tr>";
			
			echo "<tr>";
					echo "<td  height='250px' align='left'>";
						echo "<a name='mailroomproductivity'></a>";
						echo "<iframe  align='middle' marginheight='5%' width='100%' height='100%' name='focusstealer' src='";
						echo "http://sqlsrv.domain.initiativelegal.com/pchart213/examples/example.drawThreshold.labels.shortformweekday.php' frameborder='0' ";
						echo '"';
						echo "></iframe>";
					echo "</td>";
			echo "</tr>";					
			echo "<tr>";		
				echo "<td>";	
					echo  "<a class='topLink clear' href='#top'>Back to top &raquo;</a>";
				echo "</td>";	
			echo "</tr>";
			
			echo "<tr>";
					echo "<td  height='250px' align='left'>";
						echo "<a name='mailroomproductivity'></a>";
						echo "<iframe  align='middle' marginheight='5%' width='100%' height='100%' name='focusstealer' src='";
						echo "http://sqlsrv.domain.initiativelegal.com/pchart213/examples/example.drawThreshold.labels.hitsperweekday.php' frameborder='0' ";
						echo '"';
						echo "></iframe>";
					echo "</td>";
			echo "</tr>";					
			echo "<tr>";		
				echo "<td>";	
					echo  "<a class='topLink clear' href='#top'>Back to top &raquo;</a>";
				echo "</td>";	
			echo "</tr>";
			
			echo "<tr>";
					echo "<td  height='550px' align='left'>";
						echo "<a name='mailroomproductivity'></a>";
						echo "<iframe  align='middle' marginheight='5%' width='100%' height='100%' name='focusstealer' src='";
						echo "http://sqlsrv.domain.initiativelegal.com/pchart213/examples/example.drawThreshold.labels.hitsbyhourofday.php' frameborder='0' ";
						echo '"';
						echo "></iframe>";
					echo "</td>";
			echo "</tr>";					
			echo "<tr>";		
				echo "<td>";	
					echo  "<a class='topLink clear' href='#top'>Back to top &raquo;</a>";
				echo "</td>";	
			echo "</tr>";
			echo "<tr>";
					echo "<td  height='550px' align='left'>";
						echo "<a name='mailroomproductivity'></a>";
						echo "<iframe  align='middle' marginheight='5%' width='100%' height='100%' name='focusstealer' src='";
						echo "http://sqlsrv.domain.initiativelegal.com/pchart213/examples/example.drawThreshold.labels.hitsbyhourofdaybyWeekday.php' frameborder='0' ";
						echo '"';
						echo "></iframe>";
					echo "</td>";
			echo "</tr>";					
			echo "<tr>";		
				echo "<td>";	
					echo  "<a class='topLink clear' href='#top'>Back to top &raquo;</a>";
				echo "</td>";	
			echo "</tr>";			
			
			echo "<tr>";
					echo "<td  height='710px' align='left'>";
						echo "<a name='mailroomproductivity'></a>";
						echo "<iframe  align='middle' marginheight='5%' width='100%' height='100%' name='focusstealer' src='";
						echo "http://sqlsrv.domain.initiativelegal.com/pchart213/examples/example.drawThreshold.labels.WebHitsShortFormsRetainers.php' frameborder='0' ";
						echo '"';
						echo "></iframe>";
					echo "</td>";
			echo "</tr>";					
			echo "<tr>";		
				echo "<td>";	
					echo  "<a class='topLink clear' href='#top'>Back to top &raquo;</a>";
				echo "</td>";	
			echo "</tr>";
			
			echo "<tr>";
					echo "<td  height='710px' align='left'>";
						echo "<a name='mailroomproductivity'></a>";
						echo "<iframe  align='middle' marginheight='5%' width='100%' height='100%' name='focusstealer' src='";
						echo "http://sqlsrv.domain.initiativelegal.com/pchart213/examples/example.drawThreshold.labels.Retainers.php' frameborder='0' ";
						echo '"';
						echo "></iframe>";
					echo "</td>";
			echo "</tr>";					
			echo "<tr>";		
				echo "<td>";	
					echo  "<a class='topLink clear' href='#top'>Back to top &raquo;</a>";
				echo "</td>";	
			echo "</tr>";				
	
	echo "</table>";

?>


	