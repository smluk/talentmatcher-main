
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

<div class="card">
<section>
  <table class="table table-striped">
     <tbody>
        <tr>
            <td class="field">User</td>
            <td class="value"><a href="/user/{{$event->user_id}}">{{$user->name}}</a></td>
        </tr>
        <tr>
            <td class="field">Name</td>
            <td class="value">{{ $event->event_name }}</td>
        </tr>
            <td class="field">Type</td>
            <td class="value"><?php if ( $event->event_type  = 1) echo "Face to Face"; else echo "Remote"; ?></td>
        </tr>
        <tr>
            <td class="field">Category</td>
            <td class="value">
              <?php if ( $event->event_category  = 1) echo "Web Development"; 
              else if ( $event->event_category  = 2) echo "Social Media Marketing"; 
              else if ( $event->event_category = 3) echo "Event Planning"; 
              else if ( $event->event_category = 4) echo "Media Production"
              ?></td>
        </tr>
        <tr>
            <td class="field">Date Time</td>
            <td class="value">{{ $event->event_start_datetime }}</td>
        </tr>
        <tr>
            <td class="field">End Date Time</td>
            <td class="value">{{ $event->event_end_datetime }}</td>
        </tr>
        <tr>
            <td class="field">Description</td>
            <td class="value">{{ $event->event_description }}</td>
        </tr>
        <tr>
            <td class="field">Location</td>
            <td class="value">{{ $event->event_location_text }}</td>
        </tr>
        <tr>
            <td>Skills</td>
            <td><div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
              <?php for($i=1;$i<=8;$i++){if(in_array((string)$i,$skill_list)){
                echo '<input type="checkbox" class="btn-check form-control" id="btn-'.$i.'" name="btn-'.$i.'" autocomplete="off" checked disabled>
              <label class="btn btn-outline-primary" for="btn-'.$i.'">'.$skill_names[(string)$i].'</label><br>';}else{
                echo '<input type="checkbox" class="btn-check form-control" id="btn-'.$i.'" name="btn-'.$i.'" autocomplete="off" disabled>
              <label class="btn btn-outline-primary" for="btn-'.$i.'">'.$skill_names[(string)$i].'</label><br>';}} ?></div></td>
        </tr>
    </tbody>
</section>
</div>

@include('comments')


@endsection

