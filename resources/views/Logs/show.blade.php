@extends('share.default')

@section('title', 'account')
@section('content')
@include('partial.header')
<meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
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
  .panel {
    background-color: #fff!important;
  }
</style>

<!-- Current Tasks -->
<section style="background-image: url('img/bg-account.png'); color: #fff;">
  <div id="myTabContent" class="tab-content container" style="padding-top: 20px;">
    <div class="tab-pane fade active in" id="home">
      <div class="container">
        <h1>Account activity</h1>
      </div>
    </div>
  </div>
</section>
<div class="container">
  <div class="col-sm-8 col-md-8 col-lg-8 panel">

    <div class="panel-default FixTop">

      <div class="panel-heading">
        Account Activity
      </div>

      <div class="panel-body">
        <table class="table table-striped task-table">
          <thead>

            <th>Username</th>

            <th>Action</th>
            <th>Time</th>
          </thead>
          <tbody>
            @foreach ($logs as $log)
            <tr>
              <td class="table-text">
                <div>{{ $log->username }} 
                  </td>
              <td class="table-text">
                <div>{{ $log->action }} 
                  </td>
              <td class="table-text">
                <div>  {{ $log->created_at }}</div>
              </td>
              <td>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@include('partial.footer')
@endsection