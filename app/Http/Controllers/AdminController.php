<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Status;
use App\Models\Comment;
use Validator;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function dashboard()
    {
        $user  = User::get()->count();
       

        $data['user'] = $user;

        return view('admin.dashboard',['result'=>$data]);
    }
}