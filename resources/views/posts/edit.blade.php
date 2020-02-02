@extends('adminlte::page')
@section('css')
 <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.15/dist/summernote.min.css" rel="stylesheet">
  
@endsection
@section('content')
    <section class="content-header">
        <h1>
            Posts
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($posts, ['route' => ['posts.update', $posts->id], 'method' => 'patch']) !!}

                        @include('posts.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
@section('js')
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.15/dist/summernote.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
      // $(".summernote").summernote("code", "your text");
      $('#summernote').summernote({
        placeholder: 'Hello',
        height: 400,
        focus: true,

      });
       $("#summernote").summernote('editor.pasteHTML', '{{$posts->content}}');
      $(document).on('click','#submit',function(){
        var htmlCode=$('#summernote').summernote('code');
        $('#content').val(htmlCode);
      })
      
    });
</script>
@endsection