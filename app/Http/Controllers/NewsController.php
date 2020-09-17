<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use App\Models\News;

class NewsController extends Controller
{


  public function show()
  {
    $news = News::all()->except('id');
    return view('news',['news'=>$news]);
  }


 	public function store(Request $request)
  {
  	$request->validate([
  		  'judul' => 'required|string|max:255',
     		'content' => 'required',
       	'tanggal' => 'required',
      	'aset' => 'required|image|mimes:jpg,jpeg,png|max:2048',
  	]);

	  $files = $request->file('aset');
	  $destinationPath = 'public/image';  //upload path
	  $profileImage ="image".rand(0000,9999).".".$files->getClientOriginalExtension();
	  $files->move($destinationPath, $profileImage);
     
    News::create(array(
       'judul' => $request->judul, 
       'content'=>$request->content,
       'tanggal'=>$request->tanggal,
       'aset'=>$profileImage
    ));		
  	return redirect('/news')->with('status', 'Data Berhasil Ditambahkan!');
  }
 
 	public function edit($id)
 	{
 		$news = News::find($id);
 		return view('auth/admin_manage/changenews',['news'=>$news]);
 	}

  public function update($id, Request $request)
  {
    $request->validate([
        'judul' => 'required|string|max:255',
        'content' => 'required',
        'tanggal' => 'required',
        'aset' => 'required|image|mimes:jpg,jpeg,png|max:2048',
    ]);
    
    $files = $request->file('aset');
    $destinationPath = 'public/image';  //upload path
    $profileImage ="image".rand(0000,9999).".".$files->getClientOriginalExtension();
    $files->move($destinationPath, $profileImage);
    
    $news = News::find($id);
    $news->judul = $request->judul; 
    $news->content = $request->content;
    $news->tanggal = $request->tanggal;
    $news->aset = $profileImage;
    $news->save();

    return redirect('/news'); 
  }

  public function delete($id)
  {
      $news = News::find($id);
      $news->delete();
    return redirect('/news');
  }
}
