@extends('share.default')
@section('title', 'playTogether')
@section('id', 'playTogether')
@section('content')
@include('partial.header')
<style type="text/css">
  .panel a, p, h3{
   text-decoration: none;
  }
</style>
<section class="grownUps_dashbord">
  <div id="myTabContent" class="tab-content container" style="padding-top: 20px;">
    <div class="tab-pane fade active in" id="home">
      <div class="container swe">
        <h1>{{ config('playTogether.title') }}</h1>
        <p>Tillsammans med psykologer och forskare har vi skapat 16 kortfilmer som du och ditt barn kan titta på tillsammans. Använd sedan filmerna som utgångspunkt för att skapa samtal om känslor, empati och vänskap. Varje film tar cirka 5 minuter att titta på, följt av inspirerande frågor du kan ställa till ditt barn. Titta på orden under bilderna för att veta vad varje film handlar om.</p>
      </div>
      <div class="container eng">
        <h1>Watch movies together</h1>
        <p>Together with psychologists and researchers we have created six short movies that you and your child can watch together. Use the movies for a starting point to start conversations about emotions, empathy, and friendship. Each movie takes about five minutes to watch, followed by inspiring questions you can ask your child. Look at the words under the pictures to see what each movie is about. </p>
      </div>
    </div>
  </div>
</section>

<div class="container grownUps_body">
  <div class="pull-down">
      @foreach ($Play as $post)
          <div class="swe col-sm-4 col-md-4 col-lg-4 cards">
              <?php $flag = '0';?>
              @foreach ($play_toge_steg as $steg)
                @if ($steg->play_togethers_id == $post->id)
                <?php $flag = '1';?>
                @endif
              @endforeach
              @if ($flag)
                <span class="module_complited"><img src="../img/PP_ribbon_pink_test_darker.png"></span>
              @endif
            <div class="imge-cover">
            <a href="/playbord/{{ $post->slug }}"> <img src="{{$post->madia}}"></a>
            </div>
            <div class="panel padding-s maxH">
              <h3 style="font-size: 22px;">{{ $post->title }}</h3>
              <span class="more">{{ $post->Taggs }}</span>
              <span class="btn_startModule"> <a href="/playbord/{{ $post->slug }}" class="btn btnAabsolute btn-pink">{{Lang::get('app.start')}}</a></span>
            </div>

          </div>
          <div class="eng col-sm-4 col-md-4 col-lg-4 cards">
              <?php $flag = '0';?>
              @foreach ($play_toge_steg as $steg)
                @if ($steg->play_togethers_id == $post->id)
                <?php $flag = '1';?>
                @endif
              @endforeach
              @if ($flag)
                <span class="module_complited"><img src="../img/PP_ribbon_pink_test_darker.png"></span>
              @endif
            <div class="imge-cover">
            <a href="/playbord/{{ $post->slug }}"> <img src="{{$post->madia_en}}"></a>
            </div>
            <div class="panel padding-s maxH">
              <h3 style="font-size: 22px;">{{ $post->title_en }}</h3>
              <span class="more">{{ $post->Taggs_en }}</span>
              <span class="btn_startModule"> <a href="/playbord/{{ $post->slug }}" class="btn btnAabsolute btn-pink">{{Lang::get('app.start')}}</a></span>
            </div>

          </div>  
      @endforeach 
    <div class="col-sm-12 col-md-12 col-lg-12">
    {!! $Play->render() !!}
    </div>
  </div>
</div>

@include('partial.footer')
@endsection