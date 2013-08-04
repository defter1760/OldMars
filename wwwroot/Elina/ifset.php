<?PHP
if (isset($_POST['uniqueid'])) $uniqueid = $_POST['uniqueid']; 
if (isset($_REQUEST['uniqueid'])) $uniqueid = $_REQUEST['uniqueid'];
if (empty($uniqueid)) unset($uniqueid);

if (isset($_POST['donotcontact'])) $donotcontact = $_POST['donotcontact'];
if (isset($_REQUEST['donotcontact'])) $donotcontact = $_REQUEST['donotcontact'];
if (empty($donotcontact)) unset($donotcontact);

if (isset($_POST['barcode'])) $barcode = $_POST['barcode'];
if (isset($_REQUEST['barcode'])) $barcode = $_REQUEST['barcode'];
if (empty($barcode)) unset($barcode);

if (isset($_POST['addressisundeliverable'])) $addressisundeliverable = $_POST['addressisundeliverable'];
if (isset($_REQUEST['addressisundeliverable'])) $addressisundeliverable = $_REQUEST['addressisundeliverable'];
if (empty($addressisundeliverable)) unset($addressisundeliverable);

if (isset($_POST['addressisundeliverabledate'])) $addressisundeliverabledate = $_POST['addressisundeliverabledate'];
if (isset($_REQUEST['addressisundeliverabledate'])) $addressisundeliverabledate = $_REQUEST['addressisundeliverabledate'];
if (empty($addressisundeliverabledate)) unset($addressisundeliverabledate);

if (isset($_POST['addressisundeliverableweek'])) $addressisundeliverableweek = $_POST['addressisundeliverableweek'];
if (isset($_REQUEST['addressisundeliverableweek'])) $addressisundeliverableweek = $_REQUEST['addressisundeliverableweek'];
if (empty($addressisundeliverableweek)) unset($addressisundeliverableweek);

if (isset($_POST['addressisundeliverablemonth'])) $addressisundeliverablemonth = $_POST['addressisundeliverablemonth'];
if (isset($_REQUEST['addressisundeliverablemonth'])) $addressisundeliverablemonth = $_REQUEST['addressisundeliverablemonth'];
if (empty($addressisundeliverablemonth)) unset($addressisundeliverablemonth);

if (isset($_POST['authsentviamail'])) $authsentviamail = $_POST['authsentviamail'];
if (isset($_REQUEST['authsentviamail'])) $authsentviamail = $_REQUEST['authsentviamail'];
if (empty($authsentviamail)) unset($authsentviamail);

if (isset($_POST['feewaiversentviamail'])) $feewaiversentviamail = $_POST['feewaiversentviamail'];
if (isset($_REQUEST['feewaiversentviamail'])) $feewaiversentviamail = $_REQUEST['feewaiversentviamail'];
if (empty($feewaiversentviamail)) unset($feewaiversentviamail);

if (isset($_POST['authsentviamaildate'])) $authsentviamaildate = $_POST['authsentviamaildate'];
if (isset($_REQUEST['authsentviamaildate'])) $authsentviamaildate = $_REQUEST['authsentviamaildate'];
if (empty($authsentviamaildate)) unset($authsentviamaildate);

if (isset($_POST['feewaiversentviamaildate'])) $feewaiversentviamaildate = $_POST['feewaiversentviamaildate'];
if (isset($_REQUEST['feewaiversentviamaildate'])) $feewaiversentviamaildate = $_REQUEST['feewaiversentviamaildate'];
if (empty($feewaiversentviamaildate)) unset($feewaiversentviamaildate);

if (isset($_POST['retainersentviamail'])) $retainersentviamail = $_POST['retainersentviamail'];
if (isset($_REQUEST['retainersentviamail'])) $retainersentviamail = $_REQUEST['retainersentviamail'];
if (empty($retainersentviamail)) unset($retainersentviamail);

if (isset($_POST['retainersentviamaildate'])) $retainersentviamaildate = $_POST['retainersentviamaildate'];
if (isset($_REQUEST['retainersentviamaildate'])) $retainersentviamaildate = $_REQUEST['retainersentviamaildate'];
if (empty($retainersentviamaildate)) unset($retainersentviamaildate);

if (isset($_POST['retainertomailroomdate'])) $retainertomailroomdate = $_POST['retainertomailroomdate'];
if (isset($_REQUEST['retainertomailroomdate'])) $retainertomailroomdate = $_REQUEST['retainertomailroomdate'];
if (empty($retainertomailroomdate)) unset($retainertomailroomdate);

if (isset($_POST['authtomailroomdate'])) $authtomailroomdate = $_POST['authtomailroomdate'];
if (isset($_REQUEST['authtomailroomdate'])) $authtomailroomdate = $_REQUEST['authtomailroomdate'];
if (empty($authtomailroomdate)) unset($authtomailroomdate);

if (isset($_POST['feewaivertomailroomdate'])) $feewaivertomailroomdate = $_POST['feewaivertomailroomdate'];
if (isset($_REQUEST['feewaivertomailroomdate'])) $feewaivertomailroomdate = $_REQUEST['feewaivertomailroomdate'];
if (empty($feewaivertomailroomdate)) unset($feewaivertomailroomdate);

if (isset($_POST['retainertomailroom'])) $retainertomailroom = $_POST['retainertomailroom'];
if (isset($_REQUEST['retainertomailroom'])) $retainertomailroom = $_REQUEST['retainertomailroom'];
if (empty($retainertomailroom)) unset($retainertomailroom);

