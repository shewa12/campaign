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
      				Campaign Dashbaord
      			</div>

      			<div class="panel-body">
              <div class="table-responsive">
                <table class="table table-bordered table-hover" id="example">
                    <thead>
                    <tr>
                        <th style="cursor:pointer;">Sl No: <i class="fas fa-arrows-alt-v pull-right"></i></th>
                        <th style="cursor:pointer;">Created at <i class="fas fa-arrows-alt-v pull-right"></i></th>
                        <th style="cursor:pointer;">Campaign Title <i class="fas fa-arrows-alt-v pull-right"></i></th>
                        <th style="cursor:pointer;">A SIN <i class="fas fa-arrows-alt-v pull-right"></i></th>
                        <th style="cursor:pointer;">Product Link <i class="fas fa-arrows-alt-v pull-right"></i></th>
                        <th style="cursor:pointer;">Full Price <i class="fas fa-arrows-alt-v pull-right"></i></th>
                        <th style="cursor:pointer;">View Detail <i class="fas fa-arrows-alt-v pull-right"></i></th>
                        <th style="cursor:pointer;">Overall Progress <i class="fas fa-arrows-alt-v pull-right"></i></th>
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
                        <td>{{$value->product_link}}</td>
                        <td>{{$value->full_price}}</td>
                        <td><a href="{{url('asigned-campaign/detail')}}/{{$value->id}}" class="btn-primary btn btn-sm">View Detail</a></td>
                        <td>
                          <?php 
                          
                           $c_id= $value->id;
                           $query= DB::select(DB::raw(
                            "SELECT id, SUM(perday_sale) ts, SUM(duration) as td FROM keyword WHERE campaign_id=$c_id "));
                           //$k_w= \admin\Keyword::where('campaign_id',$c_id)->count('');
                           foreach($query as $v){

                            $totalSaleNeed= $v->ts*$v->td;
                            if($totalSaleNeed>0){

                            $k_id= $v->id;
                            $complete= DB::table('progress')->where('keyword_id',$k_id)->count();
                              $progress= 100*$complete/$totalSaleNeed;             
                              $p= number_format((float)$progress,'2','.','')."%";
                              echo 
                              '
                              <div class="progress">
                                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="'.$p.'" aria-valuemin="0" aria-valuemax="100" style="min-width: 2em;width: '.$p.'" data-toggle="tooltip" title="'.$p.'">
                                  '.$p.' 
                                </div>
                              </div>
                              ' ;               
                            }
                            else{
                              echo "No keyword";
                            }

                           }
                          ?>
                        </td>
                      </tr>
                    @empty
                      <tr>
                        <td>No record found</td>
                      </tr>
                    @endforelse
                    </tbody>
                </table>
                

              </div>
      			</div>
      		</div>
      	</div>
      	<!--body end-->
  	</div>
@endsection