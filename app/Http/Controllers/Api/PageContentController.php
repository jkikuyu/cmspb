<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\PageContentRequest;
use App\Models\PageContent;
use App\Http\Resources\PageContentResource;

class PageContentController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth:api');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageContent = PageContent::all()->where('active', 1)->sortBy('position');

        return PageContentResource::collection($pageContent);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PageContentRequest $request)
    {
        $pageContent = PageContent::create($request);
        return new PageContentResource($pageContent);
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PageContent  $pageContent
     * @return \Illuminate\Http\Response
     */
    public function show(PageContent $pageContent)
    {
        return new PageContentResource($pageContent);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PageContent  $pageContent
     * @return \Illuminate\Http\Response
     */
    public function update(PageContentRequest $request, PageContent $pageContent)
    {
        $pageContent->udate($request);
        return new PageContentResource($pageContent);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PageContent  $pageContent
     * @return \Illuminate\Http\Response
     */
    public function destroy(PageContent $pageContent)
    {
        //
    }
}
