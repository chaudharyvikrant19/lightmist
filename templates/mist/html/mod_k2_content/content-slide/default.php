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
<div <?php echo ($params->get('moduleclass_sfx')? 'class="row-event event-carousel '.$params->get('moduleclass_sfx').'"': 'class="row-event event-carousel"');?>>
    <div class="owl-carousel">
        <?php foreach ($items as $item): 
        $extraFields = json_decode($item->extra_fields); ?>
        <div class="row-event-media">
            <div class="thumbnail no-border no-padding">
                <div class="media">
                    <?php if(!empty($extraFields[32]->value)): ?>
                    <div class="date-block">
                        <?php echo $extraFields[32]->value; ?>
                    </div>
                    <?php endif; ?>
                    <img src="<?php echo JURI::root(true).$extraFields[0]->value;?>" alt="">

                    <div class="caption hovered">
                        <div class="caption-wrapper div-table">
                            <div class="caption-inner div-cell">
                                <p class="caption-buttons"><a href="<?php echo $item->link; ?>" class="btn caption-link"><i
                                          class="fa fa-link"></i></a></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="caption">
                    <h3 class="caption-title"><?php echo $item->title;?></h3>
                    <small><?php echo $extraFields[1]->value; ?></small>
                    <br/>
                    <small><?php echo $extraFields[2]->value; ?></small>
                    <br/>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>
<?php endif;?>
<script type="text/javascript">
jQuery(function($){
    $('.event-carousel .owl-carousel').owlCarousel({
        autoplay: true,
        loop: true,
        margin: 25,
        dots: true,
        nav: true,
        navText: [
            "<i class='fa fa-caret-left'></i>",
            "<i class='fa fa-caret-right'></i>"
        ],
        responsive: {
            0:    {items: 1},
            479:  {items: 1},
            768:  {items: 2},
            991:  {items: 3},
            1024: {items: 4}
        }
    });
});
</script>