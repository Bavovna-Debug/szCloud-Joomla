<?php defined('_JEXEC') or die('Restricted access');

$productsNumber = count($this->products);

$totalWidth = 920;
$headerWidth = 300;
$productWidth = floor(($totalWidth - $headerWidth - 2 - count($this->products)) / count($this->products));

$headerStyle = sprintf("width: %dpx;", $headerWidth);
$productStyle = sprintf("width: %dpx;", $productWidth);
$tabStyle = sprintf("font-size: 1.1em; font-weight: normal; height: auto; width: %dpx;", $productWidth - 20); ?>

<div class="table">

	<div class="header" style="<?php echo $headerStyle ?>">
		<div class="name"> <?php echo $this->category->categoryName() ?> </div>

		<ul class="list">
			<li class="even">
				<?php echo JText::_('TPL_CLOUD_CATEGORY_VIEW_DURATION') ?>
			</li>

			<li class="odd">
				<?php echo JText::_('TPL_CLOUD_CATEGORY_VIEW_CUSTOMER_SUPPORT') ?>
			</li>

			<li class="even">
				<?php echo JText::_('TPL_CLOUD_CATEGORY_VIEW_MAX_NUMBER_OF_HOSTS') ?>
			</li>

			<li class="odd">
				<?php echo JText::_('TPL_CLOUD_CATEGORY_VIEW_CUSTOMER_SUPPORT') ?>
			</li>

			<li class="even">
				<?php echo JText::_('TPL_CLOUD_CATEGORY_VIEW_MAX_NUMBER_OF_HOSTS') ?>
			</li>
		</ul>
	</div>

	<?php foreach ($this->products as $i => $product):

		$class = ($product->special()) ? 'special' : 'product';

		$cloud = new ShopCloud($product);
		$prices = Prices::all($product->productId());
		$price = $prices[0];
		$euro = floor($price->brutto());
		$cent = ($price->brutto() - floor($price->brutto())) * 100; ?>

		<div class="<?php echo $class ?>" style="<?php echo $productStyle ?>">
			<div class="name">
				<?php echo $product->productName() ?>
			</div>
		
			<div class="price">
				<span class="currency"> <?php echo Bookkeeping::CurrencySymbol($price->currencyId()) ?> </span>
				<span class="euro"> <?php echo $euro ?> </span>
				<span class="cent"> <?php printf(".%02d", $cent) ?> </span>
			</div>
		
			<ul class="list">
				<li class="even">
					<?php echo $cloud->printDuration() ?>
				</li>

				<li class="odd">
					<?php echo JText::_('TPL_CLOUD_CATEGORY_VIEW_CUSTOMER_SUPPORT_UNLIMITED') ?>
				</li>

				<li class="even">
					<?php echo $cloud->maxNumberOfHosts() ?>
				</li>

				<li class="odd">
					<?php echo JText::_('TPL_CLOUD_CATEGORY_VIEW_CUSTOMER_SUPPORT_UNLIMITED') ?>
				</li>

				<li class="even">
					<?php echo "OK" ?>
				</li>
			</ul>
			
			<a href="index.php?option=com_virtuemart&view=productdetails&virtuemart_product_id=<?php echo $product->productId() ?>">
				<div class="tab red" style="<?php echo $tabStyle ?>">
					<span> <?php echo JText::_('TPL_CLOUD_CATEGORY_VIEW_MORE_DETAILS') ?> </span>
				</div>
			</a>
		</div>
	
	<?php endforeach ?>
	
</div>
