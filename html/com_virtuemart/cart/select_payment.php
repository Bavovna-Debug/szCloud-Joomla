<?php defined('_JEXEC') or die('Restricted access');

if (VmConfig::get('oncheckout_show_steps', 1)): ?>
	<div class="checkoutStep" id="checkoutStep3">
		<?php echo JText::_('COM_VIRTUEMART_USER_FORM_CART_STEP3') ?>
	</div>
<?php endif ?>

<form method="post" id="paymentForm" name="choosePaymentRate" action="<?php echo JRoute::_('index.php') ?>" class="form-validate">

	<input type="hidden" name="option" value="com_virtuemart" />
	<input type="hidden" name="view" value="cart" />
	<input type="hidden" name="task" value="setpayment" />
	<input type="hidden" name="controller" value="cart" />

   	<fieldset class="north">

		<legend> <?php echo JText::_('COM_VIRTUEMART_CART_SELECT_PAYMENT') ?> </legend>

		<?php if ($this->found_payment_method): ?>
				<?php foreach ($this->paymentplugins_payments as $paymentplugin_payments) {
					if (is_array($paymentplugin_payments)) {
						foreach ($paymentplugin_payments as $paymentplugin_payment) {
							echo $paymentplugin_payment; ?>
							<div class="empty"></div>
						<?php }
					}
				} ?>
		<?php else: ?>
			<h1> <?php echo $this->payment_not_found_text ?> </h1>
		<?php endif ?>

		<?php if($this->cart->getInCheckOut()) {
			$buttonclass = 'button vm-button-correct';
		} else {
			$buttonclass = 'default';
		} ?>
	</fieldset>

	<fieldset class="south">
		<button class="<?php echo $buttonclass ?>" type="submit">
			<?php echo JText::_('COM_VIRTUEMART_SAVE') ?>
		</button>
		&nbsp;
		<button class="<?php echo $buttonclass ?>" type="reset" onClick="window.location.href='<?php echo JRoute::_('index.php?option=com_virtuemart&view=cart') ?>'" >
			<?php echo JText::_('COM_VIRTUEMART_CANCEL') ?>
		</button>
	</fieldset>
	
</form>
