@extends('layouts.app')

@section('content')

<h3>Create Album</h3>

{!!Form::open(['action' => 'AlbumsController@store','method' => 'POST','files' =>true])!!}

{{Form::text('name','',['Placeholder' => 'Album Name','required'])}}

{{Form::textarea('description','',['Placeholder' => 'Album Description'])}}

{{Form::file('cover_image',['required'])}}
{{Form::submit('submit')}}
{!!Form::close()!!}
@endsection