<?php defined('_JEXEC') or die('Restricted access');

$category = new Category($this->product->virtuemart_category_id);
$product = new Product($this->product->virtuemart_product_id);
$prices = Prices::all($product->productId());
$price = $prices[0];
$cloud = new ShopCloud($product);
$customs = Customs::byProductId($product->productId(), 'HOSTS');

$url = JRoute::_('index.php?option=com_virtuemart&view=productdetails&task=askquestion&virtuemart_product_id=' . $product->productId() . '&virtuemart_category_id=' . $category->categoryId() . '&tmpl=component'); ?>

<div class="north_frame">

	<?php if (VmConfig::get('show_emailfriend') || VmConfig::get('show_printicon') || VmConfig::get('pdf_button_enable')): ?>
		<div class="icons">
			<?php
			$link = 'index.php?tmpl=component&option=com_virtuemart&view=productdetails&virtuemart_product_id=' . $product->productId();
			$mail = 'index.php?option=com_virtuemart&view=productdetails&task=recommend&virtuemart_product_id=' . $product->productId() . '&virtuemart_category_id=' . $category->categoryId() . '&tmpl=component';

			if (VmConfig::get('pdf_icon', 1) == '1')
				echo $this->linkIcon($link . '&format=pdf', 'COM_VIRTUEMART_PDF', 'pdf_button', 'pdf_button_enable', false);

			echo $this->linkIcon($link . '&print=1', 'COM_VIRTUEMART_PRINT', 'printButton', 'show_printicon');
			echo $this->linkIcon($mail, 'COM_VIRTUEMART_EMAIL', 'emailButton', 'show_emailfriend'); ?>
		</div>
	<?php endif ?>

	<h1 class="title">
		<?php echo JText::sprintf('TPL_CLOUD_PRODUCT_VIEW_TITLE', $cloud->cloudName()) ?>
	</h1>

</div>

<div class="south_frame">

	<div class="west">
		<?php echo $product->productDescription() ?>
		<br /> <br />
		<?php echo $cloud->cloudDescription() ?>
	</div>

	<div class="east">

		<p class="overview">
			<?php echo $product->productBriefDescription() ?>
			<br /> <br />
			<?php echo $cloud->cloudBriefDescription() ?>
		</p>

		<div class="price">
			<span class="currency"> <?php echo Bookkeeping::CurrencySymbol($price->currencyId()) ?> </span>
			<span class="euro_cent"> <?php printf("%0.2f", $price->brutto()) ?> </span>
			<span class="incl_tax"> <?php echo '(' . JText::_('TPL_CLOUD_INCL_TAXES') . ')' ?> </span>
		</div>

		<a href="index.php?option=com_virtuemart&view=cart&task=add&virtuemart_product_id[]=<?php echo $product->productId() ?>&quantity[]=1">
			<button class="buy_now">
				<?php echo JText::_('TPL_CLOUD_PRODUCT_VIEW_BUY_NOW') ?>
			</button>
		</a>

	</div>

</div>
