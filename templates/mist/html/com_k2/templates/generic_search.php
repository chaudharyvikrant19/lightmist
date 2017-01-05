<?php
/**
 * @package Krobs - Personal Onepage Responsive Joomla Template
 * @author Cththemes - www.cththemes.com
 * @date: 01-10-2014
 *
 * @copyright  Copyright ( C ) 2014 cththemes.com . All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

// no direct access
defined('_JEXEC') or die;die;

?>

<?php if(count($this->items)): ?>
<ul class="liveSearchResults">
	<?php foreach($this->items as $item): ?>
	<li><a href="<?php echo $item->link; ?>"><?php echo $item->title; ?></a></li>
	<?php endforeach; ?>
</ul>
<?php endif; ?>
