<?php defined('_JEXEC') or die('Restricted access');

$closeDelimiter = false;
$openTable = true;
$hiddenFields = '';

echo $hiddenFields;

foreach ($this->userFields['fields'] as $field):

	if ($field['type'] == 'delimiter') {
		if ($closeDelimiter): ?>
			</table>
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
			<?php endif ?>
		<?php endif ?>

		<fieldset class="north">
			<h2> <?php echo $field['title'] ?> </h2>

			<?php
			$closeDelimiter = true;
			$openTable = true;
	} elseif ($field['hidden'] == true) {
		$hiddenFields .= $field['formcode'] . "\n";
	} else {
		if ($openTable):
			$openTable = false; ?>

			<table class="adminForm user-details">

		<?php endif ?>

				<tr>
					<td class="key" title="<?php echo $field['description'] ?>" >
						<label class="<?php echo $field['name'] ?>" for="<?php echo $field['name'] ?>_field">
							<?php echo $field['title'] . ($field['required'] ? ' *' : '') ?>
						</label>
					</td>
					<td>
						<?php echo $field['formcode'] ?>
					</td>
				</tr>
	<?php }

endforeach; ?>

			</table>
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
