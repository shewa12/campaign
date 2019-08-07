@extends('admin.master')

@section('content')
    <div class="right_col" role="main">

    <div class="row">
        <!--flass message-->
        @if (count($errors) > 0)
            <div class="alert alert-danger">
              <a class='close' data-dismiss='alert'>×</a>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif        
        @if(Session::has('success'))
            <div class="alert alert-success">
              <a class='close' data-dismiss='alert'>×</a>
                <h4>{!!Session::get('success')!!}</h4>
            </div>
        @endif        

        @if(Session::has('fail'))
            <div class="alert alert-danger">
                <h4>{!!Session::get('fail')!!}</h4>
            </div>
        @endif
        
        </div>     
        <!--end flass message-->
        <div class="clearfix"></div>
        <!--body-->
        <div class="row">
          <div class="panel-default panel">
            <div class="panel-heading">
              <strong>Keyword</strong>
            </div>

            <div class="panel-body">
              <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>Keyword</th>
                        <th>Sale Needed</th>
                        <th>Product on Page</th>
                        <th>Duration</th>
                        <th>Sales Completed</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>

                      <tr>
                        <td>{{$keyword->keyword}}</td>
                        <td>{{$keyword->perday_sale}}</td>
                        <td>{{$keyword->product_page}}</td>
                        <td>{{$keyword->duration}} Day</td>
                        <td>{{$saleCount}}</td>
                        <td>
                          @if($keyword->perday_sale*$keyword->duration==$saleCount)
                            <button class="btn btn-sm btn-success">Completed</button>
                          @else
                             <button class="btn btn-sm btn-warning">Inprogress</button>
                          @endif   
                        </td>

                      </tr>

                    </tbody>
                </table>
                
              </div>
            </div>
          </div>
          <!--progress detail-->
          <div class="panel-default panel">
            <div class="panel-heading">
              <strong>Sales Status for above keyword</strong>
            </div>

            <div class="panel-body">
              <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>Sl No:</th>
                        
                        <th>Date</th>
                        <th>Timestamps</th>
                        <th>Order No</th>
                        <th>Person name</th>
                        <th>Email</th>
                        <th>Paypal Info</th>
                        <th>Note</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i=1;?>  
                    @forelse($progress as $p)  
                      <tr>
                        <td>{{$i++}}</td>
                        <td>{{$p->date}}</td>
                        <td>{{$p->sale_datetime}}</td>
                        <td>{{$p->person_name}}</td>
                        <td>{{$p->email}}</td>
                        <td>{{$p->order_no}}</td>
                        <td>{{$p->paypal}}</td>
                        <td>{{$p->note}}</td>


                      </tr>
                    @empty()
                    <tr><td>Sales in progress will be update soon...</td></tr>  
                    @endforelse
                    </tbody>
                </table>
                {{$progress->links()}}
              </div>
            </div>
          </div>          
          <!--progress detail end-->
        </div>
        <!--body end-->
<div id="addSale" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Asign employee to campaign</h4>
      </div>
        <div class="modal-body">
          <form class="form-horizontal modal-form" id="loginForm" method="post" action="{{route('addSale')}}">
            {{csrf_field()}}
            <input type="hidden" name="keyword_id" value="">

            <div class="form-group">
              <label>Date</label>
              <input type="date" class="form-control" name="date"> 
            </div>            

            <div class="form-group">
              <label>Timestamp</label>
              <input type="time" class="form-control" name="sale_datetime"> 
            </div>

            <div class="form-group">
                <label>Order No</label>
                <input class="form-control" name="order_no" required>
            </div>            

            <div class="form-group">
                <label>Person Name</label>
                <input class="form-control" name="person_name" required>
            </div>            
            <div class="form-group">
                <label>Email</label>
                <input class="form-control" name="email" required>
            </div>               

            <div class="form-group">
                <label>Paypal Info</label>
                <input class="form-control" name="paypal" required>
            </div>            
            <div class="form-group">
                <label>Note</label>
                <textarea class="form-control" name="note"></textarea>
            </div>            

            <div class="form-group">
                  <button type="submit" class="btn btn-primary">Add Sale</button>
            </div>
               
        </form>
      </div>

    </div>

  </div>
</div>
    </div><!--right col end -->
@endsection

@section('js')
<script type="text/javascript">
  $(document.body).on('click','.addSale',function(){
      
      var id= $(this).attr('id');
      $("[name='keyword_id']").val(id);
  })
</script>
@endsection