if (isset($_POST['authtomailroom'])) $authtomailroom = $_POST['authtomailroom'];
if (isset($_REQUEST['authtomailroom'])) $authtomailroom = $_REQUEST['authtomailroom'];
if (empty($authtomailroom)) unset($authtomailroom);

if (isset($_POST['feewaivertomailroom'])) $feewaivertomailroom = $_POST['feewaivertomailroom'];
if (isset($_REQUEST['feewaivertomailroom'])) $feewaivertomailroom = $_REQUEST['feewaivertomailroom'];
if (empty($feewaivertomailroom)) unset($feewaivertomailroom);

if (isset($_POST['retainerisrejected'])) $retainerisrejected = $_POST['retainerisrejected'];
if (isset($_REQUEST['retainerisrejected'])) $retainerisrejected = $_REQUEST['retainerisrejected'];
if (empty($retainerisrejected)) unset($retainerisrejected);

if (isset($_POST['authisrejected'])) $authisrejected = $_POST['authisrejected'];
if (isset($_REQUEST['authisrejected'])) $authisrejected = $_REQUEST['authisrejected'];
if (empty($authisrejected)) unset($authisrejected);

if (isset($_POST['feewaiverisrejected'])) $feewaiverisrejected = $_POST['feewaiverisrejected'];
if (isset($_REQUEST['feewaiverisrejected'])) $feewaiverisrejected = $_REQUEST['feewaiverisrejected'];
if (empty($feewaiverisrejected)) unset($feewaiverisrejected);

if (isset($_POST['feewaiversent'])) $feewaiversent = $_POST['feewaiversent'];
if (isset($_REQUEST['feewaiversent'])) $feewaiversent = $_REQUEST['feewaiversent'];
if (empty($feewaiversent)) unset($feewaiversent);

if (isset($_POST['feewaiveraccept'])) $feewaiveraccept = $_POST['feewaiveraccept'];
if (isset($_REQUEST['feewaiveraccept'])) $feewaiveraccept = $_REQUEST['feewaiveraccept'];
if (empty($feewaiveraccept)) unset($feewaiveraccept);

if (isset($_POST['feewaiveracceptdate'])) $feewaiveracceptdate = $_POST['feewaiveracceptdate'];
if (isset($_REQUEST['feewaiveracceptdate'])) $feewaiveracceptdate = $_REQUEST['feewaiveracceptdate'];
if (empty($feewaiveracceptdate)) unset($feewaiveracceptdate);

if (isset($_POST['feewaiveracceptmonth'])) $feewaiveracceptmonth = $_POST['feewaiveracceptmonth'];
if (isset($_REQUEST['feewaiveracceptmonth'])) $feewaiveracceptmonth = $_REQUEST['feewaiveracceptmonth'];
if (empty($feewaiveracceptmonth)) unset($feewaiveracceptmonth);

if (isset($_POST['feewaiveracceptweek'])) $feewaiveracceptweek = $_POST['feewaiveracceptweek'];
if (isset($_REQUEST['feewaiveracceptweek'])) $feewaiveracceptweek = $_REQUEST['feewaiveracceptweek'];
if (empty($feewaiveracceptweek)) unset($feewaiveracceptweek);

if (isset($_POST['feewaiverlastrejectdate'])) $feewaiverlastrejectdate = $_POST['feewaiverlastrejectdate'];
if (isset($_REQUEST['feewaiverlastrejectdate'])) $feewaiverlastrejectdate = $_REQUEST['feewaiverlastrejectdate'];
if (empty($feewaiverlastrejectdate)) unset($feewaiverlastrejectdate);

if (isset($_POST['feewaiverreceived'])) $feewaiverreceived = $_POST['feewaiverreceived'];
if (isset($_REQUEST['feewaiverreceived'])) $feewaiverreceived = $_REQUEST['feewaiverreceived'];
if (empty($feewaiverreceived)) unset($feewaiverreceived);

if (isset($_POST['feewaiverreceiveddate'])) $feewaiverreceiveddate = $_POST['feewaiverreceiveddate'];
if (isset($_REQUEST['feewaiverreceiveddate'])) $feewaiverreceiveddate = $_REQUEST['feewaiverreceiveddate'];
if (empty($feewaiverreceiveddate)) unset($feewaiverreceiveddate);

if (isset($_POST['feewaiverreceivedmonth'])) $feewaiverreceivedmonth = $_POST['feewaiverreceivedmonth'];
if (isset($_REQUEST['feewaiverreceivedmonth'])) $feewaiverreceivedmonth = $_REQUEST['feewaiverreceivedmonth'];
if (empty($feewaiverreceivedmonth)) unset($feewaiverreceivedmonth);

if (isset($_POST['feewaiverreceivedweek'])) $feewaiverreceivedweek = $_POST['feewaiverreceivedweek'];
if (isset($_REQUEST['feewaiverreceivedweek'])) $feewaiverreceivedweek = $_REQUEST['feewaiverreceivedweek'];
if (empty($feewaiverreceivedweek)) unset($feewaiverreceivedweek);

if (isset($_POST['feewaiverrejectlog'])) $feewaiverrejectlog = $_POST['feewaiverrejectlog'];
if (isset($_REQUEST['feewaiverrejectlog'])) $feewaiverrejectlog = $_REQUEST['feewaiverrejectlog'];
if (empty($feewaiverrejectlog)) unset($feewaiverrejectlog);

