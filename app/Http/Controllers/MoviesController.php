<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositorios\MoviesRepo;

class MoviesController extends Controller
{
    protected $moviesRepo;
    public function __construct()
    {
        $this->middleware('auth');
        $this->moviesRepo = new MoviesRepo();
    }

    public function index()
    {
        $movies = $this->moviesRepo->getAll();
        $favoritos = $this->moviesRepo->getFavoritos();
        $moviesWithFavorites = [];

        foreach ($movies as $movie) {
            $movie->ehFavorito = false;
            foreach ($favoritos as $favorito) {
                if ($movie->id == $favorito->movie_id) {
                    $movie->ehFavorito = true;
                }
            }
            array_push($moviesWithFavorites, $movie);
        }
        return view("movies")->with("movies", $moviesWithFavorites);
    }
    public function getMovie($id)
    {
        $movie = $this->moviesRepo->getById($id);
        return view("movie")->with("movie", $movie);
    }
    public function favoritar($movieId)
    {
        if ($this->moviesRepo->favoritar($movieId)) {
            return redirect("/movies" . "#quadro$movieId");
        }
    }
    public function desfavoritar($movieId)
    {
        if ($this->moviesRepo->desFavoritar($movieId)) {
            return redirect("/movies" . "#quadro$movieId");
        }
    }
}
