<?php
/**
 * @package im Event - All in One Event Conference Joomla Landing Page
 * @author Cththemes - www.cththemes.com
 * @date: 01-10-2014
 *
 * @copyright  Copyright ( C ) 2014 cththemes.com . All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

// no direct access
defined('_JEXEC') or die;

?>
<ul class="tags">
	<?php foreach ($tags as $tag): ?>
	<li>
		<a href="<?php echo $tag->link; ?>" title="<?php echo $tag->count.' '.JText::_('K2_ITEMS_TAGGED_WITH').' '.K2HelperUtilities::cleanHtml($tag->tag); ?>">
		<?php echo $tag->tag; ?>
		</a>
	</li>
	<?php endforeach; ?>
</ul>

	
