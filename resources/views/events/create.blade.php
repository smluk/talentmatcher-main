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
<content class="container">
<div class="card">
    <h2>
        Create New Event
    </h2>
    <form method="post" action="{{ route('events.store') }}">
        {{ csrf_field() }}
                <table class="table table-striped">
                <tbody>
                <tr>
                        <td><label for="name" >Event Name</label></td>
                        <td><input name="event_name" type="text" class="form-control" value ="{{old('event_name')}}"/></td>
                </tr>
                <tr>
                        <td><label for="name" >Event Type</label></td>
                        <td>
                            <select id="event_type" name="event_type" class="form-control" value="{{old('event_type')}}">
                            <option value="1">Face to Face</option>
                            <option value="2">Remote</option>
                            </select>
                        </td>
                </tr>
                <tr>
                        <td><label for="name">Event Location</label></td>
                        <td><input name="event_location_text" type="text" class="form-control" value="{{old('event_location_text')}}"/></td>
                </tr>
                <tr>
                        <td><label for="name" >Event Category</label></td>
                        <td>
                            <select id="event_category" name="event_category" class="form-control" value ="{{old('event_category')}}">
                            <option value="1">Web Development</option>
                            <option value="2">Social Media Marketing</option>
                            <option value="3">Event Planning</option>
                            <option value="4">Media Production</option>
                        </select></td>
                </tr>
                <tr>
                        <td><label for="name" >Number of Event Participants</label></td>
                        <td><input name="event_max_participants" type="number" min="1" max="50" class="form-control" value ="{{old('event_max_participants')}}"/></td>
                <tr>
                        <td><label for="name" >Event Budget</label></td>
                        <td><input name="event_budget" type="number" min="0" max="500000" class="form-control" value ="{{old('event_budget')}}"/></td>
                <tr>
                        <td><label for="name" >Event Start Date/Time</label></td>
                        <td><input name="event_start_datetime" type="datetime-local" class="form-control" value ="{{old('event_start_datetime')}}"/></td>
                </tr>
                <tr>
                        <td><label for="name" >Event End Date/Time</label></td>
                        <td><input name="event_end_datetime" type="datetime-local" class="form-control" value ="{{old('event_end_datetime')}}"/></td>
                </tr>
                <tr>
                        <td><label for="name" >Event Description</label></td>
                        <td><input name="event_description" type="text" class="form-control" value ="{{old('event_description')}}"/></td>
                </tr>
                 <tr>
                        <td></td><td><button type="submit" class="btn btn-primary">Add</button></td>
                </tr>
        </tbody>
                </table>
    </form>
</div>
    </content>

    <script>


    </script>

@endsection
