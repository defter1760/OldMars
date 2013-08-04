<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700,400italic' rel='stylesheet' type='text/css'>
<link href="https://macyslawsuit.com/wp-content/themes/MacysV3/css/confirmations.css" rel="stylesheet" type="text/css" />

<?php

$date = date('Y').'-'.date('m').'-'.date('d');
$time = date('H').':'.date('i').':'.date('s');
$month = date('Y').'-'.date('m');
$week = date('Y').'-'.date('W');


if (isset($_REQUEST['uniqueid'])) $uniqueid = $_REQUEST['uniqueid'];
if (isset($_REQUEST['document'])) $document = $_REQUEST['document'];


if ($document == 'Retainer')
{//retainer message -- open

	$link = '#';
	
		echo '<html>';
		echo '<body>';
			echo '<div id="main">';
				echo '<div id="message">';
					echo '<h4>';
					echo '<br>CONFIDENTIAL/WORK PRODUCT PRIVILEGE</h4>';
					echo '<h3>You have declined to sign the document.  Thank you for your time.</h3>';
					echo '<ul>';
						#echo '<li>We are continuing our investigation into the various wage and hour claims against Macy\'s, Inc. and would like additional information from you.  You can provide us with more information about your potential wage and hour claims by clicking <a target="_parent" class="link" href="'.$link.'">HERE</a>.  You will also receive an email containing the link. </li>';
						#echo '<li>We may choose to pursue your possible wage and hour claims through a pending proposed class action against Macy\'s or by filing your individual case in arbitration.  Although we make no promises or guarantees as to any specific outcome of your case under either option, this choice would allow us to potentially resolve any claims you and other similar employees may have against Macy\'s either by individual settlement or through a multi-party/group settlement or in a class action settlement. </li>';
						echo '<li>If you have any questions, please contact us at 888.792.2293</strong>.';
						echo '</li>';
					echo '</ul>';
					echo '<p class="disclaimer">Disclaimer: Initiative Legal Group APC does not make any promises or guarantees as to any specific outcome of any case.</p>';
				echo '</div>';
			echo '</div>';	
		echo '</body>';
		echo '</html>';
}//retainer message -- close
else
{
	$link = '#';
	
		echo '<html>';
		echo '<body>';
			echo '<div id="main">';
				echo '<div id="message">';
					echo '<h4>';
					echo 'CONFIDENTIAL ATTORNEY-CLIENT PRIVILEGED COMMUNICATION</h4>';
					echo '<h3>You have declined to sign the document.  Thank you for your time.</h3>';
					echo '<ul>';
						#echo '<li>We are continuing our investigation into the various wage and hour claims against Macy\'s, Inc. and would like additional information from you.  You can provide us with more information about your potential wage and hour claims by clicking <a target="_parent" class="link" href="'.$link.'">HERE</a>.  You will also receive an email containing the link. </li>';
						#echo '<li>We may choose to pursue your possible wage and hour claims through a pending proposed class action against Macy\'s or by filing your individual case in arbitration.  Although we make no promises or guarantees as to any specific outcome of your case under either option, this choice would allow us to potentially resolve any claims you and other similar employees may have against Macy\'s either by individual settlement or through a multi-party/group settlement or in a class action settlement. </li>';
						echo '<li>If you have any questions, please contact us at 888.792.2293</strong>.';
						echo '</li>';
					echo '</ul>';
					echo '<p class="disclaimer">Disclaimer: Initiative Legal Group APC does not make any promises or guarantees as to any specific outcome of any case.</p>';
				echo '</div>';
			echo '</div>';	
		echo '</body>';
		echo '</html>';	
}
//
//if ($document == 'Authorization')
//{//authorization message -- open
//
//	$link = '#';
//	
//		echo '<html>';
//		echo '<body>';
//			echo '<div id="main">';
//				echo '<div id="message">';
//					echo '<h4>';
//					echo 'CONFIDENTIAL ATTORNEY-CLIENT PRIVILEGED COMMUNICATION</h4>';
//					echo '<h3>You have declined to sign Attorney-Client Agreement '.$document.'.</h3>';
//					echo '<ul>';
//						echo '<li>We are continuing our investigation into the various wage and hour claims against Macy\'s, Inc. and would like additional information from you.  You can provide us with more information about your potential wage and hour claims by clicking <a target="_parent" class="link" href="'.$link.'">HERE</a>.  You will also receive an email containing the link. </li>';
//						echo '<li>We may choose to pursue your possible wage and hour claims through a pending proposed class action against Macy\'s or by filing your individual case in arbitration.  Although we make no promises or guarantees as to any specific outcome of your case under either option, this choice would allow us to potentially resolve any claims you and other similar employees may have against Macy\'s either by individual settlement or through a multi-party/group settlement or in a class action settlement. </li>';
//						echo '<li>If you have any questions or do not receive an email, please contact us toll-free at <strong>1.888.792.2293</strong>.';
//						echo '</li>';
//					echo '</ul>';
//					echo '<p class="disclaimer">Disclaimer: Initiative Legal Group APC does not make any promises or guarantees as to any specific outcome of any case.</p>';
//				echo '</div>';
//			echo '</div>';	
//		echo '</body>';
//		echo '</html>';
//}//authorization message -- close
//
//
//if ($document == 'FeeWaiver')
//{//fee waiver message -- open
//
//	$link = '#';
//	
//		echo '<html>';
//		echo '<body>';
//			echo '<div id="main">';
//				echo '<div id="message">';
//					echo '<h4>';
//					echo 'CONFIDENTIAL ATTORNEY-CLIENT PRIVILEGED COMMUNICATION</h4>';
//					echo '<h3>You have declined to sign Attorney-Client Agreement Fee Waiver.</h3>';
//					echo '<ul>';
//						echo '<li>We are continuing our investigation into the various wage and hour claims against Macy\'s, Inc. and would like additional information from you.  You can provide us with more information about your potential wage and hour claims by clicking <a target="_parent" class="link" href="'.$link.'">HERE</a>.  You will also receive an email containing the link. </li>';
//						echo '<li>We may choose to pursue your possible wage and hour claims through a pending proposed class action against Macy\'s or by filing your individual case in arbitration.  Although we make no promises or guarantees as to any specific outcome of your case under either option, this choice would allow us to potentially resolve any claims you and other similar employees may have against Macy\'s either by individual settlement or through a multi-party/group settlement or in a class action settlement. </li>';
//						echo '<li>If you have any questions or do not receive an email, please contact us toll-free at <strong>1.888.792.2293</strong>.';
//						echo '</li>';
//					echo '</ul>';
//					echo '<p class="disclaimer">Disclaimer: Initiative Legal Group APC does not make any promises or guarantees as to any specific outcome of any case.</p>';
//				echo '</div>';
//			echo '</div>';	
//		echo '</body>';
//		echo '</html>';
//}//fee waiver message -- close
        
?>