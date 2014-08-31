<?php defined('_JEXEC') or die('Restricted access');

jimport('vm2.bookkeeping');
jimport('vm2.categories');
jimport('vm2.medias');
jimport('vm2.products');
jimport('vm2.prices');
jimport('cloud.shop');

$lang =& JFactory::getLanguage();
$lang->load('lib_vm2', JPATH_SITE);
$lang->load('lib_cloud', JPATH_SITE);

JHTML::_('behavior.modal'); ?>

<div class="shop">

	<?php if (!empty($this->vendor->vendor_store_desc)): ?>
		<span class="vendor_description">
			<?php echo $this->vendor->vendor_store_desc ?>
		</span>
	<?php endif ?>

	<?php if ($this->categories)
		echo $this->loadTemplate('categories'); ?>

</div>
