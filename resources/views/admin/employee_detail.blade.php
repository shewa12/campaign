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

  <div class="col-xs-12 col-md-4 col-lg-3">
    <div class="panel-default panel">
      <div class="panel-heading">
          <strong>Employee Profile</strong>
      </div>

      <div class="panel-body">
          <?php $url= url('storage/app/avatars/');?>
          <?php if(!empty($user->image)):?>
          <div class="form-group">
            <img src="{{$url.'/'.$user->image}}" class="img-thumbnail" >
          </div>
          <?php else:?>
          <div class="form-group">
            <img src="{{$url.'/avatar.png'}}" class="img-thumbnail">
          </div>        
          <?php endif?>
          <div class="">
            <strong><p>Name: {{$user->name}}</p></strong>
            <strong><p>Email: {{$user->email}}</p></strong>
            <strong><p>About: {{$user->about}}</p></strong>
          </div>     
      </div>

    </div>
  </div>

	</div><!--main  col div end-->
@endsection

@section('js')

@endsection