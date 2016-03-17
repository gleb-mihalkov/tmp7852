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

	$doc->_script = array();
	$doc->_scripts = array();

	$isMain = $menu->getActive() == $menu->getDefault();
	
	$isAfterContent1 = $this->countModules("after-content-1");
	$isAfterContent2 = $this->countModules("after-content-2");
	$isAfterContent3 = $this->countModules("after-content-3");
	$isBeforeContent1 = $this->countModules("before-content-1");