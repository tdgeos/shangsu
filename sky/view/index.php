<?php
if( !defined( 'IN_SKY' ) )
exit( 'Access Denied' );

$this->template('header');
?>

<script language="JavaScript" type="text/javascript">
<!--
// Version check for the Flash Player that has the ability to start Player Product Install (6.0r65)
var hasProductInstall = DetectFlashVer(6, 0, 65);

// Version check based upon the values defined in globals
var hasRequestedVersion = DetectFlashVer(requiredMajorVersion, requiredMinorVersion, requiredRevision);

if ( hasProductInstall && !hasRequestedVersion ) {
	// DO NOT MODIFY THE FOLLOWING FOUR LINES
	// Location visited after installation is complete if installation is required
	var MMPlayerType = (isIE == true) ? "ActiveX" : "PlugIn";
	var MMredirectURL = window.location;
    document.title = document.title.slice(0, 47) + " - Flash Player Installation";
    var MMdoctitle = document.title;

	AC_FL_RunContent(
		"src", "<?php echo $this->view->skyUrl;?>/sky/playerProductInstall",
		"FlashVars", "configUrl=./data/config.xml&uid=<?php echo $this->get['uid'];?>&itemId=<?php echo $this->get['itemId'];?>&MMredirectURL="+MMredirectURL+'&MMplayerType='+MMPlayerType+'&MMdoctitle='+MMdoctitle+"",
		"width", "100%",
		"height", "100%",
		'allowFullScreen','true',
		"align", "middle",
		"id", "sky",
		"quality", "high",
		"bgcolor", "#869ca7",
		"name", "sky",
		"allowScriptAccess","sameDomain",
		"type", "application/x-shockwave-flash",
		"pluginspage", "http://www.adobe.com/go/getflashplayer"
	);
} else if (hasRequestedVersion) {
	// if we've detected an acceptable version
	// embed the Flash Content SWF when all tests are passed
	AC_FL_RunContent(
			"src", "<?php echo $this->view->skyUrl;?>/sky/sky",
			"width", "100%",
			"height", "100%",
			'allowFullScreen','true',
			"FlashVars","configUrl=./data/config.xml&uid=<?php echo $this->get['uid'];?>&itemId=<?php echo $this->get['itemId'];?>",
			"align", "middle",
			"id", "sky",
			"quality", "high",
			"bgcolor", "#869ca7",
			"name", "sky",
			"allowScriptAccess","sameDomain",
			"type", "application/x-shockwave-flash",
			"pluginspage", "http://www.adobe.com/go/getflashplayer"
	);
  } else {  // flash is too old or we can't detect the plugin
    var alternateContent = 'Alternate HTML content should be placed here. '
  	+ 'This content requires the Adobe Flash Player. '
   	+ '<a href=http://www.adobe.com/go/getflash/>Get Flash</a>';
   	+ '<br /><a href=http://www.flexsns.com>Powered By Flexsns-Sky</a>';
    document.write(alternateContent);  // insert non-flash content
  }
// -->
</script>
<noscript>
  	<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000"
			id="sky" width="100%" height="100%"
			codebase="http://fpdownload.macromedia.com/get/flashplayer/current/swflash.cab">
			<param name="movie" value="<?php echo $this->view->skyUrl;?>/sky/sky.swf" />
			<param name="quality" value="high" />
			<param name="bgcolor" value="#869ca7" />
			<param name="allowScriptAccess" value="sameDomain" />
			<param name="allowFullScreen" value="true" />
			<param name="FlashVars" value="configUrl=./data/config.xml&uid=<?php echo $this->get['uid'];?>&itemId=<?php echo $this->get['itemId'];?>" />
			<embed src="<?php echo $this->view->skyUrl;?>/sky/sky.swf" FlashVars="configUrl=./data/config.xml&uid=<?php echo $this->get['uid'];?>&itemId=<?php echo $this->get['itemId'];?>" allowFullScreen="true" quality="high" bgcolor="#869ca7"
				width="100%" height="100%" name="sky" align="middle"
				play="true"
				loop="false"
				quality="high"
				allowScriptAccess="sameDomain"
				type="application/x-shockwave-flash"
				pluginspage="http://www.adobe.com/go/getflashplayer">
			</embed>
	</object>
</noscript>


<?php $this->template('footer');?>