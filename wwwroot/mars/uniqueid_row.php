<?PHP
$query = "SELECT * FROM Status WHERE uniqueid='$uniqueid'";
$results = sqlsrv_query($conn,$query);

	while($row = sqlsrv_fetch_array($results))
	{
		$donotcontact = $row['donotcontact']; if (empty($donotcontact)) unset($donotcontact);
		$barcode = $row['barcode']; if (empty($barcode)) unset($barcode);
		$addressisundeliverable = $row['addressisundeliverable']; if (empty($addressisundeliverable)) unset($addressisundeliverable);
		$addressisundeliverabledate = $row['addressisundeliverabledate']; if (empty($addressisundeliverabledate)) unset($addressisundeliverabledate);
		$addressisundeliverableweek = $row['addressisundeliverableweek']; if (empty($addressisundeliverableweek)) unset($addressisundeliverableweek);
		$addressisundeliverablemonth = $row['addressisundeliverablemonth']; if (empty($addressisundeliverablemonth)) unset($addressisundeliverablemonth);
		$authsentviamail = $row['authsentviamail']; if (empty($authsentviamail)) unset($authsentviamail);
		$authsentviamail2 = $row['authsentviamail2']; if (empty($authsentviamail2)) unset($authsentviamail2);
		$feewaiversentviamail = $row['feewaiversentviamail']; if (empty($feewaiversentviamail)) unset($feewaiversentviamail);
		$authsentviamaildate = $row['authsentviamaildate']; if (empty($authsentviamaildate)) unset($authsentviamaildate);
		$authsentviamaildate2 = $row['authsentviamaildate2']; if (empty($authsentviamaildate2)) unset($authsentviamaildate2);
		$feewaiversentviamaildate = $row['feewaiversentviamaildate']; if (empty($feewaiversentviamaildate)) unset($feewaiversentviamaildate);
		$retainersentviamail = $row['retainersentviamail']; if (empty($retainersentviamail)) unset($retainersentviamail);
		$retainersentviamaildate = $row['retainersentviamaildate']; if (empty($retainersentviamaildate)) unset($retainersentviamaildate);
		$feewaivertomailroomdate = $row['feewaivertomailroomdate']; if (empty($feewaivertomailroomdate)) unset($feewaivertomailroomdate);
		$authtomailroomdate = $row['authtomailroomdate']; if (empty($authtomailroomdate)) unset($authtomailroomdate);
		$authtomailroomdate2 = $row['authtomailroomdate2']; if (empty($authtomailroomdate2)) unset($authtomailroomdate2);
		$retainertomailroomdate = $row['retainertomailroomdate']; if (empty($retainertomailroomdate)) unset($retainertomailroomdate);
		$retainertomailroom = $row['retainertomailroom']; if (empty($retainertomailroom)) unset($retainertomailroom);
		$authtomailroom = $row['authtomailroom']; if (empty($authtomailroom)) unset($authtomailroom);
		$authtomailroom2 = $row['authtomailroom2']; if (empty($authtomailroom2)) unset($authtomailroom2);	
		$feewaivertomailroom = $row['feewaivertomailroom']; if (empty($feewaivertomailroom)) unset($feewaivertomailroom);
		$feewaiverisrejected = $row['feewaiverisrejected']; if (empty($feewaiverisrejected)) unset($feewaiverisrejected);
		$authisrejected = $row['authisrejected']; if (empty($authisrejected)) unset($authisrejected);
		$authisrejected2 = $row['authisrejected2']; if (empty($authisrejected2)) unset($authisrejected2);
		$retainerisrejected = $row['retainerisrejected']; if (empty($retainerisrejected)) unset($retainerisrejected);
		$feewaiversent = $row['feewaiversent']; if (empty($feewaiversent)) unset($feewaiversent);
		$feewaiveraccept = $row['feewaiveraccept']; if (empty($feewaiveraccept)) unset($feewaiveraccept);
		$feewaiveracceptdate = $row['feewaiveracceptdate']; if (empty($feewaiveracceptdate)) unset($feewaiveracceptdate);
		$feewaiveracceptmonth = $row['feewaiveracceptmonth']; if (empty($feewaiveracceptmonth)) unset($feewaiveracceptmonth);
		$feewaiveracceptweek = $row['feewaiveracceptweek']; if (empty($feewaiveracceptweek)) unset($feewaiveracceptweek);
		$feewaiverlastrejectdate = $row['feewaiverlastrejectdate']; if (empty($feewaiverlastrejectdate)) unset($feewaiverlastrejectdate);
		$feewaiverreceived = $row['feewaiverreceived']; if (empty($feewaiverreceived)) unset($feewaiverreceived);
		$feewaiverreceiveddate = $row['feewaiverreceiveddate']; if (empty($feewaiverreceiveddate)) unset($feewaiverreceiveddate);
		$feewaiverreceivedmonth = $row['feewaiverreceivedmonth']; if (empty($feewaiverreceivedmonth)) unset($feewaiverreceivedmonth);
		$feewaiverreceivedweek = $row['feewaiverreceivedweek']; if (empty($feewaiverreceivedweek)) unset($feewaiverreceivedweek);
		
		$DeclinedToSignFeeWaiver = $row['DeclinedToSignFeeWaiver']; if (empty($DeclinedToSignFeeWaiver)) unset($DeclinedToSignFeeWaiver);
		$DeclinedToSignFeeWaiverDate = $row['DeclinedToSignFeeWaiverDate']; if (empty($DeclinedToSignFeeWaiverDate)) unset($DeclinedToSignFeeWaiverDate);
		$DeclinedToSignFeeWaiverMonth = $row['DeclinedToSignFeeWaiverMonth']; if (empty($DeclinedToSignFeeWaiverMonth)) unset($DeclinedToSignFeeWaiverMonth);
		$DeclinedToSignFeeWaiverWeek = $row['DeclinedToSignFeeWaiverWeek']; if (empty($DeclinedToSignFeeWaiverWeek)) unset($DeclinedToSignFeeWaiverWeek);
		
		$feewaiverrejectlog = $row['feewaiverrejectlog']; if (empty($feewaiverrejectlog)) unset($feewaiverrejectlog);
		$feewaiversentdate = $row['feewaiversentdate']; if (empty($feewaiversentdate)) unset($feewaiversentdate);
		$feewaiversentmonth = $row['feewaiversentmonth']; if (empty($feewaiversentmonth)) unset($feewaiversentmonth);
		$feewaiversentweek = $row['feewaiversentweek']; if (empty($feewaiversentweek)) unset($feewaiversentweek);
		$authrejectlog = $row['authrejectlog']; if (empty($authrejectlog)) unset($authrejectlog);
		$authformsentdate = $row['authformsentdate']; if (empty($authformsentdate)) unset($authformsentdate);
		$authformsentmonth = $row['authformsentmonth']; if (empty($authformsentmonth)) unset($authformsentmonth);
		$authformsentweek = $row['authformsentweek']; if (empty($authformsentweek)) unset($authformsentweek);	
		$authaccept = $row['authaccept']; if (empty($authaccept)) unset($authaccept);
		$authacceptdate = $row['authacceptdate']; if (empty($authacceptdate)) unset($authacceptdate);
		$authacceptmonth = $row['authacceptmonth']; if (empty($authacceptmonth)) unset($authacceptmonth);
		$authacceptweek = $row['authacceptweek']; if (empty($authacceptweek)) unset($authacceptweek);
		$authrejectlog2 = $row['authrejectlog2']; if (empty($authrejectlog2)) unset($authrejectlog2);
		$authformsentdate2 = $row['authformsentdate2']; if (empty($authformsentdate2)) unset($authformsentdate2);
		$authformsentmonth2 = $row['authformsentmonth2']; if (empty($authformsentmonth2)) unset($authformsentmonth2);
		$authformsentweek2 = $row['authformsentweek2']; if (empty($authformsentweek2)) unset($authformsentweek2);	
		$authaccept2 = $row['authaccept2']; if (empty($authaccept2)) unset($authaccept2);
		$authacceptdate2 = $row['authacceptdate2']; if (empty($authacceptdate2)) unset($authacceptdate2);
		$authacceptmonth2 = $row['authacceptmonth2']; if (empty($authacceptmonth2)) unset($authacceptmonth2);
		$authacceptweek2 = $row['authacceptweek2']; if (empty($authacceptweek2)) unset($authacceptweek2);
		$retaineraccept = $row['retainerrejectlog']; if (empty($retaineraccept)) unset($retaineraccept);
		$retaineracceptdate = $row['retaineracceptdate']; if (empty($retaineracceptdate)) unset($retaineracceptdate);
		$retaineraccept = $row['retaineraccept']; if (empty($retaineraccept)) unset($retaineraccept);
		$retaineracceptmonth = $row['retaineracceptmonth']; if (empty($retaineracceptmonth)) unset($retaineracceptmonth);
		$retaineracceptweek = $row['retaineracceptweek']; if (empty($retaineracceptweek)) unset($retaineracceptweek);
		$retainerlastrejectdate = $row['retainerlastrejectdate']; if (empty($retainerlastrejectdate)) unset($retainerlastrejectdate);
		$retainerrejectlog = $row['retainerrejectlog']; if (empty($retainerrejectlog)) unset($retainerrejectlog);
		$authformsent = $row['authformsent']; if (empty($authformsent)) unset($authformsent);
		$authformsent2 = $row['authformsent2']; if (empty($authformsent2)) unset($authformsent2);
		$retaineraccepted = $row['retaineraccepted']; if (empty($retaineraccepted)) unset($retaineraccepted);
		$authformreceived = $row['authformreceived']; if (empty($authformreceived)) unset($authformreceived);
		$authformreceived2 = $row['authformreceived2']; if (empty($authformreceived2)) unset($authformreceived2);
		$retainerRecieved = $row['retainerRecieved']; if (empty($retainerRecieved)) unset($retainerRecieved);
		$feewaiverreceived = $row['feewaiverreceived']; if (empty($feewaiverreceived)) unset($feewaiverreceived);
		$completedlongformonline = $row['completedlongformonline']; if (empty($completedlongformonline)) unset($completedlongformonline);
		$FirstName = $row['FirstName']; if (empty($FirstName)) unset($FirstName);
		$LastName = $row['LastName']; if (empty($LastName)) unset($LastName);
		$email = $row['email']; if (empty($email)) unset($email);
		$brandid = $row['brandid']; if (empty($brandid)) unset($brandid);
		$brand = $row['brand']; if (empty($brand)) unset($brand);
		$phone1 = $row['phone1']; if (empty($phone1)) unset($phone1);
		$phone2 = $row['phone2']; if (empty($phone2)) unset($phone2);
		$Street1 = $row['Street1']; if (empty($Street1)) unset($Street1);
		$Street2 = $row['Street2']; if (empty($Street2)) unset($Street2);
		$City = $row['City']; if (empty($City)) unset($City);
		$State = $row['State']; if (empty($State)) unset($State);
		$Zipcode = $row['Zipcode']; if (empty($Zipcode)) unset($Zipcode);
		$agentlname = $row['agentlname']; if (empty($agentlname)) unset($agentlname);
		$time = $row['time']; if (empty($time)) unset($time);
		$tenantid = $row['tenantid']; if (empty($tenantid)) unset($tenantid);
		$shortcoworkerinfo = $row['shortcoworkerinfo']; if (empty($shortcoworkerinfo)) unset($shortcoworkerinfo);
		$areyoucurrentmacysemployee = $row['areyoucurrentmacysemployee']; if (empty($areyoucurrentmacysemployee)) unset($areyoucurrentmacysemployee);
		$authformreceived = $row['authformreceived']; if (empty($authformreceived)) unset($authformreceived);
		$authformreceiveddate = $row['authformreceiveddate']; if (empty($authformreceiveddate)) unset($authformreceiveddate);
		$authformreceivedmonth = $row['authformreceivedmonth']; if (empty($authformreceivedmonth)) unset($authformreceivedmonth);
		$authformreceivedweek = $row['authformreceivedweek']; if (empty($authformreceivedweek)) unset($authformreceivedweek);
		
		$authformreceived2 = $row['authformreceived2']; if (empty($authformreceived2)) unset($authformreceived2);
		$authformreceiveddate2 = $row['authformreceiveddate2']; if (empty($authformreceiveddate2)) unset($authformreceiveddate2);
		$authformreceivedmonth2 = $row['authformreceivedmonth2']; if (empty($authformreceivedmonth2)) unset($authformreceivedmonth2);
		$authformreceivedweek2 = $row['authformreceivedweek2']; if (empty($authformreceivedweek2)) unset($authformreceivedweek2);
		
		$DeclinedToSignAuthorization = $row['DeclinedToSignAuthorization']; if (empty($DeclinedToSignAuthorization)) unset($DeclinedToSignAuthorization);
		$DeclinedToSignAuthorizationDate = $row['DeclinedToSignAuthorizationDate']; if (empty($DeclinedToSignAuthorizationDate)) unset($DeclinedToSignAuthorizationDate);
		$DeclinedToSignAuthorizationMonth = $row['DeclinedToSignAuthorizationMonth']; if (empty($DeclinedToSignAuthorizationMonth)) unset($DeclinedToSignAuthorizationMonth);
		$DeclinedToSignAuthorizationWeek = $row['DeclinedToSignAuthorizationWeek']; if (empty($DeclinedToSignAuthorizationWeek)) unset($DeclinedToSignAuthorizationWeek);
		
		$DeclinedToSignAuthorization2 = $row['DeclinedToSignAuthorization2']; if (empty($DeclinedToSignAuthorization2)) unset($DeclinedToSignAuthorization2);
		$DeclinedToSignAuthorizationDate2 = $row['DeclinedToSignAuthorizationDate2']; if (empty($DeclinedToSignAuthorizationDate2)) unset($DeclinedToSignAuthorizationDate2);
		$DeclinedToSignAuthorizationMonth2 = $row['DeclinedToSignAuthorizationMonth2']; if (empty($DeclinedToSignAuthorizationMonth2)) unset($DeclinedToSignAuthorizationMonth2);
		$DeclinedToSignAuthorizationWeek2 = $row['DeclinedToSignAuthorizationWeek2']; if (empty($DeclinedToSignAuthorizationWeek2)) unset($DeclinedToSignAuthorizationWeek2);
		
		$authnote = $row['authnote']; if (empty($authnote)) unset($authnote);
		$authstatus = $row['authstatus']; if (empty($authstatus)) unset($authstatus);
		$authstatustime = $row['authstatustime']; if (empty($authstatustime)) unset($authstatustime);
		
		$authnote2 = $row['authnote2']; if (empty($authnote2)) unset($authnote2);
		$authstatus2 = $row['authstatus2']; if (empty($authstatus2)) unset($authstatus2);
		$authstatustime2 = $row['authstatustime2']; if (empty($authstatustime2)) unset($authstatustime2);
		
		$caseid = $row['caseid']; if (empty($caseid)) unset($caseid);
		$completedlongformonline = $row['completedlongformonline']; if (empty($completedlongformonline)) unset($completedlongformonline);
		$completedonline = $row['completedonline']; if (empty($completedonline)) unset($completedonline);
		$currentstatus = $row['currentstatus']; if (empty($currentstatus)) unset($currentstatus);
		$interviewstartmonthyear = $row['interviewstartmonthyear']; if (empty($interviewstartmonthyear)) unset($interviewstartmonthyear);
		$interviewstarttime = $row['interviewstarttime']; if (empty($interviewstarttime)) unset($interviewstarttime);
		$interviewstartweek = $row['interviewstartweek']; if (empty($interviewstartweek)) unset($interviewstartweek);
		$ip = $row['ip']; if (empty($ip)) unset($ip);
		$longcoworkerinfo = $row['longcoworkerinfo']; if (empty($longcoworkerinfo)) unset($longcoworkerinfo);
		$noteadd = $row['noteadd']; if (empty($noteadd)) unset($noteadd);
		$noteadddate = $row['noteadddate']; if (empty($noteadddate)) unset($noteadddate);
		$notelog = $row['notelog']; if (empty($notelog)) unset($notelog);
		$notqualified = $row['notqualified']; if (empty($notqualified)) unset($notqualified);
		$notqualifiedreason = $row['notqualifiedreason']; if (empty($notqualifiedreason)) unset($notqualifiedreason);
		
		$notqualified_retained = $row['notqualified_retained']; if (empty($notqualified_retained)) unset($notqualified_retained);
		$attorneyInfo = $row['attorneyInfo']; if (empty($attorneyInfo)) unset($attorneyInfo);
		$additionalInfo = $row['additionalInfo']; if (empty($additionalInfo)) unset($additionalInfo);
		
		$onlinecompleteday = $row['onlinecompleteday']; if (empty($onlinecompleteday)) unset($onlinecompleteday);
		$onlinecompletemonth = $row['onlinecompletemonth']; if (empty($onlinecompletemonth)) unset($onlinecompletemonth);
		$onlinecompleteweek = $row['onlinecompleteweek']; if (empty($onlinecompletetime)) unset($onlinecompletetime);
		$onlinecompleteweek = $row['onlinecompleteweek']; if (empty($onlinecompleteweek)) unset($onlinecompleteweek);
		$reachedretainerdiscussion = $row['reachedretainerdiscussion']; if (empty($reachedretainerdiscussion)) unset($reachedretainerdiscussion);
		$retainercountersignsent = $row['retainercountersignsent']; if (empty($retainercountersignsent)) unset($retainercountersignsent);
		$retainercountersignsentdate = $row['retainercountersignsentdate']; if (empty($retainercountersignsentdate)) unset($retainercountersignsentdate);
		$retainercountersignsentmonth = $row['retainercountersignsentmonth']; if (empty($retainercountersignsentmonth)) unset($retainercountersignsentmonth);
		$retainercountersignsentweek = $row['retainercountersignsentweek']; if (empty($retainercountersignsentweek)) unset($retainercountersignsentweek);
		$retainernote = $row['retainernote']; if (empty($retainernote)) unset($retainernote);
		$retainerRecieved = $row['retainerRecieved']; if (empty($retainerRecieved)) unset($retainerRecieved);
		$retainerRecievedDate = $row['retainerRecievedDate']; if (empty($retainerRecievedDate)) unset($retainerRecievedDate);
		$retainerRecievedMonth = $row['retainerRecievedMonth']; if (empty($retainerRecievedMonth)) unset($retainerRecievedMonth);
		$retainerRecievedWeek = $row['retainerRecievedWeek']; if (empty($retainerRecievedWeek)) unset($retainerRecievedWeek);
		
		$DeclinedToSignRetainer = $row['DeclinedToSignRetainer']; if (empty($DeclinedToSignRetainer)) unset($DeclinedToSignRetainer);
		$DeclinedToSignRetainerDate = $row['DeclinedToSignRetainerDate']; if (empty($DeclinedToSignRetainerDate)) unset($DeclinedToSignRetainerDate);
		$DeclinedToSignRetainerMonth = $row['DeclinedToSignRetainerMonth']; if (empty($DeclinedToSignRetainerMonth)) unset($DeclinedToSignRetainerMonth);
		$DeclinedToSignRetainerWeek = $row['DeclinedToSignRetainerWeek']; if (empty($DeclinedToSignRetainerWeek)) unset($DeclinedToSignRetainerWeek);
		
		$retainerSent = $row['retainerSent']; if (empty($retainerSent)) unset($retainerSent);
		$retainerSentDate = $row['retainerSentDate']; if (empty($retainerSentDate)) unset($retainerSentDate);
		$retainerSentMonth = $row['retainerSentMonth']; if (empty($retainerSentMonth)) unset($retainerSentMonth);
		$retainerSentWeek = $row['retainerSentWeek']; if (empty($retainerSentWeek)) unset($retainerSentWeek);
		$retainerstatus = $row['retainerstatus']; if (empty($retainerstatus)) unset($retainerstatus);
		$retainerstatustime = $row['retainerstatustime']; if (empty($retainerstatustime)) unset($retainerstatustime);
		$shortanythingelse = $row['shortanythingelse']; if (empty($shortanythingelse)) unset($shortanythingelse);
		$shortcheck10 = $row['shortcheck10']; if (empty($shortcheck10)) unset($shortcheck10);
		$shortcheck1 = $row['shortcheck1']; if (empty($shortcheck1)) unset($shortcheck1);
		$shortcheck2 = $row['shortcheck2']; if (empty($shortcheck2)) unset($shortcheck2);
		$shortcheck3 = $row['shortcheck3']; if (empty($shortcheck3)) unset($shortcheck3);
		$shortcheck4 = $row['shortcheck4']; if (empty($shortcheck4)) unset($shortcheck4);
		$shortcheck5 = $row['shortcheck5']; if (empty($shortcheck5)) unset($shortcheck5);
		$shortcheck6 = $row['shortcheck6']; if (empty($shortcheck6)) unset($shortcheck6);
		$shortcheck7 = $row['shortcheck7']; if (empty($shortcheck7)) unset($shortcheck7);
		$shortcheck8 = $row['shortcheck8']; if (empty($shortcheck8)) unset($shortcheck8);
		$shortcheck9 = $row['shortcheck9']; if (empty($shortcheck9)) unset($shortcheck9);
		$currentstatusdate = $row['currentstatusdate']; if (empty($currentstatusdate)) unset($currentstatusdate);
		$date = $row['date']; if (empty($date)) unset($date);
		$demandcreated = $row['demandcreated']; if (empty($demandcreated)) unset($demandcreated);
		$demandcreateddate = $row['demandcreateddate']; if (empty($demandcreateddate)) unset($demandcreateddate);
		$demandcreatedmonth = $row['demandcreatedmonth']; if (empty($demandcreatedmonth)) unset($demandcreatedmonth);
		$demandcreatedweek = $row['demandcreatedweek']; if (empty($demandcreatedweek)) unset($demandcreatedweek);
		$didyouworkatmacysretail = $row['didyouworkatmacysretail']; if (empty($didyouworkatmacysretail)) unset($didyouworkatmacysretail);
		$fax = $row['fax']; if (empty($fax)) unset($fax);
		$interviewcompleteday = $row['interviewcompleteday']; if (empty($interviewcompleteday)) unset($interviewcompleteday);
		$interviewcompletemonthyear = $row['interviewcompletemonthyear']; if (empty($interviewcompletemonthyear)) unset($interviewcompletemonthyear);
		$interviewcompletetime = $row['interviewcompletetime']; if (empty($interviewcompletetime)) unset($interviewcompletetime);
		$interviewcompleteweek = $row['interviewcompleteweek']; if (empty($interviewcompleteweek)) unset($interviewcompleteweek);
		$interviewstartday = $row['interviewstartday']; if (empty($interviewstartday)) unset($interviewstartday);
		$interviewstarted = $row['interviewstarted']; if (empty($interviewstarted)) unset($interviewstarted);
		$declinationlettersent = $row['declinationlettersent']; if (empty($declinationlettersent)) unset($declinationlettersent);
		
			
		$shortFormComplete = $row['shortFormComplete']; if (empty($shortFormComplete)) unset($shortFormComplete);
		$shortFormCompletePhone = $row['shortFormCompletePhone']; if (empty($shortFormCompletePhone)) unset($shortFormCompletePhone);
		$shortFormCompletePhoneDate = $row['shortFormCompletePhoneDate']; if (empty($shortFormCompletePhoneDate)) unset($shortFormCompletePhoneDate);
		$shortFormCompletePhoneMonth = $row['shortFormCompletePhoneMonth']; if (empty($shortFormCompletePhoneMonth)) unset($shortFormCompletePhoneMonth);
		$shortFormCompletePhoneWeek = $row['shortFormCompletePhoneWeek']; if (empty($shortFormCompletePhoneWeek)) unset($shortFormCompletePhoneWeek);
		$shortFormCompleteOnline = $row['shortFormCompleteOnline']; if (empty($shortFormCompleteOnline)) unset($shortFormCompleteOnline);
		$shortFormCompleteOnlineDate = $row['shortFormCompleteOnlineDate']; if (empty($shortFormCompleteOnlineDate)) unset($shortFormCompleteOnlineDate);
		$shortFormCompleteOnlineMonth = $row['shortFormCompleteOnlineMonth']; if (empty($shortFormCompleteOnlineMonth)) unset($shortFormCompleteOnlineMonth);
		$shortFormCompleteOnlineWeek = $row['shortFormCompleteOnlineWeek']; if (empty($shortFormCompleteOnlineWeek)) unset($shortFormCompleteOnlineWeek);
		
		$feewaiverqualified = $row['feewaiverqualified']; if (empty($feewaiverqualified)) unset ($feewaiverqualified);
		$feeWaiverQualifiedDate = $row['feeWaiverQualifiedDate']; if (empty($feeWaiverQualifiedDate)) unset ($feeWaiverQualifiedDate);
		
		$longformcompleteonline = $row['longformcompleteonline']; if (empty($longformcompleteonline)) unset ($longformcompleteonline);
		$longformcompleteonlinedate = $row['longformcompleteonlinedate']; if (empty($longformcompleteonlinedate)) unset ($longformcompleteonlinedate);
		$longformcompleteonlinemonth = $row['longformcompleteonlinemonth']; if (empty($longformcompleteonlinemonth)) unset ($longformcompleteonlinemonth);
		$longformcompleteonlineweek = $row['longformcompleteonlineweek']; if (empty($longformcompleteonlineweek)) unset ($longformcompleteonlineweek);
		$longformcompleteonphone = $row['longformcompleteonphone']; if (empty($longformcompleteonphone)) unset ($longformcompleteonphone);
		$longformcompleteonphonedate = $row['longformcompleteonphonedate']; if (empty($longformcompleteonphonedate)) unset ($longformcompleteonphonedate);
		$longformcompleteonphonemonth = $row['longformcompleteonphonemonth']; if (empty($longformcompleteonphonemonth)) unset ($longformcompleteonphonemonth);
		$longformcompleteonphoneweek = $row['longformcompleteonphoneweek']; if (empty($longformcompleteonphoneweek)) unset ($longformcompleteonphoneweek);
		
		
		$wantstoshare = $row['wantstoshare']; if (empty($wantstoshare)) unset ($wantstoshare);
		
		$attName = $row['attName']; if (empty($attName)) unset ($attName);
		$firmPhone = $row['firmPhone']; if (empty($firmPhone)) unset ($firmPhone);
		$firmName = $row['firmName']; if (empty($firmName)) unset ($firmName);
		$firmCity = $row['firmCity']; if (empty($firmCity)) unset ($firmCity);

		
		$dateofbirthmonth = $row['dateofbirthmonth']; if (empty($dateofbirthmonth)) unset ($dateofbirthmonth);
		$dateofbirthday = $row['dateofbirthday']; if (empty($dateofbirthday)) unset ($dateofbirthday);		
		$dateofbirthyear = $row['dateofbirthyear']; if (empty($dateofbirthyear)) unset ($dateofbirthyear);
#elina's Birthday fieild = dateofbirth		
		$dateofbirth = $row['dateofbirth']; if (empty($dateofbirth)) unset ($dateofbirth);		
	 }
?>