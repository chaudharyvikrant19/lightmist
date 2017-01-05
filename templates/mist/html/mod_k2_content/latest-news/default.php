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

?>
<?php if(count($items)): ?>
<nav <?php echo ($params->get('moduleclass_sfx')? 'class="'.$params->get('moduleclass_sfx').'"': '');?>>
    <ul class="footer-blog">
    <!-- List Items -->
    <?php foreach ($items as $item): ?>
        <li>
            <a href="<?php echo $item->link; ?>"><?php echo strlen($item->title)>110?substr($item->title,0,110).'...': $item->title;?></a>
        </li>
    <?php endforeach; ?>
    </ul>
</nav>
<?php endif;?>