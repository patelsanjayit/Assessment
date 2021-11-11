@extends('user.layouts.masters',['title'=>'Dashboard Management'])
@section('content')
    <!-- start: content -->

    <div id="content">
        <section class="content-header">
            @if(session()->get('success'))
                 <div class="col-12 ">
                     <div class="alert alert-success alert-dismissible show elementToFadeInAndOut" role="alert">
                       {{ session()->get('success') }}
                       {{session()->forget('success');}}
                   </div>
               </div>
           @elseif(session()->get('error'))
               <div class="col-12">
                     <div class="alert alert-danger alert-dismissible  show elementToFadeInAndOut" role="alert">
                       {{ session()->get('error') }}
                       {{session()->forget('error');}}
                   </div>
               </div>
             @endif
        </section>
        <div class="col-md-12" style="padding:20px;">
              <div class="col-md-12 padding-0">
                  <div class="col-md-12 padding-0">
                      <div class="col-md-12 padding-0">
                        <div class="col-md-4">
                            <div class="panel box-v1">
                              <div class="bg-dark-red panel-heading bg-white border-none">
                                <div class="col-md-6  text-white col-sm-6 col-xs-6 text-left padding-0">
                                  <h4 class="text-left">Users</h4>
                                </div>
                                <div class="col-md-6  text-white col-sm-6 col-xs-6 text-right">
                                   <h4>
                                   <span class="icon-bubble icons icon text-right"></span>
                                   </h4>
                                </div>
                              </div>
                              <div class="bg-dark-red panel-body  text-white text-center">
                                <h1>{{$result['user']}}</h1>
                                <p>Users</p>
                                <hr/>
                              </div>
                            </div>
                        </div>
                      </div>
                  </div>
              </div>
        </div>
    </div>
    <!-- end: content -->
</div>
<button id="mimin-mobile-menu-opener" class="animated rubberBand btn btn-circle btn-danger">
  <span class="fa fa-bars"></span>
</button>
 <!-- end: Mobile -->

@endsection
@push('scripts')
@endpush
