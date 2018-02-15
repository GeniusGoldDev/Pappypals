@extends('share.default')
@section('title', 'Settings')
@section('id', 'settings')
@section('content')
@include('partial.header')

<section class="grownUps_dashbord">
  <div id="myTabContent" class="tab-content container" style="padding-top: 20px;">
    <div class="tab-pane fade active in" id="home">
      <div class="container">
        <h1>Kontoinställningar</h1>
      </div>
    </div>
  </div>
</section>
<div class="container">

<div class="row">   
<h3>{{Lang::get('app.my_account')}}</h3>
<div class="card col-md-12">
<div class="col-md-3">
<h4>{{Lang::get('app.membership')}}</h4>
<button type="button" data-toggle="modal" data-target=".uppgrader" class="btn btn-success">{{Lang::get('app.change')}}</button>
<button type="button" data-toggle="modal" data-target=".cancel" class="btn btn-danger">{{Lang::get('app.cancel')}}</button>
</div>

<div class="col-md-6">
<h4> {{$data['user']->getemail()}}</h4>
<h4> {{Lang::get('app.password')}}: ******</h4>
<hr>        
<h4> <img src="{{URL::asset('img/credit-card.png')}}" style="width: 30px;"> : xxxx xxxx xxxx {{$data['user']->last_four}}</h4>
</div>
<div class="col-md-3">
<h4>
<a href='{{ url("/changeEmail") }}'>{{Lang::get('app.change_mail')}}</a><br>  </h4>
<h4> <a href='{{ url('/ChangePassword') }}'">{{Lang::get('app.change_pass')}}</a></h4>
<div style="margin-top: 41px;">
<h4> <a href="">{{Lang::get('app.update_payment_details')}}</a></h4>
</div>

</div>
</div>
</div>


  <!-- Modal -->
<div class="modal fade cancel" id="cancel" role="dialog">
<div class="modal-dialog">

<!-- Modal content-->
<div style="width: 900px; margin-top: 200px; margin-left: -130px;" class="modal-content clearfix">
<button type="" class="close btnModal" data-dismiss="modal">&times;</button>
<div class="modal-header">
<h4 class="modal-title">{{Lang::get('app.cancel_membership')}}</h4>
</div>
<div class="card col-md-12">
<div class="col-md-3">
<h4>{{Lang::get('app.membership')}}</h4>
<h4>{{$data['user']->stripe_plan}}</h4>
</div>  
<div class="col-md-6 swe">
<p>Klicka på knappen <span style="color: red;">“Avsluta medlemskap”</span> för att avsluta. </p>         
<p>Ditt medlemskap kommer att upphöra att gälla den <soan style="font-weight: bold;">{{$data['user']->trial_ends_at}}</soan> 
Du kan närsomhelst aktivera ditt medlemskap igen.</p>    
</div>
<div class="col-md-6 eng">
<p>Click <span style="color: red;">"Cancel"</span> below to cancel your membership.</p>         
<p>Cancellation will be effective at the end of your current billing period on <span style="font-weight: bold;">{{$data['user']->trial_ends_at}}</span> You can restart your membership anytime.</p>    
</div>

<div class="col-md-3">
<div style="margin-top: 41px;">
<button type="button" class="btn btn-danger" onclick="location.href='{{ url('/cancel') }}'">{{Lang::get('app.cancel')}}</button>
</div>
</div>
</div>
</div>
</div>
</div>

  <!-- Modal -->
<div class="modal fade uppgrader" id="uppgrader" role="dialog">
<div class="modal-dialog">

<!-- Modal content-->
<div style="width: 1100px; margin-top: 200px; margin-left: -210px;" class="modal-content clearfix">
<button type="" class="close btnModal" data-dismiss="modal">&times;</button>
<div class="modal-header">
<h4 class="modal-title">Hantera medlemskap</h4>
<p>Här ser du vilket Peppy Pals medlemskap du har. Vill du byta medlemskap kan du enkelt göra det själv. </p>
</div>
<div class="card col-md-12">
<div class="col-md-3">
<h4>{{Lang::get('app.membership')}}</h4>
<h4>{{$data['user']->stripe_plan}}</h4>
</div>  
<div class="col-md-6 swe">
<h5 style="color: green; font-weight: bold;">Peppy Pals Premium</h5>
<p style="font-weight: bold;">49kr/månad</p> 
<p>Betala smidigt en mindre summa varje månad. Avsluta när du vill*. </p></p>
</div>

