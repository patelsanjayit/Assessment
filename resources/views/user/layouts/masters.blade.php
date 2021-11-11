@include('user.layouts.header',['title'=>$title??''])

        @include('user.layouts.header')
            @include('user.layouts.sidebar')
            <!-- Content Wrapper. Contains page content -->
  			<div class="content-wrapper">
            @include('user.layouts.contenct')
              <!-- /.content -->
  			</div>
        </div>
        @include('user.layouts.footer')
        @stack('scripts')
