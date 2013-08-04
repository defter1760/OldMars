<?php
/**
* Author: Pete Blackmer
* Copyright (C) 2008-2009 SpiceCSM LLC. All rights reserved.
*
 * This program is free software; you can redistribute it and/or modify it under
 * the terms of the GNU Affero General Public License version 3 (AGPL v3) as published by the
 * Free Software Foundation with the addition of the following permission added
 * to Section 15 as permitted in Section 7(a): FOR ANY PART OF THE COVERED WORK
 * IN WHICH THE COPYRIGHT IS OWNED BY SPICECSM, SPICECSM DISCLAIMS THE WARRANTY
 * OF NON INFRINGEMENT OF THIRD PARTY RIGHTS.
 * 
  * This program is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
 * FOR A PARTICULAR PURPOSE.  See the GNU Affero General Public License for more
 * details.
 *
  * You should have received a copy of the GNU Affero General Public License along with
 * this program; if not, see http://www.gnu.org/licenses or write to the Free
 * Software Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA
 * 02110-1301 USA.
 *
  * The interactive user interfaces in modified source and object code versions
 * of this program must display Appropriate Legal Notices, as required under
 * Section 5 of the GNU Affero General Public License version 3 (AGPL v3).
 *
  * In accordance with Section 7(b) of the GNU Affero General Public License version 3 (AGPL v3),
 * these Appropriate Legal Notices must retain the display of the "Powered by
 * SpiceCSM" logo. If the display of the logo is not reasonably feasible for
 * technical reasons, the Appropriate Legal Notices must display the words
 * "Powered by SpiceCSM".
 */

class jsonRPCC{
	/**
	* private variables
	*/
	private $id;
	
	/**
	 * connection configuration
	 */
	public function __construct($url) {
		$this->url = $url;
		//set a default id
		$this->id = 1;
	}
	
	/**
	 * performs the request and returns the data as an object
	 */
	public function __call($method,$params) {
		// check to make sure its a valid method call
		if (!is_scalar($method)) {
			throw new Exception('Improperly formattated method call.');
		}
		// check for properly formattad parameters
		if (is_array($params)) {
			$params = array_values($params);
			$params[]=time();
		} else {
			throw new Exception('Improperly formatted method call. Method values improperly passed.');
		}
		//set the current id
		$currentId = $this->id;
		
		// prepare the request
		$request = array(
		'method' => $method,
		'params' => $params,
		'id' => $currentId
		);
		//encode the request for passing
		$request = json_encode($request);
		$response='';// set default
		/**
		*perform the cURL request to the server
		**/
		$curl = curl_init($this->url);
		//cURL header options
		$opts = array (
			'method'  => 'POST'
		//	'header'  => 'Content-type: application/json',
		//	'content' => $request
		);
		//set the cURL options
		curl_setopt_array($curl, array(
			CURLOPT_SSL_VERIFYPEER => false,
			CURLOPT_POSTFIELDS => array('request' => $request),
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_HTTPHEADER=>$opts
		));																																								
		//execute the cURL call
		$raw_data = curl_exec($curl);
		//capture any cURL error
		if($raw_data === false)
			throw new Exception(curl_error($curl));
		//decode the response eliminating any line breaks
		$response =  trim($raw_data)."\n";
		$response = json_decode($response);
		//if the response is not a valid object retuen the raw response
		if(sizeof($response)<1)
			$response=$raw_data;
		//validate response before returning
		if($response->id==$currentId && $response->error==null){
			return $response->result;
		}elseif($response->error!=null){
			throw new Exception('<b>An error has occurred.</b><br>'.$response->error);
		}else{
			throw new Exception('<b>Unknown Error</b><br>'.$response);
		}
	}
}
?>
