@extends('inc.main')
@section('content')  
<div class="row m-0">
        <div class="col-sm-12">
                <div class="white-box">
                    @if(session()->has('success'))
                        <div class="alert alert-success fade in">
                        {{ session()->get('success') }}
                        </div>
                    @endif
                    @if(session()->has('error'))
                        <div class="alert alert-danger fade in">
                        {{ session()->get('error') }}
                        </div>
                    @endif
                    <h3 class="box-title m-b-0">Purchase Requests</h3>
                    <p class="text-muted m-b-30">Export data to Copy, CSV, Excel, PDF & Print</p>
                    <div class="table-responsive">
                        <table id="example23" class="display nowrap" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>SI#</th> 
                                    <th>Date</th>                                  
                                    <th>Title</th>
                                    <th>Quantity</th>
                                    <th>Description</th> 
                                    <th>User</th>                                    
                                    <th>Action</th>                                  
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>SI#</th>
                                    <th>Date</th>                                   
                                    <th>Title</th>
                                    <th>Quantity</th>
                                    <th>Description</th> 
                                    <th>User</th>                                     
                                    <th>Action</th>           
                                </tr>
                            </tfoot>
                            <tbody>
                               
                                @foreach ($purchase_requests as $key => $purchase_request)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>  
                                    <td>{{ date('d-m-Y', strtotime($purchase_request->created_at)) }}</td>                                  
                                    <td>{{ $purchase_request->title }}</td>
                                    <td>{{ $purchase_request->quantity }}</td>
                                    <td>{{ $purchase_request->description }}</td>  
                                    <td>{{ $purchase_request->user->name }}</td>                                    
                                    <td>
                                        <a class="btn btn-info showBtn" data-id="{{ $purchase_request->id }}" >Show</a>
                                        <a class="btn btn-primary" href="{{ route('purchase_request.edit',$purchase_request->id) }}">Edit</a>
                                        <form action="{{ route('purchase_request.destroy', $purchase_request->id) }}" method="POST" style="display: inline-block">
                                        
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}

                                            <button type="submit" id="delete-task-{{ $purchase_request->id }}" class="btn btn-danger">
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


  
