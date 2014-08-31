<?php defined('_JEXEC') or die('Restricted access'); ?>

<table width="100%">
	<tr>
		<td width="50%" bgcolor="#CCC">
			<?php echo JText::_('COM_VIRTUEMART_USER_FORM_BILLTO_LBL') ?>
		</td>
		<td width="50%" bgcolor="#CCC">
			<?php echo JText::_('COM_VIRTUEMART_USER_FORM_SHIPTO_LBL') ?>
		</td>
	</tr>

	<tr>
    	<td width="50%">
			<?php foreach ($this->BTaddress['fields'] as $item) {
				if (!empty($item['value'])) {
					echo $item['title'] . ': ' . $this->escape($item['value']) . '<br/>';
				}
			} ?>
		</td>
    	<td width="50%">
			<?php if (!empty($this->STaddress['fields'])) {
				foreach ($this->STaddress['fields'] as $item) {
					if (!empty($item['value'])) {
						echo $item['title'] . ': ' . $this->escape($item['value']) . '<br/>';
					}
				}
			} else {
				foreach ($this->BTaddress['fields'] as $item) {
					if (!empty($item['value'])) {
						echo $item['title'] . ': ' . $this->escape($item['value']) . '<br/>';
					}
				}
			} ?>
		</td>
	</tr>
</table>
