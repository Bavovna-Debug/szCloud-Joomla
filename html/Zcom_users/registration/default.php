<?php defined('_JEXEC') or die('Restricted access');

JHtml::_('behavior.keepalive');
JHtml::_('behavior.tooltip');
JHtml::_('behavior.formvalidation'); ?>

<div class="registration<?php echo $this->pageclass_sfx?>">
	<?php if ($this->params->get('show_page_heading')): ?>
		<h1> <?php echo $this->escape($this->params->get('page_heading')) ?> </h1>
	<?php endif ?>

	<form id="member-registration" action="<?php echo JRoute::_('index.php?option=com_users&task=registration.register') ?>" method="post" class="form-validate">

		<?php foreach ($this->form->getFieldsets() as $fieldset):
			$fields = $this->form->getFieldset($fieldset->name);
			if (count($fields)): ?>
				<fieldset class="north">
					<?php if (isset($fieldset->label)): ?>
						<legend>
							<?php echo JText::_($fieldset->label) ?>
						</legend>
					<?php endif ?>

					<dl>
						<?php foreach($fields as $field):
							if ($field->hidden):
								echo $field->input;
							else: ?>
								<dt style="width: 320px;">
									<?php echo $field->label;
									if (!$field->required && ($field->type != 'Spacer')): ?>
										<span class="optional">
											<?php echo JText::_('COM_USERS_OPTIONAL') ?>
										</span>
									<?php endif ?>
								</dt>

								<dd> <?php echo $field->input ?> </dd>

								<div class="clear"></div>
							<?php endif ?>
						<?php endforeach ?>
					</dl>
					
				</fieldset>
			<?php endif ?>
		<?php endforeach ?>

		<fieldset class="south">
			<input type="hidden" name="option" value="com_users" />
			<input type="hidden" name="task" value="registration.register" />

			<button type="submit" class="validate button reg">
				<?php echo JText::_('JREGISTER') ?>
			</button>

			<button type="reset" class="validate button reg">
				<?php echo JText::_('JCANCEL') ?>
			</button>

			<?php /* <a class="button reg" href="<?php echo JRoute::_('');?>" title="<?php echo JText::_('JCANCEL');?>"><?php echo JText::_('JCANCEL');?></a> */ ?>

			<?php echo JHtml::_('form.token') ?>
		</fieldset>

	</form>

</div>
