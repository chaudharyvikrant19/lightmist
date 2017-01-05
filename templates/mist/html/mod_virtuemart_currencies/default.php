<?php // no direct access
defined('_JEXEC') or die('Restricted access');
vmJsApi::jQuery();
vmJsApi::chosenDropDowns();
?>

<!-- Currency Selector Module -->

<ul class="nav navbar-nav">
<li class="top-parent">
    <form action="<?php echo vmURI::getCleanUrl() ?>" method="post">
	    <input class="button btn-currency" type="submit" name="submit" value="<?php echo vmText::_('MOD_VIRTUEMART_CURRENCIES_CHANGE_CURRENCIES') ?>" />
		<?php echo JHTML::_('select.genericlist', $currencies, 'virtuemart_currency_id', 'class="inputbox vm-chzn-select"', 'virtuemart_currency_id', 'currency_txt', $virtuemart_currency_id) ; ?>
	</form>
</li>
</ul>

