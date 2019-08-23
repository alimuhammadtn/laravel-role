@extends('inc.main')
@section('content')  
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
                                    <th>Title</th>
                                    <th>Description</th>                                    
                                    <th>Action</th>                                  
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>SI#</th>
                                    <th>Title</th>
                                    <th>Description</th>                                    
                                    <th>Action</th>       
                                </tr>
                            </tfoot>
                            <tbody>

                                @foreach ($transactions as $key => $transaction)
                                <tr>
                                <td>{{ ++$i }}</td>
                                    <td>{{ $transaction->title }}</td>
                                    <td>{{ $transaction->description }}</td>                                    
                                    <td>
                                        <a class="btn btn-info" href="{{ route('transactions.show',$transaction->id) }}">Show</a>
                                        <a class="btn btn-primary" href="{{ route('transactions.edit',$transaction->id) }}">Edit</a>

                                        <form action="{{ url('admin/transactions/'.$transaction->id) }}" method="POST" style="display: inline-block">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}

                                            <button type="submit" id="delete-task-{{ $transaction->id }}" class="btn btn-danger">
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
@endsection            
