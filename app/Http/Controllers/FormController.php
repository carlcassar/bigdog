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
        return view('index')->with('users', User::all());
    }

    public function create()
    {
        return view('create');
    }

    /**
     * @param \App\Http\Requests\StoreFormRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreFormRequest $request)
    {
        $user = $this->saveUserDetails($request);

        $this->saveDifferentSelfieVersions($request, $user);

        return $this->correctResponse($request, 'All user details were saved successfully');
    }

    /**
     * @param        $user
     * @param        $file
     *
     * @param string $type
     *
     * @return string
     */
    protected function makePath($user, $file, $type = 'original'): string
    {
        return 'img/selfies/' . $user->id . '_' . $type . '.' . $file->extension();
    }

    /**
     * @param \App\Http\Requests\StoreFormRequest $request
     *
     * @param string                              $message
     *
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    protected function correctResponse(StoreFormRequest $request, string $message)
    {
        if ($request->expectsJson($request)) {
            return response($message);
        }

        return back()->with('success', $message);
    }

    /**
     * @param \App\Http\Requests\StoreFormRequest $request
     * @param                                     $user
     */
    protected function saveDifferentSelfieVersions(StoreFormRequest $request, $user): void
    {
        Image::make($file = $request->file('selfie'))
            ->save($this->makePath($user, $file))
            ->resize(1024, null, function (Constraint $constraint) {
                $constraint->aspectRatio();
            })
            ->save($this->makePath($user, $file, 'max_width_1024'))
            ->crop(150, 150)
            ->save($this->makePath($user, $file, 'cropped'));
    }

    /**
     * @param \App\Http\Requests\StoreFormRequest $request
     *
     * @return mixed
     */
    protected function saveUserDetails(StoreFormRequest $request)
    {
        return User::create([
            'first_name'           => $request->get('first_name'),
            'last_name'            => $request->get('last_name'),
            'email'                => $request->get('email'),
            'telephone_number'     => $request->get('telephone_number'),
            'address'              => $request->get('address'),
            'town_city'            => $request->get('town_city'),
            'county'               => $request->get('county'),
            'postcode'             => $request->get('postcode'),
            'receive_updates'      => $request->has('receive_updates'),
            'disney_on_ice'        => $request->has('disney_on_ice'),
            'marvel_universe_live' => $request->has('marvel_universe_live'),
            'monster_jam'          => $request->has('monster_jam'),
        ]);
    }
}
