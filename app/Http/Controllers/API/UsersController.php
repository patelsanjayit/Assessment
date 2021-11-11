<?php
namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Validator;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function update(Request $request){
        try{


            $validator = Validator::make($request->all(),[
                'id' => 'required',
                'name' => 'required|min:2',
                'mobile' => 'required|min:2'  

            ]);

            if($validator->fails()){
                $errs = $validator->errors()->first();
                $response = ['code' => 201, 'message' => $errs];
                return response()->json($response);
            }

            $User = User::where('id',$request->id)->first();
        
            if(isset($User->id)){
                $User->mobile =  $request->mobile??0;         
                $User->name = $request->name;

                if($User->save()){
                    $success_res = ['code' => 200, 'message' => "success"];
                    return response()->json($success_res);
                }else{
                    $success_res = ['code' => 400, 'message' => "Error"];
                    return response()->json($success_res);
                }
            }else
            {
                $success_res = ['code' => 400, 'message' => "User not found please enter valid id."];
                return response()->json($success_res);
            }

        }
        catch(\Exception $e){
            $err_res = ['code' => 400, 'message' =>  $e->getMessage()];
            return response()->json($err_res);
        }
    }   
}