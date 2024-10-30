
<?php
function naples2_post($atts) 
{
   $a = shortcode_atts( array(
       'place'=>'pla',
        'map_width'=>'500',
        'map_height'=>'500',
       'zoom'=>'10',
       'map_type'=>'basic',
    ), $atts );
    

  
    ?>

           
    
       <script>
          
           
        var map;
function initMap() 
           {
               var marker;
               var marker1;
               var directionsDisplay = new google.maps.DirectionsRenderer;
               var directionsService = new google.maps.DirectionsService;
               var pos;
    var mapkind=document.getElementById("kind");
       mapkind.onclick=function()
        {
           if(mapkind.value=="MAPTYPE")
           {
               map.setMapTypeId(google.maps.MapTypeId.<?php echo $atts['map_type']?>);
           }
              if(mapkind.value=="ROADMAP")
           {
               map.setMapTypeId(google.maps.MapTypeId.ROADMAP);
           }
              if(mapkind.value=="HYBRID")
           {
               map.setMapTypeId(google.maps.MapTypeId.HYBRID);
           }
              if(mapkind.value=="SATELLITE")
           {
               map.setMapTypeId(google.maps.MapTypeId.SATELLITE);
           }
               }
           
    var locate=document.getElementById("bt");
        locate.onclick=function()
        {
            locate.value="Find Direction";
            
             directionsDisplay.setMap(map);
            
            if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position) {
      pos = {
        lat: position.coords.latitude,
        lng: position.coords.longitude
      };
        map.setCenter(pos);
        
          var marker1 = new google.maps.Marker({
                position: pos,
                map: map, 
                title:'you are here'
            });
          });
       }
            function calculateAndDisplayRoute(directionsService, directionsDisplay) {
                
  directionsService.route({
    origin: pos,
    destination:"<?php echo $atts['place'] ?>",
    travelMode: google.maps.TravelMode.DRIVING
  }, function(response, status) {
    if (status === google.maps.DirectionsStatus.OK) {
      directionsDisplay.setDirections(response);
    } else {
      window.alert('Directions request failed due to ' + status);
    }
  });
        }
            calculateAndDisplayRoute(directionsService, directionsDisplay);
        }
                                             
    var styl=document.getElementById('all');
    styl.style.width="<?php echo $atts['map_width']."%" ?>";
    styl.style.height="<?php echo $atts['map_height']."%" ?>";
   
               var styl1=document.getElementById('map');
  
   
    
    var address ="<?php echo $atts['place']?>";
    var geocoder;
    
    geocoder = new google.maps.Geocoder();
    geocoder.geocode({
        'address': address
    }, function(results, status) {
        if (status == google.maps.GeocoderStatus.OK) {
            var myOptions = {
                
                zoom: <?php echo $atts['zoom'] ?>,
                center: results[0].geometry.location,
                mapTypeId: google.maps.MapTypeId.<?php echo $atts['map_type']?>
            }
           
           
            map = new google.maps.Map(document.getElementById("map"), myOptions);
             marker = new google.maps.Marker({
                position: results[0].geometry.location,
                map: map, 
                title:address
            });
            }      
                                });
           }
           

                     
</script>
<div id="all">
    <table>
            <tr>
                <td style="text-align:center"><input type='button' value='Find me ' id='bt' class="btn" width="30px" height="15px"></td>
                <td style="text-align:center"> 
                    <select name="mapname" id='kind' >
             
               <option value="ROADMAP" width="30px" height="15px">ROADMAP</option>
               <option value="SATELLITE" width="30px" height="15px">SATELLITE</option>
               <option value="HYBRID" width="30px" height="15px">HYBRID</option>
                 <option value="HYBRID" width="30px" height="15px" selected>MAPTYPE</option>
               
                   </select>
                </td>

            </tr>
    </table>
    
<div id="map" style="width:100%;height:100%"></div>
</div>


<!-- Replace the API Key with your own -->
<script src="https://maps.googleapis.com/maps/api/js?sensor=false&callback=initMap" async defer></script>
<?php


}
   
?>
 
        
        
