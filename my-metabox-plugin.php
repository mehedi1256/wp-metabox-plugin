<?php

/**
 * Plugin Name: My Metabox Plugin
 * Plugin URI: https://example.com
 * Description: Adds a custom metabox to the post editor.
 * Version: 1.0
 * Author: Mehedi Hassan Shovo
 * Author URI: https://example.com  
 * Text Domain: my-metabox-plugin
 */

 if(!defined("ABSPATH")) {
    exit;
 }

//  Register Pages Metabox
 add_action('add_meta_boxes', 'mmp_register_page_metabox');

 function mmp_register_page_metabox() {
    add_meta_box("mmp_metabox_id", "My Custom Metabox - SEO", "mmp_create_page_metabox");
 }

//  create layout for page metabox
function mmp_create_page_metabox() {
    // include templaqte file
    ob_start();

    include_once plugin_dir_path(__FILE__) . 'template/page_metabox.php';

    $template = ob_get_contents();

    ob_end_clean();

    echo $template;
}