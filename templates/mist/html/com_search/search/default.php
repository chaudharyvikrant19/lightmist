<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_search
 *
 * @copyright   Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
JHtml::_('formbehavior.chosen', 'select');

$params = &JFactory::getApplication()->getTemplate(true)->params;
$layoutstyle         = $params->get('layoutstyle','rightsidebar');

?>
<?php if($layoutstyle == 'home'): ?>
<section class="page-section">
<div class="container">
<div class="row">
<?php endif; ?>

<div class="search<?php echo $this->pageclass_sfx; ?>">
<?php if ($this->params->get('show_page_heading', 1)) : ?>
<h1 class="page-title">
	<?php if ($this->escape($this->params->get('page_heading'))) :?>
		<?php echo $this->escape($this->params->get('page_heading')); ?>
	<?php else : ?>
		<?php echo $this->escape($this->params->get('page_title')); ?>
	<?php endif; ?>
</h1>
<?php endif; ?>

<?php echo $this->loadTemplate('form'); ?>
<?php if ($this->error == null && count($this->results) > 0) :
	echo $this->loadTemplate('results');
else :
	echo $this->loadTemplate('error');
endif; ?>
</div>
<?php if($layoutstyle == 'home'): ?>
</div>
</div>
</section>
<?php endif; ?>