if (isset($_POST['feewaiversentdate'])) $feewaiversentdate = $_POST['feewaiversentdate'];
if (isset($_REQUEST['feewaiversentdate'])) $feewaiversentdate = $_REQUEST['feewaiversentdate'];
if (empty($feewaiversentdate)) unset($feewaiversentdate);

if (isset($_POST['feewaiversentmonth'])) $feewaiversentmonth = $_POST['feewaiversentmonth'];
if (isset($_REQUEST['feewaiversentmonth'])) $feewaiversentmonth = $_REQUEST['feewaiversentmonth'];
if (empty($feewaiversentmonth)) unset($feewaiversentmonth);

if (isset($_POST['feewaiversentweek'])) $feewaiversentweek = $_POST['feewaiversentweek'];
if (isset($_REQUEST['feewaiversentweek'])) $feewaiversentweek = $_REQUEST['feewaiversentweek'];
if (empty($feewaiversentweek)) unset($feewaiversentweek);

if (isset($_POST['authrejectlog'])) $authrejectlog = $_POST['authrejectlog'];
if (isset($_REQUEST['authrejectlog'])) $authrejectlog = $_REQUEST['authrejectlog'];
if (empty($authrejectlog)) unset($authrejectlog);

if (isset($_POST['authformsentdate'])) $authformsentdate = $_POST['authformsentdate'];
if (isset($_REQUEST['authformsentdate'])) $authformsentdate = $_REQUEST['authformsentdate'];
if (empty($authformsentdate)) unset($authformsentdate);

if (isset($_POST['authformsentmonth'])) $authformsentmonth = $_POST['authformsentmonth'];
if (isset($_REQUEST['authformsentmonth'])) $authformsentmonth = $_REQUEST['authformsentmonth'];
if (empty($authformsentmonth)) unset($authformsentmonth);

if (isset($_POST['authformsentweek'])) $authformsentweek = $_POST['authformsentweek'];
if (isset($_REQUEST['authformsentweek'])) $authformsentweek = $_REQUEST['authformsentweek'];
if (empty($authformsentweek)) unset($authformsentweek);

if (isset($_POST['authlastrejectdate'])) $authlastrejectdate = $_POST['authlastrejectdate'];
if (isset($_REQUEST['authlastrejectdate'])) $authlastrejectdate = $_REQUEST['authlastrejectdate'];
if (empty($authlastrejectdate)) unset($authlastrejectdate);

if (isset($_POST['authaccept'])) $authaccept = $_POST['authaccept'];
if (isset($_REQUEST['authaccept'])) $authaccept = $_REQUEST['authaccept'];
if (empty($authaccept)) unset($authaccept);

if (isset($_POST['authacceptdate'])) $authacceptdate = $_POST['authacceptdate'];
if (isset($_REQUEST['authacceptdate'])) $authacceptdate = $_REQUEST['authacceptdate'];
if (empty($authacceptdate)) unset($authacceptdate);

if (isset($_POST['authacceptmonth'])) $authacceptmonth = $_POST['authacceptmonth'];
if (isset($_REQUEST['authacceptmonth'])) $authacceptmonth = $_REQUEST['authacceptmonth'];
if (empty($authacceptmonth)) unset($authacceptmonth);

if (isset($_POST['authacceptweek'])) $authacceptweek = $_POST['authacceptweek'];
if (isset($_REQUEST['authacceptweek'])) $authacceptweek = $_REQUEST['authacceptweek'];
if (empty($authacceptweek)) unset($authacceptweek);

if (isset($_POST['retaineraccept'])) $retaineraccept = $_POST['retaineraccept'];
if (isset($_REQUEST['retaineraccept'])) $retaineraccept = $_REQUEST['retaineraccept'];
if (empty($retaineraccept)) unset($retaineraccept);

if (isset($_POST['retaineracceptdate'])) $retaineracceptdate = $_POST['retaineracceptdate'];
if (isset($_REQUEST['retaineracceptdate'])) $retaineracceptdate = $_REQUEST['retaineracceptdate'];
if (empty($retaineracceptdate)) unset($retaineracceptdate);

if (isset($_POST['retaineraccepted'])) $retaineraccepted = $_POST['retaineraccepted'];
if (isset($_REQUEST['retaineraccepted'])) $retaineraccepted = $_REQUEST['retaineraccepted'];
if (empty($retaineraccepted)) unset($retaineraccepted);

if (isset($_POST['retaineracceptmonth'])) $retaineracceptmonth = $_POST['retaineracceptmonth'];
if (isset($_REQUEST['retaineracceptmonth'])) $retaineracceptmonth = $_REQUEST['retaineracceptmonth'];
if (empty($retaineracceptmonth)) unset($retaineracceptmonth);

if (isset($_POST['retaineracceptweek'])) $retaineracceptweek = $_POST['retaineracceptweek'];
if (isset($_REQUEST['retaineracceptweek'])) $retaineracceptweek = $_REQUEST['retaineracceptweek'];
if (empty($retaineracceptweek)) unset($retaineracceptweek);

if (isset($_POST['retainerlastrejectdate'])) $retainerlastrejectdate = $_POST['retainerlastrejectdate'];
if (isset($_REQUEST['retainerlastrejectdate'])) $retainerlastrejectdate = $_REQUEST['retainerlastrejectdate'];
if (empty($retainerlastrejectdate)) unset($retainerlastrejectdate);

