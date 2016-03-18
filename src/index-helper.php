<?php

	defined('_JEXEC') or die("403 Forbidden.");

	$app = JFactory::getApplication();
	$doc = JFactory::getDocument();
	$user = JFactory::getUser();
	$menu = $app->getMenu();

	$cache = JFactory::getCache('mod_virtuemart_product', 'callback');
	$cache->clean();
	$cache = JFactory::getCache('com_virtuemart_cats', 'callback');
	$cache->clean();
	$cache = JFactory::getCache('com_virtuemart_cat_manus', 'callback');
	$cache->clean();

	$params = $app->getTemplate(true)->params;
	$baseurl = $this->baseurl;
	$template = "$baseurl/templates/{$this->template}";

	$doc->_scripts = array();
	$doc->_script = array();

	$isMain = $menu->getActive() == $menu->getDefault();