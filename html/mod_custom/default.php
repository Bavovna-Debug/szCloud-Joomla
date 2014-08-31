<?php defined('_JEXEC') or die('Restricted access'); ?>

<div class="custom<?php echo $moduleclass_sfx ?>" <?php if ($params->get('backgroundimage')): ?> style="background-image: url(<?php echo $params->get('backgroundimage') ?>)"<?php endif ?>>

	<?php if ($moduleclass_sfx == '_bottom'): ?>
		<span class="title">
			<?php echo $module->title ?>
		</span>
	<?php endif ?>

	<span class="content">
		<?php echo $module->content ?>
	</span>

</div>
