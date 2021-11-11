<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Validator;
use Illuminate\Support\Facades\Hash;
use DataTables;

class UserController extends Controller
{
    public function index(){
        return view('admin.user.index');
    }

    public function data(Request $request){
        if ($request->ajax()) {
            $data = User::select('*');
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                        $btn = '<a href="'.route("editUser",$row->id).'" class="edit btn btn-primary btn-sm"><span class="fa fa-edit"></span></a> ';
                        $btn .= '<a href="'.route("deleteUser",$row->id).'" onclick="return confirm(\'Are you sure you want to delete this item\')" class="delete btn btn-primary btn-sm"><span class="fa fa-trash-o"></span></a>';
                        return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.user.index');
    }

    public function add(){
        return view('admin.user.add');
    }

    public function save(Request $request)
    {

        $validator = Validator::make($request->all(),[
            'email' => 'required|unique:users',
            'name' => 'required|min:2',
            'mobile' =>'required'
        ]);

        if($validator->fails()){
            $errs = $validator->errors()->first();
            $response = ['code' => 201, 'message' => $errs];

            return back()->with('error', $errs);
        }

        $user = new User();
        $user->name = $request->name;
        $user->user_name = uniqid();
        $user->avatar = '';
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->mobile = $request->mobile;

        if($user->save())
        {
            \Session::put('success','User add successfully!!');
            return redirect()->route('user');
        }else
        {
            return back()->with('error','your username and password are wrong.');
        }
    }

    public function edit(Request $request,$id)
    {
        $user = User::where('id', $id)->first();
        return view('admin.user.edit',['result'=>$user]);
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'email' => 'required|unique:users,email,'.$request->id.'',
            'name' => 'required|min:2',
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
                return redirect()->route('user');
            } else {
                return back()->with('error', 'your username and password are wrong.');
            }
        }
    }

    public function delete($id)
    {
        $user =  User::where('id',$id)->first();
        if ($user->delete()) {
            \Session::put('success', 'User Delete successfully!!');
            return redirect()->route('user');
        } else {
            return back()->with('error', 'Error');
        }
    }
}