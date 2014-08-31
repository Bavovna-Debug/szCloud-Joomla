<?php defined('_JEXEC') or die('Restricted access'); ?>

<div class="registration-complete<?php echo $this->pageclass_sfx ?>">
	<?php if ($this->params->get('show_page_heading')): ?>
		<h1 class="componentheading">
			<span>
				<?php echo $this->escape($this->params->get('page_heading')) ?>
			</span>
		</h1>
		
		<br class="both" />
	<?php endif; ?>
</div>
