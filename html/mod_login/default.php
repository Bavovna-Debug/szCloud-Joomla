<?php defined('_JEXEC') or die('Restricted access');

$lang =& JFactory::getLanguage();
$lang->load('tpl_cloud', JPATH_SITE);

JHtml::_('behavior.keepalive');

if ($type == 'logout'): ?>

	<form action="<?php echo JRoute::_('index.php', true, $params->get('usesecure')); ?>" method="post" id="login-form">

		<input type="hidden" name="option" value="com_users" />
		<input type="hidden" name="task" value="user.logout" />
		<input type="hidden" name="return" value="<?php echo $return ?>" />

		<?php if ($params->get('greeting')): ?>
			<p class="hello">
				<?php if ($params->get('name') == 0) {
					echo JText::sprintf('TPL_CLOUD_HELLO', $user->get('name'));
				} else {
					echo JText::sprintf('TPL_CLOUD_HELLO', $user->get('username'));
				} ?>
			</p>
		<?php endif ?>

		<input type="submit" name="Submit" class="button" value="<?php echo JText::_('JLOGOUT') ?>" />

		<?php echo JHtml::_('form.token') ?>

	</form>

<?php else: ?>

	<form id="login-form" method="post" action="<?php echo JRoute::_('index.php', true, $params->get('usesecure')) ?>">

		<input type="hidden" name="option" value="com_users" />
		<input type="hidden" name="task" value="user.login" />
		<input type="hidden" name="return" value="<?php echo $return ?>" />

		<?php if ($params->get('pretext')): ?>
			<div class="pretext">
				<p> <?php echo $params->get('pretext') ?> </p>
			</div>
		<?php endif ?>

		<label for="login-username"> <?php echo JText::_('MOD_LOGIN_VALUE_USERNAME') . ':' ?> </label>
		<input id="login-username" class="inputbox" name="username" type="username" size="40" />

		<label for="login-password"> <?php echo JText::_('JGLOBAL_PASSWORD') . ':' ?> </label>
		<input id="login-password" class="inputbox" name="password" type="password" size="40" />

		<input class="button" type="submit" name="Submit" value="<?php echo JText::_('JLOGIN') ?>" />

		<?php $usersConfig = JComponentHelper::getParams('com_users');
		if ($usersConfig->get('allowUserRegistration')): ?>
			<div class="register">
				<a href="<?php echo JRoute::_('index.php?option=com_users&view=registration') ?>">
					<?php echo JText::_('MOD_LOGIN_REGISTER') ?>
				</a>
			</div>
		<?php endif ?>

		<?php if ($params->get('posttext')): ?>
			<div class="posttext">
				<p> <?php echo $params->get('posttext') ?> </p>
			</div>
		<?php endif ?>

		<?php echo JHtml::_('form.token') ?>

	</form>

<?php endif ?>
