<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Accessible Map</title>
    <!-- Pointer events polyfill for old browsers, see https://caniuse.com/#feat=pointer -->
    <script src="https://unpkg.com/elm-pep"></script>
    <style>
      .map {
        width: 100%;
        height:400px;
      }
      a.skiplink {
        position: absolute;
        clip: rect(1px, 1px, 1px, 1px);
        padding: 0;
        border: 0;
        height: 1px;
        width: 1px;
        overflow: hidden;
      }
      a.skiplink:focus {
        clip: auto;
        height: auto;
        width: auto;
        background-color: #fff;
        padding: 0.3em;
      }
      #map:focus {
        outline: #4A74A8 solid 0.15em;
      }
    </style>
  </head>
  <body>
    <a class="skiplink" href="#map">Go to map</a>
    <div id="map" class="map" tabindex="0"></div>
    <button id="zoom-out">Zoom out</button>
    <button id="zoom-in">Zoom in</button>
    <script type="text/javascript">
    import 'ol/ol.css';
import Map from 'ol/Map';
import OSM from 'ol/source/OSM';
import TileLayer from 'ol/layer/Tile';
import View from 'ol/View';

var map = new Map({
  layers: [
    new TileLayer({
      source: new OSM(),
    }) ],
  target: 'map',
  view: new View({
    center: [0, 0],
    zoom: 2,
  }),
});

document.getElementById('zoom-out').onclick = function () {
  var view = map.getView();
  var zoom = view.getZoom();
  view.setZoom(zoom - 1);
};

document.getElementById('zoom-in').onclick = function () {
  var view = map.getView();
  var zoom = view.getZoom();
  view.setZoom(zoom + 1);
};

    </script>
  </body>
</html>