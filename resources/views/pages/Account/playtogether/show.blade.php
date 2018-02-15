@extends('share.default')
@section('title', 'playTogether')
@section('id', 'playTogether')
@section('content')
@include('partial.header')


  <!-- Modal -->
<div class="modal fade myshare" id="myshare" role="dialog">
    <div class="modal-dialog">
        
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
            <button type="" class="close btnModal" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">{{Lang::get('app.share_peppypals')}}</h4>
            <p>{{Lang::get('app.help_more_kids_with_eq')}}</p>
            </div>

            <div class="modal-body center">
                <div id="share"></div>
                <script>
                $("#share").jsSocials({
                shares: ["facebook", "twitter", "googleplus", "pinterest", "email"]
                });
                </script>
            </div>
        </div>

    </div>
</div>

<!-- modal feedback -->
<div class="modal fade myfeedback" id="myfeedback" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
              <button type="button" class="close btnModal" data-dismiss="modal">&times;</button>
          </div>

          <div class="modal-body">
            <h1>{{Lang::get('app.your_opinion_is_important')}}</h1>
             <p>{{Lang::get('app.please_share_your_ideas_and_thoughts')}}</p>
              <form role="form" method="post" action="{{ url('/feedback') }}">
              <input type="hidden" name="fullname" id="fullname" value="{{ Auth::user()->getNameOremail() }}">
              <input type="hidden" name="email" id="email" value="{{ Auth::user()->getEmail() }}">
              <textarea id="feedBack-area"  name="massages" id="massages" placeholder="{{Lang::get('your_thoughts')}}"></textarea>
              <div class="center">
              <button type="submit" class="btn btn-default send">{{Lang::get('app.send')}}</button>
              <input type="hidden" name="_token" value="{{ Session::token() }}">
              </div>
            </form>
          </div>
        </div>
    </div>
</div>
<div class="container grownUps_body">
  <div class="pull-down">
    <div class="shortcuts_wrapper row">
          <a class="shortcuts" href="javascript:window.history.back();"><span class="fa fa-arrow-left" aria-hidden="true"></span> {{ Lang::get('app.back') }}</a>
    </div>
    <div class="lbutton col-md-2 transparent">
      <i id="preview" class="fa action-buttons back btn btn-pink fa-angle-left" aria-hidden="true"></i>
    </div>
    <div id="module" class="col-md-8">
        {!!html_entity_decode($play->content_1)!!}
        {!!html_entity_decode($play->content_2)!!}
        {!!html_entity_decode($play->content_3)!!}
        {!!html_entity_decode($play->content_4)!!}
        {!!html_entity_decode($play->content_5)!!}
        {!!html_entity_decode($play->content_6)!!}
        {!!html_entity_decode($play->content_7)!!}
        {!!html_entity_decode($play->content_8)!!}
        {!!html_entity_decode($play->content_9)!!}
        {!!html_entity_decode($play->content_10)!!}
    </div>
     <div id="module1" class="col-md-8">
        {!!html_entity_decode($play->content_1_en)!!}
        {!!html_entity_decode($play->content_2_en)!!}
        {!!html_entity_decode($play->content_3_en)!!}
        {!!html_entity_decode($play->content_4_en)!!}
        {!!html_entity_decode($play->content_5_en)!!}
        {!!html_entity_decode($play->content_6_en)!!}
        {!!html_entity_decode($play->content_7_en)!!}
        {!!html_entity_decode($play->content_8_en)!!}
        {!!html_entity_decode($play->content_9_en)!!}
        {!!html_entity_decode($play->content_10_en)!!}
    </div>
    <div class="rbuttons col-md-2 transparent">
      <i id="next" class="fa action-buttons next btn btn-pink fa-angle-right" aria-hidden="true"></i>
      <input type="hidden" id="update_playTogether" value="{{ $play->id }}" >
      <button id="submit" class="action action-buttons submit btn-pink btn-successes" aria-hidden="true">{{Lang::get('app.finish')}}</button>
    </div>

    <div class="col-sm-12 col-md-12 col-lg-12" id="congrats">
    <canvas id="canvas">  </canvas>
    <div style="margin-top: -450px;" class="congrats col-md-12">
       <img class="successPic" src="{{$play->madia}}">
        <h1>{{Lang::get('app.congrats')}}</h1>
        <h3>{{Lang::get('app.you_have_complete:')}} “{{$play->description_title}}” </h3>
        <hr>
        <div class="col-md-12">
          <a id="previewModule" href="#" class="btn btn-pink">< {{Lang::get('app.back')}}</a>
          <a href="{{ URL::to( 'playbord/' . $next ) }}" class="btn btn-pink">{{Lang::get('app.next_clip')}} ></a>  
          <a target="_blank" href="{{ url('pdf/diplom/')}}/{{$play->diplom_pdf}}" class="btn btn-pink">{{Lang::get('app.print')}} {{Lang::get('app.diploma')}}</a>   
        </div>
         
        <div class="col-sm-12 col-md-12 col-lg-12">
         <h2>{{Lang::get('app.did_you_like_the_movie')}}</h2>
          <div class="center access">
            <a class="btn-transparent btn-pink border download" data-toggle="modal" data-target=".myfeedback"><i class="glyphicon glyphicon-arrow-up"></i> {{Lang::get('app.feedback')}}</a>
            <a class="btn-transparent btn-pink border share" data-toggle="modal" data-target=".myshare"><i class="glyphicon glyphicon-share-alt"></i> {{Lang::get('app.share')}}</a>
          </div>
        </div>




    
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
$(document).ready(function() {
  $('.readmore').hide();
  $('.oppen').click(function(){
      $('.readmore').toggle(); 
  }); 
});

$('video').parent().click(function () {
    $(this).children("video").get(0).play();
});

$('#next').click(function () {
  $('video').get(0).pause();
});

$('.modal').click(function () {
  $('.modal-body video').get(0).pause();
});
</script>


    </div>
</div>

@include('partial.footer')
@endsection
  <style type="text/css">
    .rbuttons {margin-top: 100px;}
    .lbutton {margin-top: 100px;}

    </style>
 