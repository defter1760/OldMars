<?PHP

require("header.php");
require("db.php");
	echo "<table class='reportsTable clear' width='1400px' style='border: 1px solid #999;' cellspacing='1' border='2'>";
            echo "<tr>";
                echo "<th width='150px'>";
                    echo "Uniqueid";
                echo "</th>";
                echo "<th width='150px'>";
                    echo "First Name";
                echo "</th>";
                echo "<th>";
                    echo "Last Name";
                echo "</th>";
                echo "<th width='255px'>";
                    echo "Position";
                echo "</th>";
                echo "<th width='100px'>";
                    echo "Date Start";
                echo "</th>";
                echo "<th width='100px'>";
                    echo "Date End";
                echo "</th>";
                echo "<th>";
                    echo "Meal Claims";
                echo "</th>";
                echo "<th>";
                    echo "Rest Claims";
                echo "</th>";
                echo "<th>";
                    echo "OTC Claims";
                echo "</th>";                
                echo "<th>";
                    echo "Final wage Claims";
                echo "</th>";
                echo "<th>";
                    echo "Seating Claims";
                echo "</th>";
                echo "<th>";
                    echo "Attorney";
                echo "</th>";
            echo "</tr>";
            
	$query = "select uniqueid,FirstName,LastName,agentlname from Status where longformcompleteonline='yes' or longformcompleteonphone='yes' order by date;";
	$results = sqlsrv_query($conn,$query);
	while($row = sqlsrv_fetch_array($results))
	{
		$thisuniqueid = $row['uniqueid'];
                $thisagentlname = $row['agentlname'];
                $thisFirstName = $row['FirstName'];
                $thisLastName = $row['LastName'];
            echo "<tr>";
                echo "<td>";
                    echo $thisuniqueid;
                echo "</td>";
                echo "<td>";
                    echo $thisFirstName;
                echo "</td>";
                echo "<td>";
                    echo $thisLastName;
                echo "</td>";
                
                $query2 = "if exists (select uniqueid from data where uniqueid='$thisuniqueid')select recentPosition,recentPositionExplain,startdaymonth,startdayyear,formerlastdaymonth,formerlastdayyear,[7Cat1MealBreakWaived] as meal1data,[7mealwhenworkingbetween5and6hours] as meal2data,[7cat3missed2ndmealdidntwaivmealworkedmorethan10recievedextrahourpay] as meal3data, [8RestEverMissed] as rest1data, [8ExtraHourPay] as rest2data, [9BagsChecksYesNo] as otc1data, [9BagsCheckedEverytimeWaitToLeaving] as oct2data, workOutClock as oct3data,[12TermType] as fw1data, [12DidYouGetFinalCheckOnLastDay] as fw2data ,[12HowLongAfterTermRecieveCheckGreaterThan72] as fw3data, [12withoutSeventyTwoHoursOrLess] as fw4data, [12HowLongAfterTermRecieveCheckGreaterThan72] as fw5data, finalcheckincludeallcommissions as fw6data, CashierEver as seating1data, [14DidYourJobRequireStanding] as seating2data, [14PermittedToSit] as seating3data, [14SittingWouldInterfere] as seating4data from Data where uniqueid='$thisuniqueid'";
                $results2 = sqlsrv_query($conn,$query2);
                while($row2 = sqlsrv_fetch_array($results2))
                {
                    $recentPosition = $row2['recentPosition'];
                    $recentPositionExplain = $row2['recentPositionExplain'];
                    $startdaymonth = $row2['startdaymonth'];
                        if (empty($startdaymonth)) $startdaymonth = '';
                    $startdayyear = $row2['startdayyear'];
                        if (empty($startdayyear)) $startdayyear = '';
                    $formerlastdaymonth = $row2['formerlastdaymonth'];
                        if (empty($formerlastdaymonth)) $formerlastdaymonth = '';
                    $formerlastdayyear = $row2['formerlastdayyear'];
                        if (empty($formerlastdayyear)) $formerlastdayyear = '';
                    $meal1data = $row2['meal1data'];
                    $meal2data = $row2['meal2data'];
                    $meal3data = $row2['meal3data'];
                    $rest1data = $row2['rest1data'];                    
                    $rest2data = $row2['rest2data'];
                    $otc1data = $row2['otc1data'];
                    $oct2data = $row2['oct2data'];
                    $oct3data = $row2['oct3data'];
                    
##In your most recent position at Macy's, were you terminated (laid-off or fired) or did you quit your employment? 
                    $fw1data = $row2['fw1data'];
                    
##If you were terminated or you quit after giving at least 72 hours notice, did you receive all your final paycheck on your last day of work?
                    $fw2data = $row2['fw2data'];
                    
##How long after you stopped working for Macy's did you receive your final paycheck?
                    $fw3data = $row2['fw3data'];
                    
##If you quit without providing at least 72 hours notice, did you receive your final paycheck within 72 hours of quitting?
                    $fw4data = $row2['fw4data'];
                    
##How long after you stopped working for Macy's did you receive your final paycheck?
                    $fw5data = $row2['fw5data'];
                    
##In your most recent position at Macy's, did your final paycheck include all commissions owed to you?
                    $fw6data = $row2['fw6data'];
                    
##In your most recent position working at Macy’s, did you have cashier responsibilities?
                    $seating1data = $row2['seating1data'];

##In your most recent position working at Macy's, did the nature of your job require you to stand?
                    $seating2data = $row2['seating2data'];

##When you weren't engaged in your work duties, did Macy's ever let you sit in a seat during your work shift? 
                    $seating3data = $row2['seating3data'];

##Do you think you could have performed your job duties while you were seated?
                $seating4data = $row2['seating4data'];

                ## See if conditions are met for Mealbreak claims
                #default to No
                $mealclaims = 'No';
                $meal1 = 'No';
                $meal2 = 'No';
                $meal3 = 'No';
                  #1
                    if ($meal1data == 'Yes, sometimes')
                    {
                        $meal1 = 'true';
                    }
                    if ($meal1data == 'No, never')
                    {
                        $meal1 = 'true';
                    }
                    if ($meal1data == 'I dont remember')
                    {
                        $meal1 = 'true';
                    }
                    

                  #2 
                    if ($meal2data == 'Yes')
                    {
                        $meal2 = 'true';
                    }
                  #3
                    if ($meal3data == 'Never')
                    {
                        $meal3 = 'true';
                    }
                    if ($meal3data == 'Usually')
                    {
                        $meal3 = 'true';
                    }
                    if ($meal3data == 'I dont remember')
                    {
                        $meal3 = 'true';
                    }
                    
                    if ( $meal1 == 'true')
                        {
                            if ( $meal2 == 'true')
                            {
                                if ( $meal3 == 'true')
                                {
                                    $mealclaims = 'Yes';
                                }
                            }
                        }                 
                ## Mealbreak claims -- End
                
                ## See if conditions are met for Restbreak claims
                #default to No
                $restclaims = 'No';
                $rest1 = 'No';
                $rest2 = 'No';
                $rest3 = 'No';
                  #1
                    if ($rest1data == 'Yes')
                    {
                        $rest1 = 'true';
                    }

                  #2 
                    if ($rest2data == 'Yes, sometimes')
                    {
                        $rest2 = 'true';
                    }
                    if ($rest2data == 'No, never')
                    {
                        $rest2 = 'true';
                    }
                    if ($rest2data == 'I dont remember')
                    {
                        $rest2 = 'true';
                    }
                    
                    if ( $rest1 == 'true')
                        {
                            if ( $rest2 == 'true')
                            {
                            $restclaims = 'Yes';
                            }
                        }
                ## Restbreak claims -- End
                    
                    
                ## See if conditions are met for Off the clock claims
                #default to No
                $otcclaims = 'No';
                $otc1 = 'No';
                $otc2 = 'No';
                $otc3 = 'No';
                  #1
                    if ($otc1data == 'Yes, and I was off the clock (not paid) during the bag check.')
                    {
                        $otc1 = 'true';
                    }

                  #2 
                    if ($oct2data == 'Yes, I had to wait for my co-workers before I could leave.')
                    {
                        $otc2 = 'true';
                    }
                    if ($oct2data == 'Yes, I had to wait for a manager or supervisor to let me out of the store.')
                    {
                        $otc2 = 'true';
                    }
                    if ($oct2data == 'Both')
                    {
                        $otc2 = 'true';
                    }
                  #3
                    if ($oct3data == 'Yes')
                    {
                        $otc3 = 'true';
                    }
                    
                    if ( $otc1 == 'true')
                        {
                            $otcclaims = 'Yes';    
                        }
                            if ( $otc2 == 'true')
                            {
                                $otcclaims = 'Yes';    
                            }
                                if ( $otc3 == 'true')
                                {
                                    $otcclaims = 'Yes';
                                }
                            
                        
                ## off the clock claims -- End
                
                ## See if conditions are met for Off the Final wages
                #default to No
                $finalwageclaims = 'No';
                $fw1 = 'No';
                $fw2 = 'No';
                $fw3 = 'No';
                $fw4 = 'No';
                $fw5 = 'No';
                $fw6 = 'No';
                  #1
                  
                  if ($fw5data == 'Between 4 and 7 days')
                  {
                    $fw5 = 'Yes';
                  }
                  if ($fw5data == 'Between 1 and 2 weeks')
                  {
                    $fw5 = 'Yes';
                  }
                  if ($fw5data == 'Between 2 and 4 weeks')
                  {
                    $fw5 = 'Yes';
                  }
                  if ($fw5data == 'More than a month')
                  {
                    $fw5 = 'Yes';
                  }
                  if ($fw5data == 'I never received my final paycheck.')
                  {
                    $fw5 = 'Yes';
                  }                  
                  
                    if ($fw1data == 'Terminated')
                    {
                        if ($fw2data == 'No')
                        {
                            {
                                if($fw5 == 'Yes')
                                {
                                    $fw1 = 'true';
                                }
                            }
                            
                        }
                        
                    }
                    if ($fw1data == 'Quit')
                    {
                        if ($fw4data == 'No')
                        {
                            if($fw5 == 'Yes')
                            {
                                $fw1 = 'true';
                            }
                        }
                        
                    }
                    
                if ($fw6data == 'No')
                {
                    $fw1 = 'true';
                }
                
                if ($fw1 == 'true')
                {
                    $finalwageclaims = 'Yes';
                }
                    
                            
                        
                ## off the Final wages -- End
                
                ## See if conditions are met for Seating claims
                #default to No
                $seatingclaims = 'No';
                $seating1 = 'No';
                $seating2 = 'No';
                $seating3 = 'No';
                  #1
                    if ($seating1data == 'Yes')
                    {
                        if ($seating2data == 'Yes')
                        {
                            if ($seating3data == 'No')
                            {
                                if ($seating4data == 'Yes')
                                {    
                                    $seating1 = 'true';
                                }
                            }
                        }
                        
                    }

                  #2 
                    
                    if ( $seating1 == 'true')
                    {
                            $seatingclaims = 'Yes';
                    }
                
                ## Seating claims -- End
                }
                echo "<td><font size=2>";
                    echo $recentPosition.' '.$recentPositionExplain;
                echo "</font></td>";
                echo "<td>";
                if ($startdaymonth != '')
                {                
                    echo $startdaymonth.' / '.$startdayyear;
                }
                else
                {
                    echo "";
                }                
                echo "</td>";
                echo "<td>";
                if ($formerlastdaymonth != '')
                {
                    echo $formerlastdaymonth.' / '.$formerlastdayyear;
                }
                else
                {
                    echo "";
                }
                #}
                echo "</td>";
                echo "<td>";
                if ($mealclaims != 'No')
                {
                    echo $mealclaims;
                }
                echo "</td>";
                echo "<td>";
                if ($restclaims != 'No')
                {
                    echo $restclaims;
                }
                echo "</td>";
                echo "<td>";
                if ($otcclaims != 'No')
                {                
                    echo $otcclaims;
                }
                echo "</td>";                
                echo "<td>";
                if ($finalwageclaims != 'No')
                {                
                    echo $finalwageclaims;
                }
                echo "</td>";
                echo "<td>";
                if ($seatingclaims != 'No')
                {                
                    echo $seatingclaims;
                }
                echo "</td>";
                echo "<td>";
                echo $thisagentlname;
                echo "</td>";
            echo "</tr>";
            
                    $recentPosition = '';
                    $recentPositionExplain = '';
                    $startdaymonth = '';
                    $startdayyear = '';
                    $formerlastdaymonth = '';
                    $formerlastdayyear = '';
                    $meal1data = '';
                    $meal2data = '';
                    $meal3data = '';
                    $rest1data = '';                    
                    $rest2data = '';
                    $otc1data = '';
                    $oct2data = '';
                    $oct3data = '';
                
                
                ##7Cat1MealBreakWaived = Yes, sometimes or No, never
                ##7mealwhenworkingbetween5and6hours = No
                ##7cat3missed2ndmealdidntwaivmealworkedmorethan10recievedextrahourpay = Usually or Never or I don't remember
	}