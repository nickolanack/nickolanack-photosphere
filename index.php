<!DOCTYPE html>
<html>
  <head>
    <title>Custom Street View panoramas</title>
    <meta charset="utf-8">
    <style>
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #map {
        height: 100%;
      }
    </style>
  </head>
  <body>
    <div id="map"></div>
    <script>
      function initPano() {
        // Set up Street View and initially set it visible. Register the
        // custom panorama provider function. Set the StreetView to display
        // the custom panorama 'reception' which we check for below.
        var panorama = new google.maps.StreetViewPanorama(
          document.getElementById('map'), {
            pano: 'reception',
            visible: true,
            panoProvider: getCustomPanorama
        });
      }

      // Return a pano image given the panoID.
      function getCustomPanoramaTileUrl(pano, zoom, tileX, tileY) {
        // Note: robust custom panorama methods would require tiled pano data.
        // Here we're just using a single tile, set to the tile size and equal
        // to the pano "world" size.
        return 'https://media.geolive.ca/gpano/thumb_IMG_0929_1024.jpg';
      }

      // Construct the appropriate StreetViewPanoramaData given
      // the passed pano IDs.
      function getCustomPanorama(pano, zoom, tileX, tileY) {
        if (pano === 'reception') {
          return {
            location: {
              pano: 'yard',
              description: 'Nick'
            },
            links: [],
            // The text for the copyright control.
            copyright: 'Imagery (c) 2016 NICK',
            // The definition of the tiles for this panorama.
            tiles: {
              tileSize: new google.maps.Size(1024, 512),
              worldSize: new google.maps.Size(1024, 512),
              // The heading in degrees at the origin of the panorama
              // tile set.
              centerHeading: 105,
              getTileUrl: getCustomPanoramaTileUrl
            }
          };
        }
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?callback=initPano">
    </script>
  </body>
</html>
