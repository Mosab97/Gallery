@extends('layouts.app')
@section('content')
<!-- // هنا بيفحص هل في عندي البومات ف الداتابيز ام لا كالتالي: -->
@if(count($albums) > 0)
<?php
// الان هاي هتجيب العدد الكلي للالبومات الموجودة ف الداتابيز كالتالي:
$colcount = count($albums);
// هذا عداد
// iterator
$i = 1;?>
<div id="albums">
  <div class="row rext-center">
    @foreach($albums as $album)
    @if($i == $colcount)
    <div class="medium-4 columns end">
      <a href="{{route('album.show',$album->id)}}">
        <!-- <img src="/public/storage/album_covers/{{$album->cover_image}}" alt="img" class="thumbnail"> -->
        <img src="{{asset('/storage/album_covers')}}{{'/'. $album->cover_image}}" alt="img" class="thumbnail" width="250px" height="250px">
      </a>
      <br>
      <h4>{{$album->name}}</h4>
      @else
      <div class="medium-4 columns">
            <a href="{{route('album.show',$album->id)}}">

          <img src="{{asset('/storage/album_covers')}}{{'/'. $album->cover_image}}" alt="img" class="thumbnail" width="250px" height="250px">
        </a>
        <br>
        <h4>{{$album->name}}</h4>
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
<p>No Albums To Display</p>
@endif
@endsection