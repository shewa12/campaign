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
              <strong>All campaigns</strong>
            </div>

            <div class="panel-body">
              <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>Sl No:</th>
                        <th>Created At</th>
                        <th>Capaign Title</th>                        
                        <th>A SIN</th>
                        <!--
                        <th>Product Link</th>
                        <th>Full Price</th>
                      -->
                        <th>View Detail</th>
                        <th>Asign Employee</th>
                        <th>Payment Status</th>
                    </tr>
                    </thead>
                    <tbody>
                      <?php 
                        $i=1;
                      ?>

                    @forelse($campaigns as $value)
                      <tr>
                        <td>{{$i++}}</td>
                        <td>{{$value->created_at}}</td>
                        <td>{{$value->title}}</td>
                        <td>{{$value->asin}}</td>
                        <!--
                        <td>{{$value->product_link}}</td>
                        <td>{{$value->full_price}}</td>
                      -->
                        <td><a href="{{url('campaign-detail/')}}/{{$value->id}}" class="btn-primary btn btn-sm">View Detail</a></td>
                        <td>
                          @if($value->employee_id==0)
                          <button data-toggle="modal"data-target="#asign" id="{{$value->id}}" class="asign btn-sm btn btn-info">Asign</button>
                          @else
                          <a href="{{url('/employee-detail')}}/{{$value->userId}}" class="text-capitalize"><strong>{{$value->name}}</strong></a>
                          @endif
                        </td>
                        <td>
                          @if($value->payment_status==0)
                            <button class="btn-default btn btn-sm" style="color:#f11c4c"> Pending</button>
                          @else
                            <i style="color:green" class="fas fa-check-circle"></i> 
                          @endif   
                        </td>                        
                      </tr>
                    @empty
                      <tr>
                        <td>No record found</td>
                      </tr>
                    @endforelse
                    </tbody>
                </table>
                {{$campaigns->links()}}
              </div>
            </div>
          </div>
        </div>
        <!--body end-->
<div id="asign" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Asign employee to campaign</h4>
      </div>
        <div class="modal-body">
          <form class="form-horizontal modal-form" id="loginForm" method="post" action="{{route('asignEmployee')}}">
            {{csrf_field()}}
            <input type="hidden" name="campaign_id">
            <div class="form-group">
                <label>Select Employee</label>
                <select class="form-control" name="employee_id" required>
                  <option select="">Select</option>
                  @forelse($employee as $value)
                    <option value="{{$value->id}}">{{$value->name}}-{{$value->email}}</option>
                  @empty()
                    <option>No employee found</option> 
                  @endforelse   
                </select>
            </div>
            <div class="form-group">
                  <button type="submit" class="btn btn-primary">Asign Employee</button>
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
  $(document.body).on('click','.asign',function(){
      
      var id= $(this).attr('id');
      $("[name='campaign_id']").val(id);
  })
</script>
@endsection