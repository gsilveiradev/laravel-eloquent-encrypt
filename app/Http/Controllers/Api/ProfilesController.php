<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Http\Requests;
use App\Profile;

class ProfilesController extends Controller
{
    /**
     * List all resources
     */
    public function index()
    {
        $profiles = Profile::all();

        return response()->json(compact('profiles'));
    }

    /**
     * Show the resource
     */
    public function show($id)
    {
        $profile = Profile::findOrFail($id);

        return response()->json(compact('profile'));
    }

    /**
     * Create new resource
     */
    public function store(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'name' => 'required'
        ]);

        if ($validation->fails()) {
            return response()->json(array(
                'message' => 'Validation error',
                'errors' => $validation->errors()
            ), 422);
        }

        $profile = new profile;
        $profile->name = $request->name;
        $profile->telephone = $request->telephone;
        $profile->social_number = $request->social_number;
        $profile->dummy_encrypted = $request->dummy_encrypted;
        $profile->save();

        return response()->json(compact('profile'));
    }

    /**
     * Update existing resource
     */
    public function update(Request $request, $id)
    {
        $validation = Validator::make($request->all(), [
            'name' => 'required'
        ]);

        if ($validation->fails()) {
            return response()->json(array(
                'message' => 'Validation error',
                'errors' => $validation->errors()
            ), 422);
        }

        $profile = Profile::findOrFail($id);
        $profile->name = $request->name;
        $profile->telephone = isset($request->telephone) ? $request->telephone : $profile->telephone;
        $profile->social_number = isset($request->social_number) ? $request->social_number : $profile->social_number;
        $profile->dummy_encrypted = isset($request->dummy_encrypted) ?
            $request->dummy_encrypted :
            $profile->dummy_encrypted;
        $profile->save();

        return response()->json(compact('profile'));
    }

    /**
     * Delete resource
     */
    public function destroy($id)
    {
        $profile = Profile::findOrFail($id);
        $profile->delete();

        return response()->json(array('message' => 'Ok!'), 200);
    }
}
