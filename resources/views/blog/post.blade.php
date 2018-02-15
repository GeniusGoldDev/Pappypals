@extends('share.default')
@section('title', 'articles')
@section('id', 'articles')
@section('content')
@include('partial.header')

<section class="grownUps_dashbord">
  <div id="myTabContent" class="tab-content container" style="padding-top: 20px;">
    <div class="tab-pane fade active in" id="home">
      <div class="container">
        <h1>{{ $post->title }}</h1><p>
     </div>
    </div>
  </div>
</section>
<div class="container pull-down grownUps_body"> 
    <h5>{{ $post->published_at->format('M jS Y g:ia') }}</h5>
    <hr>
    {!! nl2br(e($post->content)) !!}
    <hr>
    <button class="btn btn-primary" onclick="history.go(-1)">
      « Back
    </button>
</div>
