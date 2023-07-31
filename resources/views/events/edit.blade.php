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
<div class="title">
    <h2>Edit Event<h2>
</div>
    <form method="post" action="{{ route('eventupdate') }}">
    @csrf
                <table class="table">
                <tbody>
                <tr>
                        <td>Name</td>
                        <td><input name="event_name" type="text" class="form-control" value ="{{old('event_name', $event->event_name)}}"/></td>
                        <input id="uid" name="id" type="hidden" class="form-control" value ="{{old('id', $event->id)}}"/>
                </tr>
                <tr>
                        <td><label for="name" >Type</label></td>
                        <td>
                            <select id="event_type" name="event_type" class="form-control" value="{{old('event_type', $event->event_type)}}">
                            <option value="1">Face to Face</option>
                            <option value="2">Remote</option>
                            </select>
                        </td>
                </tr>
                <tr>
                        <td><label for="name">Location</label></td>
                        <td><input name="event_location_text" type="text" class="form-control" value="{{old('event_location_text', $event->event_location_text)}}"/></td>
                </tr>
                <tr>
                        <td><label for="name" >Category</label></td>
                        <td>
                            <select id="event_category" name="event_category" class="form-control" value ="{{old('event_category', $event->event_category)}}">
                            <option value="1">Web Development</option>
                            <option value="2">Social Media Marketing</option>
                            <option value="3">Planning</option>
                            <option value="4">Media Production</option>
                        </select></td>
                </tr>
                <tr>
                        <td><label for="name" >Number of Event Participants</label></td>
                        <td><input name="event_max_participants" type="number" min="1" max="50" class="form-control" value ="{{old('event_max_participants', $event->event_max_participants)}}"/></td>
                <tr>
                        <td><label for="name" >Budget</label></td>
                        <td><input name="event_budget" type="number" min="0" max="500000" class="form-control" value ="{{old('event_budget', $event->event_budget)}}"/></td>
                <tr>
                        <td><label for="name" >Start Date/Time</label></td>
                        <td><input name="event_start_datetime" type="datetime-local" class="form-control" value ="{{old('event_start_datetime', $event->event_start_datetime)}}"/></td>
                </tr>
                <tr>
                        <td><label for="name" >End Date/Time</label></td>
                        <td><input name="event_end_datetime" type="datetime-local" class="form-control" value ="{{old('event_end_datetime', $event->event_end_datetime)}}"/></td>
                </tr>
                <tr>
                        <td><label for="name" >Description</label></td>
                        <td><input name="event_description" type="text" class="form-control" value ="{{old('event_description', $event->event_description)}}"/></td>
                </tr>
                <tr>
            <td>Skills</td>
            <td><div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                <?php for($i=1;$i<=8;$i++){if(in_array((string)$i,$skill_list)){
                        echo '<input type="checkbox" class="btn-check job-btn form-control" id="btn-'.$i.'" name="btn-'.$i.'" autocomplete="off" checked>
                        <label class="btn btn-outline-primary" for="btn-'.$i.'">'.$skill_names[(string)$i].'</label><br>';}else{
                        echo '<input type="checkbox" class="btn-check job-btn form-control" id="btn-'.$i.'" name="btn-'.$i.'" autocomplete="off">
                        <label class="btn btn-outline-primary" for="btn-'.$i.'">'.$skill_names[(string)$i].'</label><br>';}} ?>
                        </div></td>
                </tr>
                 <tr>
                        <td></td><td><button type="submit" class="btn btn-primary">Update</button></td>
                </tr>
        </tbody>
                </table>
    </form>

                        </div>


@endsection
