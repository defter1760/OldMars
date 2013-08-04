  <?PHP 
  		$cityName = array(        
        	"Other",
            "Antioch - County East Mall",
            "Arcadia - Santa Anita",
            "Bakersfield - Valley Plaza",
            "Brea - Brea Mall",
            "Burbank - Burbank Town Center",
            "Canoga Park - Topanga",
            "Capitola - Capitola Mall",
            "Carlsbad - Plaza Camino Real",
            "Cerritos - Los Cerritos Center",
            "Chula Vista - Chula Vista Center",
            "Chula Vista - Otay Ranch Town Center",
            "Citrus Heights - Sunrise Mall",
            "City of Industry - Puente Hills Mall",
            "Concord - Sunvalley Shopping Center",
            "Corte Madera - Village at Corte Madera",
            "Costa Mesa - South Coast Plaza",
            "Culver City - Fox Hills",
            "Cupertino - Cupertino Square Mall",
            "Daly City - Serramonte",
            "Downey - Stonewood Center",
            "El Cajon - Parkway",
            "El Centro - Imperial Valley Mall",
            "Escondido - North County Fair",
            "Fairfield - Solano",
            "Fresno - Furniture",
            "Fresno - Salano",
            "Fresno - Shops at River Park",
            "Glendale - Glendale Galleria",
            "Hayward - Southland Mall",
            "Irvine - Irvine Spectrum",
            "La Mesa - Grossmont Shopping Center",
            "Laguna Hills - Laguna Hills",
            "Lakewood - Lakewood Center",
            "Los Angeles - Baldwin Hills Crenshaw Plaza",
            "Los Angeles - Beverly Center",
            "Los Angeles - Broadway Plaza",
            "Los Angeles - Century City",
            "Los Angeles - Eagle Rock Plaza",
            "Los Angeles - Westside Pavilion",
            "Manhattan Beach - Manhattan Beach",
            "Mission Viejo - Mission Viejo Mall",
            "Modesto - Vintage Faire",
            "Montclair - Montclair Plaza",
            "Montebello - Montebello Town Center",
            "Monterey - Monterey Furniture",
            "Moreno Valley - Moreno Valley Mall",
            "Newark - NewPark Mall",
            "Newport Beach - Fashion Island",
            "North Hollywood - Laurel Plaza",
            "Northridge - Northridge Fashion Center",
            "Novato - Navato Furniture",
            "Palm Desert - Palm Desert",
            "Palmdale - Antelope Valley Mall",
            "Palo Alto - Stanford Shopping Center",
            "Pasadena - Pasadena",
            "Pasadena - Paseo Colorado",
            "Pleasanton - Pleasanton Furniture",
            "Pleasanton - Stoneridge Shopping Center",
            "Rancho Cucamonga - Victoria Gardens",
            "Redding - Mt. Shasta Mall",
            "Redondo Beach - South Bay Galleria",
            "Richmond - Hilltop",
            "Riverside - Galleria at Tyler",
            "Roseville - Galleria at Roseville",
            "Roseville - Roseville Furniture",
            "Sacramento - Arden Fair",
            "Sacramento - Country Club Plaza",
            "Sacramento - Downtown Plaza",
            "Sacramento - Galleria at Roseville",
            "Sacramento - Roseville Furniture",
            "Salinas - Del Monte Center",
            "Salinas - Monterey Furniture",
            "Salinas - Northridge Furniture",
            "San Bernardino - Inland Center",
            "San Diego - Fashion Valley",
            "San Diego - Horton Plaza",
            "San Diego - Misson Valley",
            "San Diego - University Town Center",
            "San Francisco - Stonestown Galleria",
            "San Francisco - Union Square",
            "San Leandro - Bay Fair",
            "San Jose - Eastridge",
            "San Jose - Oakridge",
            "San Mateo - Hillsdale Furniture",
            "San Mateo - Hillsdale Shopping Center",
            "San Rafael - Mall at Northgate",
            "Santa Ana - MainPlace",
            "Santa Barbara - La Cumbre Plaza",
            "Santa Barbara - Paseo Nuevo",
            "Santa Clara - Valley Fair",
            "Santa Clarita - Valencia Town Center",
            "Santa Maria - Santa Maria Town Center",
            "Santa Rosa - Coddingtown Mall",
            "Santa Rosa - Santa Rosa Mall",
            "Sherman Oaks - Fashion Square",
            "Simi Valley - Simi Valley Town Center",
            "Stockton - Sherwood Mall",
            "Sunnyvale - Sunnyvale Town Center",
            "Temecula - Promenade in Temecula",
            "Thousand Oaks - The Oaks",
            "Tracy - West Valley Mall",
            "Torrance - Del Amo Fashion Center",
            "Union City - Union City Furniture Clearance",
            "Ventura - Pacific View",
            "Visalia - Visalia Mall",
            "Walnut Creek - Broadway Plaza",
            "West Covina - West Covina",
            "Westminster - Westminster Mall",
            "Woodland Hills - Promenade"
            ); 
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
	$recentPositionExplain = $row['recentPositionExplain'];
	$LocCity = $row['1LocCity']; 
	$LocCity2 = $row['1LocCity2']; 
	$EmployeeHourly = $row['EmployeeHourly']; 
	$PaidExplain = $row['PaidExplain']; 
	$CurrentlyEmployed = $row['4CurrentlyEmployed']; 
	$startdaymonth = $row['startdaymonth']; 
	$startdayyear = $row['startdayyear']; 
	$formerlastdaymonth = $row['formerlastdaymonth']; 
	$formerlastdayyear = $row['formerlastdayyear']; 
	$identifypeople = $row['identifypeople']; 
	
	/*session3*/
	$Category1 = $row['Category1'];
	$Category = $row['4Category']; 
	$Cat1MealBreakWaived = $row['7Cat1MealBreakWaived']; 
	$MealWhenWorkingBetween5and6hours = $row['7MealWhenWorkingBetween5and6hours']; 
	$MealBreakMissedCat1Freq = $row['7MealBreakMissedCat1Freq']; 
	$MealBreakMissedCat1Why = $row['7MealBreakMissedCat1Why']; 
	$missMealBreakrExplain = $row['missMealBreakrExplain']; 
	$EverMoreThan10 = $row['7EverMoreThan10']; 
	$Cat3DidGetSecondMealBreak = $row['7Cat3DidGetSecondMealBreak']; 
	$Cat3Missed2ndMealBreakOften = $row['7Cat3Missed2ndMealBreakOften']; 
	$Cat3Missed2ndMealDidntWaivMealWorkedMoreThan10RecievedExtraHourPay = $row['7Cat3Missed2ndMealDidntWaivMealWorkedMoreThan10RecievedExtraHourPay']; 
	$session3Explain = $row['session3Explain'];
	
	/*session4*/
	$RestEverMissed1 = $row['RestEverMissed1'];
	$RestEverMissed = $row['8RestEverMissed']; 
	$HowOftenMissRest = $row['8HowOftenMissRest']; 
	$WhyMiss10MinRest = $row['8WhyMiss10MinRest']; 
	$missRestBreakExplain = $row['missRestBreakExplain']; 
	$ExtraHourPay = $row['8ExtraHourPay']; 
	$session4Explain = $row['session4Explain']; 
	
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
	$afterBeforeClockExplain = $row['afterBeforeClockExplain']; 
	$offClockHour = $row['offClockHour']; 
	$offClockMinute = $row['offClockMinute']; 
	$session5Explain = $row['session5Explain'];   
    
	/*session6*/
	$TermType1 = $row['TermType1'];
	$TermType = $row['12TermType']; 
	$SeventyTwoHoursOrLess = $row['12SeventyTwoHoursOrLess']; 
	$DidYouGetFinalCheckOnLastDay = $row['12DidYouGetFinalCheckOnLastDay']; 
	$withoutSeventyTwoHoursOrLess = $row['12withoutSeventyTwoHoursOrLess'];	
	$HowLongAfterTermRecieveCheckGreaterThan72 = $row['12HowLongAfterTermRecieveCheckGreaterThan72'];
	$finalcheckincludeallcommissions = $row['finalcheckincludeallcommissions']; 
	$howlongdidittakeformacystopayallcommissions = $row['howlongdidittakeformacystopayallcommissions']; 
	$session6Explain = $row['session6Explain']; 

	/*session7*/
	$DidYourJobRequireStanding1 = $row['DidYourJobRequireStanding1'];
	$DidYourJobRequireStanding = $row['14DidYourJobRequireStanding']; 
	$PermittedToSit = $row['14PermittedToSit']; 
	$timeBeforeSitHour = $row['timeBeforeSitHour']; 
	$timeBeforeSitMinute = $row['timeBeforeSitMinute'];		
	$Consequences = $row['14Consequences'];
	$jobListSeated = $row['jobListSeated']; 
	$SittingWouldInterfere = $row['14SittingWouldInterfere']; 
	$jobSeatedExplain = $row['jobSeatedExplain']; 
	$session7Explain = $row['session7Explain']; 
	
	/*session9*/
	$needssase = $row['needssase'];
	$HouseHoldCount1 = $row['HouseHoldCount1']; 
	$HouseHoldCount = $row['HouseHoldCount']; 
	$HouseHoldCount = $row['timeBeforeSitHour']; 
	$GrossIncome = $row['GrossIncome'];		

	?>