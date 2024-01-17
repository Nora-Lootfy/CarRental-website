<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use App\Traits\Common;

class CarController extends Controller
{
    use Common;
    /**
     * Display a listing of the resource.
     */
    public function index() :View
    {
        $cars = DB::table('cars')->get();
        return view('admin.cars', compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() :View
    {
        $categories = DB::table('categories')->get();
        return view('admin.addCar', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) :RedirectResponse
    {
        $data = $request->validate([
            'title'         => 'required|string|max:255',
            'doors'         => 'required',
            'luggage'       => 'required',
            'passengers'    => 'required',
            'price'         => 'required',
            'description'   => 'required',
            'image'         => 'required',
            'active'        => 'sometimes',
            'category_id'   => 'required',
        ]);

        $data['active'] = isset($request['active']);
        $data['image'] = $this->uploadFile(file: $request['image'], path: 'assets/images');
        $data['created_at'] = Carbon::now();

        DB::table('cars')->insert($data);

        return redirect()->route('cars');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id) :View|RedirectResponse
    {
        $car = DB::table('cars')
            ->where('id', $id)
            ->first();

        $categories = DB::table('categories')
            ->get();

        if(!is_null($car))
            return view('admin.editCar', compact(['car', 'categories']));
        else
            return redirect()->route('cars');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id) :RedirectResponse
    {
        $data = $request->validate([
            'title'         => 'required|string|max:255',
            'doors'         => 'required',
            'luggage'       => 'required',
            'passengers'    => 'required',
            'price'         => 'required',
            'description'   => 'required',
            'image'         => 'sometimes',
            'active'        => 'sometimes',
            'category_id'   => 'required',
        ]);

        $data['active'] = isset($request['active']);

        if(!is_null($request['image']))
            $data['image'] = $this->uploadFile($request['image'], 'assets/images');

        $data['updated_at'] = Carbon::now();

        DB::table('cars')
            ->where('id', $id)
            ->update($data);

        return redirect()->route('cars');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id) :RedirectResponse
    {
        DB::table('cars')
            ->delete($id);

        return redirect()->route('cars');
    }
}
