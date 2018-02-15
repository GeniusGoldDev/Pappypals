@extends('share.default')
@section('title', 'account')
@section('id', 'account')
@section('content')
@include('partial.header_logo')
    <!-- Create Task Form... -->
    <!-- Current Tasks -->
    @if (count($subusers) > 0)
        <div class="panel panel-default FixTop">
            <div class="panel-heading">
                Current Users
            </div>

            <div class="panel-body">
                <table class="table table-striped task-table">

                    <!-- Table Headings -->
                    <thead>
                        <th>Username</th>
                    
                          <th>Age</th>
                    </thead>
                    <!-- Table Body -->
                    <tbody>
                        @foreach ($subusers as $subuser)
                            <tr>
                                <!-- Task Name -->
                                <td class="table-text">
                                    <div>{{ $subuser->username }} 
                                </td>

                                <td class="table-text">
                                    <!-- TODO: Delete Button -->
                                  <div>  {{ $subuser->age }}</div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
@include('partial.footer')

@endsection