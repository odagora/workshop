<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use App\Mail\MailAutoPassword;
use Session;
use Hash;
use Mail;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('admin.users.index')->withUsers($users);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit')->withUser($user);
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
        $user = User::findOrFail($id);

        $this->validate($request, [
            'name' => 'required|max:32',
            'email' => 'required|email|unique:users,email,'.$id
        ]);

        $user->name = $request->name;
        $user->email = $request->email;

        //Roles assign
        $user->roles()->detach();
        if ($request['role_user']) {
            $user->roles()->attach(Role::where('name', 'User')->first());
        }
        if ($request['role_admin']) {
            $user->roles()->attach(Role::where('name', 'Admin')->first());
        }

        //Password change in all options available
        if ($request->pass == "auto") {
            $length = 10;
            $keyspace = '123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $str = '';
            $max = mb_strlen($keyspace, '8bit')-1;
            for ($i = 0; $i < $length; ++$i){
                $str .= $keyspace[random_int(0, $max)];
            }

            $user->password = Hash::make($str);

            //Send mail to notify user about password change
            $receiverAddress = $user->email;
            $subject = 'Notificación cambio de contraseña por administrador';
            $content = [
                'user' => $user->name,
                'body' => 'El administrador del sistema ha cambiado tu informacion y te ha asignado la siguiente contraseña de acceso:'.' '. $str.'. Te recomendamos no compartirla con nadie y cambiarla lo más pronto posible. Para esto puedes hacer click en el siguiente link:',
                'button' => 'Cambiar Contraseña'
            ];

            Mail::to($receiverAddress)->send(new MailAutoPassword($subject, $content));


        }
        elseif ($request->pass == "manual") {
            $user->password = Hash::make($request->password);
        }

        if ($user->save()) {
            //Display a flash message on succesfull submit
            Session::flash('success', 'Los datos del usuario'.' '.$user->name.' '.'fueron modificados de forma exitosa'); 
           //Redirect to another page
            return redirect()->route('users.index');
        }
        else {
            return redirect()->route('users.edit', $id);

            Session::flash('error', 'Hubo un error guardando la información actualizada del usuario. Favor intentar de nuevo.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        Session::flash('success', 'El usuario'.' '.$user->id.' '.' fue eliminado de forma exitosa');

        return redirect()->route('users.index');
    }
}
