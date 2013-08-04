<?php
/**
 * @copyright Copyright (C) DocuSign, Inc.  All rights reserved.
 *
 * This source code is intended only as a supplement to DocuSign SDK
 * and/or on-line documentation.
 * This sample is designed to demonstrate DocuSign features and is not intended
 * for production use. Code and policy for a production application must be
 * developed to meet the specific data and security requirements of the
 * application.
 *
 * THIS CODE AND INFORMATION ARE PROVIDED "AS IS" WITHOUT WARRANTY OF ANY
 * KIND, EITHER EXPRESSED OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE
 * IMPLIED WARRANTIES OF MERCHANTABILITY AND/OR FITNESS FOR A
 * PARTICULAR PURPOSE.
 */

/*
 * Presents error.
 */

//========================================================================
// Includes
//========================================================================
include_once 'include/session.php'; // initializes session and provides
include 'include/utils.php';

//========================================================================
// Main
//========================================================================

?>
<!DOCTYPE html">
<html>
    <head>
        <link rel="stylesheet" href="css/homestyle.css" type="text/css">
    </head>
    <body>
    	<?php 
    	    if (isset($_SESSION["errorMessage"])) {
    	        print_r2( $_SESSION["errorMessage"]);
    	    }
    	    else {
    	        echo "You shouldn't be on this page";
    	    }
	    ?>
    </body>
</html>