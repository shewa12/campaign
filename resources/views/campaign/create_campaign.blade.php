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
                          <input type="url" onKeyup="validateLink()" class="form-control" name="product_link" required value="{{old('product_link')}}">
                      </div>                    

                      <div class="form-group">
                        <label>Full Price</label>
                        <div class="input-group">
                          <div class="input-group-addon">$</div>
                          <input type="number" class="form-control pages_title"  name="full_price" placeholder="" required value="{{old('full_price')}}">
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
                        <select id="drop" class="form-control" name="duration[]" required>
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
                        <button type="button" onClick="getValues()" class="btn-info btn btn-sm">Calculate price</button>
                      </div>

                      <div class="form-group">
                          <button class="btn-primary btn" id="submit">Submit</button>
                      </div>  
                    </div><!--col6 end-->
                    <!--price calculate-->
                    <div class="col-md-6">
                      <div id="price-markup">

                      </div>
                      <div id="grandTotal"style="font-size: 20px;text-align: right;color: #f14949;font-weight: bold;"></div>
                    </div>
                    <!--price calculate end-->
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

    var markupDiv="<div class='keyword_section'<div class='form-group'><label>Keyword "+i+" <span id='remove'><i class='fas fa-window-close' style='color:red; cursor:pointer'></i></span> </label><input class='form-control' name='keyword[]' required></div><div class='form-group'><label>Amount of Sales Needed Per Day</label><input type='number' class='form-control' name='perday_sale[]' required></div><div class='form-group'><label>Product is on Page</label><input type='number' class='form-control' name='product_page[]' required></div><div class='form-group'><label>Duration</label><select class='form-control' id='drop' name='duration[]' required><option value='5'>5 days</option><option value='6'>6 days</option><option value='7'>7 days</option><option value='8'>8 days</option><option value='9'>9 days</option><option value='10'>10 days</option></select></div></div>";
    $("#markup").append(markupDiv);
  }

//count & markup end  
$(document.body).on('click',"#remove",function(e){
    $(this).closest('.keyword_section').remove();
});
function getValues(){
    
    var keywords= $("input[name='keyword[]']").map(function(){
      return $(this).val();
    });    

/*
    if(keywords[0]==''){
      alert("Please fill all the fields");
      return;
    }
*/
/*
    var durations=[]; 
     $('select[name="min_select[]"] option:selected').each(function() {
      val1.push($(this).val());
    });     
*/
    var fullPrice= $("[name='full_price']").val();
    var perdaySale= $("input[name='perday_sale[]']").map(function(){
      return $(this).val();
    });     

    var durations= $('select[name="duration[]"] option:selected').map(function(){
      return $(this).val();
    });    

    $("#price-markup").empty();
    var grandTotal= [];
    //var keywords= $("input[name='keyword[]']").val();
    for(var i=0; i<keywords.length;i++){
        var total1=perdaySale[i]*durations[i]*fullPrice;
        var total2=perdaySale[i]*durations[i]*15;
        var total= total1+total2;
        grandTotal.push(total);
        var priceMarkup="<h3>Keyword "+keywords[i]+"</h3><table class='table table-bordered'><tr><td>Perday sale * Duration * Full price = </td><td>"+total1+"</td></tr><tr><td>Perday sale * Duration * Per Sale Fee ($15) = </td><td>"+total2+"</td></tr><tr><td colspan='2' style='text-align:right;color:#f14949;'>Total= $"+total+"</td></tr></table>";
        $('#price-markup').append(priceMarkup);
    }
    var sum=0;
    for(var j=0; j<grandTotal.length; j++){
        sum= sum+grandTotal[j];
    }
    $("#grandTotal").html("Grand Total= $"+sum);
}

  function validateLink(){
    var link= $('[name="product_link"]').val();
    var check= checkIsValidDomain(link);
    console.log(check);
    if(check===true){
        $('[name="product_link"]').removeClass('alert-danger');
    }    
    else{
      $('[name="product_link"]').addClass('alert-danger');

    }
  }
  function checkIsValidDomain(str) { 
  var pattern = new RegExp('^(https?:\\/\\/)?'+ // protocol
    '((([a-z\\d]([a-z\\d-]*[a-z\\d])*)\\.)+[a-z]{2,}|'+ // domain name
    '((\\d{1,3}\\.){3}\\d{1,3}))'+ // OR ip (v4) address
    '(\\:\\d+)?(\\/[-a-z\\d%_.~+]*)*'+ // port and path
    '(\\?[;&a-z\\d%_.~+=-]*)?'+ // query string
    '(\\#[-a-z\\d_]*)?$','i'); // fragment locator
      if(pattern.test(str)===true){
        var regex = /([a-z0-9]+\.)*[a-z0-9]+\.[a-z]+/;
        if(!regex .test(str)) {
          //alert("Please enter valid URL.");
          return false;
        } else {
          return true;
        }        
      }
      else{
        return false;
      }


    }     

</script>
@endsection