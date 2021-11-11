<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta name="description" content="Laravel demo Sanjay Patel - patelsanjay.it@gmail.com">
  <meta name="author" content="Sanjay Patel - patelsanjay.it@gmail.com">
  <meta name="title" content="User Login Sanjay Patel - patelsanjay.it@gmail.com">
  <meta name="keyword" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>User Login </title>
  <!-- start: Css -->
  <link rel="stylesheet" type="text/css" href="{{asset('/assets/css/bootstrap.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('/assets/css/plugins/font-awesome.min.css')}}"/>
  <link rel="stylesheet" type="text/css" href="{{asset('/assets/css/plugins/simple-line-icons.css')}}"/>
  <link rel="stylesheet" type="text/css" href="{{asset('/assets/css/plugins/animate.min.css')}}"/>
  <link rel="stylesheet" type="text/css" href="{{asset('/assets/css/plugins/icheck/skins/flat/aero.css')}}"/>
  <link href="{{asset('/assets/css/style.css')}}" rel="stylesheet">
  <!-- end: Css -->
    </head>
    <body id="mimin" class="dashboard form-signin-wrapper">
      <div class="container">
        <form class="form-signin" autocomplete="off" action="{{ route('userLoginPost') }}" method="POST">
          <div class="panel periodic-login page-header">
            @if(\Session::get('success'))
            <div class="alert alert-success alert-dismissible  show" role="alert">
                {{ \Session::get('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
                </button>
            </div>
            @endif
            {{ \Session::forget('success') }}
            @if(\Session::get('error'))
            <div class="alert alert-danger alert-dismissible  show" role="alert">
                {{ \Session::get('error') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
                </button>
            </div>
            @endif
              <div class="panel-body text-center">

                  <p class="element-name">Assessment</p>
                  {!! csrf_field() !!}
                  <div class="form-group form-animate-text" style="margin-top:40px !important;">
                    <input type="text" name="email" value="sanjay@gmail.com" class="form-text" required  autocomplete="off">
                    <span class="bar"></span>
                    <label>Username</label>
                  </div>
                  <div class="form-group form-animate-text" style="margin-top:40px !important;">
                    <input type="password" name="password" value="123456" class="form-text" required  autocomplete="off">
                    <span class="bar"></span>
                    <label>Password</label>
                  </div>
                  <button type="submit" class="btn col-md-12">Log in</button>

              </div>
          </div>
        </form>
      </div>

      <!-- end: Content -->
      <!-- start: Javascript -->
      <script src="{{asset('/asset/js/jquery.min.js')}}"></script>
      <script src="{{asset('/asset/js/jquery.ui.min.js')}}"></script>
      <script src="{{asset('/asset/js/bootstrap.min.js')}}"></script>
      <script src="{{asset('/asset/js/plugins/moment.min.js')}}"></script>
      <script src="{{asset('/asset/js/plugins/icheck.min.js')}}"></script>
      <!-- custom -->
      <script src="{{asset('/asset/js/main.js')}}"></script>
     <!-- end: Javascript -->
   </body>
   </html>
