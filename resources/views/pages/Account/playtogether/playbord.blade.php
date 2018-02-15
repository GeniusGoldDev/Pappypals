@extends('share.default')
@section('title', 'EQ för barn')
@section('id', 'playBoard')
@section('content')
@include('partial.header')
<section class="grownUps_dashbord">
  <div id="myTabContent" class="tab-content container">
    <div class="tab-pane fade active in" id="home">
      <div class="col-md-8">
        <h1 class="swe">{{ $play->description_title }}</h1>
        <h1 class="eng">{{ $play->description_title_en }}</h1>
        <div>
          <p class="swe">{{ $play->description }}</p>
          <p class="eng">{{ $play->description_en }}</p>
        </div>
      </div>

      <div class="col-md-4" style="text-align: center;">
        <img src="{{$play->madia}}"> 
        <a href="/playTogether/{{ $play->id }}" class="btn btn-pink input-md">{{Lang::get('app.start_video')}}</a>
      </div>
  </div>
  </div>
</section>


<div class="container grownUps_body">
<div class="swe"> 
    @if($play->unit_1_title)
      <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
        <div class="panel panel-default">
          <div class="panel-heading" role="tab" id="headingOne">
            <h4 style="font-size: 18px; font-weight: bold;" class="panel-title clearfix">
              <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
              {{ $play->unit_1_title }}
                <span class="more-less glyphicon glyphicon-chevron-right"></span>          
              </a>
            </h4>
          </div>
          <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
            <div class="panel-body">
              <img style="width:100%; height:auto;" src="../img/{{$play->small_madia}}">
              <p></p>
            </div>
          </div>
        </div>
      </div>
    @endif

    @if($play->unit_2_title || $play->unit_2_description)
      <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
        <div class="panel panel-default">
          <div class="panel-heading" role="tab" id="headingTwo">
            <h4 style="font-size: 18px; font-weight: bold;" class="panel-title clearfix">
              <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                {{ $play->unit_2_title }}
                <span class="more-less glyphicon glyphicon-chevron-right"></span>          
              </a>
            </h4>
          </div>
          <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
            <div class="panel-body">
              <p>{!!html_entity_decode($play->unit_2_description)!!}</p>
            </div>
          </div>
        </div>
      </div>
    @endif

    @if($play->unit_3_title || $play->unit_3_description)
    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
      <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="headingThree">
          <h4 style="font-size: 18px; font-weight: bold;" class="panel-title clearfix">
            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
              {{ $play->unit_3_title }}
              <span class="more-less glyphicon glyphicon-chevron-right"></span>          
            </a>
          </h4>
        </div>
        <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
          <div class="panel-body">
          <ul id="pdf">
            <li><a target="_blank" href="{{ url('pdf/diplom/')}}/{{$play->diplom_pdf}}"><span class="fa fa-file-pdf-o"></span></a><h4>Diplom</h4></li>
            <li><a target="_blank" href="{{ url('pdf/fargbilder/')}}/{{$play->fargrgbilder_pdf}}"><span class="fa fa-file-pdf-o"></span></a><h4>Färläggningsbild</h4></li>
            <li><a target="_blank" href="{{ url('pdf/fragor/')}}/{{$play->fragor_pdf}}"><span class="fa fa-file-pdf-o"></span></a><h4>Frågor att prata om</h4></li>
          </ul>
          </div>
        </div>
      </div>
    </div>
    @endif

    @if($play->unit_3_title || $play->unit_3_description || $play->unit_2_title || $play->unit_2_description || $play->unit_1_title)
</div>



