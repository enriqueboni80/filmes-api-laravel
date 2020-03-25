<?php

namespace App\Repositorios;

use App\Repositories;
use Illuminate\Http\Request;
use App\favorito;
use Illuminate\Support\Facades\Auth; 

class MoviesRepo
{
    protected $API_KEY = "d416af5d4faee64e25ab001d87aab5c3";

    public function getContent($path)
    {
        $url = file_get_contents("https://api.themoviedb.org/3/$path?api_key=$this->API_KEY");
        return json_decode($url);
    }

    public function getAll()
    {
        $movies = $this->getContent("movie/popular");
        return $movies->results;
    }
    public function getById($id)
    {
        $movie = $this->getContent("movie/$id");
        return $movie;
    }
    public function favoritar($movieId)
    {
        $favorito = new favorito;
        $favorito->user_id = Auth::user()->id;
        $favorito->movie_id = $movieId;
        return $favorito->save();
    }
    public function desFavoritar($movieId)
    {
        return favorito::where('movie_id', $movieId)->delete();
    }

    public function getFavoritos()
    {
        return favorito::where('user_id', Auth::user()->id)->get();
    }
}
