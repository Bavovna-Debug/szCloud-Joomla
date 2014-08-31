<?php defined('_JEXEC') or die('Restricted access');

error_reporting('E_ALL');

$path = $this->baseurl . DS . 'templates' . DS . $this->template;

JHTML::_('behavior.framework', true);

$application = JFactory::getApplication();
$templateparams = $application->getTemplate(true)->params;

$showCart = ($this->countModules('cart'));
$showCurrencies = ($this->countModules('currencies'));
$showLanguages = ($this->countModules('languages'));
$showSearch = ($this->countModules('search'));

$showTabs = ($this->countModules('tabs'));
$showLeftColumn = ($this->countModules('left'));
$showRightColumn = ($this->countModules('right'));

$showBottom1 = $this->countModules('bottom-1');
$showBottom2 = $this->countModules('bottom-2');
$showBottom3 = $this->countModules('bottom-3');
$showBottom4 = $this->countModules('bottom-4');

$bottomModulesCount = 0;
if ($showBottom1) $bottomModulesCount++;
if ($showBottom2) $bottomModulesCount++;
if ($showBottom3) $bottomModulesCount++;
if ($showBottom4) $bottomModulesCount++;

switch ($bottomModulesCount) {
case 4:
	$bottomModulesClass = "span3";
	break;
case 3:
	$bottomModulesClass = "span4";
	break;
case 2:
	$bottomModulesClass = "span6";
	break;
default:
	$bottomModulesClass = "span12";
}

if (isset($_GET['option']))
	$option = $_GET['option'];

/*
$menus = &JSite::getMenu();
$menu = $menus->getActive();
$pageclass = "";

if ($menus->getActive() == $menus->getDefault()) {
    $body_class = 'first';
} else {
    $body_class = 'all';
}

if (is_object($menu)) {
	$params1 =  $menu->params;
	$pageclass = $params1->get('pageclass_sfx');
}*/ ?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language ?>" lang="<?php echo $this->language ?>" dir="<?php echo $this->direction ?>" >

	<head>

		<jdoc:include type="head" />

		<link href="http://fonts.googleapis.com/css?family=Cuprum" rel="stylesheet" type="text/css" />
		<link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Playfair+Display' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Quattrocento+Sans' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:600' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:700' rel='stylesheet' type='text/css'>

		<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/system/css/system.css" type="text/css" />

		<link rel="stylesheet" href="<?php echo $path ?>/css/layout.css" type="text/css" media="screen,projection" />
		<link rel="stylesheet" href="<?php echo $path ?>/css/bootstrap.css" type="text/css" />
		<link rel="stylesheet" href="<?php echo $path ?>/css/form.css" type="text/css" />
		<link rel="stylesheet" href="<?php echo $path ?>/css/tab.css" type="text/css" />
		<link rel="stylesheet" href="<?php echo $path ?>/css/top_bar.css" type="text/css" />
		<link rel="stylesheet" href="<?php echo $path ?>/css/header.css" type="text/css" />
		<link rel="stylesheet" href="<?php echo $path ?>/css/main_menu.css" type="text/css" />
		<link rel="stylesheet" href="<?php echo $path ?>/css/messages.css" type="text/css" />
		<link rel="stylesheet" href="<?php echo $path ?>/css/bottom.css" type="text/css" />

		<link rel="stylesheet" href="<?php echo $path ?>/css/vm.css" type="text/css" />
		<link rel="stylesheet" href="<?php echo $path ?>/css/vm_cart.css" type="text/css" />
		<link rel="stylesheet" href="<?php echo $path ?>/css/vm_category.css" type="text/css" />
		<link rel="stylesheet" href="<?php echo $path ?>/css/vm_productdetails.css" type="text/css" />
		<link rel="stylesheet" href="<?php echo $path ?>/css/vm_shop.css" type="text/css" />

		<script type="text/javascript" src="<?php echo $path ?>/javascript/slides.min.jquery.js"></script>
		<script type="text/javascript" src="<?php echo $path ?>/javascript/jquery.jqzoom-core.js"></script>
		<script type="text/javascript" src="<?php echo $path ?>/javascript/jquery_carousel_lite.js"></script>
		<script type="text/javascript" src="<?php echo $path ?>/javascript/jqtransform.js"></script>
		<script type="text/javascript" src="<?php echo $path ?>/javascript/cookie.js"></script>
		<script type="text/javascript" src="<?php echo $path ?>/javascript/jquery.equalheights.js"></script>
		<script type="text/javascript" src="<?php echo $path ?>/javascript/jquery.easing.1.3.js"></script>
		<script type="text/javascript" src="<?php echo $path ?>/javascript/script.js"></script>

		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

	</head>

	<body>

		<div class="manager">
			<jdoc:include type="modules" name="manager" style="xhtml" />
		</div>

		<div id="top_bar">

			<div id="login">
				<jdoc:include type="modules" name="login" style="xhtml" />
			</div>

			<?php if ($showSearch): ?>
				<div id="search">
					<jdoc:include type="modules" name="search" style="xhtml" />
				</div>
			<?php endif ?>

			<?php if ($showLanguages): ?>
				<div id="languages">
					<jdoc:include type="modules" name="languages" style="xhtml" />
				</div>
			<?php endif ?>

			<?php if ($showCurrencies): ?>
				<div id="currencies">
					<jdoc:include type="modules" name="currencies" style="xhtml" />
				</div>
			<?php endif ?>

			<?php if ($showCart): ?>
				<div id="cart">
					<jdoc:include type="modules" name="cart" style="xhtml" />
				</div>
			<?php endif ?>

		</div>

		<div id="header">

			<div class="inliner">
