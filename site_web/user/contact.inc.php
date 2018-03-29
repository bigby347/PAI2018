
<br>
<div class="container" >
    <div class="row">
        <h2 class="page-header">La carte </h2>
        <div id="col-sm-4"></div>
        <div id="col-sm-4">
            <script src='https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyAqNhEhWOKO9hY5905y3t67KoqS0MWQKv4'></script>
            <div style='overflow:hidden;height:400px;width:520px;'>
                <div id='gmap_canvas' style='height:400px;width:520px;'>

                </div><style>#gmap_canvas img{max-width:none!important;background:none!important}</style>
            </div>
            <a href='https://embedmaps.net'>google maps widget wordpress</a>
            <script type='text/javascript' src='https://embedmaps.com/google-maps-authorization/script.js?id=eebba1fa7441c005fe8a06a57e4095ff0ebf32a9'></script>
            <script type='text/javascript'>
                function init_map(){var myOptions = {zoom:12,center:new google.maps.LatLng(43.30445479999999,5.378283499999952),mapTypeId: google.maps.MapTypeId.ROADMAP};map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions);marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(43.30445479999999,5.378283499999952)});infowindow = new google.maps.InfoWindow({content:'<strong>Saint Charles - Faculté des Sciences</strong><br>3 Place Victor Hugo<br>13003 Marseille<br>'});google.maps.event.addListener(marker, 'click', function(){infowindow.open(map,marker);});infowindow.open(map,marker);}google.maps.event.addDomListener(window, 'load', init_map);
            </script>

        </div>
        <div id="col-sm-4"></div>
    </div>

    <h2 class="page-header">Contact :</h2>
    <div class="row">
        <div class="col-sm-8" >
            <table class="table table-bordered">
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Mail</th>
                </tr>
            <?php
            $Admins = Admin();
            foreach ($Admins as $Admin) {
                echo '<tr>
                    <td>' . $Admin['Nom'] . '</td>
                    <td>' . $Admin['Prenom'] . '</td>
                    <td>' . $Admin['Mail'] . '</td>
              </tr>';
            }
            ?>

            </table>
        </div>
        <div class="col-sm-4">
            <div class="panel panel-primary">
                <div class="panel-heading">Le contact</div>
                <div class="panel-body">
                    Vous etes aussi les bienvenus durant les horaires d'ouverture de la bibliothèque !
                    C'est a dire tout les jours de 9h a midi et de 14h a 18h sauf le lundi !
                </div>
            </div>
        </div>

    </div>
</div>

