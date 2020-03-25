@extends('layout')

@section('container')
<!-- Page Content -->
<div class="container" style="margin-top:30px">
    <!-- Page Features -->
    <div class="row text-center">
        @foreach($movies as $movie)
        <div class="col-lg-3 col-md-6 mb-4" id=quadro{{$movie->id}}>
            <div class="card h-100">
                <img class="card-img-top" src="https://image.tmdb.org/t/p/w500/{{$movie->poster_path}}" alt="">
                <div class="card-body">
                    <h4 class="card-title">{{$movie->title}}</h4>
                    <p class="card-text">{{$movie->overview}}</p>
                </div>
                <div class="card-footer">
                    <a href="{{route('movieHome', $movie->id)}}" class="btn btn-primary col-6">ver</a>
                    @if($movie->ehFavorito)
                    <a href="{{route('favoriteMovieDelete', $movie->id)}}" class="col-6"><i class="fas fa-star fa-2x"></i></a>
                    @else
                    <a href="{{route('favoriteMovie', $movie->id)}}" class="col-6"><i class="far fa-star fa-2x"></i></a>
                    <!-- <button value="{{$movie->id}}" class="btn btn-primary col-12 btnFavorito">favor Javascript</button> -->
                    @endif

                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection

@section('script')
<!-- <script>
    $(".btnFavorito").click((e) => {
        e.preventDefault()
        let idMovie = (e.target.value)
        $.get(`/${idMovie}/favoritar`, (data, status) => {
            alert("dados Inseridos com sucesso");
        });
    });
</script> -->
@endsection