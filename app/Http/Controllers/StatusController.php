<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Status;
use Validator;
use Illuminate\Support\Facades\Hash;
use DataTables, URL, DB;

class StatusController extends Controller
{
    public function index(Request $request){

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
        },
        'like'
        ))->get();

        return view('admin.status.index',['result'=>$status]);
    }

    public function getStatus($id)
    {
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
        },
        'like'
        ))->where('id',$id)->first();

        return view('admin.status.detail',['result'=>$status]);
    }
}