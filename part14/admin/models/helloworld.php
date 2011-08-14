<?php

/**
 * @package		Joomla.Tutorials
 * @subpackage	Component
 * @copyright	Copyright (C) 2005 - 2010 Open Source Matters, Inc. All rights reserved.
 * @license		License GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access to this file
defined('_JEXEC') or die;

jimport('joomla.application.component.modeladmin');

class HelloWorldModelHelloWorld extends JModelAdmin
{
	public function getForm($data = array(), $loadData = true)
	{
		// Get the form.
		$form = $this->loadForm('com_helloworld.helloworld', 'helloworld', array('control' => 'jform', 'load_data' => $loadData));
		return $form;
	}

	protected function loadFormData()
	{
		// Check the session for previously entered form data.
		$data = JFactory::getApplication()->getUserState('com_helloworld.edit.helloworld.data', array());
		if(empty($data)){
			$data = $this->getItem();
		}
		return $data;
	}

	public function getTable($name = '', $prefix = 'HelloWorldTable', $options = array())
	{
		return parent::getTable($name, $prefix, $options);
	}

	protected function allowEdit($data = array(), $key = 'id')
	{
		// Check specific edit permission then general edit permission.
		return JFactory::getUser()->authorise('core.edit', 'com_helloworld.message.'.((int) isset($data[$key]) ? $data[$key] : 0))
			|| parent::allowEdit($data, $key);
	}

	public function getTable($name = '', $prefix = 'HelloWorldTable', $options = array())
	{
		return parent::getTable($name, $prefix, $options);
	}
}
