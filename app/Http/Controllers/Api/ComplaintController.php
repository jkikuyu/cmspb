<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ComplaintResource;
use App\Models\Complaint;
use App\Http\Requests\ComplaintRequest;
use Exception;

class ComplaintController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
     */
    public function __construct()
    {
        $this->middleware('auth:api');
    }
    public function index()
    {
        return ComplaintResource::collection(Complaint::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ComplaintRequest $request)

    {
        $resp = "";
        info($request->all());
        try {
            $validated = $request->validated();

            $complaint = Complaint::create($validated);
            $resp = [
                'status' => '200',
                'message' => 'Record saved successfully',
            ];
        } catch (Exception $ex) {
            error_log($ex->getMessage());
            $resp = [
                'status' => '400',
                'message' => 'Unauthorized request',

            ];
        }
        return response()->json($resp);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Complaint  $complaint
     * @return \Illuminate\Http\Response
     */
    public function show(Complaint $complaint)
    {
            return new ComplaintResource($complaint);


    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Complaint  $complaint
     * @return \Illuminate\Http\Response
     */
    public function destroy(Complaint $complaint)
    {
        $complaint->delete();
        return response()->noContent();
    }

}
