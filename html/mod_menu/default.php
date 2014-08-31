<?php defined('_JEXEC') or die('Restricted access'); ?>

<div class="custom<?php echo $moduleclass_sfx ?>" <?php if ($params->get('backgroundimage')): ?> style="background-image: url(<?php echo $params->get('backgroundimage') ?>)"<?php endif ?>>

	<?php if ($class_sfx == '_bottom'): ?>
		<span class="title">
			<?php echo $module->title ?>
		</span>
	<?php endif ?>

	<ul class="menu<?php echo $class_sfx ?>" <?php if ($tag = $params->get('tag_id')) printf(' id="%s"', $params->get('tag_id')); ?>>

		<?php foreach ($list as $i => &$item) {
			$class = 'item-' . $item->id;
			if ($item->id == $active_id) {
				$class .= ' current';
			}

			if (in_array($item->id, $path)) {
				$class .= ' active';
			} elseif ($item->type == 'alias') {
				$aliasToId = $item->params->get('aliasoptions');
				if ((count($path) > 0) && ($aliasToId == $path[count($path) - 1])) {
					$class .= ' active';
				} elseif (in_array($aliasToId, $path)) {
					$class .= ' alias-parent-active';
				}
			}

			if ($item->deeper)
				$class .= ' deeper';

			if ($item->parent)
				$class .= ' parent';

			if (!empty($class))
				$class = sprintf('class="%s"', trim($class));

			echo "<li $class>";

			switch ($item->type) {
				case 'separator':
				case 'url':
				case 'component':
					require JModuleHelper::getLayoutPath('mod_menu', 'default_' . $item->type);
					break;

				default:
					require JModuleHelper::getLayoutPath('mod_menu', 'default_url');
					break;
			}

			if ($item->deeper) {
				echo '<ul>';
			} elseif ($item->shallower) {
				echo '</li>';
				echo str_repeat('</ul></li>', $item->level_diff);
			} else {
				echo '</li>';
			}
		} ?>

	</ul>

</div>
