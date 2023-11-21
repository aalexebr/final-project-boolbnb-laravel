<?php

namespace App\Http\Controllers\admin;

use App\Models\Message;
use App\Http\Requests\StoreMessageRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateMessageRequest;
use App\Models\Apartment;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $userId = Auth::id();
        $apartments = Apartment::where('user_id', $user['id'])->get();
        $messages = [];
        foreach ($apartments as $singleApt) {
            $message = Message::where('apartment_id', $singleApt['id'])->get();
            foreach ($message as $singleMess) {
                $messages[] = $singleMess;
            }
        };

        return view('admin.apartment.message', compact('messages', 'apartments'));
    }

    public function single(Request $request)   

    {   
        
        $user = Auth::user();
        $userId = Auth::id();
        $form_data = $request->validate(['apt_message' => 'required']);
        $apartments = Apartment::where('user_id', $user['id'])->get();
        $apt = Apartment::where('id', $form_data['apt_message'])->first();
        $mess = Message::where('apartment_id', $form_data['apt_message'])->get();
      

        return view('admin.apartment.single', compact('mess', 'apartments', 'apt'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMessageRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $messages = Message::where('apartment_id', $id)->get();
     

        return view('admin.apartment.singleMessage', compact('messages'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMessageRequest $request, Message $message)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Message $message)
    {
        $message->delete();
        return redirect()->route('admin.message.index');
    }
}
