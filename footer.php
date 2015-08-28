<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Paul Component Engineering
 */
?>

	</div><!-- #content -->

<!-- Begin Mailing Signup -->

	<section class="mailing-signup">

		<div class="mailing-list-image">

			<?php $mobile_page_banner = wp_get_attachment_image_src(get_field('mailing_list_background_image', 75), 'mailing-banner-mobile'); ?>
			<?php $desktop_page_banner = wp_get_attachment_image_src(get_field('mailing_list_background_image', 75), 'mailing-banner-desktop'); ?>

			<picture>
				<!--[if IE 9]><video style="display: none"><![endif]-->
				<source
					srcset="<?php echo $mobile_page_banner[0]; ?>"
					media="(max-width: 500px)" />
				<source
					srcset="<?php echo $desktop_page_banner[0]; ?>"
					media="(min-width: 501px)" />
				<!--[if IE 9]></video><![endif]-->
				<img srcset="<?php echo $desktop_page_banner[0]; ?>">
			</picture>

		</div>

		<div class="signup-form">
			<h1>Stay in Touch</h1>
			<?php echo do_shortcode('[epm_mailchimp]'); ?>
			<blockquote><?php the_field('mailing_list_tagline', 75); ?></blockquote>
		</div>

	</section>

<!-- End Mailing Signup -->

<!-- Begin Instagram -->

	<div class="instagram-feed">
		<?php echo do_shortcode('[instagram-feed showbutton=false showheader=false showfollow=false]'); ?>
	</div>

<!-- End Instagram -->

<!-- Begin Top Footer -->

	<footer class="top-footer">

		<div class="outer-container">

			<div class="paul-logo">
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
			</div>
			<div class="contact-info">
				<h5>Paul Component Engineering</h5>
				<ul>
					<li>
						<a href="mailto:info@paulcomp.com">info@paulcomp.com</a>
					</li>
					<li>
						<a href="tel:5303454371">530&ndash;345&ndash;4371</a>
					</li>
					<li>
						11204 Midway
					</li>
					<li>
						Chico, CA 95928
					</li>
				</ul>
			</div>
			<div class="utility-menu">
				<h5>Support</h5>
				<?php wp_nav_menu( array( 'theme_location' => 'footer-utility' ) ); ?>
			</div>
			<div class="social-media">
				<h5>Follow Along</h5>
				<div class="instagram icon">
					<a href="<?php echo the_field('instagram', 75); ?>">
						<svg version="1.1" id="Instagram" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
							 viewBox="0 0 20 20" enable-background="new 0 0 20 20" xml:space="preserve">
						<path d="M17,1H3C1.9,1,1,1.9,1,3v14c0,1.101,0.9,2,2,2h14c1.1,0,2-0.899,2-2V3C19,1.9,18.1,1,17,1z M9.984,15.523
							c3.059,0,5.538-2.481,5.538-5.539c0-0.338-0.043-0.664-0.103-0.984H17v7.216c0,0.382-0.31,0.69-0.693,0.69H3.693
							C3.31,16.906,3,16.598,3,16.216V9h1.549C4.488,9.32,4.445,9.646,4.445,9.984C4.445,13.043,6.926,15.523,9.984,15.523z M6.523,9.984
							c0-1.912,1.55-3.461,3.462-3.461c1.911,0,3.462,1.549,3.462,3.461s-1.551,3.462-3.462,3.462C8.072,13.446,6.523,11.896,6.523,9.984z
							 M16.307,6h-1.615C14.31,6,14,5.688,14,5.308V3.691C14,3.309,14.31,3,14.691,3h1.615C16.69,3,17,3.309,17,3.691v1.616
							C17,5.688,16.69,6,16.307,6z"/>
						</svg>
					</a>
				</div>
				<div class="facebook icon">
					<a href="<?php echo the_field('facebook', 75); ?>">
						<svg version="1.1" id="Facebook" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
							 viewBox="0 0 20 20" enable-background="new 0 0 20 20" xml:space="preserve">
						<path d="M17,1H3C1.9,1,1,1.9,1,3v14c0,1.101,0.9,2,2,2h7v-7H8V9.525h2V7.475c0-2.164,1.212-3.684,3.766-3.684l1.803,0.002v2.605
							h-1.197C13.378,6.398,13,7.144,13,7.836v1.69h2.568L15,12h-2v7h4c1.1,0,2-0.899,2-2V3C19,1.9,18.1,1,17,1z"/>
						</svg>
					</a>
				</div>
				<div class="twitter icon">
					<a href="<?php echo the_field('twitter', 75); ?>">
						<svg version="1.1" id="Twitter" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
							 viewBox="0 0 20 20" enable-background="new 0 0 20 20" xml:space="preserve">
						<path d="M17.316,6.246c0.008,0.162,0.011,0.326,0.011,0.488c0,4.99-3.797,10.742-10.74,10.742c-2.133,0-4.116-0.625-5.787-1.697
							c0.296,0.035,0.596,0.053,0.9,0.053c1.77,0,3.397-0.604,4.688-1.615c-1.651-0.031-3.046-1.121-3.526-2.621
							c0.23,0.043,0.467,0.066,0.71,0.066c0.345,0,0.679-0.045,0.995-0.131c-1.727-0.348-3.028-1.873-3.028-3.703c0-0.016,0-0.031,0-0.047
							c0.509,0.283,1.092,0.453,1.71,0.473c-1.013-0.678-1.68-1.832-1.68-3.143c0-0.691,0.186-1.34,0.512-1.898
							C3.942,5.498,6.725,7,9.862,7.158C9.798,6.881,9.765,6.594,9.765,6.297c0-2.084,1.689-3.773,3.774-3.773
							c1.086,0,2.067,0.457,2.756,1.191c0.859-0.17,1.667-0.484,2.397-0.916c-0.282,0.881-0.881,1.621-1.66,2.088
							c0.764-0.092,1.49-0.293,2.168-0.594C18.694,5.051,18.054,5.715,17.316,6.246z"/>
						</svg>
					</a>
				</div>
			</div>

		</div><!-- .outer-container -->

	</footer>

<!-- End Top Footer -->

<!-- Begin Bottom Footer -->
	<section class="bottom-footer">
		<div class="site-info">
			&copy; <?php the_time('Y'); ?>. <?php echo get_bloginfo('description'); ?>
		</div>
	</section>

<!-- End Bottom Footer -->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