if (isset($_POST['retainerrejectlog'])) $retainerrejectlog = $_POST['retainerrejectlog'];
if (isset($_REQUEST['retainerrejectlog'])) $retainerrejectlog = $_REQUEST['retainerrejectlog'];
if (empty($retainerrejectlog)) unset($retainerrejectlog);

if (isset($_POST['Zipcode'])) $Zipcode = $_POST['Zipcode'];
if (isset($_REQUEST['Zipcode'])) $Zipcode = $_REQUEST['Zipcode'];
if (empty($Zipcode)) unset($Zipcode);

if (isset($_POST['time'])) $time = $_POST['time'];
if (isset($_REQUEST['time'])) $time = $_REQUEST['time'];
if (empty($time)) unset($time);

if (isset($_POST['uniqueid'])) $uniqueid = $_POST['uniqueid'];
if (isset($_REQUEST['uniqueid'])) $uniqueid = $_REQUEST['uniqueid'];
if (empty($uniqueid)) unset($uniqueid);

if (isset($_POST['tenantid'])) $tenantid = $_POST['tenantid'];
if (isset($_REQUEST['tenantid'])) $tenantid = $_REQUEST['tenantid'];
if (empty($tenantid)) unset($tenantid);

if (isset($_POST['Street2'])) $Street2 = $_POST['Street2'];
if (isset($_REQUEST['Street2'])) $Street2 = $_REQUEST['Street2'];
if (empty($Street2)) unset($Street2);

if (isset($_POST['Street1'])) $Street1 = $_POST['Street1'];
if (isset($_REQUEST['Street1'])) $Street1 = $_REQUEST['Street1'];
if (empty($Street1)) unset($Street1);

if (isset($_POST['State'])) $State = $_POST['State'];
if (isset($_REQUEST['State'])) $State = $_REQUEST['State'];
if (empty($State)) unset($State);

if (isset($_POST['email'])) $email = $_POST['email'];
if (isset($_REQUEST['email'])) $email = $_REQUEST['email'];
if (empty($email)) unset($email);

if (isset($_POST['shortcoworkerinfo'])) $shortcoworkerinfo = $_POST['shortcoworkerinfo'];
if (isset($_REQUEST['shortcoworkerinfo'])) $shortcoworkerinfo = $_REQUEST['shortcoworkerinfo'];
if (empty($shortcoworkerinfo)) unset($shortcoworkerinfo);

if (isset($_POST['shortcheck9'])) $shortcheck9 = $_POST['shortcheck9'];
if (isset($_REQUEST['shortcheck9'])) $shortcheck9 = $_REQUEST['shortcheck9'];
if (empty($shortcheck9)) unset($shortcheck9);

if (isset($_POST['shortcheck8'])) $shortcheck8 = $_POST['shortcheck8'];
if (isset($_REQUEST['shortcheck8'])) $shortcheck8 = $_REQUEST['shortcheck8'];
if (empty($shortcheck8)) unset($shortcheck8);

if (isset($_POST['shortcheck7'])) $shortcheck7 = $_POST['shortcheck7'];
if (isset($_REQUEST['shortcheck7'])) $shortcheck7 = $_REQUEST['shortcheck7'];
if (empty($shortcheck7)) unset($shortcheck7);

if (isset($_POST['shortcheck6'])) $shortcheck6 = $_POST['shortcheck6'];
if (isset($_REQUEST['shortcheck6'])) $shortcheck6 = $_REQUEST['shortcheck6'];
if (empty($shortcheck6)) unset($shortcheck6);

if (isset($_POST['shortcheck5'])) $shortcheck5 = $_POST['shortcheck5'];
if (isset($_REQUEST['shortcheck5'])) $shortcheck5 = $_REQUEST['shortcheck5'];
if (empty($shortcheck5)) unset($shortcheck5);

if (isset($_POST['shortcheck4'])) $shortcheck4 = $_POST['shortcheck4'];
if (isset($_REQUEST['shortcheck4'])) $shortcheck4 = $_REQUEST['shortcheck4'];
if (empty($shortcheck4)) unset($shortcheck4);

if (isset($_POST['shortcheck3'])) $shortcheck3 = $_POST['shortcheck3'];
if (isset($_REQUEST['shortcheck3'])) $shortcheck3 = $_REQUEST['shortcheck3'];
if (empty($shortcheck3)) unset($shortcheck3);

if (isset($_POST['shortcheck2'])) $shortcheck2 = $_POST['shortcheck2'];
if (isset($_REQUEST['shortcheck2'])) $shortcheck2 = $_REQUEST['shortcheck2'];
if (empty($shortcheck2)) unset($shortcheck2);

if (isset($_POST['shortcheck10'])) $shortcheck10 = $_POST['shortcheck10'];
if (isset($_REQUEST['shortcheck10'])) $shortcheck10 = $_REQUEST['shortcheck10'];
if (empty($shortcheck10)) unset($shortcheck10);

if (isset($_POST['shortcheck1'])) $shortcheck1 = $_POST['shortcheck1'];
if (isset($_REQUEST['shortcheck1'])) $shortcheck1 = $_REQUEST['shortcheck1'];
if (empty($shortcheck1)) unset($shortcheck1);

