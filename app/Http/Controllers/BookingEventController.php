<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BookingEvent;

class BookingEventController extends Controller
{
    //

    public function index()
    {
        return view('public.Admin.book-event', [
            'datas' => BookingEvent::where('is_deleted', 0)->where('is_approved', 1)->orderBy('id', 'DESC')->get()
        ]);
    }
    public function edit_book(Request $request)
    {
        $request->validate(['id' => "required"]);
        return ['response' => 'success', 'book' => BookingEvent::where('id', $request->id)->latest()->get()];
    }

    public function book_event(){
        return view('public.Home.event-booking');
    }

    public function book_event_submit(Request $request){
        $validated = $request->validate([
            'fullname' => 'required',
            'email' => 'required',
            'contact_number' => 'required',
            'graduation_batch' => 'required',
            'company' => 'required',
            'event' => 'required',
            'venue' => 'required',
            'from_date' => 'required',
            'to_date' => 'required',
            'message' => 'required',
        ]);
        BookingEvent::create([
            'fullname' => $request->fullname,
            'email' => $request->email,
            'contact_number' => $request->contact_number,
            'graduation_batch' => $request->graduation_batch,
            'company' => $request->company,
            'event' => $request->event,
            'venue' => $request->venue,
            'from_date' => $request->from_date,
            'to_date' => $request->to_date,
            'message' => $request->message,

        ])->save();
        return back()->with(['success_message' => 'Book Request Successfully.']);
        // return redirect('/');
    }

    public function update_book(Request $request){
        $validated = $request->validate([
            'fullname' => 'required',
            'email' => 'required',
            'contact_number' => 'required',
            'graduation_batch' => 'required',
            'company' => 'required',
            'event' => 'required',
            'venue' => 'required',
            'from_date' => 'required',
            'to_date' => 'required',
            'message' => 'required',
        ]);

        $data = BookingEvent::where('id',$request->id)->first();
            $data->fullname = $request->fullname;
            $data->email = $request->email;
            $data->contact_number = $request->contact_number;
            $data->graduation_batch = $request->graduation_batch;
            $data->company = $request->company;
            $data->event = $request->event;
            $data->venue = $request->venue;
            $data->from_date = $request->from_date;
            $data->to_date = $request->to_date;
            $data->message = $request->message;
            $data->save();
        return ['response' => 'success', 'message' => 'Updated Successfully.'];
        // return redirect('/');
    }

    public function destroy_book($id)
    {
        $data_del =  BookingEvent::find($id);
        $data_del->is_deleted = 1;
        $data_del->save();
        return redirect()->route('admin-book');
    }

    public function book_request(){
        return view('public.Admin.book-event-request', [
            'datas' => BookingEvent::where('is_deleted', 0)->where('is_approved', 0)->orderBy('id', 'DESC')->get()
        ]);
    }

    public function book_approved($id)
    {
        $data_del =  BookingEvent::find($id);
        $data_del->is_approved = 1;
        $data_del->save();
        return redirect()->route('admin-book-request');
    }

    public function book_reject($id)
    {
        $data_del =  BookingEvent::find($id);
        $data_del->is_approved = 2;
        $data_del->save();
        return redirect()->route('admin-book-request');
    }
}
