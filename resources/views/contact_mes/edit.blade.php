@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Contact Me
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($contactMe, ['route' => ['contactMes.update', $contactMe->id], 'method' => 'patch']) !!}

                        @include('contact_mes.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection