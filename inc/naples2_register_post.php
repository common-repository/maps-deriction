<?php
function naples2_register_post_type()
{
    $singular='Location';
    $plural='Location';
    $label=array(
        'name' => $singular,
        'add_new_item'=>'ADD '.$plural,
        'add_new'=>'Add Location',
        'edit_item'=>'Edit Location',
    );
    $args=array(
        'labels'=>$label,
        'public'=>true,
        'publicity_queryable'=>true,
        'exclude_from_search'=>false,
        'swho_in_nav_menus'=>true,
        'show_ui'=>true,
        'show_in_menu'=>true,
        'shwo_in_admin_bar'=>true,
        'menu_position'=>10,
        'menu_icon'=>'dashicons-location-alt',
        'can_export'=>true,
        'delete_with_user'=>false,
        'hierarchical' =>false,
        'has_archive'=>true,
        'query_var'=>true,
        'capability_type' => 'post',
        'capabilities' => array(
        'create_posts' => true, 
                     ),
  'map_meta_cap' => true,
        'map_meta_cap'=>true,
        'rewrite'=>array(
            'slug'=>'post',
            'with_front'=>true,
            'pages'=>true,
            'feeds'=>false,
        ),
            
        'supports'=>array('title'       
        )   
    );
    
    register_post_type('locate',$args);
}
add_action('init','naples2_register_post_type');
?>
