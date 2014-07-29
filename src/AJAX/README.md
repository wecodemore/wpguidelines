# AJAX

This is an example on how to properly do AJAX calls in WordPress.

Please always secure your user data. Validate & Sanitize user input and use and check your NONCEs.

## Use the right script

Always use the PHP script that WordPress provides to handle your AJAX calls. Unless you know
exactly what your are doing - in which case you probably don't need to read this guide.
For admin facing calls, you have a variable named `ajaxurl` prefilled. It points to the
core AJAX script. For all other calls, you will have to add it manually.

## Naming convention

To make things less confusing, you should always name

1. the location of WP Core AJAX script, `ajaxurl`
1. your AJAX nonce, `_ajax_nonce`

As the `wp_localize_script()` function adds a script tag to your DOM, you have access to the
data that you added to it. Developers with good manners prefix the object name with either
`plugin_` or `theme_` and the name to make it identifyable in the DOM.

	<script>
	var plugin_myAwesomeThing = [ ... ];
	</script>