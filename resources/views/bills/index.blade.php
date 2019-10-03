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
                                    <th>Amount</th>
                                    <th>Total Days Est</th> 
                                    <th>Amount/Days</th>                                    
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
                            
                                @foreach ($bills as $key => $bill)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>  
                                    <td>{{ date('d-m-Y', strtotime($bill->created_at)) }}</td>                                  
                                    <td>{{ $bill->title }}</td>
                                    <td>{{ $bill->amount }}</td>
                                    <td>{{ $bill->total_days_est }}</td>  
                                    <td>{{ $bill->amount_per_days }}</td>                                    
                                    <td>
                                        <a class="btn btn-info showBtn" data-id="{{ $bill->id }}" >Show</a>
                                        <a class="btn btn-primary" href="{{ route('bills.edit',$bill->id) }}">Edit</a>
                                        <form action="{{ route('bills.destroy', $bill->id) }}" method="POST" style="display: inline-block">
                                        
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}

                                            <button type="submit" id="delete-task-{{ $bill->id }}" class="btn btn-danger">
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

       <div class="modal fade" id="ajaxModel" aria-hidden="true" >
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="modelHeading"></h4>
                    </div>
                    <div class="modal-body">
                        <table class="table color-table info-table text-center">
                            <thead>
                                <tr>  
                                    <th class="text-center">SI#</th>                                 
                                    <th class="text-center">USER</th>
                                    <th class="text-center">DAYS</th> 
                                    <th class="text-center">AMOUNT</th>                                                                     
                                </tr>
                            </thead>
                            <tbody class="userTbody">
                           
                           
                            </tbody>                            
                        </table>                                         
                    </div>
                </div>    
            </div>
        </div> 
       
@endsection  
@section('scripts')
    <script>
        $(function(){

        $('.showBtn').on('click',function(){
            
            var bill_id = $(this).data('id');   
               
               $.get("{{ route('bills.index') }}" +'/' + bill_id , function (data) { console.log(JSON.stringify(data)); 
                 
                   $('#modelHeading').html("Members");

                   $('#ajaxModel').modal('show'); 

                   $('.userTbody').html('');
               
                   $.each(data,function(index,value){ 

                       $(".userTbody").append('<tr><td>'+(index+1)+'</td><td>'+value.user.name+'</td><td>'+value.days+'</td><td>'+value.amount+'</td></tr>');                      

                   })
                })
            })
        })
    </script>
@stop          


  
