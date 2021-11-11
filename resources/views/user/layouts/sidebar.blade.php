<!-- start:Left Menu -->
 <?php $auth =Auth::guard('user')->user();?>
<div id="left-menu">
    <div class="sub-left-menu scroll">
      <ul class="nav nav-list">
          <li class="time">
            <h1 class="animated fadeInLeft">21:00</h1>
            <p class="animated fadeInRight">Sat,October 1st 2029</p>
          </li>
          <li class="{{ request()->is('admin/dashboard') ? 'alert-info' : '' }}"><a href="{{route('dashboard')}}"><span class="fa-home fa"></span>Dashboard</a></li>
          <li class="{{ request()->is('admin/user') ? 'alert-info' : '' }}"><a href="{{route('profile',$auth->id)}}"><span class="fa-user fa"></span>Profile Update</a></li>
          <li><a href="{{route('adminLogout')}}"><span class="fa fa-lock"></span>Logout</a></li>
        </ul>
      </div>
  </div>
<!-- end: Left Menu -->
