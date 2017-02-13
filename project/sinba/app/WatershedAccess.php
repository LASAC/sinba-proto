<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class WatershedAccess extends Model
{
    protected $fillable = [
        'user_id',
        'watershed_id'
    ];

    public function lastWatershedAccessedBy($userId) {

        $access = $this->where('id',  $this->where('user_id', $userId)->max('id'))->get();
        $watershed = count($access) > 0 ? Watershed::find($access->first()->watershed_id) : null;
        Log::debug("WatershedAccess::lastWatershedAccessedBy($userId) - auth user: " . Auth::user()->email . " - access: $access - watershed: $watershed");
        return $watershed;
    }
}
