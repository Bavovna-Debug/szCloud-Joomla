<?php defined('_JEXEC') or die('Restricted access');

$categories = Categories::all(1); ?>

<div class="categories">

	<?php foreach ($categories as $category):

		$url = JRoute::_('index.php?option=com_virtuemart&view=category&virtuemart_category_id=' . $category->categoryId()); ?>

    	<div class="category">

    	    <div class="description">
				
				<h2>
					<?php echo $category->categoryName() ?>
				</h2>

				<?php $images = Medias::forCategory($category->categoryId());
				if (!empty($images)): ?>
					<div class="image">
						<a href="<?php echo $url ?>" title="<?php echo $category->categoryName() ?>">							
							<?php //echo $category->images[0]->displayMediaThumb('', false) ?>
						</a>
					</div>
				<?php endif;

    	    	echo $category->categoryDescription() ?>

				<a href="<?php echo $url ?>">
					<?php echo JText::_('TPL_CLOUD_SHOP_VIEW_LEARN_MORE') ?>
				</a>

			</div>

    	    <div class="products">

				<?php $products = Products::all($category->categoryId());
				foreach ($products as $product):

					$class = ($product->special()) ? 'special' : 'product';

					$cloud = new ShopCloud($product);
					$prices = Prices::all($product->productId());
					$price = $prices[0];
					$euro = floor($price->brutto());
					$cent = ($price->brutto() - floor($price->brutto())) * 100; ?>

					<div class="<?php echo $class ?>">
						<div class="name">
							<?php echo $product->productName() ?>
						</div>

						<div class="duration">
							<?php echo $cloud->printDuration() ?>
						</div>

						<div class="max_hosts">
							<?php echo $cloud->maxNumberOfHosts() . ' ' . JText::_('TPL_CLOUD_HOSTS') ?>
						</div>

						<div class="ip">
							<?php if ($cloud->supportsIPv6())
								echo JText::_('TPL_CLOUD_SHOP_VIEW_IPV4_IPV6');
							else
								echo JText::_('TPL_CLOUD_SHOP_VIEW_IPV4_ONLY'); ?>
						</div>

						<div class="price">
							<span class="currency"> <?php echo Bookkeeping::CurrencySymbol($price->currencyId()) ?> </span>
							<span class="euro"> <?php echo $euro ?> </span>
							<span class="cent"> <?php printf(".%02d", $cent) ?> </span>
						</div>

						<div class="buy">
							<a href="index.php?option=com_virtuemart&view=productdetails&virtuemart_product_id=<?php echo $product->productId() ?>">
								<span> <?php echo JText::_('TPL_CLOUD_SHOP_VIEW_BUY_NOW') ?> </span>
							</a>
						</div>

					</div>
				<?php endforeach ?>

			</div>

		</div>

    <?php endforeach ?>

</div>
