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
    <?php if($tlShowPretext): ?>
        <p><?php echo $tlPretext; ?></p>
    <?php endif; ?>
    <p class="form-message1" style="display: none;"></p>

    <!-- Form -->
    <form class="subscribe_form" action="https://tinyletter.com/<?php echo $tlUsername; ?>" method="post" target="popupwindow" onsubmit="window.open('https://tinyletter.com/<?php echo $tlUsername; ?>', 'popupwindow', 'scrollbars=yes,width=<?php echo $tlPopupWidth; ?>,height=<?php echo $tlPopupHeight; ?>');return true;">
        <input class="form-control" type="email" name="email" id="tlemail" />
        <button class="submit bg-color" type="submit" id="azurasubscribesubmit">
            <span class="glyphicon glyphicon-arrow-right"></span>
        </button>
        <input type="hidden" value="1" name="embed" />
    </form>