<?php

namespace App\Http\Controllers;

use App\Models\ZoomClass;
use App\Traits\ZoomMeetingTrait;
use Illuminate\Http\Request;
use Auth;

class MeetingController extends Controller
{
    use ZoomMeetingTrait;

    const MEETING_TYPE_INSTANT = 1;
    const MEETING_TYPE_SCHEDULE = 2;
    const MEETING_TYPE_RECURRING = 3;
    const MEETING_TYPE_FIXED_RECURRING_FIXED = 8;

    public function index()
    {
        $staff_id =  Auth::guard('staff')->user()->id;
        $modules = Module::where("assigned_staff", $staff_id)->get();
        $classes = ZoomClass::all();
        return view('staff.online_class.index', compact('classes','modules'));
    }

    public function index_student()
    {
        $classes = ZoomClass::all();
        return view('student.online_class', compact('classes'));
    }
    public function show($id)
    {
        $meeting = $this->get($id);

        return view('staff.online_class.index', compact('meeting'));
    }

    public function store(Request $request)
    {
        $online_class = request()->validate([
            'title' => 'required',
            'module' => 'required',
            'date' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
            'desc' => 'required',
        ]);
        $zoom = $this->create([
            'title' => $request['title'],
            'start_time' => $request['start_time'],
            'desc' => $request['desc'],
        ]);

        ZoomClass::create([
            'title' => $online_class['title'],
            'desc' => $online_class['desc'],
            'date' => $online_class['date'],
            'duration' => $zoom['duration'],
            'start_time' => $zoom['start_time'],
            'join_url' => $zoom['join_url'],
            'start_url' => $zoom['start_url'],
            'password' => $zoom['password'],
            'staff_id' => Auth::guard('staff')->user()->id,
        ]);
        return redirect('staff/online-class');
        // return redirect()->route('meetings.index');
    }

    public function update($meeting, Request $request)
    {
        $this->update($meeting->zoom_meeting_id, $request->all());

        return redirect()->route('meetings.index');
    }

    public function destroy(ZoomMeeting $meeting)
    {
        $this->delete($meeting->id);

        return $this->sendSuccess('Meeting deleted successfully.');
    }
}