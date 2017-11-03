<?php
 /*
Plugin Name: CMB2 Markdown
Description: Adds a markdown field to the CMB2 framework
Version: 1.0
Author: Ryan McKenna
Author URI: https://rekenna.github.io
License: GPL2
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
  wp_register_style( 'cmb2_markdown_css',  plugin_dir_url( __FILE__ ) . '/dist/styles.css', false, '1.0.0' );
  wp_enqueue_style( 'cmb2_markdown_css' );
  wp_enqueue_script( 'cmb2_markdown_script', plugin_dir_url( __FILE__ ) . 'dist/app.js' );
}
add_action('admin_enqueue_scripts', 'CMB2_Markdown_enqueue_script');

?>
