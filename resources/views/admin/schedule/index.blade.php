@extends('layouts.schedule')
@section('title', '登録済みのスケジュール一覧')

@section('content')
    <div class="container">
        <div class="row">
            <h2>スケジュール一覧</h2>
        </div>
        <div class="buttons">
            <div class="item">
                <button type="button" onClick="history.back()" class="btn btn-primary">戻る</button> 
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <a href="{{ action('Admin\ShiftController@add') }}" role="button" class="btn btn-primary">シフト新規作成</a>
            </div>
            <div class="col-md-8">
                <form action="{{ action('Admin\ScheduleController@index') }}" method="get">
                    <div class="from-group row">
                        <label class="col-md-2">日付検索</label>
                        <div class="col-md-8">
                            <input type="date" class="form-control" name="searchDate" value="{{ $searchDate }}">
                        </div>
                        <div class="col-md-2">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary" value="検索">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="list-shift col-md-12 mx-auto">
                <div class="row">
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th width="20%">日付</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $schedule)
                                <tr>
                                    <th>{{ $schedule->id }}</th>
                                    <th>{{ \Str::limit($schedule->date,100) }}</th>
                                    <td>{{ \Str::limit($schedule->start_time, 150) }}</td>
                                    <td>{{ \Str::limit($schedule->end_time, 150) }}</td>
                                    <td>
                                        <div>
                                            <a href="{{ action('Admin\ScheduleController@edit', ['id' => $schedule->id]) }}">編集</a>
                                            
                                            <a href="{{ action('Admin\ScheduleController@display', ['id' => $schedule->shift->id]) }}">スケジュール</a>
                                        </div>
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