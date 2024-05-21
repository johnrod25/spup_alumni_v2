<?php

namespace App\Http\Controllers;

use App\Http\Requests\Gallery_Request;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class GalleryController extends Controller
{
    //
    public function index()
    {
        return view('public.Admin.gallery', [
            'datas' => Gallery::get()
        ]);
    }

    public function show_gallery($id)
    {
        return view('public.Home.gallery', [
            'datas' => Gallery::where('id', $id)->get()
        ]);
    }

    public function show_all_gallery()
    {
        return view('public.Home.gallery', [
            'datas' => Gallery::get()
        ]);
    }

    public function add_gallery(Request $request)
    {
        if ($request->validate([
            'image' => "required|image|mimes:jpeg,png,jpg,gif|max:2048"
        ])) {
            $filename = $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path() . '/images/galleries/', $filename);
            Gallery::create([
                'image_path' => $filename
            ])->save();
            return ['response' => 'success', 'message' => 'Uploaded Successfully.'];
        }
    }

    public function edit_gallery(Request $request)
    {
        $request->validate(['id' => "required"]);
        return ['response' => 'success', 'gallery' => gallery::where('id', $request->id)->latest()->get()];
    }

    public function update_gallery(Gallery_Request $request)
    {
        $request->validated();
        $data =  Gallery::find($request->id);
        if ($request->image != 'null') {
            $filename = $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path() . '/images/galleries/', $filename);
            $data->image_path = $filename;
        }
        $data->title = $request->title;
        $data->content = $request->content;
        $data->save();
        return ['response' => 'success', 'message' => 'Updated Successfully.'];
    }

    public function destroy_gallery($id)
    {
        $gallery = Gallery::find($id);
        File::delete(public_path() . '/images/galleries/' . $gallery->image_path);
        $gallery->delete();
        return redirect()->route('admin-gallery');
    }
}
