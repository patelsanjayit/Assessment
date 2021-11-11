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
                 <h3 class="animated fadeInLeft">Comment</h3>
                 <p class="animated fadeInDown">
                    <a href="{{route('dashboard')}}"><span class="fa-home fa"></span></a> <span class="fa-angle-right fa"></span> Comment
                 </p>
             </div>
           </div>
       </div>
       <div class="col-md-12 top-20 padding-0">
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-heading"><h3>Comment</h3></div>
                    <div class="panel-body">
                        <div class="responsive-table">
                            <table id="datatables-comment" class="table table-striped table-bordered" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th width="50px">No</th>
                                        <th>Name</th>
                                        <th width="100px">Action</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
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
    <script type="text/javascript">
        $(function () {
            var table = $('#datatables-comment').DataTable({
                "responsive": true,
                "autoWidth": false,
                lengthMenu: [ [10, 25, 50, -1], [10, 25, 50, 'All'] ],
                processing: true,
                serverSide: true,
                order: [[0, 'desc']],
                ajax: "{{ route('commentData') }}",
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'name', name: 'name'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });
        });
    </script>
@endpush
