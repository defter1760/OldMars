<?php
/**
* This class allows the creation of a Soice object for manipulation (add, update, delete) and reference.
*
* This lass returns a simple  object with predefined properties.
*
* Requires the spiceAPIClient.
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

class spiceAPIObj{
	/**
	* public property that holds the obj type
	**/
	public $type;
	public $fields;
	public $company;
	public $brand;
	public $where;
	public $limit;
	public $limitstart;
	public $sort;
	public $dir;
	
	/**
	* constructor
	**/
	public function __construct(){
		//place holder
	}
}
?>
