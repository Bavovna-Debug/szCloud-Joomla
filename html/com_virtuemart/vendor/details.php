<?php defined('_JEXEC') or die('Restricted access'); ?>

<div class="vendor-details-view">

	<h1>

		<?php echo $this->vendor->vendor_store_name;

		if (!empty($this->vendor->images[0])): ?>
			<div class="vendor-image">
				<?php echo $this->vendor->images[0]->displayMediaThumb('', false) ?>
			</div>
		<?php endif ?>

	</h1>

</div>

<div class="vendor-description">

	<?php echo $this->vendor->vendor_store_desc ?>

</div>