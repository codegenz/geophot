<?php if(!class_exists('Rain\Tpl')){exit;}?><script type="text/javascript">
    DG.then(function() {
        map = DG.map('map', {
            'center': [59.8845503, 30.3264758],
            'zoom': 10
        });

        function getCoords(e) {
            lat_data = e.latlng.lat.toString();
            lon_data = e.latlng.lng.toString();
            $.ajax({
                type: "POST",
                url: "social.php",
                data: "lat=" + lat_data + "&lon=" + lon_data,
                success: function(msg){
                    var json_x = $.parseJSON(msg);
                    var div = document.getElementById('insta_photos');
                    var htmldata = '';
                    json_x.forEach(function(entry) {
                        htmldata +=  entry.data;
                        DG.marker([entry.lat, entry.lon]).addTo(map).bindPopup(entry.data);
                    });
                    div.innerHTML = htmldata;
                }
            });
        }
        map.on('click', getCoords);
    });
</script>

<div id="map" style="width: 1100px; height: 600px; border: 1px solid #CCC;"></div>
<br />
<div id="insta_photos" style="border: 1px"></div>
<hr>