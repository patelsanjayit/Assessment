@extends('admin.layouts.masters',['title'=>'Dashboard Management'])
@section('content')
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
        <div class="col-md-12 top-20 padding-0">
            <div class="col-md-12">
                <div class="panel">
                    <div class="col-md-12">
                        <div class="col-md-12 panel">
                          <div class="col-md-12 panel-heading">
                            <h4>Edit Users</h4>
                          </div>
                          <div class="col-md-12 panel-body" style="padding-bottom:30px;">
                            <div class="col-md-12">
                                <form class="cmxform" autocomplete="off"  id="updateUser" action="{{ route('updateUser') }}" method="post">

                                <div class="col-md-6">
                                    <div class="form-group form-animate-text" style="margin-top:40px !important;">
                                        <input type="text"  class="form-text" value="{{$result->name}}"  name="name" required>
                                        <span class="bar"></span>
                                        <label>Name</label>
                                    </div>

                                    <div class="form-group form-animate-text" style="margin-top:40px !important;">
                                        <input type="text"   class="form-text" value="{{$result->email}}" name="email" required>
                                        <span class="bar"></span>
                                        <label>Email</label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group form-animate-text" style="margin-top:40px !important;">
                                        <input type="text"   class="form-text"  value="{{$result->mobile}}"  name="mobile" required>
                                        <span class="bar"></span>
                                        <label>Mobile</label>
                                    </div>
                                    <div class="form-group form-animate-text" style="margin-top:40px !important;">
                                        <input type="password" autocomplete="off" value=""   class="form-text" id="password" name="password" >
                                        <span class="bar"></span>
                                        <label>Password</label>
                                    </div>

                                    <input type="hidden"  value="{{$result->id}}"  name="id" >
                                </div>
                                <div class="col-md-12">
                                    {!! csrf_field() !!}
                                    <input class="submit btn btn-info" type="submit" value="Submit">
                                    <a href="{{ route('user') }}" class=" btn btn-group" > Cancel </a>
                                </div>
                                </form>
                            </div>
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
<script>
    $(document).ready(function(){
        $("#updateUser").validate({
        errorElement: "em",
        errorPlacement: function(error, element) {
            $(element.parent("div").addClass("form-animate-error"));
            error.appendTo(element.parent("div"));
        },
        success: function(label) {
            $(label.parent("div").removeClass("form-animate-error"));
        },
        rules: {
            name: {
                required: true,
                minlength: 2
            },
            email: {
                required: true,
                email: true
            },
            mobile: {
                required: true,
                number: true
            }
        },
        messages: {
            name: {
                required: "Please enter your name",
                minlength: "Your name must be at least 2 characters long"
            },
            email: "Please enter a valid email address",
            mobile: "Please enter a mobile"
        }
        });
  });
</script>
@endpush
