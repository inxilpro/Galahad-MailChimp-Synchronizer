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

/**
 * MailChimp User Object
 * 
 * Provides a common interface for accessing user data in a way that
 * fits with the MailChimp API
 *
 * @category  Galahad
 * @package   Galahad_MailChimp
 * @copyright Copyright (c) 2009 Chris Morrell <http://cmorrell.com>
 * @license   GPL <http://www.gnu.org/licenses/>
 */
class Galahad_MailChimp_User
{
	protected $_email;
	protected $_mergeVariables = array();
	protected $_emailType = 'html';
	protected $_doubleOptIn = false;
	
	/**
	 * Constructor
	 *
	 * @param string $email
	 * @param array $mergeVariables
	 * @param string $emailType "html" or "text"
	 * @param bool $doubleOptIn
	 */
	public function __construct($email, $mergeVariables = array(), $emailType = 'html', $doubleOptIn = false)
	{
		$this->_email = $email;
		
		if (is_array($mergeVariables)) {
			$this->_mergeVariables = $mergeVariables;
		}
		
		if (in_array($emailType, array('html', 'text'))) {
			$this->_emailType = $emailType;
		}
		
		if (is_bool($doubleOptIn)) {
			$this->_doubleOptIn = $doubleOptIn;
		}
	}
	
	/**
	 * Get the users email address
	 *
	 * @return string
	 */
	public function getEmail()
	{
		return $this->_email;
	}
	
	/**
	 * Get additional merge variables
	 *
	 * @return array
	 */
	public function getMergeVariables()
	{
		return $this->_mergeVariables;
	}
	
	/**
	 * Whether the user prefers html or text e-mails
	 *
	 * @return string
	 */
	public function getEmailType()
	{
		return $this->_emailType;
	}
	
	/**
	 * Should MailChimp send a double opt-in request?
	 *
	 * @return bool
	 */
	public function getDoubleOptIn()
	{
		return $this->_doubleOptIn;
	}
}