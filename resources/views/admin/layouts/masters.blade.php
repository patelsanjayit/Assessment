@include('admin.layouts.header',['title'=>$title??''])

        @include('admin.layouts.header')
            @include('admin.layouts.sidebar')
            <!-- Content Wrapper. Contains page content -->
  			<div class="content-wrapper">
            @include('admin.layouts.contenct')
              <!-- /.content -->
  			</div>
        </div>
        @include('admin.layouts.footer')
        @stack('scripts')
