<?php

namespace App\Http\Controllers;

use App\Project;
use App\ProjectStaff;
use App\Screenshot;
use App\Setting;
use App\Staff;
use App\TimeTracker;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TestApiController extends Controller
{
    public function dextop_login(Request $request)
    {
        // $user = User::where('email', $request->email)
        //     ->join('employees', 'employees.employee_id', 'users.id')
        //     ->selectRaw('users.*, employees.screenshot_duration')
        //     ->first();
            
        // if(!isset($user->screenshot_duration)){
        //     $default_screenshot_duration = Setting::where('user_id', Auth::user()->id)->value('screenshot_duration');
        //     $user->screenshot_duration = $default_screenshot_duration;
        // }
        
        $user = User::where('email', $request->email)->get();
        return json_encode($user);
    }

    public function dextop_projects(Request $request)
    {
        $email = $request->email;
        $user_id = User::where('email', $email)->value('id');

        // $staff_id = null;
        // foreach($staff as $stf){
        //     $staff_id = $stf->id;
        // }

        // $project_ids = ProjectStaff::where('staff_id', $staff_id)->selectRaw('project_id')->toSql();
        $project_ids = DB::table('project_people')
            ->where('user_id', $user_id)
            ->selectRaw('project_id')
            ->get();

        $project_staff_ids_array = [];

        foreach ($project_ids as $id) {
            array_push($project_staff_ids_array, $id->project_id);
        }

        $projects = Project::whereIn('id', $project_staff_ids_array)->select('title')->get()->pluck('title');
        return json_encode($projects);
    }

    public function dextop_time_tracker(Request $request)
    {
        $email = $request->email;
        $project = $request->project;
        $task_title = $request->task_title;


        $user_id = User::where('email', $email)->first()->id;
        $project_id = Project::where('title', $project)->first()->id;

        $time_tracker = new TimeTracker();
        $time_tracker->project_id = $project_id;
        $time_tracker->user_id = $user_id;
        $time_tracker->task_title = $task_title;
        $time_tracker->start  = date('Y-m-d H:i:s');
        $time_tracker->save();

        // $response = array($time_tracker);
        // return json_encode($response);
        return $time_tracker->id;
    }

    public function dextop_time_tracker_stop(Request $request)
    {
        $timeTrackerId = $request->timeTrackerId;

        $timeTracker = TimeTracker::findOrFail($timeTrackerId);
        $timeTracker->end  = date('Y-m-d H:i:s');
        $timeTracker->save();
    }

    public function dextop_test_upload(Request $request)
    {
        $email = $request->email;
        $timeTrackerId = $request->timeTrackerId;

        $user_id = User::where('email', $email)->first()->id;

        $screenshot = new Screenshot();
        $screenshot->time_tracker_id = $timeTrackerId;
        $screenshot->user_id = $user_id;

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $extention = $file->getClientOriginalExtension();

            //naming file
            $staff_name = User::where('email', $email)->first()->name;
            $single_names = explode(" ", $staff_name);
            $first_name = $single_names[0];
            $first_name = strtolower($first_name);
            $reversed_first_name = strrev($first_name);

            $filename = time() . '_' . $reversed_first_name . '_time_tracker_no_' . $timeTrackerId . '.' . $extention;
            $file->move('captured/', $filename);

            $screenshot->image = $filename;
        }

        $screenshot->save();
    }
}
