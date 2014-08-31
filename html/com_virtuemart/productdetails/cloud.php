<?php defined('_JEXEC') or die('Restricted access');

jimport('vm2.bookkeeping');
jimport('vm2.categories');
#jimport('vm2.medias');
jimport('vm2.products');
jimport('vm2.prices');
jimport('cloud.shop');

$lang =& JFactory::getLanguage();
$lang->load('lib_vm2', JPATH_SITE);
$lang->load('lib_cloud', JPATH_SITE);

if (empty($this->product)) {
	echo JText::_('COM_VIRTUEMART_PRODUCT_NOT_FOUND');
	echo '<br /><br />' . $this->continue_link_html;
	return;
}

JHTML::_('behavior.modal'); ?>

<div class="productdetails-cloud">

	<div class="product_list">
		<?php echo $this->loadTemplate('product_list') ?>
	</div>

	<div class="product_info">
		<?php echo $this->loadTemplate('product_info') ?>
	</div>

</div>
