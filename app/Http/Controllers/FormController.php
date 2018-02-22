<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFormRequest;
use App\User;
use Intervention\Image\Constraint;
use Intervention\Image\Facades\Image;

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
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreFormRequest $request)
    {
        $user = User::create([
            'first_name'           => $request->get('first_name'),
            'last_name'            => $request->get('last_name'),
            'email'                => $request->get('email'),
            'telephone_number'     => $request->get('telephone_number'),
            'address'              => $request->get('address'),
            'town_city'            => $request->get('town_city'),
            'county'               => $request->get('county'),
            'postcode'             => $request->get('postcode'),
            'disney_on_ice'        => $request->has('disney_on_ice'),
            'marvel_universe_live' => $request->has('marvel_universe_live'),
            'monster_jam'          => $request->has('monster_jam'),
        ]);

        Image::make($file = $request->file('selfie'))
            ->save($this->makePath($user, $file))
            ->resize(1024, null, function (Constraint $constraint) {
                $constraint->aspectRatio();
            })
            ->save($this->makePath($user, $file, 'max_width_1024'))
            ->crop(150, 150)
            ->save($this->makePath($user, $file, 'cropped'));

        return back()->with('success', 'All user details were saved successfully');
    }

    /**
     * @param $user
     * @param $file
     *
     * @return string
     */
    protected function makePath($user, $file, $type = 'original'): string
    {
        return 'img/selfies/' . $user->id . '_' . $type . '.' . $file->extension();
    }
}
