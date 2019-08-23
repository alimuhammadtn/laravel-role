@extends('inc.main')
@section('content')  
<div class="container-fluid">   
<div class="row m-0">
        <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title m-b-0">Users</h3>
                    <p class="text-muted m-b-30">Export data to Copy, CSV, Excel, PDF & Print</p>
                    <div class="table-responsive">
                        <table id="example23" class="display nowrap" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>SI#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th> 
                                    <th>Action</th>                                  
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>SI#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th> 
                                    <th>Action</th>        
                                </tr>
                            </tfoot>
                            <tbody>

                                @foreach ($users as $key => $user)
                                <tr>
                                <td>{{ ++$i }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        @if(!empty($user->roles))
                                            @foreach($user->roles as $role)
                                                <label class="label label-success">{{ $role->display_name }}</label>
                                            @endforeach
                                        @endif
                                    </td>
                                    <td>
                                        <a class="btn btn-info" href="{{ route('users.show',$user->id) }}">Show</a>
                                        <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Edit</a>

                                        <form action="{{ url('admin/users/'.$user->id) }}" method="POST" style="display: inline-block">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}

                                            <button type="submit" id="delete-task-{{ $user->id }}" class="btn btn-danger">
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
