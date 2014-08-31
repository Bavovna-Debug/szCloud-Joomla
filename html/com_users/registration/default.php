<?php defined('_JEXEC') or die('Restricted access');

JHtml::_('behavior.keepalive');
JHtml::_('behavior.tooltip');
JHtml::_('behavior.formvalidation'); ?>

<div class="registration<?php echo $this->pageclass_sfx ?>">

	<?php if ($this->params->get('show_page_heading')): ?>
		<h1 class="componentheading">
			<span>
				<?php echo $this->escape($this->params->get('page_heading')) ?>
			</span>
		</h1>
	<?php endif; ?>

	<form id="member-registration" target="_top" method="post" class="form-validate" action="<?php echo JRoute::_('index.php?option=com_users&task=registration.register') ?>">

		<?php foreach ($this->form->getFieldsets() as $fieldset): ?>

			<fieldset class="north">

				<?php if (isset($fieldset->label)): ?>
					<legend> <?php echo JText::_($fieldset->label) ?> </legend>
				<?php endif; ?>

				<?php foreach ($this->form->getFieldset($fieldset->name) as $name => $field): ?>
					<dl class="dl-horizontal" style="margin-bottom: 10px;">

						<?php if ($field->hidden) {
							echo $field->input;
						} else {
							if ($field->required): ?>
								<dt style="width: 200px;">
									<?php echo $field->label ?>
								</dt>

								<dd>
									<?php if (!$field->required && (!$field->type == "spacer")): ?>
										<span class="optional">
											<?php echo JText::_('COM_USERS_OPTIONAL') ?>
										</span>
									<?php endif ?>

									<?php echo $field->input ?>
								</dd>
							<?php endif; ?>

							<div class="clear"></div>
						<?php } ?>
					</dl>
				<?php endforeach ?>
			</fieldset>

		<?php endforeach; ?>

		<fieldset class="south">
			<button type="submit"><?php echo JText::_('JSUBMIT') ?></button>
		</fieldset>

		<?php echo JHtml::_('form.token') ?>

	</form>

</div>
