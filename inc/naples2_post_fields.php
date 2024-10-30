<?php
require(plugin_dir_path(__FILE__).'naples2_generate.php');
function naples2_add_custom_metabox()
{
    add_meta_box(
        'naples2_meta',
        'Locate Direction',
        'naples2_create',
        'locate'
    );
    
}
add_action('add_meta_boxes','naples2_add_custom_metabox');


?>