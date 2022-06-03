<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Notifications\UserNotification;
use App\Notifications\BookingNotification;
use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Table;
use App\Models\User;
use Auth;
use Illuminate\Support\Facades\Notification;

class BookingController extends Controller
{
    public function BookTable(Request $request, $id){
        $table = Table::findOrFail($id);
      Booking::insert([
            'id'=> $id,
            'user_id' => Auth::id(),
            'table_id' => $table->id,
            'name' => $request->name,
            'email' => $request->email,
            'datetime'=> $request->datetime,
            'people'=> $request->people,
            'message'=> $request->message
        ]);
        $success = Booking::where('id',$id)->get();
    $user = User::where('id', Auth::id())->get();
        Table::findOrFail($id)->update(['table_status'=>$request->status]);
        Notification::send($user, new BookingNotification($request->datetime));
        return response()->json(['success' => 'Booking Added']);
    }

    public function TablesAvailable(){
        $tables = Table::get();
        return view('frontend.tables.index', compact('tables'));
    }
    public function GetTables(){
        $tables = Table::get();
        return response()->json($tables);
    }

    public function showModal($id){
        $tables = Table::findOrFail($id);
        return response()->json(array(
            'tables' => $tables
        ));
    }

    public function index(){
        $booking = Booking::get();
        return view('backend.booking.index', compact('booking'));
    }

    public function bookingDelete($id){
       $booking= Booking::where('user_id', Auth::id())->findOrFail($id);
        $table = Table::where('id',$booking->table_id)->first();
        $table->update(['table_status'=>1]);
        $booking->delete();
        return redirect()->back();
    }

    public function notify(){
       if(auth()->user()){
           $user = User::first();
           auth()->user()->notify(new UserNotification($user));
       }
    }
    public function markAsRead($id){
    if($id){
        auth()->user()->unreadNotifications->where('id',$id)->markAsRead();
    }
        return response()->json(['success']);
    }
}
