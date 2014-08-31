<?php defined('_JEXEC') or die('Restricted access'); ?>

<form id="userForm" name="enterCouponCode" method="post" action="<?php echo JRoute::_('index.php') ?>">
    <input type="hidden" name="option" value="com_virtuemart" />
    <input type="hidden" name="view" value="cart" />
    <input type="hidden" name="task" value="setcoupon" />
    <input type="hidden" name="controller" value="cart" />

    <input type="text" name="coupon_code" size="20" maxlength="50" class="coupon" alt="<?php echo $this->coupon_text ?>" value="<?php echo $this->coupon_text ?>" onblur="if(this.value=='') this.value='<?php echo $this->coupon_text; ?>';" onfocus="if (this.value == '<?php echo $this->coupon_text ?>') this.value = '';" />
    <span class="details-button">
		<input class="details-button" type="submit" title="<?php echo JText::_('COM_VIRTUEMART_SAVE') ?>" value="<?php echo JText::_('COM_VIRTUEMART_SAVE') ?>" />
    </span>
</form>
