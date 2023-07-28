
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

<content class="container">
<div class="card">
<section>
  <table class="table table-striped">
     <tbody>
        <tr>
            <td class="field">User</td>
            <td class="value"><a href="/user/{{$event->user_id}}">Profile</a></td>
        </tr>
        <tr>
            <td class="field">Event Name</td>
            <td class="value">{{ $event->event_name }}</td>
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
            <td><div class="btn-group" role="group" aria-label="Basic checkbox toggle button group"><?php for($i=1;$i<=8;$i++){if(in_array((string)$i,$skill_list)){echo '<input type="checkbox" class="btn-check form-control" id="btn-'.$i.'" name="btn-'.$i.'" autocomplete="off" checked disabled>
<label class="btn btn-outline-primary" for="btn-'.$i.'">'.$skill_names[(string)$i].'</label><br>';}else{echo '<input type="checkbox" class="btn-check form-control" id="btn-'.$i.'" name="btn-'.$i.'" autocomplete="off" disabled>
  <label class="btn btn-outline-primary" for="btn-'.$i.'">'.$skill_names[(string)$i].'</label><br>';}} ?></div></td>
        </tr>
    </tbody>
</section>
</div>
</content>  

@endsection

<content class="container">
@include('comments')
</content>