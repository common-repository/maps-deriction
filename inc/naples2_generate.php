<style>
td   {color:#222829;}

</style>
<?php

function naples2_create($post)
{
    wp_nonce_field(basename( __FILE__),'naples2_post_nonce');
    $naples2_stored_meta=get_post_meta($post->ID);
  $args = array(
	'type'                     => 'post',
	'child_of'                 => 0,
	'parent'                   => '',
	'orderby'                  => 'name',
	'order'                    => 'ASC',
	'hide_empty'               => 1,
	'hierarchical'             => 1,
	'exclude'                  => '',
	'include'                  => '',
	'number'                   => '',
	'taxonomy'                 => 'category',
	'pad_counts'               => false 

); 

    ?>
<div>
    
    
    <span style="float:right">By <a href='https://plus.google.com/u/0/101358955779720224466'>Youssef BOUHALBA</a></span>
    <table>
        <tr>
            <td>Place Name:</td><td><input id='place' name="maptype" type="text"  value="Marrakech , Morroco" required> </td>
        </tr>
        <tr>
        <td colspan="2">The name of a place, town, city, or even a country. Can be an exact address too.</td>
        </tr>
    <tr>
        <td>Maps type:</td>
        <td>
            <select name="nom" id='t'>
             
               <option value="ROADMAP">ROADMAP</option>
               <option value="SATELLITE">SATELLITE</option>
               <option value="HYBRID">HYBRID</option>
               
             </select>
        </td>
        </tr>
        
        <tr>
        <td>Map Width:</td> <td> <input id='w' name="ww" type="number" step="1" value="90" min="20" max="100"> </td>
            </tr>
         <tr>
        <td>Map Height :</td> <td> <input id='h' name="hh" type="number" step="1" value="90" min="20" max="100"> </td>
            </tr>
        <tr>
        <td>Zoom:</td> <td> <input id='n' name="nn" type="number" step="1" value="16" min="1" max="21"> </td>
            </tr>
        <tr>
        <td colspan="2">A value from 0 (the world) to 21 (street level).</td>
        </tr>
        
        <tr>
            <td></td><td><input id='sbmt' type="button" value="Create Shortcode"></td>
        </tr>
        
        
    </table>
    <hr>
   <span style="color:red;font-size:20px">Copy Shortcode to Any Page</span>
    <hr>
    <input type="text" id='short' name="shortt" value="" size="100">

</div>
<script>
    var map=document.getElementById('t');
    var place=document.getElementById('place');
     var imgw=document.getElementById('w');
    var imgh=document.getElementById('h');
    var postn=document.getElementById('n');;
    var cout=document.getElementById('short');
    <?php if(!empty($naples2_stored_meta['nom'])) 
    {
        if(strcmp($naples2_stored_meta['nom'][0],'ROADMAP')==0)
        {
            ?>
            map[0].selected=true;
    
    <?php
        }
            else if(strcmp($naples2_stored_meta['nom'][0],'SATELLITE')==0)
            {
                ?>
                
                map[1].selected=true;
    <?php
            }
        else if(strcmp($naples2_stored_meta['nom'][0],'HYBRID')==0)
            {
            ?>
                map[2].selected=true;
    <?php
            }
        else
        {
            ?>
            map[0].selected=true;
    <?php
        }
    }
 
    ?>
    <?php 
    if(!empty($naples_stored_meta['ww']))
    {
        ?>
    imgw.value= "<?php echo $naples2_stored_meta['ww'][0];?>";
    <?php
    }
          if(!empty($naples2_stored_meta['hh']))
    {
        ?>
    imgh.value= "<?php echo $naples2_stored_meta['hh'][0];?>";
    <?php
              
    }
 if(!empty($naples2_stored_meta['nn']))
    {
        ?>
    postn.value= "<?php echo $naples2_stored_meta['nn'][0];?>";
    
    <?php
    }
    if(!empty($naples2_stored_meta['shortt'])) 
    {
        
           ?>
        cout.value='[locate place='+'"'+place.value+'"';
        cout.value+=' map_type='+'"'+map.value+'"';
        cout.value+=' map_width='+'"'+imgw.value+'"';
        cout.value+=' map_height='+'"'+imgh.value+'"';
        cout.value+=' zoom='+'"'+postn.value+'"]'; 
    
    <?php
    }
        
   
    ?>
    cout.style.background="#c4eeff";
    
   cout.style.margin= "0px 0px 0px 50px";
    
    var submit=document.getElementById('sbmt');
    submit.style.background="#c4eeff";
    submit.onclick=function ()
    {
       cout.value='[locate place='+'"'+place.value+'"';
        cout.value+=' map_type='+'"'+map.value+'"';
        cout.value+=' map_width='+'"'+imgw.value+'"';
        cout.value+=' map_height='+'"'+imgh.value+'"';
        cout.value+=' zoom='+'"'+postn.value+'"]';            
    }
    
</script>
<?php
}
function naples2_meta_save($post_id)
{
    $is_autosave=wp_is_post_autosave($post_id);
    $is_revision=wp_is_post_revision($post_id);
    $is_valid_nonce=(isset($_POST['naples2_post_nonce'])&& wp_verify_nonce($_POST['naples2_post_nonce'],basename( __FILE__ ))) ? 'true':'false';
    if( $is_autosave || $is_revision || !$is_valid_nonce)
    {
        return;
    }
    if(isset($_POST['nom']))
    {
        update_post_meta($post_id,'nom',sanitize_text_field($_POST['nom']));
    }
     if(isset($_POST['maptype']))
    {
        update_post_meta($post_id,'maptype',sanitize_text_field($_POST['maptype']));
    }
    if(isset($_POST['ww']))
    {
        update_post_meta($post_id,'ww',sanitize_text_field($_POST['ww']));
    }
    if(isset($_POST['hh']))
    {
        update_post_meta($post_id,'hh',sanitize_text_field($_POST['hh']));
    }
    if(isset($_POST['nn']))
    {
        update_post_meta($post_id,'nn',sanitize_text_field($_POST['nn']));
    }
  
     if(isset($_POST['shortt']))
    {
        update_post_meta($post_id,'shortt',sanitize_text_field($_POST['shortt']));
    }       
   
}
add_action('save_post','naples2_meta_save');
?>