<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use Laracasts\Flash\Flash;
use App\Http\Requests\UserRequest;

class UsersController extends Controller
{

    public function index()
    {
        // $user=\Auth::user();
        // return view('users.index')
        //   ->with('user', $user);
        $users=User::all();
        return view('users.index')
          ->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        //

        $file=$request->file('picture');
        $name= date('d.m.Y').'_'.time().'_'.$file->getClientOriginalName().'_.'.$file->getClientOriginalExtension();
        $path=public_path().'/files';
        $user = new User($request->all());
        $user->password= bcrypt($request->password);
        $user->picture = $name;
        $file->move($path,$name);
        $user->save();

        Flash::success('Se creo con exito el usario '.$user->name.' !!');
        return redirect()->route('users.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
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
        //

          $user=User::find($id);
          return view('users.edit')
            ->with('user', $user);


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
      return redirect()->route('users.index');

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
