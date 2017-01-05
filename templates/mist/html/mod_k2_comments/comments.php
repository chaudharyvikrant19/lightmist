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

<?php if(count($comments)): ?>
	<?php foreach ($comments as $key=>$comment):?>
	<div class="related-comment">

		<div class="content">

			<?php echo strlen($comment->commentText)>40?substr($comment->commentText,0,40).'...': $comment->commentText;?>

			<span class="arrow"></span>

		</div>

		<p class="meta"><?php echo JText::_('TPL_BISS_POSTED_BY_TEXT');?> <strong><a href="#"><?php echo $comment->userUsername;?></a> </strong>on <a href=""><?php echo JHtml::_('date',$comment->commentDate,JText::_('CTH_COMMENT_DATE_FORMAT'));?></a></p>

	</div>
	<?php endforeach; ?>
<?php endif; ?>

