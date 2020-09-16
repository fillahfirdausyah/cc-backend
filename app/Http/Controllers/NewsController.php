<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\News;

class NewsController extends Controller
{
 	public function store(Request $request)
    {
    	$validatedData = $request->validate([
    		'judul' => 'required|string|max:255',
      		'content' => 'required',
        	'tanggal' => 'required',
        	'aset' => 'required',
    	]);
 
        News::create([
    		'judul' => $validatedData['judul'],
			'content' => $validatedData['content'],
			'tanggal' => $validatedData['tanggal'],
			'aset' => $validatedData['aset']
    	]);
 
    	return redirect('/news')->with('status', 'Data Berhasil Ditambahkan!');
    }
 
   	public function show()
    {
    	$news = News::all();
    	return view('news',['news'=>$news]);
   	}
}
