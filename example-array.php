<?php
/**
 * This file is part of the Galahad MailChimp Synchronizer.
 * 
 * The Galahad MailChimp Synchronizer is free software: you can redistribute
 * it and/or modify it under the terms of the GNU General Public License as 
 * published by the Free Software Foundation, either version 3 of the 
 * License, or (at your option) any later version.
 * 
 * The Galahad MailChimp Synchronizer is distributed in the hope that it 
 * will be useful, but WITHOUT ANY WARRANTY; without even the implied 
 * warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See 
 * the GNU General Public License for more details.
 * 
 * @category  Galahad
 * @package   Galahad_MailChimp
 * @copyright Copyright (c) 2009 Chris Morrell <http://cmorrell.com>
 * @license   GPL <http://www.gnu.org/licenses/>
 * @version   0.2
 */

require_once 'Galahad/MailChimp/Synchronizer/Array.php';
require_once 'MailChimp/MCAPI.class.php';

// =============================================================================
//  SET THESE
// =============================================================================
$apiKey = '';
$list = '';

$users = array(
	array('EMAIL' => 'mailchimp01@mydomain.com', 'FNAME' => 'Mail', 'LNAME' => 'Chimp 1'),
	array('EMAIL' => 'mailchimp02@mydomain.com', 'FNAME' => 'Mail', 'LNAME' => 'Chimp 2'),
	array('EMAIL' => 'mailchimp03@mydomain.com', 'FNAME' => 'Mail', 'LNAME' => 'Chimp 3'),
	array('EMAIL' => 'mailchimp04@mydomain.com', 'FNAME' => 'Mail', 'LNAME' => 'Chimp 4'),
	array('EMAIL' => 'mailchimp05@mydomain.com', 'FNAME' => 'Mail', 'LNAME' => 'Chimp 5'),
	array('EMAIL' => 'mailchimp06@mydomain.com', 'FNAME' => 'Mail', 'LNAME' => 'Chimp 6'),
	array('EMAIL' => 'mailchimp07@mydomain.com', 'FNAME' => 'Mail', 'LNAME' => 'Chimp 7'),
	array('EMAIL' => 'mailchimp08@mydomain.com', 'FNAME' => 'Mail', 'LNAME' => 'Chimp 8'),
	array('EMAIL' => 'mailchimp09@mydomain.com', 'FNAME' => 'Mail', 'LNAME' => 'Chimp 9'),
	array('EMAIL' => 'mailchimp10@mydomain.com', 'FNAME' => 'Mail', 'LNAME' => 'Chimp 10'),
	array('EMAIL' => 'mailchimp11@mydomain.com', 'FNAME' => 'Mail', 'LNAME' => 'Chimp 11'),
	array('EMAIL' => 'mailchimp12@mydomain.com', 'FNAME' => 'Mail', 'LNAME' => 'Chimp 12'),
	array('EMAIL' => 'mailchimp13@mydomain.com', 'FNAME' => 'Mail', 'LNAME' => 'Chimp 13'),
	array('EMAIL' => 'mailchimp14@mydomain.com', 'FNAME' => 'Mail', 'LNAME' => 'Chimp 14'),
	array('EMAIL' => 'mailchimp15@mydomain.com', 'FNAME' => 'Mail', 'LNAME' => 'Chimp 15'),
);

// =============================================================================
//  THAT'S EVERYTHING
// =============================================================================

echo "\nStarted.\n";
$Synchronizer = new Galahad_MailChimp_Synchronizer_Array($apiKey, $users);
$Synchronizer->sync($list);
echo "\nDone.\n";


