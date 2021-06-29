@extends('layouts.schedule')

@section('title', 'スケジュール')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>{{ $shift->date }}</h2>
                <div class="return-button">
                    <div class="item">
                       <button type="button" onClick="history.back()" class="btn btn-primary">戻る</button> 
                    </div>
                </div>
                
                    <table border="1">
                        <tr>
                            <th>はい</th>
                            <th>いいえ</th>
                        </tr>
                        @foreach($shift->schedules as $schedule)
                        <tr>
                            <td>{{ $schedule->reply == 1 ? $schedule->user->name : '' }}</td>
                            <td>{{ $schedule->reply == 0 ? $schedule->user->name : '' }}</td>
                        </tr>
                        @endforeach
                    </table>
                
            </div>
        </div>
    </div>
@endsection