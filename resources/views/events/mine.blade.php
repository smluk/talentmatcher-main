@extends('layouts.app')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>


<div class="message">
        @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br/>
    @endif
</div>
<div class="uper">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br/>
  @endif
</div>
<div class="card container">
  <h2>My Events</h2>
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
</div>

@endsection