<?php /*
				<div id="logo">
					<a href="<?php echo $this->baseurl ?>"><img alt="" src="<?php echo $path ?>/images/logo.png" /></a>
				</div>
*/ ?>
				<div id="menu_line">
					<jdoc:include type="modules" name="main_menu" style="xhtml" />
				</div>

			</div>

		</div>

		<div id="content">

			<div class="inliner">

				<?php if ($showTabs): ?>
					<div id="right" class="extra-indent">
						<jdoc:include type="modules" name="tabs" style="xhtml" />
					</div>
				<?php endif ?>

				<?php if ($showLeftColumn): ?>
					<div id="left" class="extra-indent">
						<jdoc:include type="modules" name="left" class="left" />
					</div>
				<?php endif ?>

				<?php if ($showRightColumn): ?>
					<div id="right" class="extra-indent">
						<jdoc:include type="modules" name="right" class="right" />
					</div>
				<?php endif ?>

				<div class="container">

					<?php if (($showFeatured ) && ($option != "com_search")) {
						if ($this->getBuffer('message')): ?>
							<div class="error err-space">
								<jdoc:include type="message" />
							</div>
						<?php endif;
					} else {
						if ($this->getBuffer('message')): ?>
							<div class="error err-space">
								<jdoc:include type="message" />
							</div>
						<?php endif ?>

						<div class="content-indent">
							<jdoc:include type="component" />
						</div>
					<?php } ?>

				</div>

			</div>

		</div>

		<div id="bottom">

			<div class="inliner">

				<?php if( $this->countModules('bottom-long')): ?>
					<div class="container-fluid">
						<div class="row-fluid">
							<div class="span12">
								<jdoc:include type="modules" name="bottom-long" style="vmdefault" />
							</div>
						</div>
					</div>

					<div class="clear"></div>
				<?php endif ?>

				<?php if ($bottomModulesCount): ?>
					<div id="bottom-modules">
						<div class="container-fluid">
							<div class="row-fluid">
								<?php if ($showBottom1): ?>
									<div class="<?php echo $bottomModulesClass ?>">
										<jdoc:include type="modules" name="bottom-1" style="vmdefault" />
									</div>
								<?php endif ?>

								<?php if ($showBottom2): ?>
									<div class="<?php echo $bottomModulesClass ?>">
										<jdoc:include type="modules" name="bottom-2" style="vmdefault" />
									</div>
								<?php endif ?>

								<?php if ($showBottom3): ?>
									<div class="<?php echo $bottomModulesClass ?>">
										<jdoc:include type="modules" name="bottom-3" style="vmdefault" />
									</div>
								<?php endif ?>

								<?php if ($showBottom4) : ?>
									<div class="<?php echo $bottomModulesClass; ?>">
										<jdoc:include type="modules" name="bottom-4" style="vmdefault" />
									</div>
								<?php endif ?>
							</div>
						</div>
					</div>

					<div class="clear"></div>
				<?php endif ?>

			</div>

		</div>

		<footer id="footer">

			<div id="footer-line" class="row">

				<div class="span12">
					<jdoc:include type="modules" name="footer" />
				</div>

				<div class="clear"></div>

				<div style="overflow: hidden;">

					<div class="footer-left">
						<jdoc:include type="modules" name="footer-left" />
					</div>

					<div class="footer-right">
						<jdoc:include type="modules" name="footer-right" />
					</div>

				</div>

			</div>

		</footer>

		<p id="back-top">
			<a href="#top"><span></span></a>
		</p>

	</body>

</html>
