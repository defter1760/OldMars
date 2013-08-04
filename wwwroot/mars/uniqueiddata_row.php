<?PHP
	$query = "SELECT * FROM Data WHERE uniqueid='$uniqueid'";
	$results = sqlsrv_query($conn,$query);
	
	while($row = sqlsrv_fetch_array($results))
	{
		if (isset($row['1LocCity']))
		{		
			$LocCity = $row['1LocCity']; if (empty($LocCity)) unset($LocCity);
		}
		if (isset($row['1LocState']))
		{		
			$LocState = $row['1LocState']; if (empty($LocState)) unset($LocState);
		}
		if (isset($row['1WhoFirstName']))
		{		
			$WhoFirstName = $row['1WhoFirstName']; if (empty($WhoFirstName)) unset($WhoFirstName);
		}
		if (isset($row['1WhoLastName']))
		{		
			$WhoLastName = $row['1WhoLastName']; if (empty($WhoLastName)) unset($WhoLastName);
		}
		if (isset($row['3Email']))
		{		
			$Email = $row['3Email']; if (empty($Email)) unset($Email);
		}
		if (isset($row['3Fax']))
		{		
			$Fax = $row['3Fax']; if (empty($Fax)) unset($Fax);
		}
		if (isset($row['3HomeCity']))
		{		
			$HomeCity = $row['3HomeCity']; if (empty($HomeCity)) unset($HomeCity);
		}
		if (isset($row['3HomeState']))
		{		
			$HomeState = $row['3HomeState']; if (empty($HomeState)) unset($HomeState);
		}
		if (isset($row['4HourlyRate']))
		{		
			$SecondaryNumber = $row['3SecondaryNumber']; if (empty($SecondaryNumber)) unset($SecondaryNumber);
		}
		if (isset($row['4HourlyRate']))
		{		
			$StreetLine1 = $row['3StreetLine1']; if (empty($StreetLine1)) unset($StreetLine1);
		}
		if (isset($row['4HourlyRate']))
		{		
			$StreetLine2 = $row['3StreetLine2']; if (empty($StreetLine2)) unset($StreetLine2);
		}
		if (isset($row['4HourlyRate']))
		{
			$Zipcode = $row['3Zipcode']; if (empty($Zipcode)) unset($Zipcode);
		}
		if (isset($row['4HourlyRate']))
		{
			$LocCity = $row['1LocCity']; if (empty($LocCity)) unset($LocCity);
		}
		if (isset($row['4HourlyRate']))
		{		
			$EmployeeHourly = $row['4EmployeeHourly']; if (empty($EmployeeHourly)) unset($EmployeeHourly);
		}
		if (isset($row['PaidExplain']))
		{	
		$PaidExplain = $row['PaidExplain']; if (empty($PaidExplain)) unset($PaidExplain);
		}
		
		if (isset($row['ReceiveCommission']))
		{	
		$ReceiveCommission = $row['ReceiveCommission']; if (empty($ReceiveCommission)) unset($ReceiveCommission);
		}
		if (isset($row['ReceiveCommissionExplain']))
		{	
		$ReceiveCommissionExplain = $row['ReceiveCommissionExplain']; if (empty($ReceiveCommissionExplain)) unset($ReceiveCommissionExplain);
		}
		if (isset($row['DeductCommission']))
		{	
		$DeductCommission = $row['PaidExplain']; if (empty($DeductCommission)) unset($DeductCommission);
		}
		if (isset($row['DeductCommissionExplain']))
		{	
		$DeductCommissionExplain = $row['DeductCommissionExplain']; if (empty($DeductCommissionExplain)) unset($DeductCommissionExplain);
		}
		if (isset($row['DeductPayCheck']))
		{	
		$DeductPayCheck = $row['DeductPayCheck']; if (empty($DeductPayCheck)) unset($DeductPayCheck);
		}
		if (isset($row['DeductPayCheckExplain']))
		{	
		$DeductPayCheckExplain = $row['DeductPayCheckExplain']; if (empty($DeductPayCheckExplain)) unset($DeductPayCheckExplain);
		}		
		if (isset($row['4HourlyRate']))
		{			
			$HourlyRate = $row['4HourlyRate']; if (empty($HourlyRate)) unset($HourlyRate);
		}
		if (isset($row['areyoucurrentmacysemployee']))
		{		
			$CurrentlyEmployed = $row['areyoucurrentmacysemployee']; if (empty($CurrentlyEmployed)) unset($CurrentlyEmployed);
		}
		if (isset($row['startdaymonth']))
		{
			$startdaymonth = $row['startdaymonth']; if (empty($startdaymonth)) unset($startdaymonth);	
		}
		if (isset($row['startdayday']))
		{
			$startdayday = $row['startdayday']; if (empty($startdayday)) unset($startdayday);	
		}
		if (isset($row['startdayyear']))
		{
			$startdayyear = $row['startdayyear']; if (empty($startdayyear)) unset($startdayyear);	
		}
		if (isset($row['formerlastdaymonth']))
		{
			$formerlastdaymonth = $row['formerlastdaymonth']; if (empty($formerlastdaymonth)) unset($formerlastdaymonth);	
		}
		if (isset($row['formerlastdayday']))
		{
			$formerlastdayday = $row['formerlastdayday']; if (empty($formerlastdayday)) unset($formerlastdayday);	
		}
		if (isset($row['formerlastdayyear']))
		{
			$formerlastdayyear = $row['formerlastdayyear']; if (empty($formerlastdayyear)) unset($formerlastdayyear);	
		}
		if (isset($row['4Category']))
		{
			$Category = $row['4Category']; if (empty($Category)) unset($Category);	
		}
		if (isset($row['7Cat1MealBreakWaived']))
		{
			$Cat1MealBreakWaived = $row['7Cat1MealBreakWaived']; if (empty($Cat1MealBreakWaived)) unset($Cat1MealBreakWaived);
		}
		if (isset($row['7MealWhenWorkingBetween5and6hours']))
		{		
			$MealWhenWorkingBetween5and6hours = $row['7MealWhenWorkingBetween5and6hours']; if (empty($MealWhenWorkingBetween5and6hours)) unset($MealWhenWorkingBetween5and6hours);
		}
		if (isset($row['7MealBreakMissedCat1Freq']))
		{		
			$MealBreakMissedCat1Freq = $row['7MealBreakMissedCat1Freq']; if (empty($MealBreakMissedCat1Freq)) unset($MealBreakMissedCat1Freq);
		}
		if (isset($row['7MealBreakMissedCat1Why']))
		{		
			$MealBreakMissedCat1Why = $row['7MealBreakMissedCat1Why']; if (empty($MealBreakMissedCat1Why)) unset($MealBreakMissedCat1Why);
		}
		if (isset($row['7EverMoreThan10']))
		{		
			$EverMoreThan10 = $row['7EverMoreThan10']; if (empty($EverMoreThan10)) unset($EverMoreThan10);
		}
		if (isset($row['7Cat3DidGetSecondMealBreak']))
		{		
			$Cat3DidGetSecondMealBreak = $row['7Cat3DidGetSecondMealBreak']; if (empty($Cat3DidGetSecondMealBreak)) unset($Cat3DidGetSecondMealBreak);
		}
		if (isset($row['7Cat3Missed2ndMealBreakOften']))
		{		
			$Cat3Missed2ndMealBreakOften = $row['7Cat3Missed2ndMealBreakOften']; if (empty($Cat3Missed2ndMealBreakOften)) unset($Cat3Missed2ndMealBreakOften);
		}
		if (isset($row['7Cat3Missed2ndMealDidntWaivMealWorkedMoreThan10RecievedExtraHourPay']))
		{		
			$Cat3Missed2ndMealDidntWaivMealWorkedMoreThan10RecievedExtraHourPay = $row['7Cat3Missed2ndMealDidntWaivMealWorkedMoreThan10RecievedExtraHourPay']; if (empty($Cat3Missed2ndMealDidntWaivMealWorkedMoreThan10RecievedExtraHourPay)) unset($Cat3Missed2ndMealDidntWaivMealWorkedMoreThan10RecievedExtraHourPay);
		}
		if (isset($row['8RestEverMissed']))
		{		
			$RestEverMissed = $row['8RestEverMissed']; if (empty($RestEverMissed)) unset($RestEverMissed);		
		}
		if (isset($row['8HowOftenMissRest']))
		{		
			$HowOftenMissRest = $row['8HowOftenMissRest']; if (empty($HowOftenMissRest)) unset($HowOftenMissRest);		
		}
		if (isset($row['8ExtraHourPay']))
		{		
			$ExtraHourPay = $row['8ExtraHourPay']; if (empty($ExtraHourPay)) unset($ExtraHourPay);		
		}
		if (isset($row['9BagsChecksYesNo']))
		{		
			$BagsChecksYesNo = $row['9BagsChecksYesNo']; if (empty($BagsChecksYesNo)) unset($BagsChecksYesNo);		
		}
		if (isset($row['9BagsCheckedEverytimeLeaving']))
		{		
			$BagsCheckedEverytimeLeaving = $row['9BagsCheckedEverytimeLeaving']; if (empty($BagsCheckedEverytimeLeaving)) unset($BagsCheckedEverytimeLeaving);		
		}
		if (isset($row['9BagsCheckedWait']))
		{		
			$BagsCheckedWait = $row['9BagsCheckedWait']; if (empty($BagsCheckedWait)) unset($BagsCheckedWait);		
		}
		if (isset($row['9BagsCheckedDuration']))
		{		
			$BagsCheckedDuration = $row['9BagsCheckedDuration']; if (empty($BagsCheckedDuration)) unset($BagsCheckedDuration);
		}
		if (isset($row['10EverWorkClosingShift']))
		{		
			$EverWorkClosingShift = $row['10EverWorkClosingShift']; if (empty($EverWorkClosingShift)) unset($EverWorkClosingShift);	
		}
		if (isset($row['10WaitForMgrToPhysicallyAfterClockedOut']))
		{		
			$WaitForMgrToPhysicallyAfterClockedOut = $row['10WaitForMgrToPhysicallyAfterClockedOut']; if (empty($WaitForMgrToPhysicallyAfterClockedOut)) unset($WaitForMgrToPhysicallyAfterClockedOut);		
		}
		if (isset($row['10HowLongWaitToLeave']))
		{		
			$HowLongWaitToLeave = $row['10HowLongWaitToLeave']; if (empty($HowLongWaitToLeave)) unset($HowLongWaitToLeave);		
		}
		if (isset($row['11EverWorkOffClock']))
		{		
			$EverWorkOffClock = $row['11EverWorkOffClock']; if (empty($EverWorkOffClock)) unset($EverWorkOffClock);		
		}
		if (isset($row['11OffClockMinutesPerWeek']))
		{		
			$OffClockMinutesPerWeek = $row['11OffClockMinutesPerWeek']; if (empty($OffClockMinutesPerWeek)) unset($OffClockMinutesPerWeek);		
		}
		if (isset($row['11EverNotPaidOT']))
		{		
			$EverNotPaidOT = $row['11EverNotPaidOT']; if (empty($EverNotPaidOT)) unset($EverNotPaidOT);		
		}
		if (isset($row['12TermType']))
		{		
			$TermType = $row['12TermType']; if (empty($TermType)) unset($TermType);		
		}
		if (isset($row['12SeventyTwoHoursOrLess']))
		{		
			$SeventyTwoHoursOrLess = $row['12SeventyTwoHoursOrLess']; if (empty($SeventyTwoHoursOrLess)) unset($SeventyTwoHoursOrLess);		
		}
		if (isset($row['12DidYouGetFinalCheckOnLastDay']))
		{		
			$DidYouGetFinalCheckOnLastDay = $row['12DidYouGetFinalCheckOnLastDay']; if (empty($DidYouGetFinalCheckOnLastDay)) unset($DidYouGetFinalCheckOnLastDay);		
		}
		if (isset($row['12HowLongAfterTermRecieveCheckGreaterThan72']))
		{		
			$HowLongAfterTermRecieveCheckGreaterThan72 = $row['12HowLongAfterTermRecieveCheckGreaterThan72']; if (empty($HowLongAfterTermRecieveCheckGreaterThan72)) unset($HowLongAfterTermRecieveCheckGreaterThan72);		
		}
		if (isset($row['12SeventyTwoHoursOrLess']))
		{		
			$SeventyTwoHoursOrLess = $row['12SeventyTwoHoursOrLess']; if (empty($SeventyTwoHoursOrLess)) unset($SeventyTwoHoursOrLess);		
		}
		if (isset($row['12HowLongAfterTermRecieveCheckGreaterThan72']))
		{		
			$HowLongAfterTermRecieveCheckGreaterThan72 = $row['12HowLongAfterTermRecieveCheckGreaterThan72']; if (empty($HowLongAfterTermRecieveCheckGreaterThan72)) unset($HowLongAfterTermRecieveCheckGreaterThan72);		
		}
		if (isset($row['14DidYourJobRequireStanding']))
		{		
			$DidYourJobRequireStanding = $row['14DidYourJobRequireStanding']; if (empty($DidYourJobRequireStanding)) unset($DidYourJobRequireStanding);		
		}
		if (isset($row['14PermittedToSit']))
		{		
			$PermittedToSit = $row['14PermittedToSit']; if (empty($PermittedToSit)) unset($PermittedToSit);		
		}
		if (isset($row['14PermittedToSitYesHoursUntilSit']))
		{		
			$PermittedToSitYesHoursUntilSit = $row['14PermittedToSitYesHoursUntilSit']; if (empty($PermittedToSitYesHoursUntilSit)) unset($PermittedToSitYesHoursUntilSit);		
		}
		if (isset($row['14Consequences']))
		{		
			$Consequences = $row['14Consequences']; if (empty($Consequences)) unset($Consequences);
		}
		if (isset($row['14SittingWouldInterfere']))
		{		
			$SittingWouldInterfere = $row['14SittingWouldInterfere']; if (empty($SittingWouldInterfere)) unset($SittingWouldInterfere);
		}
		if (isset($row['HouseHoldCount']))
		{		
			$HouseHoldCount = $row['HouseHoldCount']; if (empty($HouseHoldCount)) unset($HouseHoldCount);		
		}
		if (isset($row['GrossIncome']))
		{		
			$GrossIncome = $row['GrossIncome']; if (empty($GrossIncome)) unset($GrossIncome);
		}
		
		if (isset($row['CashierEver']))
		{		
			$CashierEver = $row['CashierEver']; if (empty($CashierEver)) unset($CashierEver);
		}
	}

##1LocCity2

?>