<?php 
/**
 * @package Azura Joomla Pagebuilder
 * @author Cththemes - www.cththemes.com
 * @date: 15-07-2014
 *
 * @copyright  Copyright ( C ) 2014 cththemes.com . All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */
defined('_JEXEC') or die;

global $accordionItemsArray;

$classes = 'ri-grid ri-grid-size-2';

$classes .= ' '.$animation_data['trigger'];

$animationData = $animation_data['data'];

if(!empty($class)){
    $classes .= ' '.$class;
}

$classes = 'class="'.$classes.'"';
 
if(empty($id)){
    $id = uniqid();
}

?>
<?php if(count($imageGridItemsArray)) :?>
<section class="slider">
    <div id="<?php echo $id; ?>" <?php echo $classes; ?>>
        <div class="overlay"></div>
        <ul>
            <?php foreach ($imageGridItemsArray as $key => $item) : ?>
            <li><a href="<?php echo $item['link']; ?>"><img src="<?php echo $item['img']; ?>" alt="" width="<?php echo $width; ?>" height="<?php echo $height; ?>"/></a></li>
            <?php endforeach;?>
        </ul>
        <div class="grid-content">
            <?php echo $content; ?>
        </div>
    </div>
</section>
<script type="text/javascript">
jQuery(function($){
    if ( $( "#<?php echo $id; ?>" ).length !== 0 ) {
        $( '#<?php echo $id; ?>' ).gridrotator( {
               rows : <?php echo $rows; ?>,
               columns : <?php echo $cols; ?>,
               interval : <?php echo $interval; ?>,
               animType : 'random',
               animSpeed : <?php echo $animspeed; ?>,
               step  : <?php echo $step; ?>,
               w1024 : { rows : 4, columns : 6 },
               w768 : {rows : 4,columns : 5 },
               w480 : {rows : 4,columns : 3 },
               w320 : {rows : 4,columns : 2 },
               w240 : {rows : 4,columns : 2 },
        });
    }
});

</script>
<?php endif;?>


