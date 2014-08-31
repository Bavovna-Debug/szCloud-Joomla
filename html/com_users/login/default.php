<?php defined('_JEXEC') or die('Restricted access');

if ($this->user->get('guest')) {
	echo $this->loadTemplate('login');
} else {
	echo $this->loadTemplate('logout');
}
