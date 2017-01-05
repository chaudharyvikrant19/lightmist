<?php
/**
 * @package im Event - All in One Event Conference Joomla Landing Page
 * @author Cththemes - www.cththemes.com
 * @date: 01-10-2014
 *
 * @copyright  Copyright ( C ) 2014 cththemes.com . All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

defined('_JEXEC') or die;
?>

<section class="page-section">
    <div class="image-bg content-in fixed <?php echo $moduleclass_sfx ?>" <?php if ($params->get('backgroundimage')) : ?> style="background-image:url(<?php echo $params->get('backgroundimage');?>)"<?php endif;?>></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <?php echo $module->content;?>
            </div>
        </div>
    </div>
</section>
