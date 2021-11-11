<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="utf-8">
	<meta name="description" content="Miminium Admin Template v.1">
	<meta name="author" content="Isna Nur Azis">
	<meta name="keyword" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Assessment</title>

    <!-- start: Css -->
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/css/bootstrap.min.css')}}">
    <!-- plugins -->
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/css/plugins/font-awesome.min.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/js/plugins/summernote/dist/summernote-bs3.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/js/plugins/summernote/dist/summernote.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/css/plugins/simple-line-icons.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/css/plugins/datatables.bootstrap.min.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/css/plugins/animate.min.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/css/plugins/fullcalendar.min.css')}}"/>
    <link href="{{asset('/assets/css/style.css')}}" rel="stylesheet">
     <!-- end: Css -->

    <?php $app = URL::asset('/images/app').'/'.session()->get('app_logo');?>

	<link rel="shortcut icon" href="{{$app}}">

  </head>

 <body id="mimin" class="dashboard">
        <?php $auth =Auth::guard('admin')->user();?>
        <!-- start: Header -->
        <nav class="navbar navbar-default header navbar-fixed-top">
          <div class="col-md-12 nav-wrapper">
            <div class="navbar-header" style="width:100%;">
                <a href="{{route('dashboard')}}" class="navbar-brand">
                 <b>{{session()->get('app_name');}}</b>
                </a>

                <ul class="nav navbar-nav navbar-right user-nav">
                  <li class="user-name"><span>{{ Str::ucfirst($auth->name)}}</span></li>
                  <li class="dropdown avatar-dropdown">
                    <img src="{{asset('/assets/img/avatar.jpg')}}" class="img-circle avatar" alt="user name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"/>
                      <ul class="dropdown-menu user-dropdown">
                        <li><a href="{{route('adminLogout')}}"><span class="fa fa-user"></span> &nbsp; Logout </a></li>
                      </ul>
                  </li>
                </ul>
            </div>
          </div>
        </nav>
      <!-- end: Header -->
      <div class="container-fluid mimin-wrapper">