if (isset($_POST['shortanythingelse'])) $shortanythingelse = $_POST['shortanythingelse'];
if (isset($_REQUEST['shortanythingelse'])) $shortanythingelse = $_REQUEST['shortanythingelse'];
if (empty($shortanythingelse)) unset($shortanythingelse);

if (isset($_POST['retainerstatustime'])) $retainerstatustime = $_POST['retainerstatustime'];
if (isset($_REQUEST['retainerstatustime'])) $retainerstatustime = $_REQUEST['retainerstatustime'];
if (empty($retainerstatustime)) unset($retainerstatustime);

if (isset($_POST['retainerstatus'])) $retainerstatus = $_POST['retainerstatus'];
if (isset($_REQUEST['retainerstatus'])) $retainerstatus = $_REQUEST['retainerstatus'];
if (empty($retainerstatus)) unset($retainerstatus);

if (isset($_POST['retainerSentWeek'])) $retainerSentWeek = $_POST['retainerSentWeek'];
if (isset($_REQUEST['retainerSentWeek'])) $retainerSentWeek = $_REQUEST['retainerSentWeek'];
if (empty($retainerSentWeek)) unset($retainerSentWeek);

if (isset($_POST['retainerSentMonth'])) $retainerSentMonth = $_POST['retainerSentMonth'];
if (isset($_REQUEST['retainerSentMonth'])) $retainerSentMonth = $_REQUEST['retainerSentMonth'];
if (empty($retainerSentMonth)) unset($retainerSentMonth);

if (isset($_POST['retainerSentDate'])) $retainerSentDate = $_POST['retainerSentDate'];
if (isset($_REQUEST['retainerSentDate'])) $retainerSentDate = $_REQUEST['retainerSentDate'];
if (empty($retainerSentDate)) unset($retainerSentDate);

if (isset($_POST['retainerSent'])) $retainerSent = $_POST['retainerSent'];
if (isset($_REQUEST['retainerSent'])) $retainerSent = $_REQUEST['retainerSent'];
if (empty($retainerSent)) unset($retainerSent);

if (isset($_POST['retainerRecievedWeek'])) $retainerRecievedWeek = $_POST['retainerRecievedWeek'];
if (isset($_REQUEST['retainerRecievedWeek'])) $retainerRecievedWeek = $_REQUEST['retainerRecievedWeek'];
if (empty($retainerRecievedWeek)) unset($retainerRecievedWeek);

if (isset($_POST['retainerRecievedMonth'])) $retainerRecievedMonth = $_POST['retainerRecievedMonth'];
if (isset($_REQUEST['retainerRecievedMonth'])) $retainerRecievedMonth = $_REQUEST['retainerRecievedMonth'];
if (empty($retainerRecievedMonth)) unset($retainerRecievedMonth);

if (isset($_POST['retainerRecievedDate'])) $retainerRecievedDate = $_POST['retainerRecievedDate'];
if (isset($_REQUEST['retainerRecievedDate'])) $retainerRecievedDate = $_REQUEST['retainerRecievedDate'];
if (empty($retainerRecievedDate)) unset($retainerRecievedDate);

if (isset($_POST['retainerRecieved'])) $retainerRecieved = $_POST['retainerRecieved'];
if (isset($_REQUEST['retainerRecieved'])) $retainerRecieved = $_REQUEST['retainerRecieved'];
if (empty($retainerRecieved)) unset($retainerRecieved);

if (isset($_POST['retainernote'])) $retainernote = $_POST['retainernote'];
if (isset($_REQUEST['retainernote'])) $retainernote = $_REQUEST['retainernote'];
if (empty($retainernote)) unset($retainernote);

if (isset($_POST['retainercountersignsentweek'])) $retainercountersignsentweek = $_POST['retainercountersignsentweek'];
if (isset($_REQUEST['retainercountersignsentweek'])) $retainercountersignsentweek = $_REQUEST['retainercountersignsentweek'];
if (empty($retainercountersignsentweek)) unset($retainercountersignsentweek);

if (isset($_POST['retainercountersignsentmonth'])) $uniqueid = $_POST['retainercountersignsentmonth'];
if (isset($_REQUEST['retainercountersignsentmonth'])) $uniqueid = $_REQUEST['retainercountersignsentmonth'];
if (empty($retainercountersignsentmonth)) unset($retainercountersignsentmonth);

if (isset($_POST['uniqueid'])) $uniqueid = $_POST['uniqueid'];
if (isset($_REQUEST['uniqueid'])) $uniqueid = $_REQUEST['uniqueid'];
if (empty($uniqueid)) unset($uniqueid);

if (isset($_POST['retainercountersignsentdate'])) $retainercountersignsentdate = $_POST['retainercountersignsentdate'];
if (isset($_REQUEST['retainercountersignsentdate'])) $retainercountersignsentdate = $_REQUEST['retainercountersignsentdate'];
if (empty($retainercountersignsentdate)) unset($retainercountersignsentdate);

if (isset($_POST['retainercountersignsent'])) $retainercountersignsent = $_POST['retainercountersignsent'];
if (isset($_REQUEST['retainercountersignsent'])) $retainercountersignsent = $_REQUEST['retainercountersignsent'];
if (empty($retainercountersignsent)) unset($retainercountersignsent);

