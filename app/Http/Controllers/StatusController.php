<?php

namespace App\Http\Controllers;

use App\Http\Requests\StatusStoreRequest;
use App\Http\Requests\StatusUpdateRequest;
use App\Http\Resources\StatusCollection;
use App\Http\Resources\StatusResource;
use App\Models\Status;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \App\Http\Resources\StatusCollection
     */
    public function index(Request $request)
    {
        $statuses = Status::all();

        return new StatusCollection($statuses);
    }

    /**
     * @param \App\Http\Requests\StatusStoreRequest $request
     * @return \App\Http\Resources\StatusResource
     */
    public function store(StatusStoreRequest $request)
    {
        $status = Status::create($request->validated());

        return new StatusResource($status);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Status $status
     * @return \App\Http\Resources\StatusResource
     */
    public function show(Request $request, Status $status)
    {
        return new StatusResource($status);
    }

    /**
     * @param \App\Http\Requests\StatusUpdateRequest $request
     * @param \App\Models\Status $status
     * @return \App\Http\Resources\StatusResource
     */
    public function update(StatusUpdateRequest $request, Status $status)
    {
        $status->update($request->validated());

        return new StatusResource($status);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Status $status
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Status $status)
    {
        $status->delete();

        return response()->noContent();
    }
}
