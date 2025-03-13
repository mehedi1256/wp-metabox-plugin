<?php
    $post_id = isset($post->ID) ? $post->ID : "";
    $title = get_post_meta($post_id, "pmeta_title", true);
    $description = get_post_meta($post_id, "pmeta_description", true);

    wp_nonce_field("mmp_save_page_metabox_data", "mmp_save_pmetabox_nonce");
?>

<p>
    <label for="">Meta Title</label>
    <input type="text" name="pmeta_title" placeholder="Meta Title..." id="pmeta_title" value="<?= $title ?>" />
</p>

<p>
    <label for="">Meta Description</label>
    <input type="text" name="pmeta_description" id="pmeta_description" value="<?= $description ?>" placeholder="Meta Description..." />
</p>