@extends('layouts.schedule')

@section('title', 'スケジュールの作成')

@section('content')

<div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>スケジュール新規作成</h2>
                <div class="buttons">
                    <div class="item">
                       <button type="button" onClick="history.back()" class="btn btn-primary">戻る</button> 
                    </div>
                    <div class="item">
                        <input type="submit" class="btn btn-primary" value="検索">
                    </div>
                </div>
                <form action="{{ action('Admin\ScheduleController@create') }}" method="post" enctype="multipart/form-data">
                    
                    @if(count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <input type="hidden" name="user_id" value="{{ $user_id }}" />
                        <input type="hidden" name="shift_id" value="{{ $shift->id }}" />
                        <label class="col-md-2" for="shift_id">シフト</label>
                        <div class="col-md-10">
                            <div>{{ $shift->date }} {{ $shift->start_time }} ~ {{ $shift->end_time }}</div>
                        </div>
                    </div>
                    <div class="button-position">
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
                            {{ csrf_field() }}
                    </div>
                    <div class="registration">
                        <input type="submit" class="btn btn-primary" value="登録">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection