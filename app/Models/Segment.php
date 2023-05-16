<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Segment extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'segment_data',
        'reporter_id',
        'internal_system_id',
        'segment_type_id',
    ];

    public function reporter()
    {
        return $this->belongsTo(Reporter::class, 'reporter_id');
    }

    public function internalSystem()
    {
        return $this->belongsTo(InternalSystem::class, 'internal_system_id');
    }

    public function segmentType()
    {
        return $this->belongsTo(SegmentType::class, 'segment_type_id');
    }
    public function script()
    {
        return $this->hasOne(Script::class);
    }
    
}
