@extends('admin.layouts.masters',['title'=>'Dashboard Management'])
@section('content')
    <!-- start: content -->
    <section class="content-header">
        @if(session()->get('success'))
             <div class="col-12 pull-right">
                 <div class="alert alert-success alert-dismissible fade show elementToFadeInAndOut" role="alert">
                   {{ session()->get('success') }}
               </div>
           </div>
       @elseif(session()->get('error'))
           <div class="col-12 pull-right">
                 <div class="alert alert-danger alert-dismissible fade show elementToFadeInAndOut" role="alert">
                   {{ session()->get('error') }}
               </div>
           </div>
         @endif
    </section>
     <!-- start: Content -->
    <div id="content">
        <div class="panel box-shadow-none content-header">
            <div class="panel-body">
              <div class="col-md-12">
                  <h3 class="animated fadeInLeft">Status Detail</h3>
                  <p class="animated fadeInDown">
                    <a href="{{route('dashboard')}}"><span class="fa-home fa"></span></a> <span class="fa-angle-right fa"></span> Status
                    <span class="fa-angle-right fa"></span> Status Detail
                </p>
              </div>
            </div>
         </div>
        <div class="col-md-12 col-sm-12 profile-v1-wrapper">
            @if($result->type == 'video')
            <video width="320" height="240" controls>
                <source src="{{asset('/assets/img/Sadguru_Swami_Aarti.mp4')}}" type="video/mp4">
          </video>
          @else
            <img style="width:100%" src="{{$result->url}}">
          @endif
        </div>
        <div class="col-md-12 col-sm-12 profile-v1-body">
            <div class="panel box-v7">
                <div class="panel-body">
                    <div class="col-md-12 padding-0 box-v7-header">
                        <div class="col-md-12 padding-0">
                            <div class="col-md-10 padding-0">
                            <img src="{{$result->user->image??''}}" class="box-v7-avatar pull-left" />
                            <h4>{{$result->name}}</h4>
                            <p>{{date('Y-m-d', strtotime($result->created_at))}}</p>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-12 padding-0 box-v7-body">
                        <div class="col-md-12 top-20">
                            <button class="btn">
                            <i class="icon-like icons"></i> {{count($result->like)}}
                            </button>
                            <button class="btn">
                            <i class="icon-bubble icons"></i> {{count($result->comment)}}
                            </button>
                        </div>
                    </div>
                    <div class="col-md-12 padding-0 box-v7-comment">
                        @foreach ($result->comment as $comment)


                        <div class="media">
                            <div class="media-left">
                                <a href="#">
                                <img src="{{$comment->user->image??''}}" class="media-object box-v7-avatar"/>
                                </a>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">{{$comment->user->name??''}}</h4>
                                <p>{{$comment->name}}</p>
                                <a href="">
                                    <i class="icon-calendar icons"></i> {{date('Y-m-d', strtotime($comment->created_at))}}
                                </a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            </div>
         </div>
    </div>
</div>
<button id="mimin-mobile-menu-opener" class="animated rubberBand btn btn-circle btn-danger">
    <span class="fa fa-bars"></span>
</button>
 <!-- end: Mobile -->

@endsection
@push('scripts')

@endpush
