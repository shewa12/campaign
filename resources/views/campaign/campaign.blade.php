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
      				<strong>
                @if(Auth::user()->role===1)
                  My Campaigns
                @else
                  All Campaigns
                @endif    
              </strong>
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
                        <td><a href="{{url('campaign/detail/')}}/{{$value->id}}" class="btn-primary btn btn-sm">View Detail</a></td>
                        <td>
                          @if($value->payment_status==0)
                            <button class="btn-defult btn btn-sm" style="color:#f11c4c"> Pending</button>
                          @else
                            <i class="fas fa-check-circle"></i>
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
  	</div>
@endsection