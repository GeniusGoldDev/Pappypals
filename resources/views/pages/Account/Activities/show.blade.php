@extends('share.default')
@section('title', 'Activites')
@section('id', 'playBoard')
@section('content')
@include('partial.header')

<style type="text/css">
  .activite .panel-title h4{
    font-size: 18px !important;
    font-weight: bold !important;
  }
      ul#pdf li{
          display: inline-block;
          width: 30%;
          text-align: center;
          padding: 2%;
          border-radius: 8%;
          font-size: 40px;
      }
      ul#pdf li h4{
          font-size: 12px;
          font-weight: bold;
          font-style: normal;
      }
</style>

<section class="grownUps_dashbord">
  <div id="myTabContent" class="tab-content container">
    <div class="tab-pane fade active in" id="home">
      <div class="col-xsm-8 col-sm-8 col-md-8">
        <h1 class="swe">{{$activities->title}}</h1>
        <h1 class="eng">{{$activities->title_en}}</h1>
        <div>
          <p class="swe">{{$activities->content}}</p>
          <p class="eng">{{$activities->content_en}}</p>
        </div>
      </div>

      <div class="col-xsm-4 col-sm-4 col-md-4 swe" style="text-align: center;">
        <img src="{{URL::asset('img/Activities_Pictures/'. $activities->madia)}}"> 
      </div>
      <div class="col-md-4 eng" style="text-align: center;">
        <img src="{{URL::asset('img/Activities_Pictures/'. $activities->madia_en)}}"> 
      </div>
  </div>
  </div>
</section>

<div class="container grownUps_body">
  <div class="shortcuts_wrapper row">
      <a class="shortcuts" onclick="goBack()" style="display: block; padding: 11px 0;"><span class="fa fa-arrow-left" aria-hidden="true"></span>{{ Lang::get('app.back') }} </a>
  </div>

    <div class="swe"> 
      <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
        <div class="panel panel-default">
          <div class="panel-heading" role="tab" id="headingOne">
            <h4 style="font-size: 18px; font-weight: bold;" class="panel-title clearfix">
              <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
               {{$activities->first_unit_title}}
                <span class="more-less glyphicon glyphicon-chevron-down"></span>          
              </a>
            </h4>
          </div>
          <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
            <div class="panel-body">
               {!!html_entity_decode($activities->first_unit_content)!!}
            </div>
          </div>
        </div>
      </div>

      <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
        <div class="panel panel-default">
          <div class="panel-heading" role="tab" id="headingTwo">
            <h4 style="font-size: 18px; font-weight: bold;" class="panel-title clearfix">
              <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                {{$activities->second_unit_title}}
                <span class="more-less glyphicon glyphicon-chevron-right"></span>          
              </a>
            </h4>
          </div>
          <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
            <div class="panel-body">
              {!!html_entity_decode($activities->second_unit_content)!!}
            </div>
          </div>
        </div>
      </div>

    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
      <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="headingThree">
          <h4 style="font-size: 18px; font-weight: bold;" class="panel-title clearfix">
            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
              {{$activities->third_unit_title}}
              <span class="more-less glyphicon glyphicon-chevron-right"></span>          
            </a>
          </h4>
        </div>
        <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
          <div class="panel-body">
            {!!html_entity_decode($activities->third_unit_content)!!}
          </div>
        </div>
      </div>
    </div>

    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
      <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="headingfour">
          <h4 style="font-size: 18px; font-weight: bold;" class="panel-title clearfix">
            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapsefour" aria-expanded="true" aria-controls="collapsefour">
              {{$activities->fourth_unit_title}}
              <span class="more-less glyphicon glyphicon-chevron-right"></span>          
            </a>
          </h4>
        </div>
        <div id="collapsefour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingfour">
          <div class="panel-body">
             <P>{!!html_entity_decode($activities->fourth_unit_content)!!}</P>
          </div>
        </div>
      </div>
    </div>
    @if($activities->fargbilder_pdf)
    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
      <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="headingEight">
          <h4 style="font-size: 18px; font-weight: bold;" class="panel-title clearfix">
            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseEight" aria-expanded="true" aria-controls="collapseEight">
              {{ Lang::get('app.download_print') }}
              <span class="more-less glyphicon glyphicon-chevron-right"></span>          
            </a>
          </h4>
        </div>
        <div id="collapseEight" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingEight">
          <div class="panel-body">
          <ul id="pdf">
            <li><a target="_blank" href="{{ url('pdf/fargbilder/')}}/{{$activities->fargbilder_pdf}}"><span class="fa fa-file-pdf-o"></span></a><h4>Färläggningsbild</h4></li>
          </ul>
          </div>
        </div>
      </div>
    </div>
     @endif
