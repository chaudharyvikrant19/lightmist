<?php
/**
 * @version     2.0
 * @package     TinyLetter Subscribe (module)
 * @author    JoomlaWorks - http://www.joomlaworks.net
 * @copyright   Copyright (c) 2006 - 2013 JoomlaWorks Ltd. All rights reserved.
 * @license     GNU/GPL license: http://www.gnu.org/copyleft/gpl.html
 */

// no direct access
defined('_JEXEC') or die('Restricted access');

/* Here we call the stylesheet template.css from a folder called 'css' and located at the same directory with this template file. */
$filePath = JURI::root(true).str_replace(JPATH_SITE,'',dirname(__FILE__));
//$document->addStyleSheet($filePath.'/css/template.css');

?>
<!--section subscribe-->
    <!-- Text -->
    
    <p class="form-message1" style="display: none;"></p>

    <!-- Form -->
    <form class="subscribe_form form-box transparent-half-black-2" action="https://tinyletter.com/<?php echo $tlUsername; ?>" method="post" target="popupwindow" onsubmit="window.open('https://tinyletter.com/<?php echo $tlUsername; ?>', 'popupwindow', 'scrollbars=yes,width=<?php echo $tlPopupWidth; ?>,height=<?php echo $tlPopupHeight; ?>');return true;">
        <?php if($tlShowPretext): ?>
            <h3 class="upper text-center white"><?php echo $tlPretext; ?></h3>
        <?php endif; ?>
        <div class="input-text form-group has-feedback text-center field-border">
        <input class="form-control white" type="email" name="email" id="tlemail" />
        <button class="btn btn-default big" type="submit" id="azurasubscribesubmit">
            <?php echo JTEXT::_('MOD_JW_TINYLETTER_SUBSCRIBE'); ?>
        </button>
        <input type="hidden" value="1" name="embed" />
        </div>
    </form>