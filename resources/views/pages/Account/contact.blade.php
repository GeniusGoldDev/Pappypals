@extends('share.default')
@section('title', 'contact')
@section('id', 'contact')
@section('content')
@include('partial.header')
<section class="grownUps_dashbord">
  <div id="myTabContent" class="tab-content container" style="padding-top: 20px;">
    <div class="tab-pane fade active in" id="home">
      <div class="container">
          <h1>{{Lang::get('app.add_kid')}}</h1>
      </div>
    </div>
  </div>
</section>
<div class="container">
<div class="col-sm-6">
<h3>{{Lang::get('app.general_enquiries_job_opportunities')}}</h3>
<p>{{Lang::get('app.send_an_email_to')}}</p>
<h3>{{Lang::get('app.game-related_inquiries')}}</h3>
<p>{{Lang::get('app.send_an_email_to_support')}}</p>
</div>

<div class="col-sm-6">
<h3>{{Lang::get('app.visit_us')}}</h3>
<p>{{Lang::get('app.peppy_adress')}}</p>
<iframe style="border: 0px none; opacity: 1; visibility: visible;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2034.4286862587378!2d18.055282751551452!3d59.3424916815734!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x465f9d6f2ebeb10f%3A0xf7fe3040ed485a38!2sSveav%C3%A4gen+98%2C+113+50+Stockholm!5e0!3m2!1ssv!2sse!4v1487061450960" allowfullscreen="allowfullscreen" width="400" height="300" frameborder="0"></iframe>
</div>
</div>
@include('partial.footer')
@endsection

