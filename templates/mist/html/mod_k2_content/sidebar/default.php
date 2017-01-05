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

require_once (JPATH_SITE.DS.'administrator/components/com_azurapagebuilder/helpers/cthimageresizer.php');
$resizer = CTHImageOptimizerHelper::getInstance();
?>
<?php if(count($items)): ?>
<div <?php echo ($params->get('moduleclass_sfx')? 'class="'.$params->get('moduleclass_sfx').'"': '');?>>
  <?php foreach ($items as $item): ?>
  <div class="related-post">
    <?php if($params->get('itemImage') and isset($item->imageLarge))  : ?>
    <figure>

      <a href="<?php echo $item->link; ?>"><img src="<?php echo JURI::root(true).$resizer->resize(str_replace(JURI::base(true), "", $item->imageLarge),array('crop'=>true,'w'=>150,'h'=>150)); ?>" alt="<?php echo K2HelperUtilities::cleanHtml($item->title); ?>"></a>

    </figure>
    <?php endif;?>

    <p class="title"><a href="<?php echo $item->link; ?>"><?php echo strlen($item->title)>40?substr($item->title,0,40).'...': $item->title;?></a></p>

    <p class="meta"><?php echo JHtml::_('date',$item->created,'F d, Y');?>
        <?php if($item->numOfComments>0): ?>
            , <?php echo $item->numOfComments; ?> <?php if($item->numOfComments>1) echo JText::_('K2_COMMENTS'); else echo JText::_('K2_COMMENT'); ?>
        <?php endif; ?>
    </p>

  </div>
  <?php endforeach; ?>
</div>
<?php endif;?>