<div class="col-md-6 eng">
<h5 style="color: green; font-weight: bold;">Peppy Pals Premium</h5>
<p style="font-weight: bold;">$4.99/month</p> 
<p>Pay a smaller amount each month. Cancel anytime* </p></p>
</div>

<div class="col-md-3">
<span style="background-color: #90EE90; color: #000;" class="btn">{{Lang::get('app.Active')}}</span>
</div>
</div>
<!-- section #2 -->
<div class="card col-md-12">
<div class="col-md-3">
<h4>{{Lang::get('app.membership')}}</h4>
<h4>{{$data['user']->stripe_plan}}</h4>
</div>  
<div class="col-md-6 swe">

<h5 style="color: green; font-weight: bold;">Peppy Pals Unlimited </h5>
<p style="font-weight: bold;">499kr/månad </p> 
<p>Betala en engångssumma och ha obegränsad tillgång till både gammalt och nytt innehåll för alltid.</p>
</div>

<div class="col-md-6 eng">
<h5 style="color: green; font-weight: bold;">Peppy Pals Unlimited</h5>
<p style="font-weight: bold;">$49.99 </p> 
<p>Pay a one-time payment and have unlimited access to both current and new content forever. </p>
</div>

<div class="col-md-3">
<button style="margin-bottom: 16px; background-color: #f00267; border:none;" type="button" class="btn btn-success" onclick="location.href='{{ url('/upgrade') }}'">{{Lang::get('app.uppgrade')}} </button>
</div>
</div>
</div>
</div>
</div>




  <div class="row">
    <h3>Dina barn</h3>
    <div class="card" id="child_view">
      <table class="table table-striped">
        <thead>
          <tr>
            <td>{{Lang::get('app.name')}}</td>
            <td></td>
          </tr>
        </thead>
        @if (count($data['users']) > 0)
        @foreach ($data['users'] as $subuser)
        <tbody>
          <td>
            <img src="{{URL::to('img/'. $subuser->userimage) }}" style="width: 20px;"> {{ $subuser->username }}
          </td>
          <td>
            <a href="{{ URL::to('subusers/' . $subuser->id . '/edit') }}">{{Lang::get('app.edit')}} </a>/ 
            <a href="{{ URL::to('subusers/' . $subuser->id . '/delete') }}">{{Lang::get('app.delete')}}</a>
          </td>
        </tbody>
        @endforeach
        @endif
      </table>
      <br>
      <button onclick="location.href='{{ url('subusers/create') }}'" type="button" class="btn btn-success btnEdit">{{Lang::get('app.create_account')}}</button>
    </div>
  </div> 
<script type="text/javascript">
  $('#child_view').each(function(){
     if($(this).find('tbody').length >= 4){
        $('.btn.btn-success.btnEdit').remove();
     }
  });
</script>
  <div class="row">
    <h3>{{Lang::get('app.payment_history')}}</h3>
    <div class="card">
      <div class="card-body">
        <table class="table table-striped">
          <thead>
            <tr>
              <td>Datum</td>
              <td>Medlemskap</td>
              <td>Period</td>
              <td>Betalningsalternativ</td>
              <td>Belopp</td>
              <td>Kvitto</td>
            </tr>
          </thead>
          <tbody>
            @foreach ($data['user']->invoices() as $invoice)
            <tr>
              <td>{{ $invoice->date()->toFormattedDateString() }}</td>
              <td>{{$data['user']->stripe_plan}}</td>
              <td>{{$data['user']->trial_ends_at}}</td>
              <td>
                <img src="{{URL::asset('img/credit-card.png')}}" style="width: 30px;"> : xxxx xxxx xxxx {{$data['user']->last_four}}
              </td>
              <td>Total: {{ $invoice->total() }}</td>
              <td>
                <a href="user/invoice/{{ $invoice->id }}">{{Lang::get('app.download')}}</a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
  
  </div>
  @endsection