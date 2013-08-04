  <?PHP
	/*session 2*/
  	$recentPosition = ""; 
	$recentPositionExplain = "";
	$LocCity = ""; 
	$LocCity2 = ""; 
	$EmployeeHourly = ""; 
	$PaidExplain = ""; 
	$CurrentlyEmployed = ""; 
	$startdaymonth = ""; 
	$startdayyear = ""; 
	$formerlastdaymonth = ""; 
	$formerlastdayyear = ""; 
	
	/*session 3*/
	$Category1 = "";
	$Category = ""; 
	$Cat1MealBreakWaived = ""; 
	$MealWhenWorkingBetween5and6hours = ""; 
	$MealBreakMissedCat1Freq = ""; 
	$MealBreakMissedCat1Why = ""; 
	$missMealBreakrExplain = ""; 
	$EverMoreThan10 = ""; 
	$Cat3DidGetSecondMealBreak =""; 
	$Cat3Missed2ndMealBreakOften = ""; 
	$Cat3Missed2ndMealDidntWaivMealWorkedMoreThan10RecievedExtraHourPay = ""; 
	$session3Explain = "";
	
	/*session4*/
	$RestEverMissed1 = "";
	$RestEverMissed = ""; 
	$HowOftenMissRest = ""; 
	$WhyMiss10MinRest = ""; 
	$missRestBreakExplain = ""; 
	$ExtraHourPay = ""; 
	$session4Explain = ""; 
	
	/*session5*/
	$BagsChecksYesNo1 = "";
	$BagsChecksYesNo = ""; 
	$BagsCheckedEverytimeLeaving = ""; 
	$BagsCheckedWait = ""; 
	$bagCheckWaitHour = "";	
	$bagCheckWaitMinute = "";
	$EverWorkClosingShift = ""; 
	$BagsCheckedEverytimeWaitToLeaving = ""; 
	$generalWaitHour = ""; 
	$generalWaitMinute = ""; 	
	$workOutClock = "";
	$afterBeforeClockExplain = ""; 
	$offClockHour = ""; 
	$offClockMinute =""; 
	$session5Explain = "";   
    
	/*session6*/
	$TermType1 = "";
	$TermType = ""; 
	$SeventyTwoHoursOrLess = ""; 
	$DidYouGetFinalCheckOnLastDay = ""; 
	$withoutSeventyTwoHoursOrLess = "";	
	$HowLongAfterTermRecieveCheckGreaterThan72 = "";
	$finalcheckincludeallcommissions = ""; 
	$howlongdidittakeformacystopayallcommissions = ""; 
	$session6Explain = ""; 

	/*session7*/
	$DidYourJobRequireStanding1 = "";
	$DidYourJobRequireStanding = ""; 
	$PermittedToSit = ""; 
	$timeBeforeSitHour = ""; 
	$timeBeforeSitMinute = "";		
	$Consequences = "";
	$jobListSeated = ""; 
	$SittingWouldInterfere = ""; 
	$jobSeatedExplain = ""; 
	$session7Explain = ""; 
	
	/*session9*/
	$needssase = "";
	$HouseHoldCount1 = ""; 
	$HouseHoldCount = ""; 
	$HouseHoldCount = ""; 
	$GrossIncome = "";	
	 
  
  	$query = "SELECT * FROM Data WHERE uniqueid='$uniqueid'";
    $results = sqlsrv_query($conn,$query);
    $question = "What was your most recent position during your employment at Macy's? (Select the choice that best describes your last position)?";
	$row = sqlsrv_fetch_array($results);
	/*session 2*/
	$recentPosition = $row['recentPosition'];
	$recentPositionExplain = htmlspecialchars($row['recentPositionExplain']);
	$LocCity = $row['1LocCity']; 
	$LocCity2 = htmlspecialchars($row['1LocCity2']); 
	$EmployeeHourly = $row['EmployeeHourly']; 
	$PaidExplain = htmlspecialchars($row['PaidExplain']); 
	$CurrentlyEmployed = $row['4CurrentlyEmployed']; 
	$startdaymonth = $row['startdaymonth']; 
	$startdayyear = $row['startdayyear']; 
	$formerlastdaymonth = $row['formerlastdaymonth']; 
	$formerlastdayyear = $row['formerlastdayyear']; 
	$identifypeople = htmlspecialchars($row['identifypeople']); 
	
	/*session3*/
	$Category1 = $row['Category1'];
	$Category = $row['4Category']; 
	$Cat1MealBreakWaived = $row['7cat1mealbreakwaived']; 
	$MealWhenWorkingBetween5and6hours = $row['7mealwhenworkingbetween5and6hours']; 
	$MealBreakMissedCat1Freq = $row['7mealbreakmissedcat1freq']; 
	$MealBreakMissedCat1Why = $row['7mealbreakmissedcat1why']; 
	$missMealBreakrExplain = htmlspecialchars($row['missMealBreakrExplain']); 
	$EverMoreThan10 = $row['7EverMoreThan10']; 
	$Cat3DidGetSecondMealBreak = $row['7cat3didgetsecondmealbreak']; 
	$Cat3Missed2ndMealBreakOften = $row['7cat3missed2ndmealbreakoften']; 
	$Cat3Missed2ndMealDidntWaivMealWorkedMoreThan10RecievedExtraHourPay = $row['7cat3missed2ndmealdidntwaivmealworkedmorethan10recievedextrahourpay']; 
	$session3Explain = htmlspecialchars($row['session3Explain']);

	/*session4*/
	$RestEverMissed1 = $row['RestEverMissed1'];
	$RestEverMissed = $row['8RestEverMissed']; 
	$HowOftenMissRest = $row['8HowOftenMissRest']; 
	$WhyMiss10MinRest = $row['8WhyMiss10MinRest']; 
	$missRestBreakExplain = htmlspecialchars($row['missRestBreakExplain']); 
	$ExtraHourPay = $row['8ExtraHourPay']; 
	$session4Explain = htmlspecialchars($row['session4Explain']); 
	
	/*session5*/
	$BagsChecksYesNo1 = $row['BagsChecksYesNo1'];
	$BagsChecksYesNo = $row['9BagsChecksYesNo']; 
	$BagsCheckedEverytimeLeaving = $row['9BagsCheckedEverytimeLeaving']; 
	$BagsCheckedWait = $row['9BagsCheckedWait']; 
	$bagCheckWaitHour = $row['bagCheckWaitHour'];	
	$bagCheckWaitMinute = $row['bagCheckWaitMinute'];
	$EverWorkClosingShift = $row['10EverWorkClosingShift']; 
	$BagsCheckedEverytimeWaitToLeaving = $row['9BagsCheckedEverytimeWaitToLeaving']; 
	$generalWaitHour = $row['generalWaitHour']; 
	$generalWaitMinute = $row['generalWaitMinute']; 	
	$workOutClock = $row['workOutClock'];
	$afterBeforeClockExplain = htmlspecialchars($row['afterBeforeClockExplain']); 
	$offClockHour = $row['offClockHour']; 
	$offClockMinute = $row['offClockMinute']; 
	$session5Explain = htmlspecialchars($row['session5Explain']);   
    
	/*session6*/
	$TermType1 = $row['TermType1'];
	$TermType = $row['12termtype']; 
	$SeventyTwoHoursOrLess = $row['12seventytwohoursorless']; 
	$DidYouGetFinalCheckOnLastDay = $row['12didyougetfinalcheckonlastday']; 
	$withoutSeventyTwoHoursOrLess = $row['12withoutSeventyTwoHoursOrLess'];	
	$HowLongAfterTermRecieveCheckGreaterThan72 = $row['12howlongaftertermrecievecheckgreaterthan72'];
	$finalcheckincludeallcommissions = $row['finalcheckincludeallcommissions']; 
	$howlongdidittakeformacystopayallcommissions = $row['howlongdidittakeformacystopayallcommissions']; 
	$session6Explain = htmlspecialchars($row['session6Explain']); 

	/*session7*/
	$DidYourJobRequireStanding1 = $row['DidYourJobRequireStanding1'];
	$DidYourJobRequireStanding = $row['14DidYourJobRequireStanding']; 
	$PermittedToSit = $row['14PermittedToSit']; 
	$timeBeforeSitHour = $row['timeBeforeSitHour']; 
	$timeBeforeSitMinute = $row['timeBeforeSitMinute'];		
	$Consequences = $row['14Consequences'];
	$jobListSeated = htmlspecialchars($row['jobListSeated']); 
	$SittingWouldInterfere = $row['14SittingWouldInterfere']; 
	$jobSeatedExplain = htmlspecialchars($row['jobSeatedExplain']); 
	$session7Explain = htmlspecialchars($row['session7Explain']); 
	
	/*session9*/
	$needssase = $row['needssase'];
	$HouseHoldCount1 = $row['HouseHoldCount1']; 
	$HouseHoldCount = $row['HouseHoldCount']; 	
	$GrossIncome = $row['GrossIncome'];

	?>