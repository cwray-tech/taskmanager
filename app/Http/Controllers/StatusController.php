<?php

namespace App\Http\Controllers;

use App\Http\Requests\StatusStoreRequest;
use App\Http\Requests\StatusUpdateRequest;
use App\Models\Status;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $statuses = Status::all();

        return view('status.index', compact('statuses'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('status.create');
    }

    /**
     * @param \App\Http\Requests\StatusStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StatusStoreRequest $request)
    {
        $status = Status::create($request->validated());

        $request->session()->flash('status.id', $status->id);

        return redirect()->route('status.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Status $status
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Status $status)
    {
        return view('status.show', compact('status'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Status $status
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Status $status)
    {
        return view('status.edit', compact('status'));
    }

    /**
     * @param \App\Http\Requests\StatusUpdateRequest $request
     * @param \App\Models\Status $status
     * @return \Illuminate\Http\Response
     */
    public function update(StatusUpdateRequest $request, Status $status)
    {
        $status->update($request->validated());

        $request->session()->flash('status.id', $status->id);

        return redirect()->route('status.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Status $status
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Status $status)
    {
        $status->delete();

        return redirect()->route('status.index');
    }
}
