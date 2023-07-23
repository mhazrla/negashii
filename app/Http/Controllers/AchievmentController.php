<?php

namespace App\Http\Controllers;

use App\Http\Requests\AchievementRequest;
use App\Http\Requests\AchievementUpdateRequest;
use App\Models\Achievment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AchievmentController extends Controller
{
    public function index()
    {
        $achievements = Achievment::latest()->get();

        return view('achievements.index', compact('achievements'));
    }

    public function dashboard()
    {
        $this->authorize('create-update-delete-products');

        $achievements = Achievment::latest()->paginate(5);

        return view('achievements.dashboard', compact('achievements'));
    }

    public function create()
    {
        $this->authorize('create-update-delete-products');

        return view('achievements.create');
    }

    public function store(AchievementRequest $request)
    {
        $this->authorize('create-update-delete-products');

        $validator = $request->validated();
        if ($request->has('image1')) {
            $validator['image1'] = $request->file('image1')->store('achievements');
        }

        if ($request->has('image2')) {
            $validator['image2'] = $request->file('image2')->store('achievements');
        }

        if ($request->has('image3')) {
            $validator['image3'] = $request->file('image3')->store('achievements');
        }

        if ($request->has('image4')) {
            $validator['image4'] = $request->file('image4')->store('achievements');
        }

        $product = Achievment::create(
            $validator
        );

        return to_route('achievement.dashboard')->with('status', 'New Achievment has been added.');
    }

    public function show(Achievment $achievement)
    {
        return view('achievements.show', compact('achievement'));
    }

    public function edit(Achievment $achievement)
    {
        $this->authorize('create-update-delete-products');

        return view('achievements.edit', compact('achievement'));
    }

    public function update(AchievementUpdateRequest $request, Achievment $achievement)
    {
        $this->authorize('create-update-delete-products');

        if ($request->has('image1')) {
            !is_null($achievement->image1) && Storage::delete($achievement->image1);
            $achievement->image1 = $request->file('image1')->store('achievements');
        }
        if ($request->has('image2')) {
            !is_null($achievement->image2) && Storage::delete($achievement->image2);
            $achievement->image2 = $request->file('image2')->store('achievements');
        }
        if ($request->has('image3')) {
            !is_null($achievement->image3) && Storage::delete($achievement->image3);
            $achievement->image3 = $request->file('image3')->store('achievements');
        }
        if ($request->has('image4')) {
            !is_null($achievement->image4) && Storage::delete($achievement->image4);
            $achievement->image4 = $request->file('image4')->store('achievements');
        }

        $achievement->update($request->validated() + [
            'image1' => $achievement->image1,
            'image2' => $achievement->image2,
            'image3' => $achievement->image3,
            'image4' => $achievement->image4,
        ]);

        return to_route('achievement.dashboard')->with('status', 'Achievment has been updated.');
    }

    public function destroy(Achievment $achievement)
    {
        $this->authorize('create-update-delete-products');

        Storage::delete($achievement->image1);
        if ($achievement->image2) {
            Storage::delete($achievement->image2);
        }
        if ($achievement->image3) {
            Storage::delete($achievement->image3);
        }
        if ($achievement->image4) {
            Storage::delete($achievement->image4);
        }

        $achievement->delete();

        return back()->with('status', 'Achievment has been deleted.');
    }
}
