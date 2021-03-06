<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Users\StoreRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\User\PasswordMail;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request){
        $data = $request -> validated();
        $password = Str::random(10);
        $data['password']=Hash::make($password);
        User::FirstOrCreate(['email' => $data['email']], $data);
        Mail::to($data['email']) ->send(new PasswordMail($password));
        return redirect()-> route('admin.users.index');
    }
}
