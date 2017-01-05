<?php

// no direct access
defined('_JEXEC') or die('Restricted access');
global $successmsg, $faultmsg;
$label				= $params->get( 'label', '' );
$buttontext			= $params->get( 'buttontext', '' );
$resulttext			= $params->get( 'resulttext', '' );
$successmsg			= $params->get( 'successmsg', 'YESSSSS! YOUR DOMAIN IS AVAILABLE. <span class="small">BUY IT BEFORE SOMEONE ELSE DOES.</span>' );
$faultmsg			= $params->get( 'faultmsg', 'Sorry, <span>%s</span> is taken.' );
$checkall			= $params->get( 'checkall', '' );
$pretext			= $params->get( 'pretext', '' );
$forwardurl			= $params->get( 'forwardurl', '' );
$cth_domain1		= $params->get( 'cth_domain1', '' );
$cth_domain2		= $params->get( 'cth_domain2', '' );
$cth_domain3		= $params->get( 'cth_domain3', '' );
$cth_domain4		= $params->get( 'cth_domain4', '' );
$cth_domain5		= $params->get( 'cth_domain5', '' );
$cth_domain6		= $params->get( 'cth_domain6', '' );
$cth_domain7		= $params->get( 'cth_domain7', '' );
$cth_domain8		= $params->get( 'cth_domain8', '' );
$cth_domain9		= $params->get( 'cth_domain9', '' );
$cth_domain10		= $params->get( 'cth_domain10', '' );
$cth_domain11		= $params->get( 'cth_domain11', '' );
$cth_domain12		= $params->get( 'cth_domain12', '' );
$cth_domain13		= $params->get( 'cth_domain13', '' );
$cth_domain14		= $params->get( 'cth_domain14', '' );
$cth_domain15		= $params->get( 'cth_domain15', '' );

?>

<?php if ($pretext != "") { ?>
<div style="margin-bottom:8px">
<?php echo $pretext ?>
</div>
<?php } ?>

<?php

    function checkDomain($domain,$server,$findText){
        // Open a socket connection to the whois server
        $con = fsockopen($server, 43);
        if (!$con) return false;
        
        // Send the requested doman name
        fputs($con, $domain."\r\n");
        
        // Read and store the server response
        $response = ' :';
        while(!feof($con)) {
            $response .= fgets($con,128); 
        }
        
        // Close the connection
        fclose($con);
        
        // Check the response stream whether the domain is available
		// echo $response;
        if (strpos($response, $findText)){
		
            return true;
        }
        else {
            return false;   
        }
    }
    
    function showDomainResult($domain,$server,$findText){
		global $successmsg, $faultmsg;
       if (checkDomain($domain,$server,$findText)){
          echo "<h3 class=\"domain-success\">".sprintf($successmsg,$domain)."</h3>";
       }
       else echo "<h3 class=\"domain-fault\"><i class=\"fa fa-exclamation-circle\"></i> ".sprintf($faultmsg,$domain)."</h3>";
    }
	
