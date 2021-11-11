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
        <div class="panel box-shadow-none content-header">
           <div class="panel-body">
             <div class="col-md-12">
                 <h3 class="animated fadeInLeft">Users</h3>
                 <p class="animated fadeInDown">
                    <a href="{{route('dashboard')}}"><span class="fa-home fa"></span></a> <span class="fa-angle-right fa"></span> users
                 </p>
             </div>
           </div>
       </div>
       <div class="col-md-12 top-20 padding-0">
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-heading">
                        <span>
                            <h3>
                                <a href="{{route('addUser')}}" class="btn btn-primary btn-sm">Add</a>
                            </h3>
                        </span>
                    </div>
                    <div class="panel-body">
                        <div class="responsive-table">
                            <table id="datatables-user" class="table table-striped table-bordered" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th width="50px">No</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th width="200px">Action</th>
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
            var table = $('#datatables-user').DataTable({
                "responsive": true,
                "autoWidth": false,
                lengthMenu: [ [10, 25, 50, -1], [10, 25, 50, 'All'] ],
                processing: true,
                serverSide: true,
                order: [ [0, 'desc'] ],
                ajax: "{{ route('userData') }}",
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'name', name: 'name'},
                    {data: 'email', name: 'email'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });
        });
    </script>
@endpush
