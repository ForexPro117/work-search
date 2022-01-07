<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('registration');
    }

    public function createUser()
    {
        return view('registrationUser');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $user=User::first();
        dd($user);
        $request->validate([
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'name'=>'required|string|max:60',
            'lastname'=>'required|string|max:60',
            'phoneNumber'=>'required|numeric|min:6|max:12',
            'companyName'=>'required|string|max:80',
        ]);

   /*     public function addUser()
    {
        $user=new User();
        $user->name=$data->name;
        $user->email=$data->email;
        $user->role='user';
        $user->password=Hash::make($data->policy);
        $user->save();
jjjjjjjjjjjjjjjjjjjjjjjjjjj
        return view("admin.admin_panel_user_list",
            ['users' => User::where('role', 'user')->get()]);
    }*/

        /*$user = User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);*/

        return back()->with('status', 'success');
    }
    public function storeUser(Request $request)
    {
        $request->validate([
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'name'=>'required|string|max:60',
            'lastname'=>'required|string|max:60',
            'phoneNumber'=>'nullable|numeric|min:6|max:12',
        ]);

        /*$user = User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);*/

        return back()->with('status', 'success');
    }
}
