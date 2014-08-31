<?php defined('_JEXEC') or die('Restricted access'); ?>

<fieldset class="north">

	<legend>
		<?php echo JText::_('COM_VIRTUEMART_USER_FORM_SHIPTO_LBL') ?>
	</legend>

	<?php echo $this->lists['shipTo'] ?>

</fieldset>

<?php if (!$this->userDetails->user_is_vendor): ?>
	<fieldset class="south">
		<button class="button" type="submit" onclick="javascript:return myValidator(userForm, 'saveUser');">
			<?php echo $this->button_lbl ?>
		</button>
		&nbsp;
		<button class="button" type="reset" onclick="window.location.href='<?php echo JRoute::_('index.php?option=com_virtuemart&view=user') ?>'">
			<?php echo JText::_('COM_VIRTUEMART_CANCEL') ?>
		</button>
	</fieldset>
<?php endif;
