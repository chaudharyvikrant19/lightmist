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

$classes = "timeliner blog";

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
        <div class="timeline-meta">
            <div class="meta_details"><?php echo $item['date']; ?></div>
        </div>
        <div class="timeline-icon">
            <i class="fa fa-pencil"></i>
        </div>
        <div class="timeline-panel">
            <div class="timeline-body">
                <div class="post-item">
                    <h2 class="post-title"><a href="#"><?php echo $item['title']; ?></a></h2>
                    <div class="post-content">
                        <?php echo ElementParser::do_shortcode($item['content'] ); ?> 
                    </div>
                </div>
            </div>
        </div>
    </li>
    <?php endforeach; ?> 
</ul>
<?php endif;?>
