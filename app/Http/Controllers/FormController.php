<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFormRequest;
use App\User;

/**
 * Class FormController
 *
 * @package App\Http\Controllers
 */
class FormController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('form');
    }

    public function show()
    {
       //
    }

    /**
     * @param \App\Http\Requests\StoreFormRequest $request
     */
    public function store(StoreFormRequest $request)
    {
        User::create([
            'first_name' => $request->get('first_name'),
            'last_name' => $request->get('last_name'),
            'email' => $request->get('email'),
            'telephone_number' => $request->get('telephone_number'),
            'address' => $request->get('address'),
            'town_city' => $request->get('town_city'),
            'county' => $request->get('county'),
            'postcode' => $request->get('postcode'),
            'path' => '',
            'disney_on_ice' => $request->has('disney_on_ice'),
            'marvel_universe_live' => $request->has('marvel_universe_live'),
            'monster_jam' => $request->has('monster_jam')
        ]);
    }
}
