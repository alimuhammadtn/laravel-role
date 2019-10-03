@extends('inc.main')
@section('content') 
<div class="container-fluid">      
    <div class="row m-0">
            <div class="col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Create New Bill</div>

                    <div class="panel-body">
                        <!-- Display Validation Errors -->
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form class="form-horizontal" role="form" method="POST" action="{{ url('admin/bills') }}">
                            {{ csrf_field() }}                          
                            <div class="col-md-8">
                                <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                                    <label for="name" class="col-md-4 control-label">Title</label>

                                    <div class="col-md-8">                                   
                                        <select class="form-control" name="title">
                                            <option value="RENT">RENT</option>
                                            <option value="DEWA">DEWA</option>
                                            <option value="INTERNET">INTERNET</option>
                                            <option value="BOTIM">BOTIM</option>
                                        </select>

                                        @if ($errors->has('title'))
                                            <span class="help-block">
                                            <strong>{{ $errors->first('title') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div> 
                                <div class="form-group{{ $errors->has('amount') ? ' has-error' : '' }}">
                                    <label for="amount" class="col-md-4 control-label">Amount:</label>

                                    <div class="col-md-8">
                                        <input id="amount" type="text" class="form-control" name="amount" value="{{ old('amount') }}"
                                            required autofocus placeholder="0.00">

                                        @if ($errors->has('amount'))
                                            <span class="help-block">
                                            <strong>{{ $errors->first('amount') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                
                                </div>
                               
                                <!---listing users-->
                                <div class="form-group">
                                    <div class="col-md-4">
                                       
                                    </div>
                                    <div class="col-md-4">
                                        <b>MEMBER</b>
                                    </div>
                                    <div class="col-md-2">
                                        <b>DAYS</b>
                                    </div>
                                    <div class="col-md-2">
                                        <b>AMOUNT</b>
                                    </div>
                                </div>
                                @foreach ($users as $key => $user)
                                <div class="form-group{{ $errors->has('members') ? ' has-error' : '' }}"> 
                                    <div class="col-md-4">
                                    </div>                                       
                                    <div class="col-md-4"> 
                                         <input type="hidden"  name="bill_users[]" value=" {{$key}} ">                                    
                                         {{$user}}                                                                        
                                    </div>
                                    <div class="col-md-2">                                       
                                        <input type="text" data-each-user-days="{{ $loop->iteration }}" class="form-control each_user_days" placeholder="0" name="each_days[]">                                                                     
                                    </div>
                                    <div class="col-md-2">                                       
                                        <input type="text" data-each-user-amount="{{ $loop->iteration }}" class="form-control each_user_amount" readonly placeholder="0.00" name="each_amount[]">                                                                     
                                    </div>
                                </div>
                                @endforeach     
                                <!---close user listing-->               

                                <div class="form-group">
                                    <div class="col-md-8 col-md-offset-4">
                                        <button type="submit" class="btn btn-primary">
                                            Save
                                        </button>

                                        <a class="btn btn-link" href="{{ url('admin/roles') }}">
                                            Cancel
                                        </a>
                                    </div>
                                </div>
                            </div> 
                            <div class="col-md-4">
                                <!---start here second col-->
                                <div class="form-group">
                                    <label for="total_days" class="col-md-6 control-label">Total Days Estmtd:</label>
                                    <div class="col-md-6">
                                        <input id="total_days_est" type="text" class="form-control disabled" readonly name="total_days_est" value="{{ old('total_days_est') }}" placeholder="0">
                                    </div>
                                </div>                            
                           
                                <div class="form-group">
                                    <label for="amount_per_days" class="col-md-6 control-label">Amount/Day:</label>
                                            <div class="col-md-6">
                                                <input type="text" id="amount_per_days" class="form-control disabled" readonly name="amount_per_days" value="{{ old('amount_per_days') }}" placeholder="0.00">
                                            </div>
                                    </div>
                                </div>
                                <!---close second col--->
                            </div> 
                        </form>

                    </div>
                </div>
            </div>
        </div>
</div>    
@endsection
@section('scripts')
    <script>
        $(function(){  

            //jQuery('.mydatepicker, #datepicker').datepicker();
            $('#datepicker').datepicker({
                    format: 'dd/mm/yyyy',
            }).on('changeDate', function(e){
                $(this).datepicker('hide');
            });
            //bill calculation
            $('.each_user_days').on('keyup',function(){           
                calculate()                
            })
            $('#amount').on('keyup',function(){           
                calculate()                
            })

            function calculate(){
                
                var amount = $('#amount').val();

                //sum of days column of each user
                var each_user_days_sum = 0;

                $('.each_user_days').each(function(){

                        each_user_days_sum +=  parseInt(this.value) || 0;                    

                }); 

                if(each_user_days_sum){ 

                var amount_per_day = (amount/each_user_days_sum).toFixed(3);                 

                    $('#total_days_est').val(each_user_days_sum);

                    $('#amount_per_days').val(amount_per_day); 

                    if(amount_per_day)  
                    {
                        $('.each_user_days').each(function(){
                            
                            var each_user_column_id = $(this).attr('data-each-user-days');

                            var each_user_days = $(this).val();                        

                                var amount_per_user = (each_user_days*amount_per_day).toFixed(2);
                                
                                $('.each_user_amount[data-each-user-amount="'+each_user_column_id+'"]').val(amount_per_user);
                            
                        });  

                    } 
                }
            }

        });
    </script>
@stop 