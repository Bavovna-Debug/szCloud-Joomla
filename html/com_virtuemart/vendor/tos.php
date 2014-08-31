<?php defined('_JEXEC') or die('Restricted access'); ?>

<div class="vendor-details-view">

	<h1>

		<?php echo $this->vendor->vendor_store_name ?>
		
		<br />
		
		<strong> <?php echo JText::_('COM_VIRTUEMART_VENDOR_TOS') ?> </strong>

		<?php if (!empty($this->vendor->images[0])): ?>
			<div class="vendor-image">
				<?php echo $this->vendor->images[0]->displayMediaThumb('', false) ?>
			</div>
		<?php endif ?>

	</h1>

</div>

<?php if(!empty($this->vendor->vendor_terms_of_service)): ?>

	<div class="vendor-description">
		<?php echo $this->vendor->vendor_terms_of_service ?>
	</div>

<?php endif ?>

<div class="clear"></div>