@extends('layouts.app')

@section('content')

<content class="container">
  <table class="table table-striped">
    <thead>
        <tr>
          <td>Event Name</td>
          <td>Event Type</td>
            <td>Event Location</td>
            <td>Edit</td>
            <td>Appointment</td>
       </tr>
    </thead>
    <tbody>
        @foreach($events as $event)
        <tr>
            <td><a href="{{ route('events.show',$event->id)}}">{{$event->event_name}}</a></td>
            <td> <?php if ( $event->event_type  = 1) echo "Face to Face"; else echo "Remote"; ?></td>
            <td>{{$event->event_location_text}}</td>
            <td><a href="{{ route('events.edit',$event->id)}}">Edit</a></td>
            <td><?php if($app_list[$event->id]==0) echo "No Appointment Now"; else echo "<a href='/appointment/{$app_list[$event->id]}'>View</a>" ?></td>
         </tr>
        @endforeach
    </tbody>
  </table>
  </content>

@endsection