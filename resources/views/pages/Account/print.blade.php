@extends('share.default')
@section('title', 'print')
@section('id', 'articles')
@section('content')
@include('partial.header')
<section class="grownUps_dashbord">
  <div id="myTabContent" class="tab-content container" style="padding-top: 20px;">
    <div class="tab-pane fade active in" id="home">
      <div class="container swe">
        <h1>Artiklar</h1>
        <p>Här hittar du senaste forskning, studier och intressanta artiklar om Emotionell Intelligens. Innehållet är ofta skrivit på engelska. Källorna har noga granskats av vår team, och vi länkar bara till pålitliga hemsidor/publikationer. </p>
        </div>
      <div class="container eng">
        <h1>Articles</h1>
        <p>Here you will find the latest research, studies and intresting articles about Social and Emotional Intelligence. The content is curated by our psychologists, and will sometimes redirect you to external, trusted sources. </p>
        </div>
    </div>
  </div>
</section>
<div class="container pull-down grownUps_body">
  <div class="row">
    <div class="col-md-12 card marginlast">
          <div class="col-md-4 card-image swe">
            <img src="">
          </div>
          <div class="col-md-4 card-image eng">
            <img src="">
          </div>

          <div class="col-md-8 card_content swe"> 
            <h2></h2>  
            <p></p>
            <a target="_blank" href="">Mer..</a>  
            <!-- blogg sida -->
          </div>
          <div class="col-md-8 card_content eng"> 
            <h2></h2>  
            <p></p>
            <a target="_blank" href="">Read more..</a>  
            <!-- blogg sida -->
          </div>
      </div>
  </div>
</div>

@include('partial.footer')
@endsection