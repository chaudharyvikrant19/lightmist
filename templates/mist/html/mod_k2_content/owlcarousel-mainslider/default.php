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
<section id="works-slide" class="page-section top-pad-50 bottom-pad-20">
<div class="portfolio-grid owl-carousel <?php echo $class_sfx ; ?>">
    <?php if(count($items)) : ?>
        <?php foreach ($items as $key => $item) :
        $extraFields    = json_decode($item->extra_fields);?>
        <!-- Item <?php echo $key; ?> -->
        <div class="grids">
            <div class="grid">
                <?php if(!empty($extraFields[1]->value)): ?>
                <img src="<?php echo JURI::root(true).$extraFields[1]->value; ?>" alt="post" class="img-responsive" />
                <?php endif; ?>
                <div class="figcaption">
                    <div class="caption-block">
                        <h4><a href="<?php echo $item->link;?>" style="color:#fff"><?php echo $item->title;?></a></h4>
                        <p><?php echo strlen(strip_tags($item->introtext))>50 ? substr(strip_tags($item->introtext),0,48).'...': strip_tags($item->introtext);?></p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Item <?php echo $key; ?> Ends-->
        <?php endforeach; ?>
    <?php endif;?>
</div>
</section>