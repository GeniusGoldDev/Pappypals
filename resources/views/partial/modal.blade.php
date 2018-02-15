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



</style>



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
                        @foreach ($data['users'] as $subuser)
                            <tr class="clickable-row" data-id="{{ $subuser->id }}">
                                  
                                <td class="table-text">
                                    <div>
                                 <img src="{{ URL::asset('img/kid.jpg') }}" width="60%" height="15%" alt="kid">
                                        </div>
                                </td>
                                <td class="table-text">
                                    <div>{{ $subuser->username }} </div>
                                </td>

                               
                                <td>
                                 
                                      <a href="{{ URL::to('subusers/' . $subuser->id . '/edit') }} "> Ändra/Radera  konto</a>

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