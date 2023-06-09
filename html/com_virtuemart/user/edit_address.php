<?php defined('_JEXEC') or die('Restricted access');

JHTML::_('behavior.formvalidation');
JHTML::stylesheet('vmpanels.css', JURI::root() . 'components/com_virtuemart/assets/css/');

if ($this->fTask === 'savecartuser') {
	$rtask = 'registercartuser';
	$url = 0;
} else {
	$rtask = 'registercheckoutuser';
	$url = JRoute::_('index.php?option=com_virtuemart&view=cart&task=checkout', $this->useXHTML, $this->useSSL);
} ?>

<h1> <?php echo $this->page_title ?> </h1>

<?php echo shopFunctionsF::getLoginForm(TRUE, FALSE, $url); ?>

<script language="javascript">
	function myValidator(f, t)
	{
		f.task.value = t;
		if (document.formvalidator.isValid(f)) {
			f.submit();
			return true;
		} else {
			var msg = '<?php echo addslashes(JText::_('COM_VIRTUEMART_USER_FORM_MISSING_REQUIRED_JS')) ?>';
			alert(msg + ' ');
		}
		return false;
	}

	function callValidatorForRegister(f)
	{
		var elem = jQuery('#username_field');
		elem.attr('class', "required");

		var elem = jQuery('#name_field');
		elem.attr('class', "required");

		var elem = jQuery('#password_field');
		elem.attr('class', "required");

		var elem = jQuery('#password2_field');
		elem.attr('class', "required");

		var elem = jQuery('#userForm');

		return myValidator(f, '<?php echo $rtask ?>');
	}
</script>

<form method="post" id="userForm" name="userForm" class="form-validate">

	<input type="hidden" name="option" value="com_virtuemart"/>
	<input type="hidden" name="view" value="user"/>
	<input type="hidden" name="controller" value="user"/>
	<input type="hidden" name="task" value="<?php echo $this->fTask ?>"/>
	<input type="hidden" name="layout" value="<?php echo $this->getLayout() ?>"/>
	<input type="hidden" name="address_type" value="<?php echo $this->address_type ?>"/>
	<?php if (!empty($this->virtuemart_userinfo_id)): ?>
		<input type="hidden" name="shipto_virtuemart_userinfo_id" value="<?php echo (int) $this->virtuemart_userinfo_id ?>" />
	<?php endif ?>

	<fieldset class="north">

		<legend>
			<?php if ($this->address_type == 'BT') {
				echo JText::_('COM_VIRTUEMART_USER_FORM_EDIT_BILLTO_LBL');
			} else {
				echo JText::_('COM_VIRTUEMART_USER_FORM_ADD_SHIPTO_LBL');
			} ?>
		</legend>

		<?php if (!class_exists('VirtueMartCart'))
			require(JPATH_VM_SITE . DS . 'helpers' . DS . 'cart.php');

		if (count($this->userFields['functions']) > 0) {
			echo '<script language="javascript">' . "\n";
			echo join("\n", $this->userFields['functions']);
			echo '</script>' . "\n";
		}

		echo $this->loadTemplate('userfields'); ?>

	</fieldset>

	<fieldset class="south">
		<div class="control-buttons">
			<?php if (strpos($this->fTask, 'cart') || strpos($this->fTask, 'checkout')) {
				$rview = 'cart';
			} else {
				$rview = 'user';
			}

			if (strpos($this->fTask, 'checkout') || $this->address_type == 'ST') {
				$buttonclass = 'default';
			} else {
				$buttonclass = 'button vm-button-correct';
			}

			if (VmConfig::get('oncheckout_show_register', 1) && ($this->userId == 0) && !VmConfig::get('oncheckout_only_registered', 0) && ($this->address_type == 'BT') and ($rview == 'cart'))
				echo JText::sprintf('COM_VIRTUEMART_ONCHECKOUT_DEFAULT_TEXT_REGISTER',
					JText::_('COM_VIRTUEMART_REGISTER_AND_CHECKOUT'),
					JText::_('COM_VIRTUEMART_CHECKOUT_AS_GUEST'));

			if (VmConfig::get('oncheckout_show_register', 1) && ($this->userId == 0) && ($this->address_type == 'BT') and ($rview == 'cart')): ?>

				<button class="<?php echo $buttonclass ?>" type="submit" onclick="javascript:return callValidatorForRegister(userForm);"
						title="<?php echo JText::_('COM_VIRTUEMART_REGISTER_AND_CHECKOUT') ?>"><?php echo JText::_('COM_VIRTUEMART_REGISTER_AND_CHECKOUT') ?>
				</button>

				<?php if (!VmConfig::get('oncheckout_only_registered', 0)): ?>
					<button class="<?php echo $buttonclass ?>" title="<?php echo JText::_('COM_VIRTUEMART_CHECKOUT_AS_GUEST') ?>" type="submit"
					        onclick="javascript:return myValidator(userForm, '<?php echo $this->fTask ?>');"><?php echo JText::_('COM_VIRTUEMART_CHECKOUT_AS_GUEST') ?>
					</button>
				<?php endif ?>

				<button class="default" type="reset"
				        onclick="window.location.href='<?php echo JRoute::_('index.php?option=com_virtuemart&view=' . $rview) ?>'"><?php echo JText::_('COM_VIRTUEMART_CANCEL') ?>
				</button>

			<?php else: ?>

				<button class="<?php echo $buttonclass ?>" type="submit"
				        onclick="javascript:return myValidator(userForm, '<?php echo $this->fTask ?>');"><?php echo JText::_('COM_VIRTUEMART_SAVE') ?>
				</button>

				<button class="default" type="reset"
				        onclick="window.location.href='<?php echo JRoute::_('index.php?option=com_virtuemart&view=' . $rview) ?>'"><?php echo JText::_('COM_VIRTUEMART_CANCEL') ?>
				</button>

			<?php endif ?>
		</div>
	</fieldset>

	<?php if ($this->userDetails->JUser->get('id'))
		echo $this->loadTemplate('addshipto');

	echo JHTML::_ ('form.token'); ?>

</form>
