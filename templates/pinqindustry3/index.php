<?php
/**
 * @package                Joomla.Site
 * @subpackage	Templates.beez_20
 * @copyright        Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license                GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access.
defined('_JEXEC') or die;

jimport('joomla.filesystem.file');

// check modules
$showRightColumn	= ($this->countModules('position-3') or $this->countModules('position-6') or $this->countModules('position-8'));
$showbottom			= ($this->countModules('position-9') or $this->countModules('position-10') or $this->countModules('position-11'));
$showleft			= ($this->countModules('position-4') or $this->countModules('position-7') or $this->countModules('position-5'));

if ($showRightColumn==0 and $showleft==0) {
	$showno = 0;
}

JHtml::_('behavior.framework', true);

// get params
// $color				= $this->params->get('templatecolor');
// $logo				= $this->params->get('logo');
// $navposition		= $this->params->get('navposition');
$app				= JFactory::getApplication();
$doc				= JFactory::getDocument();
$templateparams		= $app->getTemplate(true)->params;

$doc->addStyleSheet($this->baseurl.'/templates/system/css/system.css');
// $doc->addStyleSheet($this->baseurl.'/templates/'.$this->template.'/css/position.css', $type = 'text/css', $media = 'screen,projection');
$doc->addStyleSheet($this->baseurl.'/templates/'.$this->template.'/css/template.css', $type = 'text/css', $media = 'screen,projection');
// $doc->addStyleSheet($this->baseurl.'/templates/'.$this->template.'/css/print.css', $type = 'text/css', $media = 'print');

$files = JHtml::_('stylesheet', 'templates/'.$this->template.'/css/general.css', null, false, true);
if ($files):
	if (!is_array($files)):
		$files = array($files);
	endif;
	foreach($files as $file):
		$doc->addStyleSheet($file);
	endforeach;
endif;

// $doc->addStyleSheet('templates/'.$this->template.'/css/'.htmlspecialchars($color).'.css');
// if ($this->direction == 'rtl') {
// 	$doc->addStyleSheet($this->baseurl.'/templates/'.$this->template.'/css/template_rtl.css');
// 	if (file_exists(JPATH_SITE . '/templates/' . $this->template . '/css/' . $color . '_rtl.css')) {
// 		$doc->addStyleSheet($this->baseurl.'/templates/'.$this->template.'/css/'.htmlspecialchars($color).'_rtl.css');
// 	}
// }

$doc->addScript($this->baseurl.'/templates/'.$this->template.'/javascript/SlideShow.js', 'text/javascript');
// $doc->addScript($this->baseurl.'/templates/'.$this->template.'/javascript/hide.js', 'text/javascript');

?>
<!DOCTYPE HTML>
<html xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
<jdoc:include type="head" />

<!-- 
<script type="text/javascript">
	var big ='<?php echo (int)$this->params->get('wrapperLarge');?>%';
	var small='<?php echo (int)$this->params->get('wrapperSmall'); ?>%';
	var altopen='<?php echo JText::_('TPL_BEEZ2_ALTOPEN', true); ?>';
	var altclose='<?php echo JText::_('TPL_BEEZ2_ALTCLOSE', true); ?>';
	var bildauf='<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/images/plus.png';
	var bildzu='<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/images/minus.png';
	var rightopen='<?php echo JText::_('TPL_BEEZ2_TEXTRIGHTOPEN', true); ?>';
	var rightclose='<?php echo JText::_('TPL_BEEZ2_TEXTRIGHTCLOSE', true); ?>';
	var fontSizeTitle='<?php echo JText::_('TPL_BEEZ2_FONTSIZE', true); ?>';
	var bigger='<?php echo JText::_('TPL_BEEZ2_BIGGER', true); ?>';
	var reset='<?php echo JText::_('TPL_BEEZ2_RESET', true); ?>';
	var smaller='<?php echo JText::_('TPL_BEEZ2_SMALLER', true); ?>';
	var biggerTitle='<?php echo JText::_('TPL_BEEZ2_INCREASE_SIZE', true); ?>';
	var resetTitle='<?php echo JText::_('TPL_BEEZ2_REVERT_STYLES_TO_DEFAULT', true); ?>';
	var smallerTitle='<?php echo JText::_('TPL_BEEZ2_DECREASE_SIZE', true); ?>';
</script>
 -->
</head>

<body>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
	<header>
		<div id="divToolBar">
			<div id="content"></div>
			<div id="bottom">
				<div id="left"></div>
				<div id="middle"></div>
				<div id="right"></div>
			</div>
			<div id="pull">
				<div id="left"></div>
				<div id="middle">
					<hr/>
					<hr/>
					<hr/>
				</div>
				<div id="right"></div>
			</div>
		</div>
		<div id="divDebug"><jdoc:include type="modules" name="debug" /></div>
		<div id="divLogo">Pinq Industry</div>
	</header>
	
	<div id="divMainPanel">
		<nav>
			<jdoc:include type="modules" name="pinqindustry3-navigationmenu" />
		</nav>
		<div id="divBreadcrumbs">
			<jdoc:include type="modules" name="pinqindustry3-breadcrumbs" />
		</div>
		<div id="divBanner">
			<canvas width="960" height="519"></canvas>
			<jdoc:include type="modules" name="pinqindustry3-banner" />
		</div>
		
		<div id="divDivision" class="hr"></div>
		
		<div id="divBottom">
			<div id="left">
				Fique por dentro de nossas novidades.<br/>
				Inscreva-se em nossa newsletter:

				<form name="frmNewsletter" id=frmNewsLetter" action"" method="post" enctype="application/x-www-form-urlencoded">
				<p>
				<input type="text" name="txtEmail" id="txtEmail" value="" /><br />
				<input type="submit" name="btnCadastrar" id="btnCadastrar" value="Cadastrar" />
				</p>
				</form>
			</div>
			<div id="middle">
				
				<div class="fb-activity" data-site="pinqindustry.com.br" data-width="290" data-height="300" data-header="false" data-font="arial" data-recommendations="false"></div>
			</div>
			<div id="right"></div>
		</div>
	</div>
</body>0
</html>
<script>
var arrImgBanner = $$('.banneritem');
var intCountBanner = -1;
var ctx = $('divBanner').getElement('canvas').getContext('2d');

window.addEvent('domready', function()
{
	/*
	var img = $$('.banneritem')[1].getElement('img');
	var canvas = document.getElementById('cnv');
	var ctx = canvas.getContext('2d');
	var imageObj = new Image();
	
	imageObj.onload = function() {
	  ctx.drawImage(imageObj, 0, 0);
};
*/
	changeBanner();
	bannerSlideOut();

});

