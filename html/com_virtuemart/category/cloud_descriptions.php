<?php defined('_JEXEC') or die('Restricted access');

foreach ($this->products as $product): ?>
	<div class="product_description">
		<h2> <?php echo $product->productName() ?> </h2>

		<span>
			<?php echo $product->productBriefDescription(); ?>
		</span>

		<a href="index.php?option=com_virtuemart&view=productdetails&virtuemart_product_id=<?php echo $product->productId() ?>">
			<span> <?php echo JText::_('TPL_CLOUD_CATEGORY_VIEW_LEARN_MORE') ?> </span>
		</a>
	</div>
<?php endforeach ?>
