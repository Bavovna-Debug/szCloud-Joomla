<?php defined('_JEXEC') or die('Restricted access');

if (!isset($this->show))
	$this->show = TRUE;
if (!isset($this->from_cart))
	$this->from_cart = FALSE;
if (!isset($this->order))
	$this->order = FALSE;

if (!class_exists('shopFunctionsF'))
	require(JPATH_VM_SITE . DS . 'helpers' . DS . 'shopfunctionsf.php');

$comUserOption = shopfunctionsF::getComUserOption();
if (empty($this->url)){
	$uri = JFactory::getURI();
	$url = $uri->toString(array('path', 'query', 'fragment'));
} else {
	$url = $this->url;
}

$user = JFactory::getUser();

if ($this->show and ($user->id == 0)):
	JHtml::_('behavior.formvalidation');
	JHTML::_ ( 'behavior.modal' );

	if (JPluginHelper::isEnabled('authentication', 'openid')) {
        $lang = JFactory::getLanguage();
        $lang->load('plg_authentication_openid', JPATH_ADMINISTRATOR);
        $langScript = '
//<![CDATA[
'.'var JLanguage = {};' .
                ' JLanguage.WHAT_IS_OPENID = \'' . JText::_('WHAT_IS_OPENID') . '\';' .
                ' JLanguage.LOGIN_WITH_OPENID = \'' . JText::_('LOGIN_WITH_OPENID') . '\';' .
                ' JLanguage.NORMAL_LOGIN = \'' . JText::_('NORMAL_LOGIN') . '\';' .
                ' var comlogin = 1;
//]]>';
        $document = JFactory::getDocument();
        $document->addScriptDeclaration($langScript);
        JHTML::_('script', 'openid.js');
    }

    $html = '';
    JPluginHelper::importPlugin('vmpayment');
    $dispatcher = JDispatcher::getInstance();
    $returnValues = $dispatcher->trigger('plgVmDisplayLogin', array($this, &$html, $this->from_cart));

    if (is_array($html)) {
		foreach ($html as $login)
		    echo $login . '<br />';
    } else {
		echo $html;
    }

    if ($this->order): ?>

	    <div class="order-view">

			<h1> <?php echo JText::_('COM_VIRTUEMART_ORDER_ANONYMOUS') ?> </h1>

			<form action="<?php echo JRoute::_('index.php', 1, $this->useSSL) ?>" method="post" name="com-login" >

				<input type="hidden" name="option" value="com_virtuemart" />
				<input type="hidden" name="view" value="orders" />
				<input type="hidden" name="layout" value="details" />
				<input type="hidden" name="return" value="" />
				
				<div class="width30 floatleft" id="com-form-order-number">
					<label for="order_number"> <?php echo JText::_('COM_VIRTUEMART_ORDER_NUMBER') ?> </label>
					<input type="text" id="order_number" name="order_number" class="inputbox" size="18" alt="order_number" />
				</div>

				<div class="width30 floatleft" id="com-form-order-pass">
					<label for="order_pass"> <?php echo JText::_('COM_VIRTUEMART_ORDER_PASS') ?> </label>
					<input type="text" id="order_pass" name="order_pass" class="inputbox" size="18" alt="order_pass" value="p_"/>
				</div>

				<div class="width30 floatleft" id="com-form-order-submit">
					<input type="submit" name="Submitbuton" class="button" value="<?php echo JText::_('COM_VIRTUEMART_ORDER_BUTTON_VIEW') ?>" />
				</div>

			</form>

	    </div>

	<?php endif ?>

    <form id="com-form-login" action="<?php echo JRoute::_('index.php', $this->useXHTML, $this->useSSL) ?>" method="post" name="com-login" >
		<input type="hidden" name="task" value="user.login" />
		<input type="hidden" name="option" value="<?php echo $comUserOption ?>" />
		<input type="hidden" name="return" value="<?php echo base64_encode($url) ?>" />

		<fieldset class="userdata">
			<?php if (!$this->from_cart): ?>
				<div>
					<h2> <?php echo JText::_('COM_VIRTUEMART_ORDER_CONNECT_FORM') ?> </h2>
				</div>
				<div class="clear"></div>
			<?php else: ?>
				<p> <?php echo JText::_('COM_VIRTUEMART_ORDER_CONNECT_FORM') ?> </p>
			<?php endif ?>

			<p class="width30 floatleft" id="com-form-login-username">
				<input type="text" name="username" class="inputbox" size="18" alt="<?php echo JText::_('COM_VIRTUEMART_USERNAME') ?>" value="<?php echo JText::_('COM_VIRTUEMART_USERNAME'); ?>" onblur="if(this.value=='') this.value='<?php echo addslashes(JText::_('COM_VIRTUEMART_USERNAME')); ?>';" onfocus="if(this.value=='<?php echo addslashes(JText::_('COM_VIRTUEMART_USERNAME')) ?>') this.value='';" />
			</p>

			<p class="width30 floatleft" id="com-form-login-password">
				<input id="modlgn-passwd" type="password" name="password" class="inputbox" size="18" alt="<?php echo JText::_('COM_VIRTUEMART_PASSWORD') ?>" value="<?php echo JText::_('COM_VIRTUEMART_PASSWORD'); ?>" onblur="if(this.value=='') this.value='<?php echo addslashes(JText::_('COM_VIRTUEMART_PASSWORD')); ?>';" onfocus="if(this.value=='<?php echo addslashes(JText::_('COM_VIRTUEMART_PASSWORD')) ?>') this.value='';" />
			</p>

			<p class="width30 floatleft" id="com-form-login-remember">
				<input type="submit" name="Submit" class="default" value="<?php echo JText::_('COM_VIRTUEMART_LOGIN') ?>" />
				<?php if (JPluginHelper::isEnabled('system', 'remember')): ?>
					<label for="remember"> <?php echo JText::_('JGLOBAL_REMEMBER_ME') ?> </label>
					<input type="checkbox" id="remember" name="remember" class="inputbox" value="yes" alt="Remember Me" />
				<?php endif ?>
			</p>
		</fieldset>

		<div class="clr"></div>

		<div class="width30 floatleft">
			<a href="<?php echo JRoute::_('index.php?option=' . $comUserOption . '&view=remind') ?>">
				<?php echo JText::_('COM_VIRTUEMART_ORDER_FORGOT_YOUR_USERNAME') ?> </a>
			</div>
			<div class="width30 floatleft">
				<a href="<?php echo JRoute::_('index.php?option=' . $comUserOption . '&view=reset') ?>">
			<?php echo JText::_('COM_VIRTUEMART_ORDER_FORGOT_YOUR_PASSWORD') ?> </a>
		</div>

		<div class="clr"></div>

		<?php echo JHTML::_('form.token'); ?>
	</form>

<?php elseif ($user->id): ?>

<?php /*
	<form action="<?php echo JRoute::_('index.php') ?>" method="post" name="login" id="form-login">
		<fieldset class="userdata">
			<input type="hidden" name="option" value="<?php echo $comUserOption ?>" />
			<input type="hidden" name="task" value="user.logout" />
			<input type="hidden" name="return" value="<?php echo base64_encode($url) ?>" />

			<h5 style="float: left; margin: 0 10px;"> <?php echo JText::sprintf( 'COM_VIRTUEMART_HINAME', $user->name) ?> </h5>
			<input type="submit" name="Submit" class="button" value="<?php echo JText::_( 'COM_VIRTUEMART_BUTTON_LOGOUT') ?>" style="float: right;" />

			<?php echo JHtml::_('form.token'); ?>
		</fieldset>
	</form>
*/ ?>

<?php endif ?>
