<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class ReporterRegController extends Controller
{
    public function add(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first' => 'required',
            'last' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('/console/users/add')
                ->withErrors($validator)
                ->withInput();
        }

        $user = new User();
        $user->first = $request->input('first');
        $user->last = $request->input('last');
        $user->role = 'Reporter';
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->save();

        return redirect('/')
            ->with('message', 'Congrats on your Reporter Registration!');
    }
}