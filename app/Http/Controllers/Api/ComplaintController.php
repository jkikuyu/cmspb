<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ComplaintResource;
use App\Models\Complaint;
use App\Models\Doc;

use App\Http\Requests\ComplaintRequest;
use Exception;
use DB;

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
        $data = $request->all();
        info($data);
        try {
            $validated = $request->validated();
            $files = $request->file("files");
            $complaint = Complaint::create($validated);
            info($complaint);
            if (isset($files)) {
                $upfiles = $this->upload($files);
                $docs = [];
                $file_no = $complaint->docs()->orderBy('file_no', 'desc')->value('file_no');
                foreach ($upfiles as $file) {
                    $file_no++;
                    $doc = new Doc();
                    $doc->file_no = $file_no;
                    $doc->orig_name = $file['origName'];
                    $doc->filename = $file['currName'];
                    $doc->complaint_id = $complaint['id'];
                    array_push($docs, $doc);
                }

                $complaint->docs()->saveMany($docs);
            }
            $resp = [
                'complaintno' => $complaint['complaintno'],
                'date' => $complaint['created_at'],
                'status' => '200',
                'message' => 'Record saved successfully',
            ];
        } catch (Exception $ex) {
            info($ex);
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

    public function update(ComplaintRequest $request, $id)

    {
        $complaint = Complaint::find($id);
        $output = $request->validated();
        $success = $complaint->update($output);
        if ($success) {
            $resp = [

                'status' => '200',
                'message' => 'Record saved successfully',
            ];
        } else {
            $resp = [
                'status' => '400',
                'message' => 'Unauthorized request',

            ];
        }
        return
            response()->json($resp);
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
    public function upload($files)
    {

        $upFiles = [];

        $len = count($files);
        for ($i = 0; $i < $len; $i++) {
            $file = $files[$i];
            $path = $file->storePublicly('uploads');
            $filename = $file->hashName();
            $currName = pathinfo($filename, PATHINFO_FILENAME);
            $origName = $file->getClientOriginalName();
            $upFiles[] = ['origName' => $origName, 'currName' => $currName];
        }


        return $upFiles;
    }
    public function downloadfile($curr, $orig)
    {
        $ext = pathinfo($orig, PATHINFO_EXTENSION); // file
        $file = $curr . "." . $ext;
        return response()->download(storage_path("app/public/uploads/{$file}"), $orig);
    }
}
