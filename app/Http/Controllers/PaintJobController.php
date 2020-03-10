<?php

namespace App\Http\Controllers;

use App\PaintJob;
use App\PaintQueue;
use Illuminate\Http\Request;
use DB;

class PaintJobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $paintjobs = PaintJob::all();
        $count_pj = $paintjobs->count();
        if($count_pj > 0){
            $completed_jobs = DB::table("paint_jobs")->select('id')->where("status_id",2)->get();
            $count_of_completed_jobs = $completed_jobs->count();
            $paintqueues = DB::table("paint_queues")->select("*");
            $paintqueuesCount = $paintqueues->count();
            // dd($paintqueuesCount);
            if($paintqueuesCount > 0){
                if($count_of_completed_jobs < 5){
                    $first = $paintqueues->first();
                    $newJob = new PaintJob;
                    $newJob->plate_number = $first->plate_number;
                    $newJob->current_color = $first->current_color;
                    $newJob->target_color = $first->target_color;
                    $newJob->created_at = $first->created_at;
                    $newJob->updated_at = $first->updated_at;
                    $updateQueue = PaintQueue::find($first->id);
                    $updateQueue->status_id = 2;
                    // dd($first->id);
                    // dd($first);  1
                    $newJob->save();
                    $updateQueue->save();
                }
            }
            
        }else{

        }
        

        return view("paintjobs.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("paintjobs.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, PaintJob $paintJob)
    {   
        $paintjobs = PaintJob::all();
        $count_pj = $paintjobs->count();
        if($count_pj > 0){
            $processing_jobs = DB::table("paint_jobs")->select('id')->where("status_id",1)->get();
            $count_of_processing_jobs = $processing_jobs->count();
            if($count_of_processing_jobs < 5){
                $request->validate([
                    "plate-number" => "required|string",
                    "current-color" => "required",
                    "target-color" => "required"
                ]);

                $paintJob = new PaintJob;
                $paintJob->plate_number = $request->input("plate-number");
                $paintJob->current_color = $request->input("current-color");
                $paintJob->target_color = $request->input("target-color");
                $paintJob->save();
            }else{
                $request->validate([
                    "plate-number" => "required|string",
                    "current-color" => "required",
                    "target-color" => "required"
                ]);

                $paintqueue = new PaintQueue;
                $paintqueue ->plate_number = $request->input("plate-number");
                $paintqueue ->current_color = $request->input("current-color");
                $paintqueue ->target_color = $request->input("target-color");
                $paintqueue ->save();
            }
        }else{
            $request->validate([
                "plate-number" => "required|string",
                "current-color" => "required",
                "target-color" => "required"
            ]);

            $paintJob = new PaintJob;
            $paintJob->plate_number = $request->input("plate-number");
            $paintJob->current_color = $request->input("current-color");
            $paintJob->target_color = $request->input("target-color");
            $paintJob->save();
        }
        
        

        return redirect(route("paintjobs.index"));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PaintJob  $paintJob
     * @return \Illuminate\Http\Response
     */
    public function show(PaintJob $paintJob)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PaintJob  $paintJob
     * @return \Illuminate\Http\Response
     */
    public function edit(PaintJob $paintJob)
    {
        return redirect(route("paintjobs.update"))->with("paintJob",$paintJob);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PaintJob  $paintJob
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PaintJob $paintJob)
    {
        $paintJob->status_id = 2;
        $paintJob->save();
        return redirect(route("paintjobs.index"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PaintJob  $paintJob
     * @return \Illuminate\Http\Response
     */
    public function destroy(PaintJob $paintJob)
    {
        //
    }

    public function getPaintJobs(){
    // Fetch all records
        $paintJobData['data'] = PaintJob::getpaintJobData();
        echo json_encode($paintJobData);
        exit;
    }

    public function getPaintQueues(){
    // Fetch all records
        $paintQueueData['data'] = PaintQueue::getpaintQueueData();
        echo json_encode($paintQueueData);
        exit;
    }

    public function getShopPerformance(){
        $completed_jobs = DB::table("paint_jobs")->select('*')->where("status_id",2)->get();
        $count_of_completed_jobs = $completed_jobs->count();
        $blue = $completed_jobs->where("target_color","Blue")->count();
        $green = $completed_jobs->where("target_color","Green")->count();
        $red = $completed_jobs->where("target_color","Red")->count();
        $shopPerformance = collect();
        $shopPerformance->put(1,["total" => $count_of_completed_jobs]);
        $shopPerformance->put(2,["blue" => $blue]);
        $shopPerformance->put(3,["green" => $green]);
        $shopPerformance->put(4,["red" => $red]);

        echo json_encode($shopPerformance);
        exit;
    }

    public function updateJobs($id){
        $job = PaintJob::find($id);
        $job->status_id = 2;
        $job->save();
        return redirect(route("paintjobs.index"));
    }
}
