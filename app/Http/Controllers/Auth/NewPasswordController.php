<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules;
use App\Models\User;
use Illuminate\Support\Facades\Config;
use App\Rules\ComplexPasswordRule;

class NewPasswordController extends Controller
{
    /**
     * Display the password reset view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function create(Request $request)
    {
        return view('auth.reset-password', ['request' => $request]);
    }

    /**
     * Handle an incoming new password request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'token' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required', 'confirmed', new ComplexPasswordRule()],
        ]);
        $usuario = (User::where('email', $request['email'])->first());
        if ( Hash::check($request->password, $usuario->password) ||
            Hash::check($request->password, $usuario->password1) ||
            Hash::check($request->password, $usuario->password2) ||
            Hash::check($request->password, $usuario->password3) ||
            Hash::check($request->password, $usuario->password4) ||
            Hash::check($request->password, $usuario->password5)
        ) {
           return back()->withInput($request->only('email'))
                            ->withErrors(['password' => __('No se pueden repetir ninguna de las últimas 6 passwords')]);
        }else {
        $usuario->password5 = $usuario->password4;
        $usuario->password4 = $usuario->password3;
        $usuario->password3 = $usuario->password2;
        $usuario->password2 = $usuario->password1;
        $usuario->password1 = $usuario->password;
        
        
        // Here we will attempt to reset the user's password. If it is successful we
        // will update the password on an actual user model and persist it to the
        // database. Otherwise we will parse the error and return the response.
        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user) use ($request) {
                $user->forceFill([
                    'password' => Hash::make($request->password),
                    'remember_token' => Str::random(60),
                    'expire_at' => time() + Config::get('constants.PASS_EXPIRE'),
                ])->save();

                event(new PasswordReset($user));
            }
        );

        if ($status == Password::PASSWORD_RESET){$usuario->save();}
        // If the password was successfully reset, we will redirect the user back to
        // the application's home authenticated view. If there is an error we can
        // redirect them back to where they came from with their error message.
        return $status == Password::PASSWORD_RESET
                    ? redirect()->route('login')->with('status', __($status))
                    : back()->withInput($request->only('email'))
                            ->withErrors(['email' => __($status)]);
        }
    }
}