</div>

<div class="eng"> 
      <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
        <div class="panel panel-default">
          <div class="panel-heading" role="tab" id="headingFive">
            <h4 style="font-size: 18px; font-weight: bold;" class="panel-title clearfix">
              <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="true" aria-controls="collapseFive">
               {{$activities->first_unit_title_en}}
                <span class="more-less glyphicon glyphicon-chevron-down"></span>          
              </a>
            </h4>
          </div>
          <div id="collapseFive" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingFive">
            <div class="panel-body">
               {!!html_entity_decode($activities->first_unit_content_en)!!}
            </div>
          </div>
        </div>
      </div>

      <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
        <div class="panel panel-default">
          <div class="panel-heading" role="tab" id="headingSix">
            <h4 style="font-size: 18px; font-weight: bold;" class="panel-title clearfix">
              <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseSix" aria-expanded="true" aria-controls="collapseSix">
                {{$activities->second_unit_title_en}}
                <span class="more-less glyphicon glyphicon-chevron-right"></span>          
              </a>
            </h4>
          </div>
          <div id="collapseSix" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSix">
            <div class="panel-body">
              {!!html_entity_decode($activities->second_unit_content_en)!!}
            </div>
          </div>
        </div>
      </div>

    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
      <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="headingSeven">
          <h4 style="font-size: 18px; font-weight: bold;" class="panel-title clearfix">
            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseSeven" aria-expanded="true" aria-controls="collapseSeven">
              {{$activities->third_unit_title_en}}
              <span class="more-less glyphicon glyphicon-chevron-right"></span>          
            </a>
          </h4>
        </div>
        <div id="collapseSeven" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSeven">
          <div class="panel-body">
            {!!html_entity_decode($activities->third_unit_content_en)!!}
          </div>
        </div>
      </div>
    </div>
    @if($activities->fourth_unit_title_en || $activities->fourth_unit_content_en)
    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
      <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="headingEigh">
          <h4 style="font-size: 18px; font-weight: bold;" class="panel-title clearfix">
            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseEigh" aria-expanded="true" aria-controls="collapseEight">
              {{$activities->fourth_unit_title_en}}
              <span class="more-less glyphicon glyphicon-chevron-right"></span>          
            </a>
          </h4>
        </div>
        <div id="collapseEigh" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingEight">
          <div class="panel-body">
             <P>{!!html_entity_decode($activities->fourth_unit_content_en)!!}</P>
          </div>
        </div>
      </div>
    </div>
    @endif
    @if($activities->fargbilder_pdf_en)
    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
      <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="headingEi">
          <h4 style="font-size: 18px; font-weight: bold;" class="panel-title clearfix">
            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseEi" aria-expanded="true" aria-controls="collapsetwo">
              {{ Lang::get('app.download_print') }}
              <span class="more-less glyphicon glyphicon-chevron-right"></span>          
            </a>
          </h4>
        </div>
        <div id="collapseEi" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingtwo">
          <div class="panel-body">
          <ul id="pdf">
            <li><a target="_blank" href="{{ url('pdf/fargbilder/')}}/{{$activities->fargbilder_pdf}}"><span class="fa fa-file-pdf-o"></span></a><h4>{{ Lang::get('app.coloring') }} </h4></li>
          </ul>
          </div>
        </div>
      </div>
    </div>
     @endif

