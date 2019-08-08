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
                <span>{!!Session::get('success')!!}</span>
            </div>
        @endif        

        @if(Session::has('fail'))
            <div class="alert alert-danger">
                <span>{!!Session::get('fail')!!}</span>
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
                <form class="form-horizontal" action="{{route('saveCampaign')}}" method="post">
                  {{csrf_field()}}
                  <div class="col-md-12">
                    <div class="col-md-6">
                      <div class="form-group">
                          <label>Campaign Title</label>
                          <input class="form-control" name="title" required value="{{old('title')}}">
                      </div>                          

                      <div class="form-group">
                          <label>A SIN</label>
                          <input class="form-control" name="asin" required value="{{old('asin')}}">
                      </div>                    

                      <div class="form-group">
                          <label>Link to Product</label>
                          <input class="form-control" name="product_link" required value="{{old('product_link')}}">
                      </div>                    

                      <div class="form-group">
                        <label>Full Price</label>
                        <div class="input-group">
                          <div class="input-group-addon">$</div>
                          <input type="text" class="form-control" name="full_price" placeholder="" required value="{{old('full_price')}}">
                          <div class="input-group-addon">.00</div>
                        </div>
                      </div>

                      <div class="form-group">
                        <label>Keyword 1</label>
                        <input class="form-control" name="keyword[]" required value="">
                      </div> 

                      <div class="form-group">
                        <label>Amount of Sales Needed Per Day</label>
                        <input type="number" class="form-control" name="perday_sale[]" required value="">
                      </div>                      

                      <div class="form-group">
                        <label>Product is on Page</label>
                        <input type="number" class="form-control" name="product_page[]" required value="">
                      </div>                      

                      <div class="form-group">
                        <label>Duration</label>
                        <select class="form-control" name="duration[]" required>
                            <option value="5">
                              5 days
                            </option>                            
                            <option value="6">
                              6 days
                            </option>                            
                            <option value="7">
                              7 days
                            </option>                            
                            <option value="8">
                              8 days
                            </option>                            
                            <option value="9">
                              9 days
                            </option>                            <option value="10">
                              10 days
                            </option>
                        </select>
                      </div>

                      <div id="markup"></div>

                      <div class="form-group">
                        <button type="button" onClick="countMyself()" id="addMore" class="btn btn-default btn-sm">Add more keyword</button>
                      </div>

                      <div class="form-group">
                          <button class="btn-primary btn">Submit</button>
                      </div>  
                    </div>
                  </div> <!--col-md-12 end--> 
                   

                </form>
      			</div>
      		</div>
      	</div>
      	<!--body end-->
  	</div>
@endsection

@section('js')
<script type="text/javascript">

//count & markup  
  function countMyself() {
      // Check to see if the counter has been initialized
      if ( typeof countMyself.counter == 'undefined' ) {
          // It has not... perform the initialization
          countMyself.counter = 1;
      }

      // Do something stupid to indicate the value
      markup(++countMyself.counter);
  }
  function markup(i){

    var markupDiv="<div class='keyword_section'<div class='form-group'><label>Keyword "+i+" <span id='remove'><i class='fas fa-window-close' style='color:red; cursor:pointer'></i></span> </label><input class='form-control' name='keyword[]' required></div><div class='form-group'><label>Amount of Sales Needed Per Day</label><input type='number' class='form-control' name='perday_sale[]' required></div><div class='form-group'><label>Product is on Page</label><input type='number' class='form-control' name='product_page[]' required></div><div class='form-group'><label>Duration</label><select class='form-control' name='duration[]' required><option value='5'>5 days</option><option value='6'>6 days</option><option value='7'>7 days</option><option value='8'>8 days</option><option value='9'>9 days</option><option value='10'>10 days</option></select></div></div>";
    $("#markup").append(markupDiv);
  }

//count & markup end  
$(document.body).on('click',"#remove",function(e){
    $(this).closest('.keyword_section').remove();
})

</script>
@endsection