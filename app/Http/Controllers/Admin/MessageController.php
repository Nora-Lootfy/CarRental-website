<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() :View
    {
        $messages = DB::table('messages')
            ->orderBy('read_at')
            ->get();
        return view('admin.messages', compact('messages'));
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id) :View|RedirectResponse
    {
        $content = DB::table('messages')
            ->where('id', $id)
            ->first();

        if(!is_null($content)) {

            DB::table('messages')
                ->where('id', $id)
                ->update(['read_at' => Carbon::now()]);

            return view('admin.showMessage', compact('content'));
        } else
            return redirect()->route('messages');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id) :RedirectResponse
    {
        DB::table('messages')
            ->delete($id);

        return redirect()->route('messages');
    }
}
