@extends('layouts.app')

@section('content')

<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="uper">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br/>
  @endif
</div>

<aside class="EventSearch">
<div class="card">
    <form method="get" action="{{ route('events.index') }}">
          {{ csrf_field() }}
    <input name="search" id="search" type="text" value="{{ $search }}" class="form-control" placeholder="Search"/>
    </form>
</div>
</aside>

<content class="container">
<div class="card">
  <table class="table table-striped table-hover">
    <thead class="table-head">
        <tr>
          <td>Name</td>
          <td>Type</td>
          <td>Location</td>
          <td>Appointment</td>
       </tr>
    </thead>
    <tbody>
        @foreach($events as $event)
        <tr>
            <td><a href="{{ route('events.show',$event->id)}}">{{$event->event_name}}</a></td>
            <td> <?php if ( $event->event_type  = 1) echo "Face to Face"; else echo "Remote"; ?></td>
            <td>{{$event->event_location_text}}</td>
            <td><a href="/appointment/set/{{$event->id}}"><button class="btn btn-info">Make</button></a></td>
         </tr>
        @endforeach
    </tbody>
  </table>
</div>
  </content>

@endsection