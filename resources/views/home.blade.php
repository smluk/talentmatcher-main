@extends('layouts.app')

@section('content')
<div class="container bg">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-5">
            <h1 class="title1">Talent Matcher</h1>
            <h2 class="title2">Start Your Project Here!</h2>
            <div class="input-group mb-3">
            <button id="select" class="btn btn-outline-secondary dropdown-toggle btn-select" type="button" data-bs-toggle="dropdown" aria-expanded="false">Job</button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="javascript:selectjob();">Job</a></li>
                <li><a class="dropdown-item" href="javascript:selecttalent();">Talent</a></li>
            </ul>
            <input id="s" type="text" class="form-control search-input" aria-label="Search">
            <button  class="btn btn-outline-secondary btn-search" type="button" onclick="search();">Search</button>
            </div>
        </div>
        <div class="col-md-4 col-lg-7">
            <div id="bg"></div>
        </div>
    </div>
</div>
<script src="{{URL::asset('https://cdnjs.cloudflare.com/ajax/libs/bodymovin/5.10.0/lottie.min.js')}}" ></script>
<component is="script">
    var now="job";
    var animItem = bodymovin.loadAnimation({
        wrapper: document.getElementById("bg"),
        animType: 'svg',
        loop: true,
        path: '/data.json'
        });
    function selectjob(){
        document.getElementById("select").innerText="Job";
        now="job";
    }
    function selecttalent(){
        document.getElementById("select").innerText="Talent";
        now="talent";
    }
    function search(){
        var keyword = document.getElementById('s').value;
        window.location.href="/search/"+now+"?keyword="+keyword;
    }
</component>
<component is="style">
.py-4{
    background-image: url(/img/banner.png);
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
}
</component>
@endsection
