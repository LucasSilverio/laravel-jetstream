<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Finance;
use App\Models\Client;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'start',
        'end',
        'status',
        'is_all_day',
        'title',
        'description',
        'event_id',
        'client_id'
    ];

    public function finance()
    {
        return $this->hasOne(Finance::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
