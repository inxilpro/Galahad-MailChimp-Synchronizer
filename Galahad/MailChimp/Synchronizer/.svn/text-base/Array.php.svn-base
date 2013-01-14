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
 * @version   0.1.1
 */

/** @see Galahad_MailChimp_Synchronizer */
require_once dirname(__FILE__) . '/../Synchronizer.php';

/** @see Galahad_MailChimp_User */
require_once dirname(__FILE__) . '/../User.php';

/**
 * Array Synchronizer
 * 
 * Mostly used for testing and example purposes.  Takes an
 * array of users and lets you sync with your MailChimp account.
 * 
 * @category  Galahad
 * @package   Galahad_MailChimp
 * @copyright Copyright (c) 2009 Chris Morrell <http://cmorrell.com>
 * @license   GPL <http://www.gnu.org/licenses/>
 */
class Galahad_MailChimp_Synchronizer_Array extends Galahad_MailChimp_Synchronizer 
{
	/**
	 * Array of users
	 *
	 * @var array
	 */
	protected $_users;
	
	/**
	 * Whether or not the users need to be batched
	 *
	 * @var bool
	 */
	protected $_batched = false;
	
	/**
	 * Array of e-mail addresses only
	 *
	 * @var array
	 */
	protected $_keys = null;
	
	/**
	 * Constructor
	 *
	 * @param string $mailChimpUser
	 * @param string $mailChimpPassword
	 * @param array $users
	 */
	function __construct($mailChimpUser, $mailChimpPassword, Array $users)
	{
		/*
		if (isset($users[0]) && is_string($users[0])) {
			$users = array_flip($users);
		}
		
		foreach ($users as $email => $mergeVariables) {
			if (!is_array($mergeVariables)) {
				$mergeVariables = array();
			}
			$this->_users[$email] = new Galahad_MailChimp_User($email, $mergeVariables);
		}
		*/
		
		$this->_users = $users;
		unset($users);
		
		foreach ($this->_users as $i => $user) {
			$this->_keys[$user['EMAIL']] = $i;
		}
		
		parent::__construct($mailChimpUser, $mailChimpPassword);
	}
	
	/**
	 * Determines if a user exists based on his or her e-mail address
	 *
	 * @param string $email
	 * @param string $listId
	 * @return bool
	 */
	protected function userExists($email, $listId = null)
	{
		return isset($this->_keys[$email]);
	}
	
	/**
	 * Gets an Iterator of Galahad_MailChimp_User objects
	 *
	 * @param string $listId
	 * @return ArrayIterator
	 */
	protected function getUsers($listId = null, $batchNumber)
	{
		if (!$this->_batched) {
			$this->_users = array_chunk($this->_users, $this->_batchSize);
			$this->_batched = true;
		}
		
		if (!isset($this->_users[$batchNumber])) {
			return false;
		}
		
		return $this->_users[$batchNumber];
	}
}