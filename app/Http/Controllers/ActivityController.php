<?php

namespace App\Http\Controllers;

use App\Http\Requests\ActivityRequest;
use App\Http\Requests\ActivityUpdateRequest;
use App\Models\Activity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ActivityController extends Controller
{
    public function index()
    {
        $activities = Activity::latest()->get();

        return view('activities.index', compact('activities'));
    }

    public function dashboard()
    {
        $this->authorize('create-update-delete-products');

        $activities = Activity::latest()->paginate(5);

        return view('activities.dashboard', compact('activities'));
    }

    public function create()
    {
        $this->authorize('create-update-delete-products');

        return view('activities.create');
    }

    public function store(ActivityRequest $request)
    {
        $this->authorize('create-update-delete-products');

        $validator = $request->validated();
        if ($request->has('image1')) {
            $validator['image1'] = $request->file('image1')->store('activities');
        }

        if ($request->has('image2')) {
            $validator['image2'] = $request->file('image2')->store('activities');
        }

        $product = Activity::create(
            $validator
        );

        return to_route('activity.dashboard')->with('status', 'New activity has been added.');
    }

    public function show(Activity $activity)
    {
        return view('activities.show', compact('activity'));
    }

    public function edit(Activity $activity)
    {
        $this->authorize('create-update-delete-products');

        return view('activities.edit', compact('activity'));
    }

    public function update(ActivityUpdateRequest $request, Activity $activity)
    {
        $this->authorize('create-update-delete-products');

        if ($request->has('image1')) {
            !is_null($activity->image1) && Storage::delete($activity->image1);
            $activity->image1 = $request->file('image1')->store('activities');
        }
        if ($request->has('image2')) {
            !is_null($activity->image2) && Storage::delete($activity->image2);
            $activity->image2 = $request->file('image2')->store('activities');
        }

        $activity->update($request->validated() + [
            'image1' => $activity->image1,
            'image2' => $activity->image2,
        ]);

        return to_route('activity.dashboard')->with('status', 'Activity has been updated.');
    }

    public function destroy(Activity $activity)
    {
        $this->authorize('create-update-delete-products');

        Storage::delete($activity->image1);
        if ($activity->image2) {
            Storage::delete($activity->image2);
        }

        $activity->delete();

        return back()->with('status', 'Activity has been deleted.');
    }
}
