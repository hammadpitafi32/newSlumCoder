<!-- Image Url Field -->
<div class="form-group">
    {!! Form::label('image_url', 'Image:') !!}
    <!-- <p>{{ $users->image_url }}</p> -->
     @if(!empty($users->image_url))
        <img src="{{ $users->image_url }}" width="50">
    @else
        <img src="/images/noimage.png" width="50">
    @endif
</div>
<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $users->name }}</p>
</div>

<!-- About Field -->
<div class="form-group">
    {!! Form::label('about', 'About:') !!}
    <p>{{ $users->about }}</p>
</div>

<!-- Email Field -->
<div class="form-group">
    {!! Form::label('email', 'Email:') !!}
    <p>{{ $users->email }}</p>
</div>

<!-- Role Field -->
<div class="form-group">
    {!! Form::label('role', 'Roles:') !!}
     @foreach($users->getRoleNames() as $roleName)
        <p>{{ $roleName}}</p>
    @endforeach
    
</div>

<!-- Password Field -->
<!-- <div class="form-group">
    {!! Form::label('password', 'Password:') !!}
    <p>{{ $users->password }}</p>
</div> -->



<!-- Remember Token Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $users->created_at }}</p>
</div>

