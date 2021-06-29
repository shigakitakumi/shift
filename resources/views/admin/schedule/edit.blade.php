@extends('layouts.schedule')

@section('title', 'スケジュールの編集')

@section('content')

<div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>スケジュール編集</h2>
                <div class="buttons">
                    <div class="item">
                       <button type="button" onClick="history.back()" class="btn btn-primary">戻る</button> 
                    </div>
                    <div class="item">
                        <input type="submit" class="btn btn-primary" value="検索">
                    </div>
                </div>
                <form action="{{ action('Admin\ScheduleController@update') }}" method="post" enctype="multipart/form-data">
                    
                    @if(count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-2" for="date">日付</label>
                        <div class="col-md-10">
                            <input type="date" class="form-control" name="date" value="{{ $schedule_form->date }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="start_time">開始時間</label>
                        <div class="col-md-10">
                            <input type="time" class="form-control" name="start_time" value="{{ $schedule_form->start_time }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="end_time">終了時間</label>
                        <div class="col-md-10">
                            <input type="time" class="form-control" name="end_time" value="{{ $schedule_form->end_time }}">
                        </div>
                    </div>
                    <div class="button-position">
                        <form action="hogehoge">
                            <div class="form-group row">
                                <label class="col-md-2" for="shift_id"></label>
                            </div>
                            <div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" class="btn-check" name="reply" value="1" id="schedule-yes">
                                    <label class="btn btn-secondary" for="schedule-yes">
                                    はい
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="radio" class="btn-check" name="reply" value="0" id="schedule-no">
                                    <label class="btn btn-secondary" for="schedule-no">
                                    いいえ
                                </label>
                            </div>
                            </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-10">
                            <input type="hidden" name="id" value="{{ $schedule_form->id }}">
                            {{ csrf_field() }}
                            <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                            <input type="submit" class="btn btn-primary" value="更新">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection