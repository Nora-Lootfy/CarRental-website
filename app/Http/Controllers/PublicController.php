<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;
use Spatie\LaravelIgnition\Exceptions\ViewExceptionWithSolution;
use Illuminate\Support\Facades\DB;

class PublicController extends Controller
{
    public function index() :View
    {
        $cars = DB::table('cars')
            ->where('active', '=', 1)
            ->orderBy('created_at', 'desc')
            ->limit(6)
            ->get();

        $testimonials = DB::table('testimonials')
            ->where('published', '=', 1)
            ->orderBy('created_at', 'desc')
            ->limit(3)
            ->get();

        return view('public.index', compact(['cars', 'testimonials']));
    }

    public function showListing() :View
    {
        $cars = DB::table('cars')
            ->where('active', '=' ,1)
            ->orderBy('created_at', 'desc')
            ->paginate(6);

        $testimonials = DB::table('testimonials')
            ->where('published', '=', 1)
            ->orderBy('created_at', 'desc')
            ->limit(3)
            ->get();

        return view('public.listing', compact(['cars', 'testimonials']));
    }

    public function showTestimonials() :View
    {
        $testimonials = DB::table('testimonials')
            ->where('published', '=', 1)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('public.testimonials', compact(['testimonials']));
    }

    public function showBlog() :View
    {
        return view('public.blog');
    }

    public function showAbout() :View
    {
        return view('public.about');
    }

    public function showContact() :View
    {
        return view('public.contact');
    }

    public function sendMessage(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'first_name'    => 'required|string|max:255',
            'last_name'     => 'required|string|max:255',
            'email'         => 'required|email',
            'message'       =>  'required'
        ]);

        $data['created_at'] = Carbon::now();

        DB::table('messages')
            ->insert($data);

        Mail::to(env('MAIL_FROM_ADDRESS', 'laravel@example.net'))->send(new \App\Mail\ContactMail($data));

        return redirect()->route('index');
    }

    public function showSingleCar($id) :View|RedirectResponse
    {
        $car = DB::table('cars')
            ->select(DB::raw('cars.*, categories.name as category_name'))
            ->join('categories', 'categories.id', '=', 'cars.category_id')
            ->where('cars.id', '=', $id)
            ->first();

        if(!is_null($car))
            return view('public.singleCar', compact('car'));
        else
            return redirect()->route('index');
    }
}
