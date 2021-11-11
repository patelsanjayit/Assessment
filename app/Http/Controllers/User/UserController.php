<?php
namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Status;
use App\Models\Comment;
use Validator;
use Illuminate\Support\Facades\Hash;
use Auth;

class UserController extends Controller
{
    public function dashboard()
    {
        $user  = User::get()->count();
        $data['user'] = $user;
        return view('user.dashboard',['result'=>$data]);
    }

    public function profile(Request $request,$id)
    {
        $user = User::where('id', $id)->first();
        return view('user.user.profile',['result'=>$user]);
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'email' => 'required|unique:users,email,'.$request->id.'',
            'name' => 'required|min:4|max:20',
            'mobile' =>'required'
        ]);

        if($validator->fails()){
            $errs = $validator->errors()->first();
            $response = ['code' => 201, 'message' => $errs];
            return back()->with('error', $errs);
        }

        $user = User::where('id',$request->id)->first();
        if (isset($user->id)) {
            $user->name = $request->name;
            $user->email = $request->email;
            $user->mobile = $request->mobile;
            if ($user->save()) {
              
                \Session::put('success', 'User update successfully!!');

                return redirect()->route('user-dashboard');
            } else {
                return back()->with('error', 'your username and password are wrong.');
            }
        }
    }
}