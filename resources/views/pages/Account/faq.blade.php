@extends('share.default')
@section('title', 'faq')
@section('id', 'faq')
@section('content')
@include('partial.header')
<section class="grownUps_dashbord">
  <div id="myTabContent" class="tab-content container" style="padding-top: 20px;">
    <div class="tab-pane fade active in" id="home">
      <div class="container">
        <h1>Support och vanliga frågor</h1>
      </div>
    </div>
  </div>
</section>
<div class="container grownUps_body">
  <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
    <div class="panel panel-default">
      <div class="panel-heading" role="tab" id="headingOne">
        <h4 class="panel-title clearfix">
          <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            <span class="more-less glyphicon glyphicon-chevron-right"></span>          
          </a>
        </h4>
      </div>
      <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
        <div class="panel-body">
          <img src="">
          <p>Support och vanliga frågor</p>
        </div>
      </div>

      <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
        <div class="panel-body">
          <img src="">
          <p>Support och vanliga frågor</p>
        </div>
      </div>

      <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
        <div class="panel-body">
          <img src="">
          <p>Support och vanliga frågor</p>
        </div>
      </div>

     

    </div>
  </div>
  </div>

@include('partial.footer')
@endsection