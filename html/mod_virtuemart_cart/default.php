<?php defined('_JEXEC') or die('Restricted access'); ?>

<?php if (count($data->products) > 0): ?>
	<div class="cart_logo"></div>

	<div class="total_products">
		<?php echo $data->totalProductTxt ?>
	</div>

	<div class="bill_total">
		<?php echo $data->billTotal ?>
	</div>

	<div class="cart_show">
		<?php echo $data->cart_show ?>
	</div>

	<noscript>
	<?php echo JText::_('MOD_VIRTUEMART_CART_AJAX_CART_PLZ_JAVASCRIPT') ?>
	</noscript>
<?php endif ?>
