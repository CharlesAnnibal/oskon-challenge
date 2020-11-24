<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\CustomUser;
use App\Http\Resources\CustomUser as CustomUserResource;
use App\Http\Resources\CustomUserCollection as CustomUserCollectionResource;
use App\Http\Requests\CustomUser as CustomUserRequest;


class CustomUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customUsers = CustomUser::all();
        return new CustomUserCollectionResource($customUsers);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CustomUserRequest $customUserRequest)
    {
        $newUser = new CustomUser($customUserRequest->validated());
        $newUser->save();
        return new CustomUserResource($newUser);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = CustomUser::find([$id])->first();
        return new CustomUserResource($user);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CustomUser $user, CustomUserRequest $request)
    {
        $user->fill($request->validated());
        $user->save();
        return new CustomUserResource($user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = CustomUser::find([$id])->first();
        $user->delete();
        return new Response(["message" => "Utilizador " . $user->name . " foi removido com sucesso."], 200);
    }
}
