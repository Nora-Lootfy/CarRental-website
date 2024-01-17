<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use App\Traits\Common;

class TestimonialController extends Controller
{
    use Common;
    /**
     * Display a listing of the resource.
     */
    public function index() :View
    {
        $testimonials = DB::table('testimonials')
            ->get();
        return view('admin.testimonials', compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() :View
    {
        return view('admin.addTestimonial');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) :RedirectResponse
    {
        $data = $request->validate([
            'name'      => 'required|string|max:255',
            'position'  => 'required|string|max:255',
            'comment'   => 'required',
            'published' => 'sometimes',
            'image'     => 'required'
        ]);

        $data['published'] = isset($request['published']);
        $data['image'] = $this->uploadFile($request['image'], 'assets/images');

        $data['created_at'] = Carbon::now();

        DB::table('testimonials')
            ->insert($data);

        return redirect()->route('testimonial');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id) :View|RedirectResponse
    {
        $testimonial = DB::table('testimonials')
            ->where('id', $id)
            ->first();

        if(!is_null($testimonial))
            return view('admin.editTestimonial', compact('testimonial'));
        else
            return redirect()->route('testimonial');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id) :RedirectResponse
    {
        $data = $request->validate([
            'name'      => 'required|string|max:255',
            'position'  => 'required|string|max:255',
            'comment'   => 'required',
            'published' => 'sometimes',
            'image'     => 'sometimes'
        ]);

        $data['published'] = isset($request['published']);

        if(!is_null($request['images']))
            $data['image'] = $this->uploadFile($request['image'], 'assets/images');

        $data['updated_at'] = Carbon::now();

        DB::table('testimonials')
            ->where('id', $id)
            ->update($data);

        return redirect()->route('testimonial');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id) :RedirectResponse
    {
        DB::table('testimonials')
            ->delete($id);

        return redirect()->route('testimonial');
    }
}
