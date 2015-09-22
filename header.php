<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Paul Component Engineering
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/images/favicon.png" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<!--[if IE 11]>
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/ie.css">
<![endif]-->


<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'Paul Component Engineering' ); ?></a>

<div id="page" class="hfeed site">

	<header class="mobile-header">

		<div class="site-branding">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
				<svg viewBox="0 0 124 57" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns">
					<defs>
						<path id="path-1" d="M0.181,56.789 L124.018,56.789 L124.018,0.851 L0.181,0.851 L0.181,56.789 Z"></path>
						<path id="path-3" d="M0.181,56.789 L124.018,56.789 L124.018,0.851 L0.181,0.851 L0.181,56.789 Z"></path>
						<path id="path-5" d="M0.181,56.789 L124.018,56.789 L124.018,0.851 L0.181,0.851 L0.181,56.789 Z"></path>
					</defs>
					<g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage">
						<g id="Group-23" sketch:type="MSLayerGroup">
							<path d="M47.8516,21.2217 C46.7936,21.7927 46.6846,23.1007 46.2466,25.4497 L45.2936,30.5497 L48.3526,30.5497 L49.3436,25.2487 C49.7436,23.1007 49.8886,21.9597 49.3626,21.3227 C49.0856,20.9867 48.1956,21.0207 47.8516,21.2217" id="Fill-8" fill="#FFFFFF" sketch:type="MSShapeGroup"></path>
							<g id="Group-12">
								<mask id="mask-2" sketch:name="Clip 11" fill="white">
									<use xlink:href="#path-1"></use>
								</mask>
								<g id="Clip-11"></g>
								<path d="M53.2203,42.1597 L46.1843,42.1597 L47.2373,36.5227 L44.1783,36.5227 L43.1253,42.1597 L36.1233,42.1597 L39.9583,21.6247 C40.2843,19.8797 40.5183,17.8997 42.0143,16.6247 C43.3893,15.4507 45.3293,15.6177 46.9603,15.6177 L52.3993,15.6177 C54.6763,15.6177 56.1603,15.6857 57.1953,16.6917 C57.9973,17.4977 57.4383,19.5777 57.0693,21.5577 L53.2203,42.1597 Z M38.4653,7.0707 L29.5203,56.7897 L54.8083,56.7897 L63.7523,7.0707 L38.4653,7.0707 Z" id="Fill-10" fill="#FFFFFF" sketch:type="MSShapeGroup" mask="url(#mask-2)"></path>
							</g>
							<g id="Group-15">
								<mask id="mask-4" sketch:name="Clip 14" fill="white">
									<use xlink:href="#path-3"></use>
								</mask>
								<g id="Clip-14"></g>
								<path d="M27.1305,25.6509 C26.7355,27.7649 26.3215,29.9799 24.8915,31.0869 C23.5815,32.0929 21.0575,31.9589 19.6975,31.9589 L15.7545,31.9589 L13.8495,42.1599 L6.8125,42.1599 L11.7705,15.6179 L22.4435,15.6179 C24.1775,15.6179 26.7515,15.4839 27.6945,16.6249 C28.7475,17.8999 28.2525,19.6449 27.7445,22.3629 L27.1305,25.6509 Z M8.9965,0.8509 L0.1815,50.6079 L25.4685,50.6079 L34.2845,0.8509 L8.9965,0.8509 Z" id="Fill-13" fill="#FFFFFF" sketch:type="MSShapeGroup" mask="url(#mask-4)"></path>
							</g>
							<path d="M17.6909,21.5908 L17.6029,22.0608 L16.8759,25.9528 C17.1019,26.0198 18.0319,25.9528 18.2419,25.9198 C18.9689,25.8528 19.6489,25.4838 19.9349,25.0468 C20.4059,24.3428 20.6549,22.8328 20.3679,22.3628 C19.8449,21.5238 18.5409,21.5908 17.6909,21.5908" id="Fill-16" fill="#FFFFFF" sketch:type="MSShapeGroup"></path>
							<g id="Group-20">
								<mask id="mask-6" sketch:name="Clip 19" fill="white">
									<use xlink:href="#path-5"></use>
								</mask>
								<g id="Clip-19"></g>
								<path d="M111.8671,42.1597 L97.2711,42.1597 L102.2101,15.6177 L109.5761,15.6177 L105.5341,36.3217 L113.3121,36.1317 L111.8671,42.1597 Z M98.7291,7.0707 L89.8841,56.7897 L115.1711,56.7897 L124.0171,7.0707 L98.7291,7.0707 Z" id="Fill-18" fill="#FFFFFF" sketch:type="MSShapeGroup" mask="url(#mask-6)"></path>
							</g>
							<path d="M84.7302,35.9185 C84.2662,38.4015 84.0982,40.2135 82.6802,41.2535 C81.3832,42.1925 79.0772,42.1595 77.3442,42.1595 L72.1762,42.1595 C70.4772,42.1595 68.3792,42.2935 67.5132,41.2875 C66.6542,40.2465 67.2282,37.8975 67.5222,36.3215 L71.3892,15.6185 L78.3912,15.6185 L75.2212,32.5965 C74.9202,34.2075 74.4122,36.0195 75.2692,36.5225 C75.5172,36.6565 76.3662,36.6565 76.7372,36.4885 C77.7832,35.9855 77.9232,34.5095 78.3112,32.4295 L81.4512,15.6185 L88.5212,15.6185 L84.7302,35.9185 Z M69.6152,0.8515 L61.1392,50.6075 L86.4272,50.6075 L94.9032,0.8515 L69.6152,0.8515 Z" id="Fill-21" fill="#FFFFFF" sketch:type="MSShapeGroup"></path>
						</g>
					</g>
				</svg>
			</a>
		</div><!-- .site-branding -->

		<div class="slide-out" style="display:none">

			<div class="mobile-navigation">

				<nav id="site-navigation" class="main-navigation" role="navigation">
					<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
				</nav><!-- #site-navigation -->

				<div class="utility-header">

					<span class="account-link">
						<a href="/my-account">
							<svg viewBox="0 0 11 10" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns">
							    <g id="Page-1" stroke="none" stroke-width="1" fill-rule="evenodd" sketch:type="MSPage">
							        <path d="M11,9.68 C11,9.68 10.978,7.597 10.851,7.381 C10.662,7.06 10.221,6.839 9.402,6.497 C8.587,6.156 8.326,5.868 8.326,5.252 C8.326,4.882 8.575,5.003 8.684,4.326 C8.73,4.045 8.95,4.321 8.992,3.68 C8.992,3.425 8.872,3.361 8.872,3.361 C8.872,3.361 8.933,2.983 8.957,2.692 C8.986,2.329 8.774,1.392 7.642,1.392 C6.509,1.392 6.297,2.329 6.326,2.692 C6.35,2.983 6.411,3.361 6.411,3.361 C6.411,3.361 6.291,3.425 6.291,3.68 C6.333,4.321 6.553,4.045 6.599,4.326 C6.708,5.003 6.957,4.882 6.957,5.252 C6.957,5.671 6.836,5.938 6.502,6.173 C8.285,7.066 8.523,7.247 8.523,8.045 L8.523,9.68 L11,9.68 Z M5.623,6.806 C4.535,6.352 4.187,5.968 4.187,5.147 C4.187,4.654 4.52,4.815 4.665,3.912 C4.726,3.537 5.019,3.906 5.075,3.051 C5.075,2.71 4.915,2.625 4.915,2.625 C4.915,2.625 4.997,2.121 5.028,1.733 C5.068,1.249 4.785,0 3.275,0 C1.765,0 1.482,1.249 1.521,1.733 C1.553,2.121 1.635,2.625 1.635,2.625 C1.635,2.625 1.474,2.71 1.474,3.051 C1.531,3.906 1.824,3.537 1.885,3.912 C2.031,4.815 2.363,4.654 2.363,5.147 C2.363,5.968 2.015,6.352 0.927,6.806 C0.595,6.945 0,7.159 0,7.676 L0,9.68 L7.642,9.68 L7.642,8.178 C7.642,7.706 6.714,7.263 5.623,6.806 L5.623,6.806 Z" id="Fill-33" sketch:type="MSShapeGroup"></path>
							    </g>
							</svg>
							<span class="account-title">Account</span>
						</a>
					</span>
					<span class="cart-link">
						<a href="/cart">
							<svg version="1.1" id="Shopping_cart" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
								 y="0px" viewBox="0 0 20 20" enable-background="new 0 0 20 20" xml:space="preserve">
							<path d="M13,17c0,1.104,0.894,2,2,2c1.104,0,2-0.896,2-2c0-1.106-0.896-2-2-2C13.894,15,13,15.894,13,17z M3,17c0,1.104,0.895,2,2,2
								c1.103,0,2-0.896,2-2c0-1.106-0.897-2-2-2C3.895,15,3,15.894,3,17z M6.547,12.172L17.615,9.01C17.826,8.949,18,8.721,18,8.5V3H4V1.4
								C4,1.18,3.819,1,3.601,1H0.399C0.18,1,0,1.18,0,1.4L0,3h2l1.91,8.957L4,12.9v1.649c0,0.219,0.18,0.4,0.4,0.4H17.6
								c0.22,0,0.4-0.182,0.4-0.4V13H6.752C5.602,13,5.578,12.449,6.547,12.172z"/>
							</svg>
							<span class="cart-title">Cart:</span>
							<span class="cart-count"><?php echo sprintf (_n( '%d', '%d', WC()->cart->cart_contents_count ), WC()->cart->cart_contents_count ); ?></span>
						</a>
					</span>
				</div>
			</div>

			<form role="search" method="get" class="search-form" action="<?php echo site_url(); ?>">
				<label>
					<input type="search" class="search-field" placeholder="Search" value="" name="s" title="Search for:" />
				</label>
			</form>

			<?php echo get_template_part('partials/social', 'media'); ?>

		</div>

		<div class="menu-hook-container">
			<span class="menu-hook">Menu</span>
		</div>

	</header>

	<div class="utility-header">

		<div class="inner-container">
			<span class="account-link">
				<a href="/my-account">
					<svg viewBox="0 0 11 10" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns">
						<g id="Page-1" stroke="none" stroke-width="1" fill-rule="evenodd" sketch:type="MSPage">
							<path d="M11,9.68 C11,9.68 10.978,7.597 10.851,7.381 C10.662,7.06 10.221,6.839 9.402,6.497 C8.587,6.156 8.326,5.868 8.326,5.252 C8.326,4.882 8.575,5.003 8.684,4.326 C8.73,4.045 8.95,4.321 8.992,3.68 C8.992,3.425 8.872,3.361 8.872,3.361 C8.872,3.361 8.933,2.983 8.957,2.692 C8.986,2.329 8.774,1.392 7.642,1.392 C6.509,1.392 6.297,2.329 6.326,2.692 C6.35,2.983 6.411,3.361 6.411,3.361 C6.411,3.361 6.291,3.425 6.291,3.68 C6.333,4.321 6.553,4.045 6.599,4.326 C6.708,5.003 6.957,4.882 6.957,5.252 C6.957,5.671 6.836,5.938 6.502,6.173 C8.285,7.066 8.523,7.247 8.523,8.045 L8.523,9.68 L11,9.68 Z M5.623,6.806 C4.535,6.352 4.187,5.968 4.187,5.147 C4.187,4.654 4.52,4.815 4.665,3.912 C4.726,3.537 5.019,3.906 5.075,3.051 C5.075,2.71 4.915,2.625 4.915,2.625 C4.915,2.625 4.997,2.121 5.028,1.733 C5.068,1.249 4.785,0 3.275,0 C1.765,0 1.482,1.249 1.521,1.733 C1.553,2.121 1.635,2.625 1.635,2.625 C1.635,2.625 1.474,2.71 1.474,3.051 C1.531,3.906 1.824,3.537 1.885,3.912 C2.031,4.815 2.363,4.654 2.363,5.147 C2.363,5.968 2.015,6.352 0.927,6.806 C0.595,6.945 0,7.159 0,7.676 L0,9.68 L7.642,9.68 L7.642,8.178 C7.642,7.706 6.714,7.263 5.623,6.806 L5.623,6.806 Z" id="Fill-33" sketch:type="MSShapeGroup"></path>
						</g>
					</svg>
					<span class="account-title">Account</span>
				</a>
			</span>
			<span class="cart-link">
				<a href="/cart">
					<svg version="1.1" id="Shopping_cart" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
						 y="0px" viewBox="0 0 20 20" enable-background="new 0 0 20 20" xml:space="preserve">
					<path d="M13,17c0,1.104,0.894,2,2,2c1.104,0,2-0.896,2-2c0-1.106-0.896-2-2-2C13.894,15,13,15.894,13,17z M3,17c0,1.104,0.895,2,2,2
						c1.103,0,2-0.896,2-2c0-1.106-0.897-2-2-2C3.895,15,3,15.894,3,17z M6.547,12.172L17.615,9.01C17.826,8.949,18,8.721,18,8.5V3H4V1.4
						C4,1.18,3.819,1,3.601,1H0.399C0.18,1,0,1.18,0,1.4L0,3h2l1.91,8.957L4,12.9v1.649c0,0.219,0.18,0.4,0.4,0.4H17.6
						c0.22,0,0.4-0.182,0.4-0.4V13H6.752C5.602,13,5.578,12.449,6.547,12.172z"/>
					</svg>
					<span class="cart-title">Cart:</span>
					<span class="cart-count"><?php echo sprintf (_n( '%d', '%d', WC()->cart->cart_contents_count ), WC()->cart->cart_contents_count ); ?></span>
				</a>
			</span>
			<form role="search" method="get" class="search-form" action="<?php echo site_url(); ?>">
				<label>
					<input type="search" class="search-field" placeholder="Search" value="" name="s" title="Search for:" />
				</label>
			</form>

		</div>

	</div>

	<header id="masthead" class="desktop-header" role="banner">

		<div class="inner-container">

			<div class="main-navigation">

				<div class="site-branding">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
						<img src="<?php echo get_template_directory_uri(); ?>/images/header_logo.svg" />
					</a>
				</div><!-- .site-branding -->

				<nav id="site-navigation" class="navigation" role="navigation">
					<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
				</nav><!-- #site-navigation -->

			</div>

		</div>

	</header><!-- #masthead -->

	<div id="content" class="content-container">
