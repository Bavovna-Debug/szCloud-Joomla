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

<?php if (!class_exists('ShopFunctions'))
	require(JPATH_VM_ADMINISTRATOR . DS . 'helpers' . DS . 'shopfunctions.php');
	echo shopFunctions::renderVendorAddress($this->vendor->virtuemart_vendor_id);

	$min = VmConfig::get('asks_minimum_comment_length', 50);
	$max = VmConfig::get('asks_maximum_comment_length', 2000);

	vmJsApi::JvalideForm();
	$document = JFactory::getDocument();
	$document->addScriptDeclaration('
		jQuery(function($) {
			$("#askform").validationEngine("attach");
			$("#comment").keyup( function () {
				var result = $(this).val();
					$("#counter").val( result.length );
				});
		});
	');
?>

<h3> <?php echo JText::_('COM_VIRTUEMART_VENDOR_ASK_QUESTION') ?> </h3>

<div class="clear"></div>

<div class="form-field">

	<form method="post" class="form-validate" action="<?php echo JRoute::_('index.php') ?>" name="askform" id="askform">

		<label> <?php echo JText::_('COM_VIRTUEMART_USER_FORM_NAME') ?> :
			<input type="text" class="validate[required,minSize[4],maxSize[64]]" value="<?php echo $this->user->name ?>" name="name" id="name" size="30" validation="required name" />
		</label>

		<br />

		<label> <?php echo JText::_('COM_VIRTUEMART_USER_FORM_EMAIL') ?> :
			<input type="text" class="validate[required,custom[email]]" value="<?php echo $this->user->email ?>" name="email" id="email" size="30" validation="required email" />
		</label>

		<br/>

		<label>
			<?php $ask_comment = JText::sprintf('COM_VIRTUEMART_ASK_COMMENT', $min, $max);
			echo $ask_comment; ?>

			<br />

			<textarea title="<?php echo $ask_comment ?>" class="validate[required,minSize[<?php echo $min ?>],maxSize[<?php echo $max ?>]] field" id="comment" name="comment" cols="30" rows="10"></textarea>
		</label>

		<div class="submit">
			<input class="highlight-button" type="submit" name="submit_ask" title="<?php echo JText::_('COM_VIRTUEMART_ASK_SUBMIT') ?>" value="<?php echo JText::_('COM_VIRTUEMART_ASK_SUBMIT') ?>" />

			<div class="width50 floatright right paddingtop">
				<?php echo JText::_('COM_VIRTUEMART_ASK_COUNT') ?>
				<input type="text" value="0" size="4" class="counter" id="counter" name="counter" maxlength="4" readonly="readonly" />
			</div>
		</div>

		<input type="hidden" name="view" value="vendor" />
		<input type="hidden" name="virtuemart_vendor_id" value="<?php echo $this->vendor->virtuemart_vendor_id ?>" />
		<input type="hidden" name="option" value="com_virtuemart" />
		<input type="hidden" name="task" value="mailAskquestion" />
		<?php echo JHTML::_('form.token') ?>

	</form>

</div>