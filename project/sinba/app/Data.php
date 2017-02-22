<?php

namespace App;

use Validator;
use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    protected $fillable = [
        'value',
        'watershed_id',
        'parameter_id',
        'latitude',
        'longitude',
        'sharing_type',
        'user_id',
        'collected_by',
        'collected_at',
    ];

    public static function validator(array $data)
    {
        return Validator::make($data, [
            'value' => 'required|max:255',
            'watershed_id' => 'required|exists:watersheds,id',
            'parameter_id' => 'required|exists:parameters,id',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'sharing_type' => 'required|in:public,restricted,private',
            'user_id' => 'required|exists:users,id',
            'collected_by' => 'required|max:255',
            'collected_at' => 'required|date_format:"d/m/Y"'
        ]);
    }

    public function parameter() {
        return $this->belongsTo('App\Parameter');
    }

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function watershed() {
        return $this->belongsTo('App\Watershed');
    }

    public function sharingTypes() {
        return [
            'public' => trans('strings.public'),
            'restricted' => trans('strings.restricted'),
            'private' => trans('strings.private'),
        ];
    }
}
