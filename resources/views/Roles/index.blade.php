@extends('inc.main')
@section('content') 
<div class="container-fluid">    
<div class="row m-0">
        <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title m-b-0">Roles</h3>
                    <p class="text-muted m-b-30">Export data to Copy, CSV, Excel, PDF & Print</p>
                    <div class="table-responsive">
                        <table id="example23" class="display nowrap" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Action</th>                                 
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Action</th>        
                                </tr>
                            </tfoot>
                            <tbody>

                                @foreach ($roles as $key => $role)
                                <tr>
                                <td>{{ ++$i }}</td>
                                    <td>{{ $role->display_name }}</td>
                                    <td>{{ $role->description }}</td>
                                    <td>
                                        <a class="btn btn-info" href="{{ route('roles.show',$role->id) }}">Show</a>
                                        <a class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}">Edit</a>

                                        <form action="{{ url('admin/roles/'.$role->id) }}" method="POST" style="display: inline-block">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}

                                            <button type="submit" id="delete-task-{{ $role->id }}" class="btn btn-danger">
                                                Delete
                                            </button>
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
@endsection            