?>
<div class="envor-domain-search">
    <form action="<?php echo JURI::root();//$forwardurl; ?>" method="post" style="position:relative">
      <div class="envor-domain-search-inner">
      	<!-- <label for="domainname"><?php echo $label ?></label> -->
      	<input style="background: none;border: 1px solid #e1e1e1;border-radius: 3px;box-shadow: 0 1px #fff, 0 1px 4px rgba(0, 0, 0, 0.05) inset;font-size: 12px;height: 40px;line-height: 40px;margin-bottom: 22px;min-height: 40px;padding: 8px 12px;width: 100%;border-radius: 0;" class="text" name="domainname" id="domainname" type="text" placeholder="<?php echo JText::_('TPL_MIST_ENTER_YOUR_DOMAIN_NAME');?>" value="<?php echo (isset($_POST['domainname'])) ? $_POST['domainname'] : '';?>"/>
        <div class="zone" style="position: absolute;right: 53px;top:0;z-index: 99;color: #4B5468;height: 40px;font-weight: 700;text-transform: uppercase;font-size: 13px;background: #F5F5F5;border: 1px solid rgb(224, 224, 224);  padding: 8px;"><span>.com</span> <i class="fa fa-caret-down"></i>
        <ul style="position: absolute;top: 39px;left: 0px;width: 100px;border-radius: 3px;box-shadow: rgba(0, 0, 0, 0.2) 2px 2px 2px;padding: 10px;z-index: 1000;margin: 0px;display: none;background-color: rgb(255, 255, 255);">
        <?php if ($cth_domain1 == "yes") { ?>
          	<li data-val="com">.com</li>
		<?php } ?>
		<?php if ($cth_domain2 == "yes") { ?>
          	<li data-val="net">.net</li>
		<?php } ?>
		<?php if ($cth_domain3 == "yes") { ?>	
            <li data-val="info">.info</li>
		<?php } ?>
        <?php if ($cth_domain4 == "yes") { ?>	
            <li data-val="org">.org</li>
		<?php } ?>
		<?php if ($cth_domain5 == "yes") { ?>	
            <li data-val="biz">.biz</li>
		<?php } ?>
		<?php if ($cth_domain6 == "yes") { ?>	
            <li data-val="couk">.co.uk</li>
		<?php } ?>
		
		<?php if ($cth_domain7 == "yes") { ?>	
			<li data-val="name">.name</li>
		<?php } ?>
		
		<?php if ($cth_domain8 == "yes") { ?>
			<li data-val="cc">.cc</li>	
		<?php } ?>
		
		<?php if ($cth_domain9 == "yes") { ?>	
			<li data-val="us">.us</li>
		<?php } ?>
		
		<?php if ($cth_domain10 == "yes") { ?>	
			<li data-val="tv">.tv</li>
		<?php } ?>
		
		<?php if ($cth_domain11 == "yes") { ?>	
			<li data-val="eu">.eu</li>
		<?php } ?>
		
		<?php if ($cth_domain12 == "yes") { ?>	
			<li data-val="edu">.edu</li>
		<?php } ?>
		
		<?php if ($cth_domain13 == "yes") { ?>
			<li data-val="mobi">.mobi</li>	
		<?php } ?>
		
		<?php if ($cth_domain14 == "yes") { ?>	
			<li data-val="nl">.nl</li>
		<?php } ?>
		
		<?php if ($cth_domain15 == "yes") { ?>	
			<li data-val="ca">.ca</li>
		<?php } ?>
        </ul>
        </div>
        <input type="hidden" name="domain_zone" value="com">
      </div>
      <button type="submit" style="border-radius: 0;position: absolute;top: 0;right: 0;z-index: 99;" value="<?php echo $buttontext ?>" name="submitBtn" class="btn btn-default"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
      <p style="display:none" class="white"><input type="checkbox" name="all"/> <?php echo $checkall ?></p>
    </form>
    <!-- <p><a href="">View Domain Price List</a> | <a href="">Bulk Domain Search</a> | <a href="">Transfer Domain</a></p> -->
