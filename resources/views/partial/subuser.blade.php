<meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>

<script type="text/javascript">
  $(document).ready(function () {

    if ($('#subuser').val() == "")
    {
      $('#myModal').modal('toggle');
    }


    //clickable row
    $(".clickable-row").click(function () {

      if ($(this).data("id") == "admin")
      {
        window.location.href = 'account';
      }else{

        $.get( "dashboard/" + $(this).data("id"), function( data ) {
          $( ".result" ).html( data );
          // alert("Load was performed.");
          window.location.href = 'dashboard';
          // location.reload();
        });

      }
    });

  });


</script>
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

<input type="hidden" id="subuser" value="{{session('subuser')}}">

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Select profile</h4>
      </div>
      <div class="modal-body">
        <meta name="_token" content="{{ csrf_token() }}">

        <table class="zui-table zui-table-horizontal zui-table-highlight">

          <!-- Table Headings -->


          <!-- Table Body -->
          <tbody>

            <!-- admin profile -->
            <tr class="clickable-row" data-id="admin">

              <td class="table-text">
                <div>
                  <img src="{{ URL::asset('img/kid.jpg') }}" width="55%" height="10%" alt="kid">
                </div>
              </td>
              <td class="table-text">
                <div><b>{{Auth::user()->getNameOremail()}}</b> </div>
              </td>


              <td>

                <a href="{{ URL::to('account') }} "> Ändra/Radera  konto</a>

              </td>
            </tr>
            <!-- finish admin profile -->

            @foreach (Auth::user()->users() as $subuser)
            <tr class="clickable-row" data-id="{{ $subuser->id }}">

              <td class="table-text">
                <div>
                  <img src="{{ URL::asset('img/kid.jpg') }}" width="55%" height="10%" alt="kid">
                </div>
              </td>
              <td class="table-text">
                <div>{{ $subuser->username }} </div>
              </td>


              <td>

                <a href="{{ URL::to('subusers/' . $subuser->id . '/edit') }} "> Ändra</a>/ <a class="btn btn-small btn-info" href="{{ URL::to('subusers/' . $subuser->id . '/delete') }}">Radera  konto</a>

              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button onclick="location.href='{{ url('/subusers/create') }}'" type="button" class="btn btn-success">Skapa konto</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

      </div>
    </div>
  </div>
</div>