<div class="eng"> 
    @if($play->unit_1_title_en)
      <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
        <div class="panel panel-default">
          <div class="panel-heading" role="tab" id="headingFour">
            <h4 style="font-size: 18px; font-weight: bold;" class="panel-title clearfix">
              <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
              {{ $play->unit_1_title_en }}
                <span class="more-less glyphicon glyphicon-chevron-right"></span>          
              </a>
            </h4>
          </div>
          <div id="collapseFour" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingFour">
            <div class="panel-body">
              <img style="width:100%; height:auto;" src="../img/{{$play->small_madia}}">
              <p></p>
            </div>
          </div>
        </div>
      </div>
    @endif

    @if($play->unit_2_title_en || $play->unit_2_description_en)
      <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
        <div class="panel panel-default">
          <div class="panel-heading" role="tab" id="headingFive">
            <h4 style="font-size: 18px; font-weight: bold;" class="panel-title clearfix">
              <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="true" aria-controls="collapseFive">
                {{ $play->unit_2_title_en }}
                <span class="more-less glyphicon glyphicon-chevron-right"></span>          
              </a>
            </h4>
          </div>
          <div id="collapseFive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFive">
            <div class="panel-body">
              <p>{!!html_entity_decode($play->unit_2_description_en)!!}</p>
            </div>
          </div>
        </div>
      </div>
    @endif

    @if($play->unit_3_title_en || $play->unit_3_description_en)
    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
      <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="headingSix">
          <h4 style="font-size: 18px; font-weight: bold;" class="panel-title clearfix">
            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseSix" aria-expanded="true" aria-controls="collapseSix">
              {{ $play->unit_3_title_en }}
              <span class="more-less glyphicon glyphicon-chevron-right"></span>          
            </a>
          </h4>
        </div>
        <div id="collapseSix" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSix">
          <div class="panel-body">
          <ul id="pdf">
            <li><a target="_blank" href="{{ url('pdf/diplom/')}}/{{$play->diplom_pdf}}"><span class="fa fa-file-pdf-o"></span></a><h4>Diplom</h4></li>
            <li><a target="_blank" href="{{ url('pdf/fargbilder/')}}/{{$play->fargrgbilder_pdf}}"><span class="fa fa-file-pdf-o"></span></a><h4>Färläggningsbild</h4></li>
            <li><a target="_blank" href="{{ url('pdf/fragor/')}}/{{$play->fragor_pdf}}"><span class="fa fa-file-pdf-o"></span></a><h4>Frågor att diskutera</h4></li>
          </ul>
          </div>
        </div>
      </div>
    </div>
    @endif

    @if($play->unit_3_title_en || $play->unit_3_description_en || $play->unit_2_title_en || $play->unit_2_description_en || $play->unit_1_title_en)
