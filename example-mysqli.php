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
 * @version   0.1
 */

require_once 'Galahad/MailChimp/Synchronizer/Mysqli.php';
require_once 'MailChimp/MCAPI.class.php';

// =============================================================================
//  SET THESE
// =============================================================================
$apiKey = '';
$list = '';

$db = array(
	'host' => 'localhost',
	'username' => 'root',
	'passwd' => '',
	'dbname' => 'mailchimp',
);
$cols = array(
	'first_name' => 'FNAME',
	'last_name' => 'LNAME',
	'email' => 'EMAIL',
);

$selectQuery = 'SELECT email, username, first_name, last_name FROM `user`';
$existsQuery = 'SELECT COUNT(id) FROM `user` WHERE email = ?';

// =============================================================================
//  THAT'S EVERYTHING
// =============================================================================

try {
	$synchronizer = new Galahad_MailChimp_Synchronizer_Mysqli($apiKey, $db);
    $synchronizer->sync($list, $selectQuery, $existsQuery, $cols);

    echo "\nSynced:\n";

    // Print out log of sync actions
    foreach ($synchronizer->getBatchLog() as $entry) {
        echo "\n - {$entry}";
    }

    // Any individual errors
    $errors = $synchronizer->getBatchErrorLog();
    if ($errors) {
        echo "\n\nErrors:\n";
        foreach ($errors as $batch => $batchErrors) {
            echo "\n{$batch}:";
            foreach ($batchErrors as $error) {
                echo "\n - {$error['message']}";
            }
        }
    }
} catch (Galahad_MailChimp_Synchronizer_Exception $e) {
    echo "\nError syncing:\n\n";
    echo $e->getMessage();
}