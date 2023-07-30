@extends('layouts.app')
<script>
  (g=>{var h,a,k,p="The Google Maps JavaScript API",c="google",l="importLibrary",q="__ib__",m=document,b=window;b=b[c]||(b[c]={});var d=b.maps||(b.maps={}),r=new Set,e=new URLSearchParams,u=()=>h||(h=new Promise(async(f,n)=>{await (a=m.createElement("script"));e.set("libraries",[...r]+"");for(k in g)e.set(k.replace(/[A-Z]/g,t=>"_"+t[0].toLowerCase()),g[k]);e.set("callback",c+".maps."+q);a.src=`https://maps.${c}apis.com/maps/api/js?`+e;d[q]=f;a.onerror=()=>h=n(Error(p+" could not load."));a.nonce=m.querySelector("script[nonce]")?.nonce||"";m.head.append(a)}));d[l]?console.warn(p+" only loads once. Ignoring:",g):d[l]=(f,...n)=>r.add(f)&&u().then(()=>d[l](f,...n))})({
    key: "AIzaSyBSSzMuUwVDVBL5qfZPW9JsnIosfz-ErCU",
    v: "weekly",
    // Use the 'v' parameter to indicate the version to use (weekly, beta, alpha, etc.).
    // Add other bootstrap parameters as needed, using camel case.
  });
</script>
<script type="text/javascript">
var map;
var marker;
var pos;
async function initMap() {
  // The location of HKU
  pos = { lat: 22.3016066, lng: 114.0924553 };
  // Request needed libraries.
  //@ts-ignore
  const { Map } = await google.maps.importLibrary("maps");
  const { AdvancedMarkerElement } = await google.maps.importLibrary("marker");

  // The map, centered at HKU
  map = new Map(document.getElementById("map"), {
    zoom: 12,
    center: pos,
    mapId: "DEMO_MAP_ID",
  });
  map.addListener("click", (event) => {
    changeMarker(event.latLng)
  });
  if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(
        (position) => {
          pos = {
            lat: position.coords.latitude,
            lng: position.coords.longitude,
          };
          map.setCenter(pos);
          marker = new google.maps.Marker({
              position: pos,
              title:"Hello World!"
          });
          marker.setMap(map);
        },
        () => {
          alert("Get Location Error!");
        }
      );
    } else {
      // Browser doesn't support Geolocation
      alert("Browser doesn't support Geolocation!");
    }
}

function changeMarker(position){
  pos = position;
  const geocoder = new google.maps.Geocoder();
  marker.setMap(null);
  marker = new google.maps.Marker({
      position: pos
  });
  // To add the marker to the map, call setMap();
  marker.setMap(map);
  document.getElementById('long').value=pos.lng();
  document.getElementById('lat').value=pos.lat();
  geocoder
    .geocode({ location: pos })
    .then((response) => {
      if (response.results[0]) {
        document.getElementById('location').value=(response.results[0].formatted_address);
      } else {
        window.alert("No results found");
      }
    })
    .catch((e) => window.alert("Geocoder failed due to: " + e));
}

setTimeout(() => {
  initMap();
}, 500);
</script>
@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
  .card{
    width:80%;
    border-radius: 3px;
  }
</style>
<div class="uper">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br/>
  @endif
</div>


<content class="container">
  <div class="card">
  <h2 style="width:80%;">Appointment</h2>
  <form method="post" action="{{route('appointment.store')}}">
    @csrf
  <table class="table table-striped">
    <tbody>
        <input name="user_id" type="hidden" class="form-control" value ="{{Auth::user()->id}}"/>
        <input name="event_id" type="hidden" class="form-control" value ="{{$event_id}}"/>
        <tr>
            <td>Start Time</td>
            <td><input name="event_start_datetime" type="datetime-local" class="form-control" value =""/></td>
        </tr>
        <tr>
            <td>End Time</td>
            <td><input name="event_end_datetime" type="datetime-local" class="form-control" value =""/></td>
        </tr>
        <tr>
            <td>Location</td>
            <td><input id="location" name="location" type="text" class="form-control" value =""/></td>
        </tr>
        <tr>
            <td>Longitude</td>
            <td><input id="long" name="location_long" type="text" class="form-control" value ="0" readonly="readonly"/></td>
        </tr>
        <tr>
            <td>Latitude</td>
            <td><input id="lat" name="location_lat" type="text" class="form-control" value ="0" readonly="readonly"/></td>
        </tr>
    </tbody>
  </table>
  <div id="map"  style="position: relative;  height: 400px;" ></div>
  <button class='btn btn-primary' type="submit">Submit</button>
  </form>
</div>
  </content>

@endsection