@extends('share.default')
@section('title', 'articles')
@section('id', 'articles')
@section('content')
@include('partial.header')
<style>
  
  .thumbnail {
    padding:0px;
  }
  .panel {
    position:relative;
  }
  .panel-body{
    color: #000;
  }
  .panel>.panel-heading:after,.panel>.panel-heading:before{
    position:absolute;
    top:11px;left:-16px;
    right:100%;
    width:0;
    height:0;
    display:block;
    content:" ";
    border-color:transparent;
    border-style:solid solid outset;
    pointer-events:none;
  }
  .panel>.panel-heading:after{
    border-width:7px;
    border-right-color:#f7f7f7;
    margin-top:1px;
    margin-left:2px;
  }
  .panel {
    background-color: #fff!important;
  }
  .panel>.panel-heading:before{
    border-right-color:#ddd;
    border-width:8px;
  }
  .article{
  padding: 10px;
border: 1px solid #eee !important;
    height: 190px;
  }
  .article img {
    width:300px;
    float: left;
    margin-right: 20px;
  }
  .article button {
  float: right;
  }
</style>

<section class="grownUps_dashbord">
  <div id="myTabContent" class="tab-content container" style="padding-top: 20px;">
    <div class="tab-pane fade active in" id="home">
      <div class="container">
        <h1>{{ config('blog.title') }}</h1><p>
        Welcome to our expert blog designed just for you. It’s a simple and effective guide providing you with quality time together with your kids; playing together, laughing and having fun while you both learn life-changing lessons. We provide short tips on how to integrate emotional intelligence into your everyday interaction – in 1 minute!

        The 1-minute Peppy Talks is written by Paulina Olsson and based on Bodil Wennberg’s knowledge and expertise. Bodil is a renown psychologist and author of Emotional Intelligence books in the Nordic, EQ for Parents.</p>
      </div>
    </div>
  </div>
</section>
<div class="container pull-down grownUps_body"> 
  <div class="row">
    @foreach ($posts as $post)
      <div class="col-md-12 card">
            <div class="col-md-4 card-image">
              <img src="{{ str_limit($post->blog_madia) }}">
            </div>
            <div class="col-md-8 card_content">   
              <p>
                {{ $post->title }}
                {{ str_limit($post->content) }}
              </p>
              <a href="/blog/{{ $post->slug }}">Mer..</a>          
            </div>
        </div>
      @endforeach
    </div>
</div>
{!! $posts->render() !!}
@include('partial.footer')
@endsection