@extends('layouts.app')

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
  <h2 style="width:80%;">Edit Profile</h2>
  <form method="post" action="{{ route('update') }}">
    @csrf
  <table class="table table-striped">
    <tbody>
        <tr>
            <td>Name</td>
            <td><input name="name" type="text" class="form-control" value ="{{old('name', $user->name)}}"/></td>
            <input id="uid" type="hidden" class="form-control" value ="{{$user->id}}"/>
        </tr>
        <tr>
            <td>Email</td>
            <td><input name="email" type="text" class="form-control" value ="{{old('email', $user->email)}}"/></td>
        </tr>
        <tr>
            <td>Experiences</td>
            <td><input name="experiences" type="text" class="form-control" value ="{{old('experiences', $user->experiences)}}"/></td>
        </tr>
        <tr>
            <td>Education</td>
            <td><input name="education" type="text" class="form-control" value ="{{old('education', $user->education)}}"/></td>
        </tr>
        <tr>
            <td>Skills</td>
            <td><div class="btn-group" role="group" aria-label="Basic checkbox toggle button group"><?php for($i=1;$i<=8;$i++){if(in_array((string)$i,$skill_list)){echo '<input type="checkbox" class="btn-check talent-btn form-control" id="btn-'.$i.'" name="btn-'.$i.'" autocomplete="off" checked>
<label class="btn btn-outline-primary" for="btn-'.$i.'">'.$skill_names[(string)$i].'</label><br>';}else{echo '<input type="checkbox" class="btn-check talent-btn form-control" id="btn-'.$i.'" name="btn-'.$i.'" autocomplete="off">
  <label class="btn btn-outline-primary" for="btn-'.$i.'">'.$skill_names[(string)$i].'</label><br>';}} ?></div></td>
        </tr>
    </tbody>
  </table>
  <button class='btn btn-primary' type="submit">Confirm</button>
  </form>
</div>
  </content>

@endsection