@extends('share.default')

@section('title', 'Settings')

@section('content')



<div class="col-sm-12 col-md-12 col-lg-12">
    <div class="col-md-4">
      <h3> Dina kontouppgifter</h3>
      <h4>Användarnamn: {{$data['user']->getNameOremail()}}</h4>
      <h4>Kortnummer: xxxx xxxx xxxx {{$data['user']->last_four}}</h4>
      <h4>Kontotyp: {{$data['user']->stripe_plan}}</h4>
    </div>
    <div class="col-md-4">
      <h3> Invoices</h3>
      @foreach ($data['user']->invoices() as $invoice)

      <h4>Date: {{ $invoice->date()->toFormattedDateString() }}</h4>
      <h4>Total: {{ $invoice->total() }}</h4>
      <h4> <a href="user/invoice/{{ $invoice->id }}">Download</a></h4>
      @endforeach
    </div>
    <div id="users" class="col-md-4">
      <h3>Sub konto</h3>
      @if (count($data['users']) > 0)
      @foreach ($data['users'] as $subuser)
      <button type="button" class="btn btn-default btn-lg">
        <i class="fa fa-star" aria-hidden="true"></i> {{ $subuser->username }} 
      </button>
      <a href="{{ URL::to('subusers/' . $subuser->id . '/edit') }}">ändra </a>/ <a class="" href="{{ URL::to('subusers/' . $subuser->id . '/delete') }}">radera</a>
      <br>
      <br>
      @endforeach
      @endif
      <label>
        <button onclick="location.href='{{ url('subusers/create') }}'" type="button" class="btn btn-success">Skapa konto</button>
      </label>
      <label>
        <button onclick="location.href='{{ url('Activity') }}'" type="button" class="btn btn-info">Account Activity</button>
    </div>
      <button onclick="location.href='{{ url('/ChangePassword') }}'" type="button" class="btn btn-info">Change Password</button>
      <button type="button" class="btn btn-success" onclick="location.href='{{ url('/upgrade') }}'">Upgrade</button>
      <button type="button" class="btn btn-danger" onclick="location.href='{{ url('/cancel') }}'">Cancel</button>
    </div>
</div>

@include('partial.footer')
@endsection