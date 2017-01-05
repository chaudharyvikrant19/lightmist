<?php
/**
 * @package Mist - Multi-Purpose HTML5 Responsive Joomla Template
 * @author Cththemes - www.cththemes.com
 * @date: 01-10-2014
 *
 * @copyright  Copyright ( C ) 2014 cththemes.com . All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

// no direct access
defined('_JEXEC') or die;
$class_sfx = $params->get('moduleclass_sfx');
?>
<ul class="latest-posts <?php echo $class_sfx ; ?>">
    <?php if(count($items)) : ?>
    <?php foreach ($items as $key => $item) :
        $extraFields    = json_decode($item->extra_fields);?>
        <li>
            <div class="post-thumb">
                <?php if(!empty($extraFields[1]->value)): ?>
                <img class="img-rounded" src="<?php echo JURI::root(true).$extraFields[1]->value; ?>" alt="" title="" width="84" height="84" />
                <?php endif; ?>
            </div>
            <div class="post-details">
                <div class="description">
                    <a href="<?php echo $item->link;?>"><?php echo $item->title;?></a>
                </div>
                <div class="meta">
                    <span class="time">
                    <i class="fa fa-calendar"></i><?php echo JHtml::_('date',$item->created,'F.d.Y');?></span>
                </div>
            </div>
        </li>
    <?php endforeach; ?>
    <?php endif;?>
</ul>
