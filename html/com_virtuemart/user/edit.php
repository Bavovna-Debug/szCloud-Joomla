<?php defined('_JEXEC') or die('Restricted access');

JHTML::_('behavior.formvalidation');
JHTML::stylesheet('vmpanels.css', JURI::root() . 'components/com_virtuemart/assets/css/'); ?>

<style type="text/css">
.invalid {
	border-color: #f00;
	background-color: #ffd;
	color: #000;
}
label.invalid {
	background-color: #fff;
	color: #f00;
}
</style>

<script language="javascript">
	function myValidator(f, t)
	{
		f.task.value=t;
		if (document.formvalidator.isValid(f)) {
			f.submit();
			return true;
		} else {
			var msg = '<?php echo addslashes( JText::_('COM_VIRTUEMART_USER_FORM_MISSING_REQUIRED_JS') ); ?>';
			alert (msg);
		}
		return false;
	}
</script>

<h1> <?php echo $this->page_title ?> </h1>

<?php echo shopFunctionsF::getLoginForm(false) ?>

<h2>
	<?php if ($this->userDetails->virtuemart_user_id == 0)
		echo JText::_('COM_VIRTUEMART_YOUR_ACCOUNT_REG'); ?>
</h2>

<form method="post" id="adminForm" name="userForm" action="<?php echo JRoute::_('index.php?view=user',$this->useXHTML,$this->useSSL) ?>" class="form-validate">
	<input type="hidden" name="option" value="com_virtuemart" />
	<input type="hidden" name="controller" value="user" />

	<?php if ($this->userDetails->user_is_vendor): ?>
		<div class="buttonBar-right">
			<button class="button" type="submit" onclick="javascript:return myValidator(userForm, 'saveUser');" >
				<?php echo $this->button_lbl ?>
			</button>
			&nbsp;
			<button class="button" type="reset" onclick="window.location.href='<?php echo JRoute::_('index.php?option=com_virtuemart&view=user') ?>'" >
				<?php echo JText::_('COM_VIRTUEMART_CANCEL') ?>
			</button>
		</div>
	<?php endif;

	if ($this->userDetails->virtuemart_user_id != 0) {
		$tabarray = array();
		if ($this->userDetails->user_is_vendor) {
			if (!empty($this->add_product_link))
				echo $this->add_product_link;
			$tabarray['vendor'] = 'COM_VIRTUEMART_VENDOR';
		}

		$tabarray['shopper'] = 'COM_VIRTUEMART_SHOPPER_FORM_LBL';
		if (!empty($this->shipto))
			$tabarray['shipto'] = 'COM_VIRTUEMART_USER_FORM_ADD_SHIPTO_LBL';

		if (($_ordcnt = count($this->orderlist)) > 0)
			$tabarray['orderlist'] = 'COM_VIRTUEMART_YOUR_ORDERS';

		shopFunctionsF::buildTabs($this, $tabarray);
	 } else {
		echo $this->loadTemplate('shopper');
	 } ?>

	<?php echo JHTML::_( 'form.token' ) ?>
</form>
