@extends('layout')

@section('container')
<!-- Page Content -->
<div class="container" style="margin-top:30px">
    <!-- Page Features -->
    <div class="row text-center">
        <div class="col-lg-8 col-md-6 mb-4 offset-lg-2">
            <div class="card h-100">
                <img class="card-img-top" src="https://image.tmdb.org/t/p/w500/{{$movie->backdrop_path}}" alt="">
                <div class="card-body">
                    <h4 class="card-title">{{$movie->title}}</h4>
                    <p class="card-text">{{$movie->overview}}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection