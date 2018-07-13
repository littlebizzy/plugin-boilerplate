<?php

return [

	/**
	 * Rate Us
	 */
	'days_before_display_rate_us' 	=> 3, // 3 days delay
	'days_dismissing_rate_us' 		=> 270, // 9 months reappear
	'rate_us_url'					=> 'https://wordpress.org/support/plugin/[plugin uri]/reviews/#new-post',
	'rate_us_message' 				=> 'Thanks for using <strong>%plugin%</strong>. Please support our free work by rating this plugin with 5 stars on WordPress.org. <a href="%url%" target="_blank">Click here to rate us.</a>',

	/**
	 * Plugin suggestions
	 */
	'days_dismissing_suggestions' 	=> 180, // 6 months reappear
	'suggestions_message' 			=> '%plugin% recommends the following free plugins:',
	'suggestions'					=> [

		'disable-wc-status-littlebizzy' => [
			'name' => 'Disable WooCommerce Status',
			'desc' => 'Completely disables the WooCommerce Status widget in the WP Admin dashboard to greatly improve backend performance on high traffic WooCommerce shops.',
			'filename' => 'disable-woocommerce-status.php',
		],

		'disable-wc-styles-littlebizzy' => [
			'name' => 'Disable WooCommerce Styles',
			'desc' => 'Completely disables all of the CSS stylesheets that are loaded by WooCommerce in order that styling can be better managed by a single style.css file.',
			'filename' => 'disable-woocommerce-styles.php',
		],

		'delete-expired-transients-littlebizzy' => [
			'name' => 'Delete Expired Transients',
			'desc' => 'Deletes all expired transients upon activation and on a daily basis thereafter via WP Cron to maintain a cleaner database and improve performance.',
			'filename' => 'delete-expired-transients.php',
		],

		'disable-jq-migrate-littlebizzy' => [
			'name' => 'Disable jQuery Migrate',
			'desc' => 'Easily prevent the jQuery migrate script that is included with WordPress core from being loaded to slim down source code (for advanced users only).',
			'filename' => 'disable-jquery-migrate.php',
		],

		'remove-query-strings-littlebizzy' => [
			'name' => 'Remove Query Strings',
			'desc' => 'Removes all query strings from static resources meaning that proxy servers and beyond can better cache your site content (plus, better SEO scores).',
			'filename' => 'remove-query-strings.php',
		],

	], // End of suggestions

];