if (isset($_POST['reachedretainerdiscussion'])) $reachedretainerdiscussion = $_POST['reachedretainerdiscussion'];
if (isset($_REQUEST['reachedretainerdiscussion'])) $reachedretainerdiscussion = $_REQUEST['reachedretainerdiscussion'];
if (empty($reachedretainerdiscussion)) unset($reachedretainerdiscussion);

if (isset($_POST['phone2'])) $phone2 = $_POST['phone2'];
if (isset($_REQUEST['phone2'])) $phone2 = $_REQUEST['phone2'];
if (empty($phone2)) unset($phone2);

if (isset($_POST['phone1'])) $phone1 = $_POST['phone1'];
if (isset($_REQUEST['phone1'])) $phone1 = $_REQUEST['phone1'];
if (empty($phone1)) unset($phone1);

if (isset($_POST['onlinecompleteweek'])) $onlinecompleteweek = $_POST['onlinecompleteweek'];
if (isset($_REQUEST['onlinecompleteweek'])) $onlinecompleteweek = $_REQUEST['onlinecompleteweek'];
if (empty($onlinecompleteweek)) unset($onlinecompleteweek);

if (isset($_POST['onlinecompletetime'])) $onlinecompletetime = $_POST['onlinecompletetime'];
if (isset($_REQUEST['onlinecompletetime'])) $onlinecompletetime = $_REQUEST['onlinecompletetime'];
if (empty($onlinecompletetime)) unset($onlinecompletetime);

if (isset($_POST['onlinecompletemonth'])) $onlinecompletemonth = $_POST['onlinecompletemonth'];
if (isset($_REQUEST['onlinecompletemonth'])) $onlinecompletemonth = $_REQUEST['onlinecompletemonth'];
if (empty($onlinecompletemonth)) unset($onlinecompletemonth);

if (isset($_POST['onlinecompleteday'])) $onlinecompleteday = $_POST['onlinecompleteday'];
if (isset($_REQUEST['onlinecompleteday'])) $onlinecompleteday = $_REQUEST['onlinecompleteday'];
if (empty($onlinecompleteday)) unset($onlinecompleteday);

if (isset($_POST['notqualifiedreason'])) $notqualifiedreason = $_POST['notqualifiedreason'];
if (isset($_REQUEST['notqualifiedreason'])) $notqualifiedreason = $_REQUEST['notqualifiedreason'];
if (empty($notqualifiedreason)) unset($notqualifiedreason);

if (isset($_POST['notqualifiedbuthasothermatters'])) $notqualifiedbuthasothermatters = $_POST['notqualifiedbuthasothermatters'];
if (isset($_REQUEST['notqualifiedbuthasothermatters'])) $notqualifiedbuthasothermatters = $_REQUEST['notqualifiedbuthasothermatters'];
if (empty($notqualifiedbuthasothermatters)) unset($notqualifiedbuthasothermatters);

if (isset($_POST['notqualified'])) $notqualified = $_POST['notqualified'];
if (isset($_REQUEST['notqualified'])) $notqualified = $_REQUEST['notqualified'];
if (empty($notqualified)) unset($notqualified);

if (isset($_POST['notelog'])) $notelog = $_POST['notelog'];
if (isset($_REQUEST['notelog'])) $notelog = $_REQUEST['notelog'];
if (empty($notelog)) unset($notelog);

if (isset($_POST['noteadddate'])) $noteadddate = $_POST['noteadddate'];
if (isset($_REQUEST['noteadddate'])) $noteadddate = $_REQUEST['noteadddate'];
if (empty($noteadddate)) unset($noteadddate);

if (isset($_POST['noteadd'])) $noteadd = $_POST['noteadd'];
if (isset($_REQUEST['noteadd'])) $noteadd = $_REQUEST['noteadd'];
if (empty($noteadd)) unset($noteadd);

if (isset($_POST['longcoworkerinfo'])) $longcoworkerinfo = $_POST['longcoworkerinfo'];
if (isset($_REQUEST['longcoworkerinfo'])) $longcoworkerinfo = $_REQUEST['longcoworkerinfo'];
if (empty($longcoworkerinfo)) unset($longcoworkerinfo);

if (isset($_POST['LastName'])) $LastName = $_POST['LastName'];
if (isset($_REQUEST['LastName'])) $LastName = $_REQUEST['LastName'];
if (empty($LastName)) unset($LastName);

if (isset($_POST['ip'])) $ip = $_POST['ip'];
if (isset($_REQUEST['ip'])) $ip = $_REQUEST['ip'];
if (empty($ip)) unset($ip);

if (isset($_POST['interviewstartweek'])) $interviewstartweek = $_POST['interviewstartweek'];
if (isset($_REQUEST['interviewstartweek'])) $interviewstartweek = $_REQUEST['interviewstartweek'];
if (empty($interviewstartweek)) unset($interviewstartweek);

if (isset($_POST['interviewstarttime'])) $interviewstarttime = $_POST['interviewstarttime'];
if (isset($_REQUEST['interviewstarttime'])) $interviewstarttime = $_REQUEST['interviewstarttime'];
if (empty($interviewstarttime)) unset($interviewstarttime);

if (isset($_POST['interviewstartmonthyear'])) $interviewstartmonthyear = $_POST['interviewstartmonthyear'];
if (isset($_REQUEST['interviewstartmonthyear'])) $interviewstartmonthyear = $_REQUEST['interviewstartmonthyear'];
if (empty($interviewstartmonthyear)) unset($interviewstartmonthyear);

