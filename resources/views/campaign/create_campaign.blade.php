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
      				Create new campaign
      			</div>

      			<div class="panel-body">
                <form class="form-horizontal" action="" method="post">
                  <div class="col-md-6">
                    <div class="form-group">
                        <label>A SIN</label>
                        <input class="form-control" name="asin">
                    </div>                    

                    <div class="form-group">
                        <label>Link to Product</label>
                        <input class="form-control" name="product_link">
                    </div>                    

                    <div class="form-group">
                      <label>Full Price</label>
                      <div class="input-group">
                        <div class="input-group-addon">$</div>
                        <input type="text" class="form-control" name="full_price" placeholder="">
                        <div class="input-group-addon">.00</div>
                      </div>
                    </div>
                    <div class="form-group">
                        <button class="btn-primary btn">Submit</button>
                    </div>                    
                  </div>   
                   

                </form>
      			</div>
      		</div>
      	</div>
      	<!--body end-->
  	</div>
@endsection