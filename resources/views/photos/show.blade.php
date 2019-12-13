@extends('layouts.app')
@section('content')

<h3> {{$photo->Title}} </h3>
<p>{{$photo->description}} </p>
<a href="{{route('album.show',$photo->Album_id)}}" class="button secondary">Back To Gallery</a>

<hr>
<img src="{{asset('/storage/photos')}}{{'/'. $photo->Album_id}}{{'/'. $photo->Photo}}" alt="{{$photo->Title}}" class="thumbnail" width="250px" height="250px">


<br>
<br>


{!! Form::open(['action' => ['PhotosController@destroy',$photo->id], 'method' => 'post']) !!}

{{Form::hidden('_method','DELETE')}}
{{Form::submit('Delete Photo',['class' => 'button alert'])}}
{!! Form::close() !!}


<hr>

<small>Size: {{$photo->Size}}</small>
@endsection