if (isset($_POST['interviewstarted'])) $interviewstarted = $_POST['interviewstarted'];
if (isset($_REQUEST['interviewstarted'])) $interviewstarted = $_REQUEST['interviewstarted'];
if (empty($interviewstarted)) unset($interviewstarted);

if (isset($_POST['interviewstartday'])) $interviewstartday = $_POST['interviewstartday'];
if (isset($_REQUEST['interviewstartday'])) $interviewstartday = $_REQUEST['interviewstartday'];
if (empty($interviewstartday)) unset($interviewstartday);

if (isset($_POST['interviewcompleteweek'])) $interviewcompleteweek = $_POST['interviewcompleteweek'];
if (isset($_REQUEST['interviewcompleteweek'])) $interviewcompleteweek = $_REQUEST['interviewcompleteweek'];
if (empty($interviewcompleteweek)) unset($interviewcompleteweek);

if (isset($_POST['interviewcompletetime'])) $interviewcompletetime = $_POST['interviewcompletetime'];
if (isset($_REQUEST['interviewcompletetime'])) $interviewcompletetime = $_REQUEST['interviewcompletetime'];
if (empty($interviewcompletetime)) unset($interviewcompletetime);

if (isset($_POST['interviewcompletemonthyear'])) $interviewcompletemonthyear = $_POST['interviewcompletemonthyear'];
if (isset($_REQUEST['interviewcompletemonthyear'])) $interviewcompletemonthyear = $_REQUEST['interviewcompletemonthyear'];
if (empty($interviewcompletemonthyear)) unset($interviewcompletemonthyear);

if (isset($_POST['interviewcompleteday'])) $interviewcompleteday = $_POST['interviewcompleteday'];
if (isset($_REQUEST['interviewcompleteday'])) $interviewcompleteday = $_REQUEST['interviewcompleteday'];
if (empty($interviewcompleteday)) unset($interviewcompleteday);

if (isset($_POST['FirstName'])) $FirstName = $_POST['FirstName'];
if (isset($_REQUEST['FirstName'])) $FirstName = $_REQUEST['FirstName'];
if (empty($FirstName)) unset($FirstName);

if (isset($_POST['fax'])) $fax = $_POST['fax'];
if (isset($_REQUEST['fax'])) $fax = $_REQUEST['fax'];
if (empty($fax)) unset($fax);

if (isset($_POST['didyouworkatmacysretail'])) $didyouworkatmacysretail = $_POST['didyouworkatmacysretail'];
if (isset($_REQUEST['didyouworkatmacysretail'])) $didyouworkatmacysretail = $_REQUEST['didyouworkatmacysretail'];
if (empty($didyouworkatmacysretail)) unset($didyouworkatmacysretail);

if (isset($_POST['demandcreatedweek'])) $demandcreatedweek = $_POST['demandcreatedweek'];
if (isset($_REQUEST['demandcreatedweek'])) $demandcreatedweek = $_REQUEST['demandcreatedweek'];
if (empty($demandcreatedweek)) unset($demandcreatedweek);

if (isset($_POST['demandcreatedmonth'])) $demandcreatedmonth = $_POST['demandcreatedmonth'];
if (isset($_REQUEST['demandcreatedmonth'])) $demandcreatedmonth = $_REQUEST['demandcreatedmonth'];
if (empty($demandcreatedmonth)) unset($demandcreatedmonth);

if (isset($_POST['demandcreateddate'])) $demandcreateddate = $_POST['demandcreateddate'];
if (isset($_REQUEST['demandcreateddate'])) $demandcreateddate = $_REQUEST['demandcreateddate'];
if (empty($demandcreateddate)) unset($demandcreateddate);

if (isset($_POST['demandcreated'])) $demandcreated = $_POST['demandcreated'];
if (isset($_REQUEST['demandcreated'])) $demandcreated = $_REQUEST['demandcreated'];
if (empty($demandcreated)) unset($demandcreated);

if (isset($_POST['date'])) $date = $_POST['date'];
if (isset($_REQUEST['date'])) $date = $_REQUEST['date'];
if (empty($date)) unset($date);

if (isset($_POST['currentstatusdate'])) $currentstatusdate = $_POST['currentstatusdate'];
if (isset($_REQUEST['currentstatusdate'])) $currentstatusdate = $_REQUEST['currentstatusdate'];
if (empty($currentstatusdate)) unset($currentstatusdate);

if (isset($_POST['currentstatus'])) $currentstatus = $_POST['currentstatus'];
if (isset($_REQUEST['currentstatus'])) $currentstatus = $_REQUEST['currentstatus'];
if (empty($currentstatus)) unset($currentstatus);

if (isset($_POST['completedonline'])) $completedonline = $_POST['completedonline'];
if (isset($_REQUEST['completedonline'])) $completedonline = $_REQUEST['completedonline'];
if (empty($completedonline)) unset($completedonline);

if (isset($_POST['completedlongformonline'])) $completedlongformonline = $_POST['completedlongformonline'];
if (isset($_REQUEST['completedlongformonline'])) $completedlongformonline = $_REQUEST['completedlongformonline'];
if (empty($completedlongformonline)) unset($completedlongformonline);

if (isset($_POST['City'])) $City = $_POST['City'];
if (isset($_REQUEST['City'])) $City = $_REQUEST['City'];
if (empty($City)) unset($City);

