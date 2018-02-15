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
        <img src='{{$_SERVER["DOCUMENT_ROOT"]}}\public\img\Logo.jpg' alt="Pappy pals" style="height: 248px; width: 412px">
      </a>
<br>
<h2>Password Reset</h2>
<div>
Reset your password, complete <a href="{{ URL::to('password/reset', array($token)) }}">form</a>.
    <br />
    
This link will expire in {{ Config::get('auth.reminder.expire', 120) }} minutes.</div>
      <span style="color: rgb(153, 153, 153); font-family: "Helvetica Neue", Helvetica, Arial, sans-serif, serif, EmojiFont;>if you have any problem copy and paste this link in your browser {{ url('password/reset/'.$token) }}</span>
</body>
</html>
  
