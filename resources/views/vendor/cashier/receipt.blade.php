<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Invoice</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
      body {
        background: #fff;
        background-image: none;
        font-size: 16px;
      }
      address{
        margin-top:15px;
      }
      h2 {
        font-size:16px;
        color:#cccccc;
      }
      .container {
        padding-top:30px;
      }
      .invoice-head td {
        padding: 0 8px;
      }
      .invoice-body{
        background-color:transparent;
      }
      .logo {
        padding-bottom: 10px;
        max-width: 160px;
      }
      .table th {
        vertical-align: bottom;
        font-weight: bold;
        padding: 8px;
        line-height: 20px;
        text-align: left;
      }
      .table td {
        padding: 8px;
        line-height: 20px;
        text-align: left;
        vertical-align: top;
        border-top: 1px solid #dddddd;
      }
      .well {
        margin-top: 15px;
      }

      .auto-style1 {
        width: 671px;
      }
      .small {
        font-size: 13px;
      }
      #table {
        width: 470px;
        border-top: 4px solid #e3e7e7;
      }

      #table p {
        clear: both;
        width: 100%;
        margin: 0;
      }

      #table span {
        float: left;
        padding: 0 10px;
        border-left: 1px solid #e3e7e7;
        border-bottom: 1px solid #e3e7e7;
      }

      #table span.col1 {
        width: 110px;
      }

      #table span.col2 {
        width: 186px;
      }

      #table span.col3 {
        width: 110px;
        border-right: 1px solid #e3e7e7;
      }
    </style>
  </head>

  <body>
    <div class="container">
      <a class="navbar-brand logo" href="/">
        <img src='\public\img\Logo.jpg' alt="Pappy pals" style="height: 248px; width: 412px">
      </a>
<br>
      <!-- Organization Name / Date -->

      <strong>To:</strong> {{ $billable->getBillableName() }}
      <br>
      <strong>Date:</strong> {{ $invoice->date()->toFormattedDateString() }}


      <tr valign="top">
        <!-- Organization Details -->
        <td style="font-size:32px;" class="auto-style1">
          {{ $vendor }}<br>
          @if (isset($street))
          {{ $street }}<br>
          @endif
          @if (isset($location))
          {{ $location }}<br>
          @endif
          @if (isset($phone))
          <strong>T</strong> {{ $phone }}<br>
          @endif
          @if (isset($url))
          <a href="{{ $url }}">{{ $url }}</a>
          @endif
        </td>
  
          <!-- Invoice Info -->
          <p>
            <strong>Product:</strong> {{ $product }}<br>
            <strong>Invoice Number:</strong> {{ $invoice->id }}<br>
          </p>

          <!-- Extra / VAT Information -->
          @if (isset($vat))
          <p>
            {{ $vat }}
          </p>
          @endif

          <br><br>

          <!-- Invoice Table -->
          <div id="table">
            <p><span class="col1">Description</span><span class="col2">Date</span><span class="col3">Amount</span></p>

            <!-- Display The Invoice Items -->

            @foreach ($invoice->invoiceItems() as $item)
            <tr>
              <td colspan="2">{{ $item->description }}</td>
              <td>{{ $item->dollars() }}</td>
            </tr>
            @endforeach

            <!-- Display The Subscriptions -->
            @foreach ($invoice->subscriptions() as $subscription)
            <p><span class="col1 small">Subscription ({{ $subscription->quantity }})</span><span class="col2 small">{{ $subscription->startDateString() }} - {{ $subscription->endDateString() }}</span><span class="col3 small">{{ $subscription->dollars() }}</span></p>

            @endforeach

            <!-- Display The Discount -->

            <br>
            <!-- Display The Final Total -->
            <p><span class="col1">&nbsp;</span><span class="col2">&nbsp;</span><span class="col3"><strong>Total</strong>
              <strong>{{ $invoice->dollars() }}</strong></span></p>


          </div>
          @if ($invoice->hasDiscount())
          <tr>
            @if ($invoice->discountIsPercentage())
            <td>{{ $invoice->coupon() }} ({{ $invoice->percentOff() }}% Off)</td>
            @else
            <td>{{ $invoice->coupon() }} (${{ $invoice->amountOff() }} Off)</td>
            @endif
            <td>&nbsp;</td>
            <td>-${{ $invoice->discount() }}</td>
          </tr>
          @endif

          <!-- Existing Balance -->
          @if (isset($invoice->starting_balance))
          <tr>
            <td>Starting Balance</td>
            <td>{{ $invoice->startingBalanceWithCurrency() }}</td>
          </tr>
          @endif
    </div>
      </body>
    </html>
