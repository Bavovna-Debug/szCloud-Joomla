<?php defined('_JEXEC') or die('Restricted access');

//if ($this->userDetails->virtuemart_user_id != 0)
    //echo $this->loadTemplate('vmshopper');

echo $this->loadTemplate('address_userfields');

if ($this->userDetails->JUser->get('id'))
  echo $this->loadTemplate('address_addshipto');

if (!empty($this->virtuemart_userinfo_id))
	echo '<input type="hidden" name="virtuemart_userinfo_id" value="' . (int) $this->virtuemart_userinfo_id . '" />'; ?>

<input type="hidden" name="task" value="<?php echo $this->fTask ?>" />
<input type="hidden" name="address_type" value="BT" />
