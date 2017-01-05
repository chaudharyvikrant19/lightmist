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

$classes = "timeliner";

if(!empty($class)){
    $classes .= ' '.$class;
}

$classes = 'class="'.$classes.'"';
 
if(!empty($id)){
    $id = 'id="'.$id.'"';
}

?>

<?php if(count($servicesTimelineItemsArray)) : ?>
<ul <?php echo $classes.' '.$servicestimelinestyle; ?> >
    <?php foreach ($servicesTimelineItemsArray as $key => $item) :?>
    <li<?php if($key%2==1) echo ' class="timeline-inverted"'; ?>>
        <div class="timeline-image">
            <img width="<?php echo $item['width']; ?>" height="<?php echo $item['height']; ?>" class="img-circle" src="<?php echo $item['img']; ?>" alt="">
        </div>
        <div class="timeline-panel ">
            <div class="timeline-heading">
                <h4 class="subheading"><?php echo $item['title']; ?></h4>
            </div>
            <div class="timeline-body">
                <p class="text-muted"><?php echo ElementParser::do_shortcode($item['content'] ); ?></p>
            </div>
        </div>
    </li>
    <?php endforeach; ?> 
</ul>
<?php endif;?>
