<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function contact() {
    	$header = 'To jest nagłówek strony Kontakt';
    	$date = '20/06/2017';
    	$visited = 3450;
		//return view ('pages.contact')->with('header',$header); przekazywanie jednej zmiennej
		return view ('pages.contact', compact('header','date','visited'));//przekazywanie wielu zmiennych
	}
	
	public function about() {
		return view ('pages.about');
	}
}
