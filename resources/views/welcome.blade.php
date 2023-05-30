@extends ('layout')

@section('title')
    {{"HomePage"}}
@endsection


@section('map')
<div id="map"></div>
    <script src="{{ asset('js/ol.js') }}"></script>
        <script>
            var map = new ol.Map({
                target: 'map',
                layers: [
                    new ol.layer.Tile({
                        source: new ol.source.OSM()
                    })
                ],
                view: new ol.View({
                    center: ol.proj.fromLonLat([5.536490, 50.994720]), // Genk coordinates: [longitude, latitude]
                zoom: 10 // Adjust the zoom level as needed
                })
            });

                // Create a marker overlay
            var marker = new ol.Feature({
                geometry: new ol.geom.Point(ol.proj.fromLonLat([5.536490, 50.994720])) // Marker coordinates: [longitude, latitude]
            });
            var markerStyle = new ol.style.Style({
                image: new ol.style.Icon({
                    anchor: [0.5, 1], // Set the anchor point of the marker icon
                    src: 'https://openlayers.org/en/latest/examples/data/icon.png' // URL to the marker icon image
                })
            });
            marker.setStyle(markerStyle);
            var vectorSource = new ol.source.Vector({
                features: [marker]
            });
            var vectorLayer = new ol.layer.Vector({
                source: vectorSource
            });
            map.addLayer(vectorLayer);
        </script>
@endsection

@section('content')
<a> help</a>
@endsection