function changeBanner()
{
	
	//setTimeout("bannerSlideOut()",5000);
}

function bannerSlideOut()
{
	
	var mySlide = new Fx.Slide($('divBanner').getElement('canvas'), 
			  {mode: 'horizontal',
			   onComplete: function()
			   {
	  				if(intCountBanner < arrImgBanner.length - 1)
	  				{
	  					intCountBanner++;
	  				}
	  				else
	  				{
	  					intCountBanner = 0;
	  				}
	  				ctx.drawImage(arrImgBanner[intCountBanner].getElement('img'), 0, 0);	

	  				bannerSlideIn();
	  				
	  				setTimeout("bannerSlideOut()",5000);
			   }
	  		  }).slideOut();
}

function bannerSlideIn()
{
	var mySlide = new Fx.Slide($('divBanner').getElement('canvas'), 
			  {mode: 'horizontal',
	  		  }).slideIn();	
}




/*
var navSlideShow;
document.addEvent('domready', function(){

	// cache the navigation elements
	var navs = $('navigation-slideshow').getElements('a');

	// create a basic slideshow
	navSlideShow = new SlideShow('navigation-slideshow', {
		selector: 'img', // only create slides out of the images
		onShow: function(data){
			// update navigation elements' class depending upon the current slide
			navs[data.previous.index].removeClass('current');
			navs[data.next.index].addClass('current');
		}
	});

	navs.each(function(item, index){
		// click a nav item ...
		item.addEvent('click', function(event){
			event.stop();
			// pushLeft or pushRight, depending upon where
			// the slideshow already is, and where it's going
			var transition = (navSlideShow.index < index) ? 'pushLeft' : 'pushRight';
			// call show method, index of the navigation element matches the slide index
			// on-the-fly transition option
			navSlideShow.show(index, {transition: transition});
		});
	});

	// tips, for pretty
	new Tips(navs, {
		fixed: true,
		text: '',
		offset: {
			x: -100,
			y: 20
		}
	});
	

});
*/

</script>
