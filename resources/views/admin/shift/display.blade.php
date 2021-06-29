@extends('layouts.admin')

@section('title', 'シフト')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>{{ $date }}</h2>
                <div class="return-button">
                    <div class="item">
                       <button type="button" onClick="history.back()" class="btn btn-primary">戻る</button> 
                    </div>
                </div>
                <form action="{{ action('Admin\ShiftController@display') }}" method="get">
                    <table border="1">
                        <tr>
                            <th>時間</th>
                            <th>名前</th>
                        </tr>
                        @foreach($shifts as $shift)
                        <tr>
                            <td>{{ $shift->start_time }} ~ {{ $shift->end_time }}</td>
                            <td>{{ $shift->user_id }}</td>
                        </tr>
                        @endforeach
                    </table>
                </form>
            </div>
        </div>
    </div>
@endsection