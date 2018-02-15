<meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
  <script src="{{asset('js/jquery.min.js')}}"></script>
<style>
body.modal-open div.modal-backdrop { 
    z-index: 0; 
}
	.zui-table {
    border: solid 1px #DDEEEE;
    border-collapse: collapse;
    border-spacing: 0;
    font: normal 13px Arial, sans-serif;
}
.zui-table thead th {
    background-color: #DDEFEF;
    border: solid 1px #DDEEEE;
    color: #336B6B;
    padding: 10px;
    text-align: left;
    text-shadow: 1px 1px 1px #fff;
}
.zui-table tbody td {
    border: solid 1px #DDEEEE;
    color: #333;
    padding: 10px;
    text-shadow: 1px 1px 1px #fff;
}
.zui-table-highlight tbody tr:hover {
    background-color: #CCE7E7;
}
.zui-table-horizontal tbody td {
    border-left: none;
    border-right: none;
}
</style>

@extends('share.default')

@section('title', 'dashbord')
@section('content')
@include('partial.header_logo')
    <!-- Create Task Form... -->

    <!-- Current Tasks -->
 @if(session('subuser') != "")

<div class="container-fluid" style="margin: 50px 0 0 0;">
<div class="container">

<h1>Welcome {{session('subuser')->username}}</h1>
<div class="">Games</div>
<div class="">Books</div>
<div class="">Videos</div>
</div>
</div>
@endif

@endsection