=== Plugin Name ===
Contributors: (Rekenna)
Donate link: http://rekenna.github.io/
Tags: cmb2, development
Requires at least: 3.0.1
Tested up to: 3.4
Stable tag: 4.3
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Adds a Markdown enabled textarea with a live preview to the available CMB2 field types.

== Description ==

Example Usage

`
$cmb->add_field( array(
    'name' => 'Markdown Enabled Field',
    'type' => 'text_markdown',
    'id'   => 'test_markdown',
    'sanitization_cb' => 'markdown_sanitize'
) );
`

It works with repeatable fields as well!

== Installation ==

This section describes how to install the plugin and get it working.

e.g.

1. Upload `cmb2-markdown` to the `/wp-content/plugins/` directory


== Changelog ==

= 1.0 =
* Published

[Markdown Syntax]: http://daringfireball.net/projects/markdown/syntax
