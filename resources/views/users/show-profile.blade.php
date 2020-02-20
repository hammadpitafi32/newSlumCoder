@extends('adminlte::page')

@section('content')
<section class="content-header">
  <h1>
    Users
</h1>
</section>
<div class="content">
   @include('adminlte-templates::common.errors')
   <div class="box box-primary">
     <div class="box-body">
       <div class="row">
         {!! Form::model($users, ['route' => ['users.updateProfile', $users->id], 'method' => 'patch','files' => true]) !!}

         @include('users.profile-fields')

         {!! Form::close() !!}
     </div>
 </div>
</div>
</div>
@endsection