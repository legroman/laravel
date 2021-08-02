<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('profile.index', ['user'=> auth()->user()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Application|Factory|View
     */
    public function edit(int $id)
    {
        return view('profile.edit', ['user' => User::find($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateUserRequest $request
     * @param $id
     * @return Application|Factory|View
     */
    public function update(UpdateUserRequest $request, $id)
    {
        $user = User::find($id);

        $user->update([
            'name' => $request->input('name') ?? $user->name,
            'last_name' => $request->input('last_name') ?? $user->last_name,
            'email' => $request->input('email') ?? $user->email,
            'phone' => $request->input('phone') ?? $user->phone,
            'city' => $request->input('city') ?? $user->city,
            'address' => $request->input('address') ?? $user->address,
            'taxpayer_identification_number' => $request->input('taxpayer_identification_number') ?? $user->taxpayer_identification_number,
            'firm_name' => $request->input('firm_name') ?? $user->firm_name
        ]);

        return view('profile.index', ['user' => $user]);
    }

    /**
     * Update the specified resource from Ajax.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function update_image(Request $request, $id)
    {
        if($request->ajax() and $request->hasFile('profile_img'))
        {
            $user = User::find($id);
            $user->clearMediaCollection('profile_img');
            $user->addMedia($request->file('profile_img'))->toMediaCollection('profile_img');

            $html = view('parts.profile-image', ['imgUrl'=> $user->getFirstMediaUrl('profile_img')])->render();

            return response()->json([
                'type' => 'Success',
                'container' => ".profile-image-wrapper",
                'html' => $html
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
