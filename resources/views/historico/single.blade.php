@extends('layouts.dash')
@section('header')
<link rel="stylesheet" href="{{ asset('tinydash/css/dataTables.bootstrap4.css') }}">
@endsection
@section('content')
<div class="container-fluid">
          <div class="row justify-content-center">
            <div class="col-12">
                <div class="row align-items-center my-4">
                    <div class="col-md mb-md-0 mb-3">
                    <h2 class="h3 mb-0 page-title">{{$link->titulo}} <small class="d-table text-primary">{{$link->url}}</small></h2>
                    </div>
                    <div class="col-auto">
                    <button type="button" class="btn btn-secondary"><span class="fe fe-trash fe-12 mr-2"></span>Exportar em CSV</button>
                    <button type="button" class="btn btn-primary"><span class="fe fe-filter fe-12 mr-2"></span>Imprimir</button>
                    </div>
              </div>

              <!-- TABELA -->
              <div class="row my-4">
                <!-- Small table -->
                <div class="col-md-6">
                <div class="row">
                    <div class="col-md-6">
                    <div class="card shadow mb-4">
                    <div class="card-body">
                      <div class="row align-items-center">
                        <div class="col">
                          <span class="h2 mb-0">{{count($acessos)}}</span>
                          <p class="small text-muted mb-0">Acessos</p>
                        </div>
                        <div class="col-auto">
                          <span class="fe fe-32 fe-eye text-muted mb-0"></span>
                        </div>
                      </div>
                    </div>
                  </div>
                    </div>
                    <div class="col-md-6">
                    <div class="card shadow mb-4">
                    <div class="card-body">
                      <div class="row align-items-center">
                        <div class="col">
                          <span class="h2 mb-0">0</span>
                          <p class="small text-muted mb-0">Conversões</p>
                        </div>
                        <div class="col-auto">
                          <span class="fe fe-32 fe-target text-muted mb-0"></span>
                        </div>
                      </div>
                    </div>
                  </div>
                    </div>
                </div>

                <div class="card shadow mb-4">
                  <div class="card-header">
                    <strong>Dados do link</strong>
                  </div>
                  <div class="card-body">
                      <div class="row">
                      <div class="col-md-4 my-3">
                            <strong>Título</strong>
                            <div class="my-0 text-muted small">{{$link->titulo}}</div>
                          </div>
                      <div class="col-md-4 my-3">
                            <strong>Link</strong>
                            <div class="my-0 text-muted small"><a href="{{$link->url}}" target="_blank" rel="noopener noreferrer">{{$link->url}}</a></div>
                          </div>
                      <div class="col-md-4 my-3">
                            <strong>Tipo de Página</strong>
                            <div class="my-0 text-muted small">Empreendimento</div>
                          </div>
                      </div>
                  </div>
                </div>

                </div>
                <div class="col-md-6">
                <div class="card shadow mb-4">
                  <div class="card-header">
                    <strong>Regiões de maior acesso</strong>
                  </div>
                  <div class="card-body">
                    <div class="mapa" style="width:100%;height:400px">
                    @if($acessos)
                    @foreach($acessos as $ac)
                    <div class="marker" data-lat="{{$ac->lat}}" data-lng="{{$ac->lon}}"></div>
                    @endforeach
                    @endif
                    </div>
                  </div> <!-- .card-body -->
                </div>
                </div>
              </div>
              <!-- END TABELA -->

            </div> <!-- .col-12 -->
          </div> <!-- .row -->
        </div> <!-- .container-fluid -->
@endsection
@section('footer')
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDxtxQjbOeGrhzIR5IATSse7S2X85UCVA8">
    </script>
<script>
(function( $ ) {


function initMap( $el ) {

    // Find marker elements within map.
    var $markers = $el.find('.marker');

    // Create gerenic map.
    var mapArgs = {
        zoom        : 10,
        mapTypeId   : google.maps.MapTypeId.ROADMAP
    };
    var map = new google.maps.Map( $el[0], mapArgs );

    // Add markers.
    map.markers = [];
    $markers.each(function(){
        initMarker( $(this), map );
    });

    // Center map based on markers.
    centerMap( map );

    // Return map instance.
    return map;
}

/**
 * initMarker
 *
 * Creates a marker for the given jQuery element and map.
 *
 * @date    22/10/19
 * @since   5.8.6
 *
 * @param   jQuery $el The jQuery element.
 * @param   object The map instance.
 * @return  object The marker instance.
 */
function initMarker( $marker, map ) {

    // Get position from marker.
    var lat = $marker.data('lat');
    var lng = $marker.data('lng');
    var latLng = {
        lat: parseFloat( lat ),
        lng: parseFloat( lng )
    };

    // Create marker instance.
    var marker = new google.maps.Marker({
        position : latLng,
        map: map,
        icon: {
            path: google.maps.SymbolPath.CIRCLE,
            scale: 0
        }
    });

    var circle = new google.maps.Circle({
    map: map,
    radius: 6093,    // 10 miles in metres
    fillColor: '#ea711c',
    strokeColor: '#ea711c',
    });

    circle.bindTo('center', marker, 'position');

    // Append to reference for later use.
    map.markers.push( marker );

    // If marker contains HTML, add it to an infoWindow.
    if( $marker.html() ){

        // Create info window.
        var infowindow = new google.maps.InfoWindow({
            content: $marker.html()
        });

        // Show info window when marker is clicked.
        google.maps.event.addListener(marker, 'click', function() {
            infowindow.open( map, marker );
        });
    }
}

/**
 * centerMap
 *
 * Centers the map showing all markers in view.
 *
 * @date    22/10/19
 * @since   5.8.6
 *
 * @param   object The map instance.
 * @return  void
 */
function centerMap( map ) {

    // Create map boundaries from all map markers.
    var bounds = new google.maps.LatLngBounds();
    map.markers.forEach(function( marker ){
        bounds.extend({
            lat: marker.position.lat(),
            lng: marker.position.lng()
        });
    });

    // Case: Single marker.
    if( map.markers.length == 1 ){
        map.setCenter( bounds.getCenter() );
        map.setZoom( 7 );

    // Case: Multiple markers.
    } else{
        map.fitBounds( bounds );
        map.setZoom( 7 );
    }

    map.setZoom( 7 );
}

// Render maps on page load.
$(document).ready(function(){
    $('.mapa').each(function(){
        var map = initMap( $(this) );
    });
});

})(jQuery);
    </script>
@endsection
