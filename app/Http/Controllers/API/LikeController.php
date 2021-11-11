<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Like;
use Config, File, Validator, DB, URL;
use PhpParser\Node\Expr\AssignOp\Concat;

class LikeController extends Controller
{
    public function add(Request $request){
        try{
            $validator = Validator::make($request->all(),[
                'user_id' => 'required',
                'status_id' => 'required'
            ]);
           
            if($validator->fails()){
                $errs = $validator->errors()->first();
                $response = ['code' => 201, 'message' => $errs];
                return response()->json($response);
            }
            
            $like = Like::where('user_id',$request->user_id)->where('status_id',$request->status_id)->first();
            if(isset($like->id) && $like->id != '')
            {
               if ($like->delete()) {
                    $success_res = ['code' => 200, 'message' => "unlike success"];
                    return response()->json($success_res);
                } else {
                    $success_res = ['code' => 400, 'message' => "Error"];
                    return response()->json($success_res);
                }
            }else{
                $Like = new Like();
                $Like->status_id =  $request->status_id;
                $Like->user_id =  $request->user_id;
                if ($Like->save()) {
                    $success_res = ['code' => 200, 'message' => "add like success"];
                    return response()->json($success_res);
                } else {
                    $success_res = ['code' => 400, 'message' => "Error"];
                    return response()->json($success_res);
                }
            }
        }
        catch(\Exception $e){
            $err_res = ['code' => 400, 'message' =>  $e->getMessage()];
            return response()->json($err_res);
        }
    }
}