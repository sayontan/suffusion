<?php
/**
 * Your child theme's core functions file
 *
 * @package Suffu-scion
 */

// This is the entry for your custom functions file. The name of the function is suffu_scion_theme_setup and its priority is 15.
// So it will run after Suffusion's function, which is executed with a priority 10.
add_action("after_setup_theme", "suffu_scion_theme_setup", 15);

/**
 * Use this function to add/remove hooks for Suffusion's execution, or to disable theme functionality
 */
function suffu_scion_theme_setup() {
	// If you want to disable the "Additional Options for Suffusion" box:
	// remove_theme_support('suffusion-additional-options');

	// If you want to disable left sidebars for something that Suffusion doesn't support through options:
	// add_filter('suffusion_can_display_left_sidebars', 'kill_left_sidebars');

	// ... and for right sidebars:
	// add_filter('suffusion_can_display_right_sidebars', 'kill_right_sidebars');
	// ... You will need to define the kill_left_sidebars and kill_right_sidebars functions.

	// And so on.
}

/**
 * Here you can define any additional functions that you are hooking in the theme sectup function.
 */
