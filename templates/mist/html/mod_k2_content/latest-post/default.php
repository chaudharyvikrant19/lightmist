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
<ul <?php echo ($params->get('moduleclass_sfx')? 'class="'.$params->get('moduleclass_sfx').' latest-posts"': 'class="latest-posts"');?>>
    <?php foreach ($items as $item): ?>
    <li>
        <?php if($params->get('itemImage') and isset($item->imageLarge))  : ?>
        <div class="post-thumb">
            <img class="img-rounded" src="<?php echo JURI::root(true).$resizer->resize(str_replace(JURI::base(true), "", $item->imageLarge),array('crop'=>true,'w'=>84,'h'=>84)); ?>" alt="" title="<?php echo K2HelperUtilities::cleanHtml($item->title); ?>" />
        </div>
        <?php endif;?>
        <div class="post-details">
            <div class="description">
                <a href="<?php echo $item->link; ?>">
                <!-- Text -->
                <?php echo strlen($item->title)>110?substr($item->title,0,110).'...': $item->title;?></a>
            </div>
            <div class="meta">
                <!-- Meta Date -->
                <span class="time">
                <i class="fa fa-calendar"></i> <?php echo JHtml::_('date',$item->created,'F.d.Y');?></span>
            </div>
        </div>
    </li>
  <?php endforeach; ?>
</ul>
<?php endif;?>