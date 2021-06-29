<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Schedule;
use App\Shift;
use Illuminate\Support\Facades\Auth;

class ScheduleController extends Controller
{
    public function add(Request $request)
    {
        $shift = Shift::find($request->shift_id);
        $user_id = Auth::id();
        return view('admin.schedule.create', ['shift' => $shift, 'user_id' => $user_id]);
    }
    
    public function create(Request $request)
    {
        $this->validate($request, Schedule::$rules);
        
        $shift = Shift::find($request->shift_id);
        
        $schedule = new Schedule;
        $form = $request->all();
        
        $schedule->fill($form);
        $schedule->user_id = Auth::id();
        $schedule->date = $shift->date;
        $schedule->start_time = $shift->start_time;
        $schedule->end_time = $shift->end_time;
        $schedule->save();
        
        return redirect()->back();
    }
    
    public function index(Request $request)
    {
        
        $searchDate = $request->searchDate;
        if ($searchDate !='') {
            $posts = Schedule::where('date', '>', $searchDate)->get();
        } else {
            $posts = Schedule::all();
        }
        
        return view('admin.schedule.index', ['posts' => $posts, 'searchDate' => $searchDate]);
    }

    public function edit(Request $request)
    {
        $schedule = Schedule::find($request->id);
        
        
        return view('admin.schedule.edit', ['schedule_form' => $schedule]);
    }

    public function update(Request $request)
    {
        $this->validate($request, Schedule::$rules);
        $schedule_form = $request->all();
        $schedule = Schedule::find($request->id);
       
        unset($schedule_form['_token']);
        unset($schedule_form['remove']);
        unset($schedule_form['_token']);
        $schedule->fill($schedule_form)->save();
        
        
        return redirect('admin/schedule/');
    }
    
    public function display(Request $request)
    {
        $schedules = Schedule::where('shift_id',$request->id)->where('reply',true)->get();
        $shift = Shift::find($request->id);
        $user_id = Auth::id();
        
        
        
        return view('admin.schedule.display', ['schedules' => $schedules, 'shift' => $shift]);
    }
}
