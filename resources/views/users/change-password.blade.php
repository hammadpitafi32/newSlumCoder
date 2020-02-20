@extends('adminlte::page')

@section('content')
<section class="content-header">
  <h1>
    User Password
  </h1>
</section>
<div class="content">
 @include('adminlte-templates::common.errors')
 <div class="box box-primary">
   <div class="box-body">
     <div class="row">
       {!! Form::model([], ['route' => ['users.postChangePassword'], 'method' => 'patch','files' => true]) !!}

        <!-- old Pssword Field -->
      <div class="form-group col-sm-6">
        {!! Form::label('old_password', 'Old Password:') !!}
        {!! Form::text('old_password', null, ['class' => 'form-control']) !!}
      </div>
      <!--new Pssword Field -->
      <div class="form-group col-sm-6">
        {!! Form::label('new_password', 'New Password:') !!}
        {!! Form::text('new_password', null, ['class' => 'form-control']) !!}
      </div>

       <!--confirm Pssword Field -->
      <div class="form-group col-sm-6">
        {!! Form::label('confirm_password', 'confirm Password:') !!}
        {!! Form::text('confirm_password', null, ['class' => 'form-control']) !!}
      </div>


      <!-- Submit Field -->
      <div class="form-group col-sm-12">
        {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
        <a href="{{ route('users.index') }}" class="btn btn-default">Cancel</a>
      </div>


      {!! Form::close() !!}
    </div>
  </div>
</div>
</div>
@endsection