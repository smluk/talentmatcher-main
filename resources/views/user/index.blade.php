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
  <h2 style="width:80%;">User Profile</h2>
  <table class="table table-striped">
    <tbody>
        <tr>
            <td>Name</td>
            <td>{{$user[0]->name}}</td>
        </tr>
        <tr>
            <td>Email</td>
            <td>{{$user[0]->email}}</td>
        </tr>
        <tr>
            <td>Experiences</td>
            <td>{{$user[0]->experiences}}</td>
        </tr>
        <tr>
            <td>Education</td>
            <td>{{$user[0]->education}}</td>
        </tr>
        <tr>
            <td>Skills</td>
            <td><div class="btn-group" role="group" aria-label="Basic checkbox toggle button group"><?php for($i=1;$i<=8;$i++){if(in_array((string)$i,$skill_list)){echo '<input type="checkbox" class="btn-check form-control" id="btn-'.$i.'" name="btn-'.$i.'" autocomplete="off" checked disabled>
<label class="btn btn-outline-primary" for="btn-'.$i.'">'.$skill_names[(string)$i].'</label><br>';}else{echo '<input type="checkbox" class="btn-check form-control" id="btn-'.$i.'" name="btn-'.$i.'" autocomplete="off" disabled>
  <label class="btn btn-outline-primary" for="btn-'.$i.'">'.$skill_names[(string)$i].'</label><br>';}} ?></div></td>
        </tr>
    </tbody>
  </table>
  @if(Auth::user()->id!=$user[0]->id)
  <a href='/chat/{{$user[0]->id}}'><button class='btn btn-primary'>Chat With Me!</button></a>
  @endif
  @if(Auth::user()->id==$user[0]->id)
  <a href='/useredit/{{$user[0]->id}}'><button class='btn btn-primary'>Edit</button></a>
  @endif

</div>
  </content>

@endsection