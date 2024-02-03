<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() :View
    {
        $categories = DB::table('categories')->get();
        return view('admin.categories', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() :View
    {
        return view('admin.addCategory');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) :RedirectResponse
    {
        $data = $request->validate([
            'name' => 'required|string|max:255'
        ]);
        $data['created_at'] = Carbon::now();

        DB::table('categories')->insert($data);

        return redirect()->route('categories');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id) :View|RedirectResponse
    {
        $category = DB::table('categories')
            ->where('id', $id)
            ->first();

        if(!is_null($category))
            return view('admin.editCategory', compact('category'));
        else
            return redirect()->route('categories');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id) :RedirectResponse
    {
        $data = $request->validate([
            'name' => 'required|string|max:255'
        ]);

        $data['updated_at'] = Carbon::now();

        DB::table('categories')
            ->where('id', $id)
            ->update($data);

        return redirect()->route('categories');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id) :RedirectResponse
    {
        try {
            DB::table('categories')
                ->delete($id);
            return redirect()->route('categories');
        } catch (QueryException $ex) {
            return redirect()->route('categories')->with(['error' => 'Cannot delete from Categories due to their are cars in that category.']);
        }

    }
}
