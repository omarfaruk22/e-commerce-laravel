@extends('backend.master_template.backend_template')
@section('styles')
<!-- Start datatable css -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">

@endsection
@section('content')

<div class="br-pagetitle">
    <i class="icon ion-ios-home-outline"></i>
    <div>
      <h4>Role & Permission Page</h4>
      <p class="mg-b-0">Manage Role</p>
    </div>
</div>

      <div class="br-pagebody">
        <div class="roles">
      <div class="row">
          <div class="col-md-12"> 
            @include('backend.includes.message')  
            <div class="card">
            <div class="card-body">
                <h4 class="header-title float-left">Roles List</h4>
                <p class="float-right mb-2">
             
                        <a class="btn btn-primary text-white" href="{{ route('rolecreate') }}">Create New Role</a>
                   
                </p>
                <div class="clearfix"></div>
                <div class="data-tables">
                    <table id="dataTable" class="text-center ">
                        <thead class="bg-light text-capitalize">
                            <tr>
                                <th width="5%">Sl</th>
                                <th width="10%">Name</th>
                                <th width="60%">Permissions</th>
                                <th width="15%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                           @foreach ($roles as $role)
                           <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td>{{ $role->name }}</td>
                                <td>
                                    @foreach ($role->permissions as $perm)
                                        <span class="badge badge-info mr-1">
                                            {{ $perm->name }}
                                        </span>
                                    @endforeach
                                </td>
                                <td>
                                 
                                        <a class="btn btn-success text-white" href="{{route('roleedit',$role->id )}}">Edit</a>
                                   

                                        <a class="btn btn-danger text-white" href="{{route('roledelete',$role->id)}}"
                                        onclick="event.preventDefault(); document.getElementById('delete-form-{{ $role->id }}').submit();">
                                            Delete
                                        </a>

                                        <form id="delete-form-{{ $role->id }}" action="{{route('roledelete',$role->id)}}" method="POST" style="display: none;">
                                            @method('DELETE')
                                            @csrf
                                        </form>
                                   
                                </td>
                            </tr>
                           @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
          </div>
            </div>
          </div>
        </div>
      </div><!-- br-pagebody -->
      
@endsection
@section('scripts')
<!-- Start datatable js -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
<script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>

<script>
    /*================================
   datatable active
   ==================================*/
   if ($('#dataTable').length) {
            $('#dataTable').DataTable({
                responsive: true,
                "pagingType": "simple_numbers",
            "language": {
                "paginate": {
                    "previous": '<i class="fa fa-angle-left" style="color: #27c2a5"></i>',
                    "next": '<i class="fa fa-angle-right" style="color: #27c2a5"></i>'
                }
            }
            });
        }

</script>
@endsection