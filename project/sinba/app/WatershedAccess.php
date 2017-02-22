<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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

    public function lastWatershedIdAccessedBy($userId) {
        $watershed = $this->lastWatershedAccessedBy($userId);
        return $watershed ? $watershed->id : 0;
    }

    public static function watershedsAccessedBy($userId) {
        $results = DB::table('watershed_accesses')
            ->join('watersheds', 'watershed_accesses.watershed_id', '=', 'watersheds.id')
            ->select(
                'watersheds.id',
                'watersheds.name',
                DB::raw('MAX(watershed_accesses.id) as last')
            )
            ->where('user_id', $userId)
            ->groupBy('watersheds.id')
            ->orderBy('last', 'DESC')
            ->get();

        if(count($results) === 0)
            return Watershed::orderBy('updated_at', 'DESC')->get();

        return $results;
    }
}
