<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Script extends Model
{
    use HasFactory;

    protected $fillable = [
        'script_audio_src',
        'chat_script',
        'script_approved',
        'approval_date',
        'segment_id',
        'producer_id',
    ];


    public function scheduledSegment()
    {
        return $this->hasMany(ScheduledSegment::class);
    }

    public function segment()
    {
        return $this->belongsTo(Segment::class);
    }

    public function producer()
    {
        return $this->belongsTo(Producer::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
