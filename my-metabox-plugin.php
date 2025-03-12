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

if (!defined("ABSPATH")) {
   exit;
}

//  Register Pages Metabox
add_action('add_meta_boxes', 'mmp_register_page_metabox');

function mmp_register_page_metabox()
{
   add_meta_box("mmp_metabox_id", "My Custom Metabox - SEO", "mmp_create_page_metabox", "page");
}

//  create layout for page metabox
function mmp_create_page_metabox($post)
{
   // include templaqte file
   ob_start();

   include_once plugin_dir_path(__FILE__) . 'template/page_metabox.php';

   $template = ob_get_contents();

   ob_end_clean();

   echo $template;
}

// save data of custom metabox

add_action("save_post", "mmp_save_page_metabox_data");

function mmp_save_page_metabox_data($post_id)
{
   if (isset($_POST['pmeta_title'])) {
      update_post_meta($post_id, "pmeta_title", $_POST["pmeta_title"]);
   }

   if (isset($_POST['pmeta_description'])) {
      update_post_meta($post_id, "pmeta_description", $_POST["pmeta_description"]);
   }
}

add_action("wp_head", "mmp_add_head_meta_tags");

function mmp_add_head_meta_tags() {
   if(is_page()) {
      global $post;

      $post_id = $post->ID;

      $title = get_post_meta($post_id, "pmeta_title", true);
      $description = get_post_meta($post_id, "pmeta_description", true);

      if(!empty($title)) {
         echo '<meta name="title" content="'.$title.'" />';
      }
      if(!empty($description)) {
         echo '<meta name="description" content="'.$description.'" />';
      }
   }
}
