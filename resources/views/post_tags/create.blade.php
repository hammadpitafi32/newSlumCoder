@extends('adminlte::page')

@section('content')
    <section class="content-header">
        <h1>
            Post Tags
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'postTags.store']) !!}

                        @include('post_tags.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
