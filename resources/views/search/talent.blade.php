@extends('layouts.app')
@vite(['resources/js/searchtalent.js'])
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
    
<div class="content container">
<div class='row'>
<!-- sidebar -->
  <div class="col-md-12 col-lg-4 col-xl-3">
  <div class="card">
  <h5>Keyword</h5><input id="keyword" class="form-control" value="{{$keyword}}" />
  <h5>Skill</h5>
  <div class="btn-group-vertical" role="group" aria-label="Vertical radio toggle button group">
  <input type="radio" class="btn-check skill" name="vbtn-radio" id="vbtn-radio0" autocomplete="off" checked>
  <label class="btn btn-outline-primary" for="vbtn-radio0">ALL</label>
  <input type="radio" class="btn-check skill" name="vbtn-radio" id="vbtn-radio1" autocomplete="off">
  <label class="btn btn-outline-primary" for="vbtn-radio1">Photography</label>
  <input type="radio" class="btn-check skill" name="vbtn-radio" id="vbtn-radio2" autocomplete="off">
  <label class="btn btn-outline-primary" for="vbtn-radio2">Programming</label>
  <input type="radio" class="btn-check skill" name="vbtn-radio" id="vbtn-radio3" autocomplete="off">
  <label class="btn btn-outline-primary" for="vbtn-radio3">Graphic design</label>
  <input type="radio" class="btn-check skill" name="vbtn-radio" id="vbtn-radio4" autocomplete="off">
  <label class="btn btn-outline-primary" for="vbtn-radio4">Copywriting</label>
  <input type="radio" class="btn-check skill" name="vbtn-radio" id="vbtn-radio5" autocomplete="off">
  <label class="btn btn-outline-primary" for="vbtn-radio5">Public speaking</label>
  <input type="radio" class="btn-check skill" name="vbtn-radio" id="vbtn-radio6" autocomplete="off">
  <label class="btn btn-outline-primary" for="vbtn-radio6">Financial analysis</label>
  <input type="radio" class="btn-check skill" name="vbtn-radio" id="vbtn-radio7" autocomplete="off">
  <label class="btn btn-outline-primary" for="vbtn-radio7">Project management</label>
  <input type="radio" class="btn-check skill" name="vbtn-radio" id="vbtn-radio8" autocomplete="off">
  <label class="btn btn-outline-primary" for="vbtn-radio8">Digital marketing</label>
</div>
</div>  
</div>
  <div class="col-md-12 col-lg-8 col-xl-9">
    
    <div class="row">
        <div class="col-md-12 col-lg-12 col-xl-12">
        <h2 id="restitle">Results:</h2>
        </div>
        <div id="insert" class="col-md-12 col-lg-12 col-xl-12 row">
        </div>
    </div>
    
  </div>
</div>
</div>
</content>

<component is="style">
.card2{
    margin-bottom: 12px;
    border: #d9c7c7;
    border-radius: 5px;
    border-style: solid;
    padding: 10px 10px;
    box-shadow: 5px 5px 8px #bfb9b9;
    transition: all 0.7s;
}
.card2:hover{
    box-shadow: 9px 9px 18px #767373;
    transform: translateY(-1px);
    transform: translateX(-1px);
    border-radius: 5px;
    transition: all 0.7s;
}
.content{
    width:80%;
}
.location{
    color:grey;
}
.bi-geo-alt{
    margin-bottom:4px;
}
.fullwidth{
    width:100%;
}
.title{
    font-weight: bold;
    color: rgb(247, 148, 31);
}
a{
    text-decoration:none;
}
</component>
@endsection