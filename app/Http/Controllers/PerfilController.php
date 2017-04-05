<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use Laracasts\Flash\Flash;

class PerfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      if (\Auth::user()->id == $id) {
        $user=\Auth::user();
        return view('perfil.edit')
          ->with('user', $user);
      }else{
        return redirect('/');
      }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $user = User::find($id);
      $user->fill($request->all());
      $file=$request->file('picture');
      $name= date('d.m.Y').'_'.time().'_'.$file->getClientOriginalName().'_.'.$file->getClientOriginalExtension();
      $path=public_path().'/files';
      $user->password= bcrypt($request->password);
      $user->picture = $name;
      $file->move($path,$name);
      $user->save();
      Flash::success('El perfil de '.$user->name.' se edito con exito!!');
      return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
