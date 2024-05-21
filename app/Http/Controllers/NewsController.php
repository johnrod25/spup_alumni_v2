<?php

namespace App\Http\Controllers;

use App\Http\Requests\News_Request;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


class NewsController extends Controller
{
    //

    public function index()
    {
        return view('public.Admin.news', [
            'datas' => News::orderBy('id', 'DESC')->get()
        ]);
    }

    public function show_news($id)
    {
        return view('public.Home.news', [
            'datas' => News::where('id', $id)->get()
        ]);
    }

    public function show_all_news()
    {
        return view('public.Home.news', [
            'datas' => News::orderBy('id', 'DESC')->get()
        ]);
    }

    public function add_news(News_Request $request)
    {
        if ($request->validated() + [
            'image' => "required|image|mimes:jpeg,png,jpg,gif|max:2048"
        ]) {
            $filename = $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path() . '/images/news/', $filename);
            News::create([
                'image_path' => $filename,
                'title' => $request->title,
                'content' => $request->content
            ])->save();
            return ['response' => 'success', 'message' => 'Uploaded Successfully.'];
        }
    }

    public function edit_news(Request $request)
    {
        $request->validate(['id' => "required"]);
        return ['response' => 'success', 'news' => News::where('id', $request->id)->latest()->get()];
    }

    public function update_news(News_Request $request)
    {
        $request->validated();
        $data =  News::find($request->id);
        if ($request->image != 'null') {
            $filename = $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path() . '/images/news/', $filename);
            $data->image_path = $filename;
        }
        $data->title = $request->title;
        $data->content = $request->content;
        $data->save();
        return ['response' => 'success', 'message' => 'Updated Successfully.'];
    }

    public function destroy_news($id)
    {
        $news = News::find($id);
        File::delete(public_path() . '/images/news/' . $news->image_path);
        $news->delete();
        return redirect()->route('admin-news');
    }
}
