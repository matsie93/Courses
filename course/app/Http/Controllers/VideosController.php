<?php

namespace App\Http\Controllers;

use Request; //Laravel collective

use Illuminate\Http\Requests;
use App\Http\Requests\CreateVideoRequest;
use App\Video;
use App\Category;
use Auth;
use Session;


class VideosController extends Controller
{
    //sprawdza czy jest uzytkownik zalogowany aby moc korzystac z innych metod tej klasy(only blokuje tylko jedna metode)except w druga strone
    public function __construct(){
        $this->middleware('auth', ['except'=>'index']);
    }
    //Pobieramy liste filmow
    public function index(){
        $videos = Video::latest()->get();
    	return view('videos.index')->with('videos', $videos);
    }

    //Jeden film
    public function show($id){
    	$video = Video::findOrFail($id);
    	return view('videos.show')->with('video',$video);
    }

    //Wyswietla formularz dodawania filmu
    public function create(){
        $categories = Category::pluck('name','id');
    	return view ('videos.create')->with('categories', $categories);
    	 }
    
    //Dodawanie jednego rekordu do bazy
         public function store(CreateVideoRequest $request){
            $video= new Video($request->all());
            Auth::user()->videos()->save($video);
            $categoryIds = $request->input('CategoryList');
            $video->categories()->attach($categoryIds);
            Session::flash('video_created', 'Film został dodany!');
            return redirect('videos');

         }

    //edycja filmu
         public function edit($id){
            $categories = Category::pluck('name','id');
            $video=Video::findOrFail($id);
            return view('videos.edit', compact('video','categories'));
         }

    //aktualizacja w DB
         public function update($id, CreateVideoRequest $request){
            $video = Video::findOrFail($id);
            $video->update($request->all());
            $video->categories()->sync($request->input('CategoryList'));
            return redirect('videos');
         }
}
