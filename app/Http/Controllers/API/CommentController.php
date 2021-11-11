<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;
use Config, File, Validator, DB, URL;
use PhpParser\Node\Expr\AssignOp\Concat;

class CommentController extends Controller
{
    public function add(Request $request){
        try{
            $validator = Validator::make($request->all(),[
                'user_id' => 'required',
                'name' => 'required',
                'status_id' => 'required'
            ]);

            if($validator->fails()){
                $errs = $validator->errors()->first();
                $response = ['code' => 201, 'message' => $errs];
                return response()->json($response);
            }

            $Comment = new Comment();
            $Comment->status_id =  $request->status_id; // image or video
            $Comment->user_id =  $request->user_id;
            $Comment->name = $request->name;
            $Comment->status = 1;

            if($Comment->save()){
                $success_res = ['code' => 200, 'message' => "success"];
                return response()->json($success_res);
            }else{
                $success_res = ['code' => 400, 'message' => "Error"];
                return response()->json($success_res);
            }
        }
        catch(\Exception $e){
            $err_res = ['code' => 400, 'message' =>  $e->getMessage()];
            return response()->json($err_res);
        }
    }

    public function get(Request $request)
    {
        try{

            $StatusimageUrl = URL::asset('/images');
            $userImageUrl = URL::asset('/images/user');
            $status = Comment::select('*')
            ->with(array('user' => function($query)use($userImageUrl) {
                $query->select('*', DB::raw('CONCAT("'.$userImageUrl.'","/", image) as image'));
            },'status' => function($query)use($StatusimageUrl) {
                $query->select('*', DB::raw('CONCAT("'.$StatusimageUrl.'","/", url) as url'));
            }))->paginate();
            $err_res = ['code' => 200, 'message' =>  'Get Message Successfully', 'result'=>$status];
            return response()->json($err_res);
        }
        catch(\Exception $e){
            $err_res = ['code' => 400, 'message' =>  $e->getMessage()];
            return response()->json($err_res);
        }
    }
}