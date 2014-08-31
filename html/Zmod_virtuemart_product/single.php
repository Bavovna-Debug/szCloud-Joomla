<?php defined('_JEXEC') or die('Restricted access'); ?>

<div class="vmgroup<?php echo $params->get('moduleclass_sfx') ?>">

	<?php if ($headerText) { ?>
		<div class="vmheader"><?php echo $headerText ?></div>
	<?php } ?>

	<div class="vmproduct<?php echo $params->get('moduleclass_sfx') ?>">

		<?php foreach ($products as $product) { ?>
			<div style="text-align: center;">
				<div class="spacer">
					<?php if (!empty($product->images[0]))
						$image = $product->images[0]->displayMediaThumb('class="featuredProductImage" border="0"', false);
					else	$image = '';

			               $url = JRoute::_('index.php?option=com_virtuemart&view=productdetails&virtuemart_product_id=' . $product->virtuemart_product_id . '&virtuemart_category_id=' . $product->virtuemart_category_id);

					echo JHTML::_('link', $url, $image, array('title' => $product->product_name)); ?>

					<div class="clear"></div>

					<a href="<?php echo $url ?>"><?php echo $product->product_name ?></a>

					<div class="clear"></div>

					<?php if ($show_price) {
						// echo $currency->priceDisplay($product->prices['salesPrice']);
						if (!empty($product->prices['salesPrice']))
							echo $currency->createPriceDiv('salesPrice', '', $product->prices, true);
						// if ($product->prices['salesPriceWithDiscount']>0) echo $currency->priceDisplay($product->prices['salesPriceWithDiscount']);
						if (!empty($product->prices['salesPriceWithDiscount']))
							echo $currency->createPriceDiv('salesPriceWithDiscount', '', $product->prices, true);
					}

					if ($show_addtocart)
						echo mod_virtuemart_product::addtocart($product); ?>

				</div>
			</div>

		<?php }

		if ($footerText) { ?>
			<div class="vmheader"><?php echo $footerText ?></div>
		<?php } ?>
	</div>
</div>
