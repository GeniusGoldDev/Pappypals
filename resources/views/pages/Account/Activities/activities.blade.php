@extends('share.default')
@section('title', 'Activites')
@section('id', 'activites')
@section('content')
@include('partial.header')

<!-- saknar rad 4 -->

<section class="grownUps_dashbord">
  <div id="myTabContent" class="tab-content container" style="padding-top: 20px;">
    <div class="tab-pane fade active in" id="home">
      <div class="container swe">
        <h1>Leka ihop</h1>
        <p>Det här är enkla och roliga aktiviteter som du kan göra tillsammans med ditt barn. Varje aktivitet är indelad efter de fem kategorierna som finns i
 <a href="{{ url('/eq') }}" style="color:#f00266;">EQ-hjulet:</a>  självkontroll, självkännedom, social medvetenhet, social kompetens och ansvarsfullt beslutsfattande.</p> 
      </div>

      <div class="container eng">
        <h1>Play</h1>
        <p>These are easy and fun activities that you can do together with your child. Each activity is divided after the five categories that are found on the <a href="{{ url('/eq') }}" style="color:#f00266;">EQ-wheel:</a>  self-control, self-awareness, social awareness, social competence, and responsible decision making.</p>   
      </div>

    </div>
  </div>
</section>
<div class="container grownUps_body">
<div class="col-xsm-12 col-sm-12 col-md-12 col-lg-12 filter">
  <ul class="nav categori navbar-nav navbar-left">
   <li>
    <a class="categori">{{Lang::get('app.sort')}}<span class="fa fa-sort-desc"></span></a>
     <ul class="categori-menu" aria-labelledby="dropdownMenuDivider">
      <div class="lang eng">
        <li class="All-activities">{{Lang::get('app.all-activities')}}</li>
        <li class="Relationship skills">{{Lang::get('app.Relationship-skills')}}</li>
        <li class="Self-awareness">{{Lang::get('app.Self-awareness')}}</li>
        <li class="Social-awareness">{{Lang::get('app.Social-awareness')}}</li>
        <li class="Self-management">{{Lang::get('app.Self-management')}}</li>
        <li class="Responsible Decision-making">{{Lang::get('app.Responsible-Decision-making')}}</li>
      </div>
      <div class="lang swe">
        <li class="All-activities">{{Lang::get('app.all-activities')}}</li>
        <li class="categorytag_3">{{Lang::get('app.Relationship-skills')}}</li>
        <li class="categorytag_1">{{Lang::get('app.Self-awareness')}}</li>
        <li class="categorytag_4">{{Lang::get('app.Self-management')}}</li>
        <li class="categorytag_2">{{Lang::get('app.Social-awareness')}}</li>
        <li class="categorytag_5">{{Lang::get('app.Responsible-Decision-making')}}</li>
      </div>
    </ul>
    </li>
  </ul>
</div>

  <div class="pull-down" >
    @foreach ($activities as $post)
      
        <div class="col-xsm-6 col-sm-6 col-md-6 col-lg-4 cards swe">
          <div class="imge-cover">
           <a href="activities/{{$post->id}}"> <img src="{{ URL::asset('img/Activities_Pictures/'. $post->madia) }}"/></a> 
          </div>
          <div class="panel padding-s">
            <span class="categorytags categorytag_{{ $post->category->id }}">{{ $post->category->name_en }}</span>
            <h3 style="font-size: 22px;">{{$post->title}}</h3>
            <div class="right">
            <a class="btn btnAabsolute btn-pink" href="activities/{{$post->id}}">{{Lang::get('app.start')}} </a>
            </div>
          </div>
        </div>
        <div class="col-xsm-6 col-sm-6 col-md-6 col-lg-4 cards eng">
          <div class="imge-cover">
           <a href="activities/{{$post->id}}"> <img src="{{ URL::asset('img/Activities_Pictures/'. $post->madia_en) }}"/></a> 
          </div>
          <div class="panel padding-s">
            <span class="categorytags {{ $post->category->name }}">{{ $post->category->name}}</span>
            <h3 style="font-size: 22px;">{{$post->title_en}}</h3>
            <div class="right">
            <a class="btn btnAabsolute btn-pink" href="activities/{{$post->id}}"> {{Lang::get('app.start')}}</a>
            </div>
          </div>
        </div>
    @endforeach 
    <div class="col-xsm-12 col-sm-12 col-md-12 col-lg-12">
    {!! $activities->render() !!}  
    </div>
  </div>
</div>
<script type="text/javascript">
  $('.Relationship.skills, .Self-awareness, .Self-management, .Social-awareness, .Responsible.Decision-making, .categorytag_1, .categorytag_2, .categorytag_3, .categorytag_4, .categorytag_5').on('click', function () {
    var getid = $(this).attr('class');
      $('.cards').each(function(){

        var categorytags = $(this).find('.categorytags');
       console.log(categorytags);
        if(!categorytags.hasClass(getid)){
          $(this).fadeOut();
        }else if(categorytags.hasClass(getid)){
           $(this).fadeIn();
        }
        
      }); 
  });
</script>
@include('partial.footer')
@endsection