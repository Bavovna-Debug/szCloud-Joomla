<?php defined('_JEXEC') or die('Restricted access');

jimport('vm2.bookkeeping');
jimport('vm2.categories');
jimport('vm2.prices');
jimport('vm2.products');
jimport('cloud.shop');

$lang =& JFactory::getLanguage();
$lang->load('lib_vm2', JPATH_SITE);
$lang->load('lib_cloud', JPATH_SITE);

$this->category = new Category($this->category->virtuemart_category_id);
$this->products = Products::all($this->category->categoryId()); ?>

<div class="category_cloud">

	<div class="description">
		<?php echo $this->category->categoryDescription() ?>
	</div>

	<?php echo $this->loadTemplate('table') ?>

	<?php echo $this->loadTemplate('descriptions') ?>

</div>