</div>  
  <div class="col-sm-12 col-md-12 col-lg-12">
    <div class="center dropdown">   
        <button class="btn-transparent btn-pink border" data-toggle="modal" data-target=".myfeedback"><i class="glyphicon glyphicon-arrow-up"></i> {{Lang::get('app.feedback')}}</button>
        <button class="btn-transparent btn-pink border" data-toggle="modal" data-target=".myshare"><i class="glyphicon glyphicon-share-alt"></i> {{Lang::get('app.share')}}</button>
    </div>
  </div>
  @include('partial.feedback')
  @include('partial.share') 
  <div id="related" class="swe related col-sm-12 col-md-12 col-lg-12">
    <h2 class="related">Tips på andra aktiviteter</h2>
    <script type="text/javascript">
      $.ajax({
        url: "/get_activities_data",
        success: function(data) {
          $.each(data, function(i, member) {
             console.log(member);

             var cat = '';
             if(member.category_id == 1){
                cat = 'Social medvetenhet';
             }else if(member.category_id == 2){
                cat = 'Självkännedom';
             }else if(member.category_id == 3){
                cat = 'Social kompetens';
             }else if(member.category_id == 4){
                cat = 'Självkontroll';
             }else if(member.category_id == 5){
                cat = 'Ansvarsfullt beslutsfattande'; 
             }

            $('#related').append(  
              '<div class="col-sm-12 col-md-6 col-lg-4 cards releted"><div class="imge-cover"><a href="/activities/'+ member.id +'"><img src="http://eqplatform.peppypals.com/img/Activities_Pictures/' + member.madia_en +'"></a></div><div class="panel padding-s"><span class="categorytags categorytag_'+ member.category_id  +'">'+ cat +'</span><h3 style="font-size: 22px;">'+ member.title +'</h3><a class="btn btnAabsolute btn-pink" href="/activities/'+ member.id +'"> Start</a></div></div>'
            );
          });     
        } 
      });
    </script>
  </div>
  <div id="related" class="eng related col-sm-12 col-md-12 col-lg-12">
    <h2 class="related">Suggested activities</h2>
    <script type="text/javascript">
      $.ajax({
        url: "/get_activities_data",
        success: function(data) {
          $.each(data, function(i, member) {

             var cat = '';
             if(member.category_id == 1){
                cat = 'Self-awareness';
             }else if(member.category_id == 2){
                cat = 'Social-awareness';
             }else if(member.category_id == 3){
                cat = 'Relationship skills';
             }else if(member.category_id == 4){
                cat = 'Self-management';
             }else if(member.category_id == 5){
                cat = 'Responsible Decision-making'; 
             }

            $('.eng.related').append(  
              '<div class="col-sm-12 col-md-6 col-lg-4 cards releted"><div class="imge-cover"><a href="/activities/'+ member.id +'"><img src="http://eqplatform.peppypals.com/img/Activities_Pictures/' + member.madia +'"></a></div><div class="panel padding-s"><span class="categorytags '+ cat +'">'+ cat +'</span><h3 style="font-size: 22px;">'+ member.title_en +'</h3><a class="btn btnAabsolute btn-pink" href="/activities/'+ member.id +'"> Start</a></div></div>'
            );
          });    
        } 
      });
    </script>
  </div>
</div><!-- container -->

<script>
  function toggleIcon(e) {
    $(e.target)
      .prev('.panel-heading')
      .find(".more-less")
      .toggleClass('glyphicon-chevron-right glyphicon-chevron-down');
  }
  $('.panel-group').on('hidden.bs.collapse', toggleIcon);
  $('.panel-group').on('shown.bs.collapse', toggleIcon);

  function goBack() {
      window.history.back();
  }

</script>
@include('partial.footer')
@endsection