</div>




    <style type="text/css">
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
    <div class="col-sm-12 col-md-12 col-lg-12">
      <div class="center dropdown">   
          <button class="btn-transparent btn-pink border" data-toggle="modal" data-target=".myfeedback"><i class="glyphicon glyphicon-arrow-up"></i> {{Lang::get('app.feedback')}}</button>
          <button class="btn-transparent btn-pink border" data-toggle="modal" data-target=".myshare"><i class="glyphicon glyphicon-share-alt"></i> {{Lang::get('app.share')}}</button>
          <a href="/playTogether/{{ $play->id }}" class="btn-transparent btn-pink border">{{Lang::get('app.start_video')}}</a>
      </div>
    </div>

    <div id="related" class="swe related col-sm-12 col-md-12 col-lg-12">
      <h2 class="related">Tips på andra aktiviteter</h2>
    </div>
    <div id="related" class="eng related col-sm-12 col-md-12 col-lg-12">
      <h2 class="related">Suggested activities </h2>
    </div>

      <script type="text/javascript">
        $.ajax({
          url: "/get_data",
          success: function(data) {
            $.each(data, function(i, member) {
              $('.swe.related').append('<div class="col-sm-12 col-md-6 col-lg-4 cards"><div class="imge-cover"><a href="/playbord/'+ member.slug +'"><img src="'+ member.madia +'"></a></div><div class="panel padding-s"><h3>'+ member.title +'</h3><span class="releted sv">'+ member.Taggs +'</span><div class="right"><a href="/playbord/'+ member.slug +'" class="btn btn-pink">{{Lang::get('app.start')}}</a></div></div></div>'); 
              $('.eng.related').append('<div class="col-sm-12 col-md-6 col-lg-4 cards"><div class="imge-cover"><a href="/playbord/'+ member.slug +'"><img src="'+ member.madia_en +'"></a></div><div class="panel padding-s"><h3>'+ member.title_en +'</h3><span class="releted en">'+ member.Taggs_en +'</span><div class="right"><a href="/playbord/'+ member.slug +'" class="btn btn-pink">{{Lang::get('app.start')}}</a></div></div></div>'); 
            });    
          } 
        });

          setTimeout(
            function() 
            {
                var showChar = 50; 
                var eqExpand = 200;
                var showCharModule = 150; // How many characters are shown by default
                var ellipsestext = "...";
                var moretext = "{{Lang::get('app.readmore')}}";
                var lesstext = "{{Lang::get('app.readless')}}";
                $('.releted.sv').each(function() {
                    var content = $(this).html();
                    if(content.length > showChar) {
                        var c = content.substr(0, showChar);
                        var h = content.substr(showChar, content.length - showChar);
             
                        var html = c + '<span class="moreellipses">' + ellipsestext+ '&nbsp;</span><span class="morecontent"><span>' + h + '</span>&nbsp;&nbsp;<a href="" class="morelink">' + moretext + '</a></span>'; 
                        $(this).html(html);
                    } 
                });  
                $('.releted.en').each(function() {
                    var content = $(this).html();
                    if(content.length > showChar) {
                        var c = content.substr(0, showChar);
                        var h = content.substr(showChar, content.length - showChar);
             
                        var html = c + '<span class="moreellipses">' + ellipsestext+ '&nbsp;</span><span class="morecontent"><span>' + h + '</span>&nbsp;&nbsp;<a href="" class="morelink">' + moretext + '</a></span>'; 
                        $(this).html(html);
                    } 
                });

                $(".morelink").click(function(){
                    if($(this).hasClass("less")) {
                        $(this).removeClass("less");
                        $(this).html(moretext);
                    } else {
                        $(this).addClass("less");
                        $(this).html(lesstext);
                    }
                    $(this).parent().prev().toggle();
                    $(this).prev().toggle();
                    return false;
                });
            }, 500);

        
      </script>

      <script>
  function toggleIcon(e) {
    $(e.target)
      .prev('.panel-heading')
      .find(".more-less")
      .toggleClass('glyphicon-chevron-right glyphicon-chevron-down');
  }
  $('.panel-group').on('hidden.bs.collapse', toggleIcon);
  $('.panel-group').on('shown.bs.collapse', toggleIcon);

</script>



    <!-- Modal -->
    <div class="modal fade myshare" id="myshare" role="dialog">
        <div class="modal-dialog">
            
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                <button type="" class="close btn" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">{{Lang::get('app.share_peppypals')}}</h4>
                <p>{{Lang::get('app.help_more_kids_with_eq')}}</p>
                </div>

                <div class="modal-body center">
                    <div id="share"></div>
                    <script>
                    $("#share").jsSocials({
                    shares: ["facebook", "twitter", "googleplus", "pinterest", "email"],
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
                  <button type="button" class="close btn" data-dismiss="modal">&times;</button>
              </div>

              <div class="modal-body">
                <h1>{{Lang::get('app.your_opinion_is_important')}}</h1>
                <p>{{Lang::get('app.please_share_your_ideas_and_thoughts')}}</p>
                <form role="form" method="post" action="{{ url('/feedback') }}">
                  <input type="hidden" name="fullname" id="fullname" value="{{ Auth::user()->getNameOremail() }}">
                  <input type="hidden" name="email" id="email" value="{{ Auth::user()->getEmail() }}">
                  <textarea id="feedBack-area"  name="massages" id="massages" placeholder="Dina tankar"></textarea>
                  <div class="center">
                  <button type="submit" class="btn btn-default send">{{Lang::get('app.send')}}</button>
                  <input type="hidden" name="_token" value="{{ Session::token() }}">
                  </div>
                </form>
              </div>
            </div>
        </div>
    </div>
    @endif
    @endif
</div>

@include('partial.footer')
@endsection