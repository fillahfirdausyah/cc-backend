<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\Event;

class EventController extends Controller
{
    protected function show()
    {
      $event = Event::all()->except('id');
      return view('auth/admin_manage/Event/event',['event'=>$event]);
    }

    protected function store(Request $request)
    {
      $request->validate([
        'judul'=>'required|string|max:255',
        'content'=>'required',
        'tanggal'=>'required',
        'aset'=>'required|image|mimes:jpg,jpeg,png',
      ]);

        $files = $request->file('aset');
        $image_name ="image_E".rand(0000,9999).".".$files->getClientOriginalExtension();
        $destinationPath = 'public/image';
        $files->move($destinationPath,$image_name);
      
    
      Event::create([
        'judul'=> $request->judul,
        'content'=> $request->content,
        'tanggal'=> $request->tanggal,
        'aset'=> $image_name
      ]);

      return redirect("/admin/event");
    }

    protected function edit($id)
    {
      $event = Event::find($id);
      return view('auth/admin_manage/Event/changeevent',['event'=>$event]);
    }

    protected function update($id,Request $request)
    {
      $request->validate([
        'judul'=>'required|string|max:255',
        'content'=>'required',
        'tanggal'=>'required',
        'aset'=>'required|image|mimes:jpg,jpeg,png',
      ]);

        $files = $request->file('aset');
        $image_name ="image_E".rand(0000,9999).".".$files->getClientOriginalExtension();
        $destinationPath = 'public/image';
        $files->move($destinationPath,$image_name);
      
    
      $event = Event::find($id);
      $event->judul= $request->judul;
      $event->content= $request->content;
      $event->tanggal= $request->tanggal;
      $event->aset= $image_name;
      $event->save();

      return redirect("/admin/event");
    }

    protected function delete($id)
    {
      $event = Event::find($id);
      $event->delete();
      return redirect('admin/event');
    }
}
