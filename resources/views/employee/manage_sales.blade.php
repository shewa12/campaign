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
              <button class="btn btn-primary">Add Sale</strong>
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
                        <td>{{$keyword->duration}}</td>
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
          <form class="form-horizontal modal-form" id="loginForm" method="post" action="">
            {{csrf_field()}}

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

</script>
@endsection