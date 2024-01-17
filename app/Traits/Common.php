<?php

namespace App\Traits;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

trait Common
{
    public function uploadFile($file, $path){
        $file_extension = $file->getClientOriginalExtension();
        $file_name = time() . '.' . $file_extension;
        $file->move($path, $file_name);
        return $file_name;
    }

    public function showNotReadMessages() {
        $unreadMessages = DB::table('messages')
            ->where('read_at', value: null)
            ->get();
        foreach ($unreadMessages as $message)
            $message->time = Carbon::now()->diffInMinutes(Carbon::parse($message->created_at));

        return compact('unreadMessages');
    }
}
