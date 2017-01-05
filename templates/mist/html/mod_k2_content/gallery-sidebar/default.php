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
<div class="owl-carousel navigation-1 <?php echo $class_sfx ; ?>" data-pagination="false" data-items="1" data-autoplay="true" data-navigation="true">
    <?php if(count($items)) : ?>
    <?php foreach ($items as $key => $item) :
        $extraFields    = json_decode($item->extra_fields);?>
        <?php if(!empty($extraFields[1]->value)): ?>
        <a href="<?php echo $item->link;?>">
            <img src="<?php echo JURI::root(true).$extraFields[1]->value; ?>" width="270" height="270" alt="" />
        </a>
        <?php endif; ?>
    <?php endforeach; ?>
    <?php endif;?>
</div>
