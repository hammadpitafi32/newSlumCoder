@extends('adminlte::page')

@section('content')
    <section class="content-header">
        <h1>
            Post Category
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($postCategory, ['route' => ['postCategories.update', $postCategory->id], 'method' => 'patch','files'=>true]) !!}

                        @include('post_categories.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection