<?php defined('_JEXEC') or die('Restricted access');

JHtml::_('behavior.keepalive');
JHtml::_('behavior.tooltip');
JHtml::_('behavior.formvalidation'); ?>

<div class="remind<?php echo $this->pageclass_sfx ?>">

	<?php if ($this->params->get('show_page_heading')): ?>
		<h1 class="componentheading">
			<span>
				<?php echo $this->escape($this->params->get('page_heading')) ?>
			</span>
		</h1>
		
		<br class="both" />
	<?php endif; ?>

	<form id="user-registration" target="_top" method="post" class="form-validate" action="<?php echo JRoute::_('index.php?option=com_users&task=remind.remind') ?>">

		<fieldset class="north">

			<?php foreach ($this->form->getFieldsets() as $fieldset): ?>

				<p> <?php echo JText::_($fieldset->label) ?> </p>

				<?php foreach ($this->form->getFieldset($fieldset->name) as $name => $field): ?>
					<?php echo $field->label ?>
					<?php echo $field->input ?>
				<?php endforeach; ?>

			<?php endforeach; ?>

		</fieldset>

		<fieldset class="south">

			<button type="submit"><?php echo JText::_('JSUBMIT') ?></button>

		</fieldset>

		<?php echo JHtml::_('form.token') ?>

	</form>

</div>
