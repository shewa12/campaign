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
        <!--end flass message-->
      </div>  


    <div class="panel-default panel">
      <div class="panel-heading">
          <strong>Affiliate</strong>
      </div>

      <div class="panel-body">
        <form class="form" action="{{route('updateAffiliate')}}" method="post">
          {{csrf_field()}}
          <input type="hidden" name="type" value="faq">
            <div class="form-group">
              <label>Update</label>
              <textarea name="content" id="summernote" class="form-control">@if(!empty($post)){!!$post->content!!}@endif</textarea>
            </div> 
            <div class="form-group">
              <button class="btn-primary btn">Update Affiliate</button>
            </div> 
        </form>
      </div>

    </div>


  </div><!--main  col div end-->
@endsection
@section('js')
<script type="text/javascript">
$(document).ready(function() {
  $('#summernote').summernote();
});
</script>

@endsection