if (isset($_POST['caseid'])) $caseid = $_POST['caseid'];
if (isset($_REQUEST['caseid'])) $caseid = $_REQUEST['caseid'];
if (empty($caseid)) unset($caseid);

if (isset($_POST['brand'])) $brand = $_POST['brand'];
if (isset($_REQUEST['brand'])) $brand = $_REQUEST['brand'];
if (empty($brand)) unset($brand);

if (isset($_POST['authstatustime'])) $authstatustime = $_POST['authstatustime'];
if (isset($_REQUEST['authstatustime'])) $authstatustime = $_REQUEST['authstatustime'];
if (empty($authstatustime)) unset($authstatustime);

if (isset($_POST['authstatus'])) $authstatus = $_POST['authstatus'];
if (isset($_REQUEST['authstatus'])) $authstatus = $_REQUEST['authstatus'];
if (empty($authstatus)) unset($authstatus);

if (isset($_POST['authnote'])) $authnote = $_POST['authnote'];
if (isset($_REQUEST['authnote'])) $authnote = $_REQUEST['authnote'];
if (empty($authnote)) unset($authnote);

if (isset($_POST['authformreceivedweek'])) $authformreceivedweek = $_POST['authformreceivedweek'];
if (isset($_REQUEST['authformreceivedweek'])) $authformreceivedweek = $_REQUEST['authformreceivedweek'];
if (empty($authformreceivedweek)) unset($authformreceivedweek);

if (isset($_POST['authformreceivedmonth'])) $authformreceivedmonth = $_POST['authformreceivedmonth'];
if (isset($_REQUEST['authformreceivedmonth'])) $authformreceivedmonth = $_REQUEST['authformreceivedmonth'];
if (empty($authformreceivedmonth)) unset($authformreceivedmonth);

if (isset($_POST['authformreceiveddate'])) $authformreceiveddate = $_POST['authformreceiveddate'];
if (isset($_REQUEST['authformreceiveddate'])) $authformreceiveddate = $_REQUEST['authformreceiveddate'];
if (empty($authformreceiveddate)) unset($authformreceiveddate);

if (isset($_POST['authformreceived'])) $authformreceived = $_POST['authformreceived'];
if (isset($_REQUEST['authformreceived'])) $authformreceived = $_REQUEST['authformreceived'];
if (empty($authformreceived)) unset($authformreceived);

if (isset($_POST['areyoucurrentmacysemployee'])) $areyoucurrentmacysemployee = $_POST['areyoucurrentmacysemployee'];
if (isset($_REQUEST['areyoucurrentmacysemployee'])) $areyoucurrentmacysemployee = $_REQUEST['areyoucurrentmacysemployee'];
if (empty($areyoucurrentmacysemployee)) unset($areyoucurrentmacysemployee);

if (isset($_POST['agentlname'])) $agentlname = $_POST['agentlname'];
if (isset($_REQUEST['agentlname'])) $agentlname = $_REQUEST['agentlname'];
if (empty($agentlname)) unset($agentlname);

if (isset($_POST['agentfname'])) $agentfname = $_POST['agentfname'];
if (isset($_REQUEST['agentfname'])) $agentfname = $_REQUEST['agentfname'];
if (empty($agentfname)) unset($agentfname);

if (isset($_POST['DeclinedToSignRetainer'])) $DeclinedToSignRetainer = $_POST['DeclinedToSignRetainer'];
if (isset($_REQUEST['DeclinedToSignRetainer'])) $DeclinedToSignRetainer = $_REQUEST['DeclinedToSignRetainer'];
if (empty($DeclinedToSignRetainer)) unset($DeclinedToSignRetainer);

if (isset($_POST['DeclinedToSignAuthorization'])) $DeclinedToSignAuthorization = $_POST['DeclinedToSignAuthorization'];
if (isset($_REQUEST['DeclinedToSignAuthorization'])) $DeclinedToSignAuthorization = $_REQUEST['DeclinedToSignAuthorization'];
if (empty($DeclinedToSignAuthorization)) unset($DeclinedToSignAuthorization);

if (isset($_POST['DeclinedToSignFeeWaiver'])) $DeclinedToSignFeeWaiver = $_POST['DeclinedToSignFeeWaiver'];
if (isset($_REQUEST['DeclinedToSignFeeWaiver'])) $DeclinedToSignFeeWaiver = $_REQUEST['DeclinedToSignFeeWaiver'];
if (empty($DeclinedToSignFeeWaiver)) unset($DeclinedToSignFeeWaiver);

if (isset($_POST['attorneyInfo'])) $attorneyInfo = $_POST['attorneyInfo'];
if (isset($_REQUEST['attorneyInfo'])) $attorneyInfo = $_REQUEST['attorneyInfo'];
if (empty($attorneyInfo)) unset($attorneyInfo);

if (isset($_POST['notqualified_retained'])) $notqualified_retained = $_POST['notqualified_retained'];
if (isset($_REQUEST['notqualified_retained'])) $notqualified_retained = $_REQUEST['notqualified_retained'];
if (empty($notqualified_retained)) unset($notqualified_retained);

if (isset($_POST['additionalInfo'])) $attorneyInfo = $_POST['additionalInfo'];
if (isset($_REQUEST['additionalInfo'])) $attorneyInfo = $_REQUEST['additionalInfo'];
if (empty($additionalInfo)) unset($additionalInfo);
?>