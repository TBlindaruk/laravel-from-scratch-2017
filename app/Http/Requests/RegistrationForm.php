<?php

namespace App\Http\Requests;

use App\User;
use App\Mail\Welcome;
use Illuminate\Support\Facades\Mail;
use Illuminate\Foundation\Http\FormRequest;

class RegistrationForm extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; //true ako je potrebna autorizacija, inace false
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required|unique:users|email',
            'password' => 'required|confirmed'
        ];
    }

    public function persist()
    {
        // $user = User::create(
        //         $this->only([
        //             'name',
        //             'email',
        //             'password'
        //         ])
        // );
        $user = New User;
        $user -> name = request('name');
        $user -> email = request('email');
        $user -> password = bcrypt(request('password'));
        $user -> save();

        //sign them in
        auth()->login($user);

        \Mail::to($user)->send(new Welcome($user));
    }
}
