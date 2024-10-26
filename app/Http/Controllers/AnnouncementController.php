<?php

namespace App\Http\Controllers;

use App\Http\Requests\Announcement_Request;
use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


class AnnouncementController extends Controller
{
    //

    public function index()
    {
        return view('public.Admin.announcement', [
            'datas' => Announcement::orderBy('id', 'DESC')->get()
        ]);
    }

    public function show_announcement($id)
    {
        return view('public.Home.announcement', [
            'datas' => Announcement::where('id', $id)->get()
        ]);
    }

    public function show_all_announcement()
    {
        return view('public.Home.announcement', [
            'datas' => Announcement::orderBy('id', 'DESC')->get()
        ]);
    }
    public function show_year_announcement(Request $request)
    {
        // dd($request);
        if ($request->year_announcement != '') {
            return view('public.Home.announcement', [
                'datas' => Announcement::whereYear('created_at',$request->year_announcement)->orderBy('id', 'DESC')->get()
            ]);
        }
        else{
            return view('public.Home.announcement', [
                'datas' => Announcement::orderBy('id', 'DESC')->get()
            ]);
        }
    }

    public function add_announcement(Announcement_Request $request)
    {
        if ($request->validated() + [
            'image' => "required|image|mimes:jpeg,png,jpg,gif|max:2048"
        ]) {
            $filename = $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path() . '/images/announcements/', $filename);
            Announcement::create([
                'image_path' => $filename,
                'title' => $request->title,
                'content' => $request->content
            ])->save();
            return ['response' => 'success', 'message' => 'Uploaded Successfully.'];
        }
        // else {
        //     return response()->json([
        //         'message' => 'failed',
        //     ], 400);
        // }
    }

    public function edit_announcement(Request $request)
    {
        $request->validate(['id' => "required"]);
        return ['response' => 'success', 'announcement' => Announcement::where('id', $request->id)->latest()->get()];
    }

    public function update_announcement(Announcement_Request $request)
    {
        $request->validated();
        $data =  Announcement::find($request->id);
        if ($request->image != 'null') {
            $filename = $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path() . '/images/announcements/', $filename);
            $data->image_path = $filename;
        }
        $data->title = $request->title;
        $data->content = $request->content;
        $data->save();
        return ['response' => 'success', 'message' => 'Updated Successfully.'];
    }

    public function destroy_announcement($id)
    {
        $announcement = Announcement::find($id);
        File::delete(public_path() . '/images/announcements/' . $announcement->image_path);
        $announcement->delete();
        return redirect()->route('admin-announcement');
    }
}
