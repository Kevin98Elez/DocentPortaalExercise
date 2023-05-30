<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Teacher;
use App\Models\Location;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


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
        $request->validate([
            'name' => 'required|string|max:250',
            'firstname' => 'required|string|max:250',
            'email' => 'required|email|max:250|unique:users',
            'description' => 'required|string|max:250',
            'remarks' => 'nullable|string|max:250',
            'phone' => 'required|string|max:9999999999',
            'website' => 'nullable|string',
            'location' => 'required|integer',
            'category' => 'required|integer',
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
        ]);
    }
}
