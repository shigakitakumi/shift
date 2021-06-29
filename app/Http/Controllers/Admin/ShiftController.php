<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Shift;

class ShiftController extends Controller
{
    public function add()
    {
        return view('admin.shift.create');
    }
    
    public function create(Request $request)
    {
        $this->validate($request, Shift::$rules);
        
        $shift = new Shift;
        $form = $request->all();
        
        unset($form['_token']);
        
        $shift->fill($form);
        $shift->save();
        
        return redirect('admin/shift/create');
    }
    
    public function index(Request $request)
    {
        $searchDate = $request->searchDate;
        $date = Shift::where($request->date);
        if ($searchDate != '') {
            $posts = Shift::where('date', '>', $searchDate)->get();
        } else {
            $posts = Shift::all();
        }
        
        return view('admin.shift.index', ['posts' => $posts, 'searchDate' => $searchDate, 'date' => $date]);
    }
    
    public function edit(Request $request)
    {
        $shift = Shift::find($request->id);
        
        return view('admin.shift.edit', ['shift_form' => $shift]);
    }
    
    public function update(Request $request)
    {
        $this->validate($request, Shift::$rules);
        $shift = Shift::find($request->id);
        $shift_form = $request->all();
        unset($shift_form['_token']);
        unset($shift_form['remove']);
        unset($shift_form['_token']);
        $shift->fill($shift_form)->save();
        
        return redirect('admin/shift');
    }
    
    public function display(Request $request)
    {
        $shifts = Shift::where('date',$request->date)->get();
        //dd($shifts);
        
        
        
        return view('admin.shift.display', ['shifts' => $shifts,'date' => $request->date,  ]);
    }
}
