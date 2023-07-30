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
  pos = { lat: {{$appointment->location_lat}}, lng: {{$appointment->location_long}} };
  // Request needed libraries.
  //@ts-ignore
  const { Map } = await google.maps.importLibrary("maps");
  const { AdvancedMarkerElement } = await google.maps.importLibrary("marker");

  // The map, centered at 
  map = new Map(document.getElementById("map"), {
    zoom: 12,
    center: pos,
    mapId: "DEMO_MAP_ID",
  });
  marker = new google.maps.Marker({
      position: pos
  });
  // To add the marker to the map, call setMap();
  marker.setMap(map);
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
    @csrf
  <table class="table table-striped">
    <tbody>
        <tr>
            <td>User</td>
            <td><a href="/user/{{$appointment->user_id}}">{{$appointment->user_id}}</a></td>
        </tr>
        <tr>
            <td>Start Time</td>
            <td>{{$appointment->event_start_datetime}}</td>
        </tr>
        <tr>
            <td>End Time</td>
            <td>{{$appointment->event_end_datetime}}</td>
        </tr>
        <tr>
            <td>Location</td>
            <td>{{$appointment->location}}</td>
        </tr>
        
    </tbody>
  </table>
  <div id="map"  style="position: relative;  height: 400px;" ></div>
  <button id = "authorize_button" class='btn btn-primary' type="submit" onclick="handleAuthClick()">Add to Calendar</button>
</div>
  </content>
  <script type="text/javascript">

      const CLIENT_ID = '26353663291-6fh1j0fa65mt1lroee68ms7amnn6cj54.apps.googleusercontent.com';
      const API_KEY = 'AIzaSyAXKwkPSSiJOH-8EvCNUN6STNpIbgQPKhc';


      const DISCOVERY_DOC = 'https://www.googleapis.com/discovery/v1/apis/calendar/v3/rest';

      const SCOPES = 'https://www.googleapis.com/auth/calendar';

      let tokenClient;
      let gapiInited = false;
      let gisInited = false;

      document.getElementById('authorize_button').style.visibility = 'hidden';

      function gapiLoaded() {
        gapi.load('client', initializeGapiClient);
      }

      async function initializeGapiClient() {
        await gapi.client.init({
          apiKey: API_KEY,
          discoveryDocs: [DISCOVERY_DOC],
        });
        gapiInited = true;
        maybeEnableButtons();
      }


      function gisLoaded() {
        tokenClient = google.accounts.oauth2.initTokenClient({
          client_id: CLIENT_ID,
          scope: SCOPES,
          callback: '', // defined later
        });
        gisInited = true;
        maybeEnableButtons();
      }


      function maybeEnableButtons() {
        if (gapiInited && gisInited) {
          document.getElementById('authorize_button').style.visibility = 'visible';
        }
      }

      function handleAuthClick() {
        tokenClient.callback = async (resp) => {
          if (resp.error !== undefined) {
            throw (resp);
          }
          handleAddEcent();
        };

        if (gapi.client.getToken() === null) {
          tokenClient.requestAccessToken({prompt: 'consent'});
        } else {
          tokenClient.requestAccessToken({prompt: ''});
        }
      }

      function handleAddEcent(){
        var start = new Date('{{$appointment->event_start_datetime}}').toISOString();
        var end = new Date('{{$appointment->event_end_datetime}}').toISOString();
        const event = {
          'summary': 'Appointment',
          'location': '{{$appointment->location}}',
          'start': {
            'dateTime': start,
          },
          'end': {
            'dateTime': end,
          },
          'reminders': {
            'useDefault': false,
            'overrides': [
              {'method': 'email', 'minutes': 24 * 60},
              {'method': 'popup', 'minutes': 10}
            ]
          }
        };

        const request = gapi.client.calendar.events.insert({
          'calendarId': 'primary',
          'resource': event
        });

        request.execute(function(event) {
          alert("Success!");
        });

      }
    </script>
    <script async defer src="https://apis.google.com/js/api.js" onload="gapiLoaded()"></script>
    <script async defer src="https://accounts.google.com/gsi/client" onload="gisLoaded()"></script>
@endsection