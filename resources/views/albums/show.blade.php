@extends('layouts.app')
@section('content')

<h1>{{$albums->name}} </h1>

<a href="{{route('album.index')}}" class="button secondary">Go Back</a>

<a href="{{route('photos.create',$albums->id)}}" class="button">Upload Photo To Album</a>




<!-- // هنا بيفحص هل في عندي البومات ف الداتابيز ام لا كالتالي: -->
@if(count($albums->photos) > 0)
<?php
// الان هاي هتجيب العدد الكلي للالبومات الموجودة ف الداتابيز كالتالي:
$colcount = count($albums->photos);
// هذا عداد
// iterator
$i = 1;?>
<div id="Photos">
  <div class="row rext-center">
    @foreach($albums->photos as $photo)
    @if($i == $colcount)
    <div class="medium-4 columns end">
      <a href="{{route('Photo.show',$photo->id)}}">
        <img src="{{asset('/storage/photos')}}{{'/'. $photo->Album_id}}{{'/'. $photo->Photo}}" alt="{{$photo->Title}}" class="thumbnail" width="250px" height="250px">

      </a>
      <br>
      <h4>{{$photo->Title}}</h4>
      @else
      <div class="medium-4 columns">
      <a href="{{route('Photo.show',$photo->id)}}">
      <img src="{{asset('/storage/photos')}}{{'/'. $photo->Album_id}}{{'/'. $photo->Photo}}" alt="{{$photo->Title}}" class="thumbnail" width="250px" height="250px">
        </a>
        <br>
        <h4>{{$photo->Title}}</h4>
        @endif
        <!-- الان هاي علشان بدي اعرض كل ثلاث صور ف سطر واحد كالتالي: -->
        @if($i % 3 == 0)
      </div>
    </div>
    <div class="row text-center"></div>
    @else
  </div>
  @endif
  <?php $i++; ?>
  @endforeach
</div>
</div>
@else
<p>No Photos To Display</p>
@endif



@endsection