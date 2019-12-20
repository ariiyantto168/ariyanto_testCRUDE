<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\Productionhouse;

class MovieController extends Controller
{
    public function index()
    {

        $contents = [

            'movie' => Movie::with(['production'])->get(),
        ];

        $pagecontent = view('movie.index', $contents);

        $pagemain = array(
            'title' => 'Movie',
            'menu' => 'movie',
            'submenu' => '',
            'pagecontent' => $pagecontent
        );

        return view('masterpage', $pagemain);
    }

    public function create_page()
    {
    
        $production = Productionhouse::all();
        $contents = [
            'production' => $production,
            'movie' => Movie::all(),
        ];

        $pagecontent = view('movie.create', $contents);

        $pagemain = array(
            'title' => 'Movie',
            'menu' => 'movie',
            'submenu' => '',
            'pagecontent' => $pagecontent
        );

        return view('masterpage', $pagemain);
    }

    public function save_page(Request $request)
    {
        // return $request->all();
        $request->validate([
            'movie' => 'required',
            'genre' => 'required',
        ]);

        $saveMovie = new Movie;
        $saveMovie->idproductionhouse = $request->idproductionhouse;
        $saveMovie->movie = $request->movie;
        $saveMovie->genre = $request->genre;
        $saveMovie->save();
        // return $saveMovie;
        return redirect('movie')->with('status_success','Created movie');
    }

    public function update_page(Movie $movie)
    {
        $production = Productionhouse::all();
    
        $contents = [
            'production' => $production,
            'movie' => Movie::find($movie->idmovie),
        ];

        $pagecontent = view('movie.update', $contents);

        $pagemain = array(
            'title' => 'Movie',
            'menu' => 'movie',
            'submenu' => '',
            'pagecontent' => $pagecontent
        );

        return view('masterpage', $pagemain);
    }

    public function update_save(Request $request, Movie $movie)
    {
        // return $request->all();
        $request->validate([
            'movie' => 'required',
            'genre' => 'required',
        ]);

        $saveMovie = Movie::find($movie->idmovie);
        $saveMovie->idproductionhouse = $request->idproductionhouse;
        $saveMovie->movie = $request->movie;
        $saveMovie->genre = $request->genre;
        $saveMovie->save();
        // return $saveMovie;
        return redirect('movie')->with('status_success','Created movie');
    }

    public function delete(Movie $movie)
    {
        $deleteMovie = Movie::find($movie->idmovie);
        // return $deleteMovie;
      $deleteMovie->delete();
      return redirect('movie')->with('status_success','Deleted movie');
  
    }
}
