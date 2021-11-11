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
                 <h3 class="animated fadeInLeft">Status</h3>
                 <p class="animated fadeInDown">
                    <a href="{{route('dashboard')}}"><span class="fa-home fa"></span></a> <span class="fa-angle-right fa"></span> Status
                 </p>
             </div>
           </div>
        </div>
        <div class="col-md-12 top-20 padding-0">
            <div class="col-md-12">
                <div class="row">
                    @foreach ($result as $row)
                    <div class="col-sm-6 col-md-3 product-grid">
                        <div class="thumbnail">
                            <img src="{{$row->url}}" alt="...">
                            <a href="{{route('getStatus', ['id' => $row->id])}}">
                                <div class="caption">
                                    <h4><span class="fa fa-user"></span> {{$row->user->name??''}}</h4>
                                    <small>{{ Str::ucfirst($row->name)}}</small>
                                    <small class="pull-right">
                                        <span class="fa fa-thumbs-o-up"> {{count($row->like)}} </span>
                                        <span class="fa fa-comment-o"> {{count($row->comment)}}</span>
                                    </small>
                                </div>
                            </a>
                        </div>
                    </div>
                    @endforeach
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