</div>
<?php    
    if (isset($_POST['submitBtn'])){
        $domainbase = (isset($_POST['domainname'])) ? $_POST['domainname'] : '';
        $d_all      = (isset($_POST['all'])) ? 'all' : '';   
		
        $d_ex      = (isset($_POST['domain_zone'])) ? $_POST['domain_zone'] : 'com';
        //echo'<pre>';var_dump($d_ex);die; 
		/*
		if ($cth_domain1 == "yes") {
        $d_com      = (isset($_POST['com'])) ? 'com' : ''; 
		}	    
		
		if ($cth_domain2 == "yes") {
        $d_net      = (isset($_POST['net'])) ? 'net' : ''; 
		}	
		
		if ($cth_domain3 == "yes") {
        $d_info      = (isset($_POST['info'])) ? 'info' : ''; 
		}	   
		
		if ($cth_domain4 == "yes") {
        $d_org      = (isset($_POST['org'])) ? 'org' : ''; 
		}	
		
		if ($cth_domain5 == "yes") {
        $d_biz      = (isset($_POST['biz'])) ? 'biz' : ''; 
		}
		
		if ($cth_domain6 == "yes") {
        $d_couk      = (isset($_POST['couk'])) ? 'couk' : ''; 
		}
		
		if ($cth_domain7 == "yes") {
        $d_name      = (isset($_POST['name'])) ? 'name' : ''; 
		}
		
		if ($cth_domain8 == "yes") {
        $d_cc      = (isset($_POST['cc'])) ? 'cc' : ''; 
		}
		
		if ($cth_domain9 == "yes") {
        $d_us      = (isset($_POST['us'])) ? 'us' : ''; 
		}
		
		if ($cth_domain10 == "yes") {
        $d_tv      = (isset($_POST['tv'])) ? 'tv' : ''; 
		}
		
		if ($cth_domain11 == "yes") {
        $d_eu      = (isset($_POST['eu'])) ? 'eu' : ''; 
		}
		
		if ($cth_domain12 == "yes") {
        $d_edu      = (isset($_POST['edu'])) ? 'edu' : ''; 
		}
		
		if ($cth_domain13 == "yes") {
        $d_mobi      = (isset($_POST['mobi'])) ? 'mobi' : ''; 
		}
		
		if ($cth_domain14 == "yes") {
        $d_nl      = (isset($_POST['nl'])) ? 'nl' : ''; 
		}
		
		if ($cth_domain15 == "yes") {
        $d_ca      = (isset($_POST['ca'])) ? 'ca' : ''; 
		}
		*/
        
        // Check domains only if the base name is big enough
        if (strlen($domainbase)>0){
?>
      <!-- <div id="caption" style="margin-top:8px; margin-bottom:8px; font-weight:bold"><?php echo $resulttext ?> :</div> -->
      <!-- <div id="result"> -->
      	<div class="domain-result">

<?php        
			if ($cth_domain1 == "yes") {
            if (($d_ex == 'com') /*|| ($d_all != '') */) showDomainResult($domainbase.".com",'whois.crsnic.net','No match for');
			}	
			
			if ($cth_domain2 == "yes") {
            if (($d_ex == 'net') /*|| ($d_all != '') */) showDomainResult($domainbase.".net",'whois.crsnic.net','No match for');
			}	
			
			if ($cth_domain3 == "yes") {
            if (($d_ex == 'info') /*|| ($d_all != '') */) showDomainResult($domainbase.".info",'whois.afilias.net','NOT FOUND');
			}	
			
			if ($cth_domain4 == "yes") {
            if (($d_ex == 'org')/* || ($d_all != '') */) showDomainResult($domainbase.".org",'whois.publicinterestregistry.net','NOT FOUND');
			}	
			
			if ($cth_domain5 == "yes") {
            if (($d_ex == 'biz') /*|| ($d_all != '')*/ ) showDomainResult($domainbase.".biz",'whois.neulevel.biz','Not found:');
			}	
			
			if ($cth_domain6 == "yes") {
            if (($d_ex == 'couk') /*|| ($d_all != '')*/ ) showDomainResult($domainbase.".co.uk",'whois.nic.uk','No match for');
			}	
			
			if ($cth_domain7 == "yes") {
            if (($d_ex == 'name') /*|| ($d_all != '') */) showDomainResult($domainbase.".name",'whois.nic.name','No match');
			}	
			
			if ($cth_domain8 == "yes") {
            if (($d_ex == 'cc')/* || ($d_all != '') */) showDomainResult($domainbase.".cc",'whois.nic.cc','No match');
			}	
			
			if ($cth_domain9 == "yes") {
            if (($d_ex == 'us')/* || ($d_all != '') */) showDomainResult($domainbase.".us",'whois.nic.us','Not found:');
			}
			
			if ($cth_domain10 == "yes") {
            if (($d_ex == 'tv')/* || ($d_all != '') */) showDomainResult($domainbase.".tv",'whois.nic.tv','No match for');
			}
			
			if ($cth_domain11 == "yes") {
            if (($d_ex == 'eu')/* || ($d_all != '') */) showDomainResult($domainbase.".eu",'whois.eu','FREE');
			}
			
			if ($cth_domain12 == "yes") {
            if (($d_ex == 'edu')/* || ($d_all != '') */) showDomainResult($domainbase.".edu",'whois.crsnic.net','No match for');
			}
			
			if ($cth_domain13 == "yes") {
            if (($d_ex == 'mobi')/* || ($d_all != '') */) showDomainResult($domainbase.".mobi",'whois.dotmobiregistry.net','NOT FOUND');
			}
			
			if ($cth_domain14 == "yes") {
            if (($d_ex == 'nl')/* || ($d_all != '') */) showDomainResult($domainbase.".nl",'whois.domain-registry.nl','free');
			}
			
			if ($cth_domain15 == "yes") {
            if (($d_ex == 'ca')/* || ($d_all != '') */) showDomainResult($domainbase.".ca",'whois.cira.ca','AVAIL');
			}

?>
	</div>
     <!-- </div> -->
<?php            
        }
    }
?>    

	