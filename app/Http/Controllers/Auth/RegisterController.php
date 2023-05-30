<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Teacher;
use App\Models\Location;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;



class RegisterController extends Controller
{



    /**
     * Display a registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function register()
    {
        $location = Location::get()->all();
        $category = Category::get()->all();
        return view('register', [
            'locations' => $location,
            'categories' => $category,
    
    ]);
    }

    /**
     * Store a new user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Regular expressions
        $nameRegex = '/^[A-Za-z\s]+$/';
        $streetNrRegex = '/^[A-Za-z0-9\s]+$/';
        

        $request->validate([
            'name' => "required|string|regex:$nameRegex|max:250",
            'firstname' => "required|string|regex:$nameRegex|max:250",
            'email' => 'required|email|max:250|unique:users',
            'description' => "required|string|regex:$nameRegex|max:250",
            'remarks' => 'nullable|string|max:250',
            'phone' => "required",
            'website' => 'nullable|string',
            'location' => 'required|integer',
            'category' => 'required|integer',
            'streetnr' => "required|string|regex:$streetNrRegex",
            'codecity' => "required|string",
        ]);
       

        Teacher::create([
            'lastname' => $request->name,
            'firstname' => $request->firstname,
            'email' => $request->email,
            'description' => $request->description,
            'remarks' => $request->remarks,
            'phone' => $request->phone,
            'website' => $request->website,
            'approved' => 0, // Set 'approved' field to 0 by default
            'location_id' => $request->location,
            'category_id' => $request->category,
            'streetnr' => $request->streetnr,
            'codecity' => $request->codecity,
        ]);


        
        Mail::send('mail.mail', $request->all(), function($message){
            $message->to(request('email'))
            ->subject('Bedankt voor uw registratie, '. request('firstname').'.');
        });
    }
}