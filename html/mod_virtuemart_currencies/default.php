<?php defined('_JEXEC') or die('Restricted access');

jimport('vm2.bookkeeping'); ?>

<form id="currencies_form" class="xxx" action="<?php echo JURI::getInstance()->toString() ?>" method="post">

	<?php foreach ($currencies as $currency) {
		$currencyId = $currency->virtuemart_currency_id;
		$title = JText::sprintf('TPL_CLOUD_SWITCH_TO_CURRENCY', $currency->currency_txt); ?>
		<button name="virtuemart_currency_id" value="<?php echo $currencyId ?>" title="<?php echo $title ?>" onclick="this.form.submit();">
			<?php echo Bookkeeping::currencySymbol($currencyId) ?>
		</button>
	<?php } ?>

</form>
