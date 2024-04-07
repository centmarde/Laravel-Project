<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        if(request()->routeIs('user.login')) {
            return [
                'email' => 'string|email|required|max:255',
                'password'=> 'min:8|required',
            ];
        }
        else if(request()->routeIs('user.store')) {
            return [
                'name' => 'string|max:255|required',
                'email' => 'string|email|required|max:255|unique:App\Models\User,email',
                'password'=> 'min:8|required',
            ];
        }
        else if(request()->routeIs('user.update')) {
            return [
                'name' => 'string|max:255|required',
            ];
        }
        else if(request()->routeIs('user.email')) {
            return [
                'email' => 'string|email|required|max:255|email',
            ];
        }
        else if(request()->routeIs('user.password')) {
            return [
                'password'=> 'min:8|required|confirmed',
            ];
        }
       
    }
}
