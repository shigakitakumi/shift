@extends('layouts.admin')

@section('title', 'シフトの編集')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>シフト編集画面</h2>
                <div class="return-button">
                    <div class="item">
                       <button type="button" onClick="history.back()" class="btn btn-primary">戻る</button> 
                    </div>
                </div>
                <form action="{{ action('Admin\ShiftController@update') }}" method="post" enctype="multipart/form-data">
                    
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-2" for="date">日付</label>
                        <div class="col-md-10">
                            <input type="date" class="form-control" name="date" value="{{ $shift_form->date }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="start_time">開始時間</label>
                        <div class="col-md-10">
                            <input type="time" class="form-control" name="start_time" value="{{ $shift_form->start_time }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="end_time">終了時間</label>
                        <div class="col-md-10">
                            <input type="time" class="form-control" name="end_time" value="{{ $shift_form->end_time }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="name">名前</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="user_id" row="20">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-10">
                            <input type="hidden" name="id" value="{{ $shift_form->id }}">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary" value="更新">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection