<?php defined('_JEXEC') or die('Restricted access');

require JPATH_SITE . DS . 'components' . DS . 'com_cloud' . DS . 'helpers.php';

$lang =& JFactory::getLanguage();
$lang->load('com_cloud', JPATH_SITE);

$product = new Product($this->product->virtuemart_product_id);
$prices = Prices::getProductPrices($product->productId());
$price = $prices[0];
$cloud = new ShopCloud($product);

if (isset($this->type)) {
	$document = JFactory::getDocument();
	$document->setTitle($cloud->cloudName());
	$document->setName($cloud->cloudName());
	$document->setDescription($cloud->cloudBriefDescription());
} ?>

<div class="productdetails-pdf">

	<h1> <?php echo $cloud->cloudName() ?> </h1>

	<?php /* if (!empty($this->product->images) && count($this->product->images) > 0) {
		echo $this->product->images[0]->displayMediaFull('class="product-image"', false); ?>
		<div class="additional-images">
		<?php // List all Images
		foreach ($this->product->images as $image) {
			echo $image->displayMediaThumb('class="product-image"'); //'class="modal"'

		} ?>
		</div>
	<?php } */ ?>

	<div class="product_short_description">
		<?php echo $cloud->cloudBriefDescription() ?>
	</div>

	<div>
		<div class="width50 floatright">
			<div class="spacer-buy-area">
				<?php
				$rating = empty($this->rating)? JText::_('COM_VIRTUEMART_UNRATED'):$this->rating->rating;
				echo JText::_('COM_VIRTUEMART_RATING') . $rating;

				// Product Price
				if ($this->show_prices) { ?>
				<div class="product-price" id="productPrice<?php echo $this->product->virtuemart_product_id ?>">
				<?php
				if ($this->product->product_unit && VmConfig::get ( 'price_show_packaging_pricelabel' )) {
					echo "<strong>" . JText::_ ( 'COM_VIRTUEMART_CART_PRICE_PER_UNIT' ) . ' (' . $this->product->product_unit . "):</strong>";
				} else {
					echo "<strong>" . JText::_ ( 'COM_VIRTUEMART_CART_PRICE' ) . "</strong>";
				}
				echo $this->currency->createPriceDiv ( 'variantModification', 'COM_VIRTUEMART_PRODUCT_VARIANT_MOD', $this->product->prices );
				echo $this->currency->createPriceDiv ( 'basePriceWithTax', 'COM_VIRTUEMART_PRODUCT_BASEPRICE_WITHTAX', $this->product->prices );
				echo $this->currency->createPriceDiv ( 'discountedPriceWithoutTax', 'COM_VIRTUEMART_PRODUCT_DISCOUNTED_PRICE', $this->product->prices );
				echo $this->currency->createPriceDiv ( 'salesPriceWithDiscount', 'COM_VIRTUEMART_PRODUCT_SALESPRICE_WITH_DISCOUNT', $this->product->prices );
				echo $this->currency->createPriceDiv ( 'salesPrice', 'COM_VIRTUEMART_PRODUCT_SALESPRICE', $this->product->prices );
				echo $this->currency->createPriceDiv ( 'priceWithoutTax', 'COM_VIRTUEMART_PRODUCT_SALESPRICE_WITHOUT_TAX', $this->product->prices );
				echo $this->currency->createPriceDiv ( 'discountAmount', 'COM_VIRTUEMART_PRODUCT_DISCOUNT_AMOUNT', $this->product->prices );
				echo $this->currency->createPriceDiv ( 'taxAmount', 'COM_VIRTUEMART_PRODUCT_TAX_AMOUNT', $this->product->prices ); ?>
				</div>
				<?php } ?>

				<?php // Availability Image
				/* TO DO add width and height to the image */
				if (!empty($this->product->product_availability)) { ?>
				<div class="availability">
					<?php echo JHTML::image(JURI::root().VmConfig::get('assets_general_path').'images/availability/'.$this->product->product_availability, $this->product->product_availability, array('class' => 'availability')); ?>
				</div>
				<?php } ?>

			</div>
		</div>
	<div class="clear"></div>
	</div>

	<div class="product_description">
		<span class="title"> <?php echo JText::_('COM_VIRTUEMART_PRODUCT_DESC_TITLE') ?> </span>
		<?php echo $cloud->cloudDescription() ?>
	</div>

	<?php // Product custom_fields TODO relation to Childs
	if (!empty($this->product->customfields)) { ?>
		<div class="product-fields">
		<?php
		$custom_title = null ;
		foreach ($this->product->customfields as $field){
			?><div style="display:inline-block;" class="product-field product-field-type-<?php echo $field->field_type ?>">
			<?php if ($field->custom_title != $custom_title) { ?>
				<span class="product-fields-title" ><strong><?php echo JText::_($field->custom_title); ?></strong></span>
				<?php //echo JHTML::tooltip($field->custom_tip, $field->custom_title, 'tooltip.png');
			} ?>
			<span class="product-field-display"><?php echo $field->display ?></span>
			<span class="product-field-desc"><?php echo jText::_($field->custom_field_desc) ?></span>
			</div>
			<?php
			$custom_title = $field->custom_title;
		} ?>
		</div>
		<?php
	} // Product custom_fields END ?>

	<?php // Product Packaging
	$product_packaging = '';
	if ($this->product->product_box) { ?>
	<div class="product-box">
		<?php
	        echo JText::_('COM_VIRTUEMART_PRODUCT_UNITS_IN_BOX') .$this->product->product_box;
	    ?>
	</div>
	<?php } // Product Packaging END ?>

	<?php // Product Files
	// foreach ($this->product->images as $fkey => $file) {
		// Todo add downloadable files again
		// if( $file->filesize > 0.5) $filesize_display = ' ('. number_format($file->filesize, 2,',','.')." MB)";
		// else $filesize_display = ' ('. number_format($file->filesize*1024, 2,',','.')." KB)";

		/* Show pdf in a new Window, other file types will be offered as download */
		// $target = stristr($file->file_mimetype, "pdf") ? "_blank" : "_self";
		// $link = JRoute::_('index.php?view=productdetails&task=getfile&virtuemart_media_id='.$file->virtuemart_media_id.'&virtuemart_product_id='.$this->product->virtuemart_product_id);
		// echo JHTMl::_('link', $link, $file->file_title.$filesize_display, array('target' => $target));
	// }
	?>

	<?php // Related Products
/*	if ($this->product->related && !empty($this->product->related)) {
		$iRelatedCol = 1;
		$iRelatedProduct = 1;
		$RelatedProducts_per_row = 4 ;
		$Relatedcellwidth = ' width'.floor ( 100 / $RelatedProducts_per_row );
		$verticalseparator = " vertical-separator"; ?>

		<div class="related-products-view">
			<h4><?php echo JText::_('COM_VIRTUEMART_RELATED_PRODUCTS_HEADING') ?></h4>

		<?php // Start the Output
		foreach ($this->product->related as $rkey => $related) {

			// Show the horizontal seperator
			if ($iRelatedCol == 1 && $iRelatedProduct > $RelatedProducts_per_row) { ?>
				<div class="horizontal-separator"></div>
			<?php }

			// this is an indicator wether a row needs to be opened or not
			if ($iRelatedCol == 1) { ?>
				<div class="row">
			<?php }

			// Show the vertical seperator
			if ($iRelatedProduct == $RelatedProducts_per_row or $iRelatedProduct % $RelatedProducts_per_row == 0) {
				$show_vertical_separator = ' ';
			} else {
				$show_vertical_separator = $verticalseparator;
			}

					// Show Products ?>
					<div class="product floatleft<?php echo $Relatedcellwidth . $show_vertical_separator ?>">
						<div class="spacer">
							<div>
								<h3><?php echo JHTML::_('link', $related->link, $related->product_name); ?></h3>

								<?php // Product Image
								echo JHTML::link($related->link, $related->images[0]->displayMediaThumb('title="'.$related->product_name.'"')); ?>

								<div class="product-price">
								<?php /** @todo Format pricing  ?>
								<?php if (is_array($related->price)) echo $related->price['salesPrice']; ?>
								</div>

								<div>
								<?php // Product Details Button
								echo JHTML::link($related->link, JText::_ ( 'COM_VIRTUEMART_PRODUCT_DETAILS' ), array ('title' => $related->product_name, 'class' => 'product-details' ) ); ?>
								</div>
							</div>
						<div class="clear"></div>
						</div>
					</div>
			<?php
			$iRelatedProduct ++;

			// Do we need to close the current row now?
			if ($iRelatedCol == $RelatedProducts_per_row) { ?>
				<div class="clear"></div>
				</div>
			<?php
			$iRelatedCol = 1;
			} else {
				$iRelatedCol ++;
			}
		}
		// Do we need a final closing row tag?
		if ($iRelatedCol != 1) { ?>
			<div class="clear"></div>
			</div>
		<?php } ?>
		</div>
	<?php } */ ?>

	<?php // Customer Reviews
	/*if($this->allowRating || $this->showReview) {
		$maxrating = VmConfig::get('vm_maximum_rating_scale',5);
		$ratingsShow = VmConfig::get('vm_num_ratings_show',3); // TODO add  vm_num_ratings_show in vmConfig
		$starsPath = JURI::root().VmConfig::get('assets_general_path').'images/stars/';
		$stars = array();
		$showall = JRequest::getBool('showall', false);
		for ($num=0 ; $num <= $maxrating; $num++  ) {
			$title = (JText::_("VM_RATING_TITLE").' : '. $num . '/' . $maxrating) ;
			$stars[] = JHTML::image($starsPath.$num.'.gif', JText::_($num.'_STARS'), array("title" => $title) );
		} ?>

	<div class="customer-reviews">
	<?php
	}*/

	/*if($this->showReview) {
		$alreadycommented = false;
		?>
		<h4><?php echo JText::_('COM_VIRTUEMART_REVIEWS') ?></h4>

		<div class="list-reviews">
			<?php
			$i=0;
			foreach($this->rating_reviews as $review ) {
				if ($i % 2 == 0) {
   					$color = 'normal';
				} else {
					$color = 'highlight';
				}

				/* Check if user already commented */
//				if ($review->virtuemart_userid == $this->user->id) {
//					$alreadycommented = true;
//				}

				// Loop through all reviews
/*				if (!empty($this->rating_reviews)) { ?>
				<div class="<?php echo $color ?>">
					<span class="date"><?php echo JHTML::date($review->created_on, JText::_('DATE_FORMAT_LC')); ?></span>
					<?php //echo $stars[ $review->review_rating ] //Attention the review rating is the rating of the review itself, rating for the product is the vote !?>
					<blockquote><?php echo $review->comment; ?></blockquote>
					<span class="bold"><?php echo $review->customer ?></span>
				</div>
				<?php
				}
				$i++ ;
				if ( $i == $ratingsShow && !$showall) break;
			}

			if (count($this->rating_reviews) < 1) {
				// "There are no reviews for this product" ?>
				<span class="step"><?php echo JText::_('COM_VIRTUEMART_NO_REVIEWS') ?></span>
			<?php
			} else {
				/* Show all reviews */
/*				if (!$showall && count($this->rating_reviews) >= $ratingsShow ) {
					$attribute = array('class'=>'details', 'title'=>JText::_('COM_VIRTUEMART_MORE_REVIEWS'));
					echo JHTML::link($this->more_reviews, JText::_('COM_VIRTUEMART_MORE_REVIEWS'),$attribute);
				}
			} ?>
		<div class="clear"></div>
		</div>

<?php
	}
//					} else {
//						echo '<strong>'.JText::_('COM_VIRTUEMART_DEAR').$this->user->name.',</strong><br />' ;
//						echo JText::_('COM_VIRTUEMART_REVIEW_ALREADYDONE');
//					}

	if($this->allowRating || $this->showReview) {
	?>
	</div>
	<?php
	} */ ?>
</div>
