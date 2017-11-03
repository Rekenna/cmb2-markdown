<?php

/**
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://rekenna.github.io
 * @since             1.0.0
 * @package           CMB2_Markdown
 *
 * @wordpress-plugin
 * Plugin Name:       CMB2 Markdown
 * Plugin URI:        https://github.com/Rekenna/cmb2-markdown
 * Description:       Adds a Markdown enabled textarea with a live preview to the available CMB2 fields.
 * Version:           1.0.0
 * Author:            Ryan McKenna
 * Author URI:        http://rekenna.github.io/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       cmb2-markdown
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

define( 'CMB2_MARKDOWN', '1.0.0' );

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */

 function cmb2_render_callback_for_text_markdown( $field, $escaped_value, $object_id, $object_type, $field_type_object ) {
   ?>
 	<div class="cmb2-markdown">
     <ul class="cmb2-markdown-actions">
       <li class="cheatsheet"><a href="https://github.com/adam-p/markdown-here/wiki/Markdown-Here-Cheatsheet" target="_blank">Markdown Cheatsheet</a></li>
       <li class="toggle-preview">Toggle Preview</li>
     </ul>
     <div class="markdown-textarea">
       <textarea name="cmb2_markdown" class="markdown-content" rows="10" cols="60"></textarea>
     </div>
     <div class="hidden-field">
       <?php echo $field_type_object->textarea( array() ); ?>
     </div>
     <article class="markdown-result"></article>
 	</div>
   <?php
 }
 add_action( 'cmb2_render_text_markdown', 'cmb2_render_callback_for_text_markdown', 10, 5 );

 //
// Scripts
//
function CMB2_Markdown_enqueue_script()
{
  wp_register_style( 'cmb2_markdown_css',  plugin_dir_url( __FILE__ ) . 'assets/cmb2-markdown.css', false, '1.0.0' );
  wp_enqueue_style( 'cmb2_markdown_css' );
  wp_enqueue_script( 'cmb2_markdown_script', plugin_dir_url( __FILE__ ) . 'assets/cmb2-markdown.js' );
}
add_action('admin_enqueue_scripts', 'CMB2_Markdown_enqueue_script');
