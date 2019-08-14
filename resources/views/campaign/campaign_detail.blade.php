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
      				<strong> Campaign Detail</strong>
      			</div>

      			<div class="panel-body">
              <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>Sl No:</th>
                        <th>Campaign Title</th>
                        <th>A SIN</th>
                        <th>Product Link</th>
                        <th>Full Price</th>
                        
                    </tr>
                    </thead>
                    <tbody>
                      <?php 
                        $i=1;
                      ?>

                    @forelse($campaign as $value)
                      <?php $fullprice= $value->full_price;?>
                      <tr>
                        <td>{{$i++}}</td>
                        <td>{{$value->title}}</td>
                        <td>{{$value->asin}}</td>
                        <td>{{$value->product_link}}</td>
                        <td>{{$value->full_price}}</td>
                        
                      </tr>
                    @empty
                      <tr>
                        <td>No record found</td>
                      </tr>
                    @endforelse
                    </tbody>
                </table>
                <div class="clearfix"></div>
                <!--keyword detail-->
                <?php $grandTotal=[];?>
                @forelse($keywords as $val)
                <div class="col-xs-12 col-md-8 col-lg-6">
                  @if(Auth::user()->role===1)
                  <a href="{{url('campaign/sales')}}/{{$val->id}}" class="btn-primary btn btn-sm">View Sales</a>
                  @else
                  <a href="{{url('home/sales')}}/{{$val->id}}" class="btn-primary btn btn-sm">View Sales</a>
                  @endif
                  <table class="table-bordered table">
                      
                        <tbody>

                          <tr>
                            <td>Keyword</td>
                            <td width="30%">{{$val->keyword}}</td>
                          </tr>                        
                          <tr>
                            <td>Amount of Sales Needed Per Day</td>
                            <td width="30%">{{$val->perday_sale}}</td>
                          </tr>                        
                          <tr>
                            <td>Product is on Page</td>
                            <td width="30%">{{$val->product_page}}</td>
                          </tr>                          
                          <tr>
                            <td>Duration</td>
                            <td width="30%">{{$val->duration}}</td>
                          </tr>
                          <tr>
                            <td colspan="2" style="text-align:right;font-weight:bold">
                            <span>Perday sale * Duration * Full price= 
                            <?php 
                              echo $totalTwo= $val->perday_sale*$val->duration*$fullprice;
                              
                            ?></span> <br>
                            <span>Per Day Sale * Duration * Per Sale Fee(15) = 
                            <?php
                              echo $totalOne= $val->perday_sale*$val->duration*15;
                              
                            ?>
                            </span><br>

                            <br>
                            <span class="total">Total: ${{$grandTotal[]= $totalOne+$totalTwo}}</span>
                            </td>
                          </tr>

                        </tbody>
                     
                  </table>


                </div>
                <div class="clearfix"></div>
                @empty
                  <span><strong>No keyword found</strong></span>
                @endforelse
                  <div class="col-xs-12 col-md-8 col-lg-6 grand-total">
                    <?php 
                      $amount=0;
                      for($i=0;$i<count($grandTotal);$i++){
                        $k= $i+1;
                        echo "Keyword ".$k." total= $".number_format((float)$grandTotal[$i],'2','.','')."<br>";
                          $amount= $amount+$grandTotal[$i];
                      }
                      
                    ?>
                    <h3>
                      <?php 
                        echo 'Grand Total= $'.number_format((float)$amount,'2','.','');
                      ?>
                    </h3>
                  </div>
                <!--keyword detail end-->
              </div>
      			</div>
      		</div>
      	</div>
      	<!--body end-->
  	</div>
@endsection