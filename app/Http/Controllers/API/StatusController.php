<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Status;
use Config, File, Validator, DB, URL;
use PhpParser\Node\Expr\AssignOp\Concat;

class StatusController extends Controller
{
    public function add(Request $request){
        try{

            $validator = Validator::make($request->all(),[
                'user_id' => 'required',
                'name' => 'required',
                'type' => 'required', // image or video
                'url' => 'required'
            ]);

            if($validator->fails()){
                $errs = $validator->errors()->first();
                $response = ['code' => 201, 'message' => $errs];
                return response()->json($response);
            }

            $status = new Status();
            $status->type =  $request->type; // image or video
            $status->user_id =  $request->user_id;
            $status->name = $request->name;
            $status->status = 1;
            $images = $this->ImageUploadStore($request->url,'images');
            $status->url = $images;
            if($status->save()){
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
            $validator = Validator::make($request->all(),[
                'user_id' => 'required'
            ]);
            if($validator->fails()){
                $errs = $validator->errors()->first();
                $response = ['code' => 201, 'message' => $errs];
                return response()->json($response);
            }
            $StatusimageUrl = URL::asset('/images');
            $userImageUrl = URL::asset('/images/user');

            $status = Status::select('*', DB::raw('CONCAT("'.$StatusimageUrl.'","/", url) as url'))
            ->with(array('user' => function($query)use($userImageUrl) {
                $query->select('*', DB::raw('CONCAT("'.$userImageUrl.'","/", image) as image'));
            },
            'comment'=> function($query)use($userImageUrl) {
                $query->select('*')
                ->with(array('user' => function($query)use($userImageUrl) {
                    $query->select('*', DB::raw('CONCAT("'.$userImageUrl.'","/", image) as image'));
                }));
            }
            ))->paginate();

            $err_res = ['code' => 200, 'message' =>  'Get Message Successfully', 'result'=>$status];
            return response()->json($err_res);
        }
        catch(\Exception $e){
            $err_res = ['code' => 400, 'message' =>  $e->getMessage()];
            return response()->json($err_res);
        }
    }
}