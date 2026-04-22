<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;


class Reviews extends Model
{
    protected $fillable = [
        'reviewable_type',
        'reviewable_id',
        'visitor_name',
        'visitor_email',
        'rating',
        'comment',
        'is_approved',
    ];

    protected $casts = [
        'is_approved' => 'boolean',
        'rating' => 'integer',
    ];

    public function reviewable(): MorphTo
    {
        return $this->MorphTo();
    }

    public function isAttractionReview(): bool
    {
        return $this->reviewable_type === Attractions::class;
    }

    public function getAttractionAttribute(): ?Attractions
    {
        return $this->isAttractionReview() ? $this->reviewable : null;
    }

    public function isZoneReview(): bool
    {
        return $this->reviewable_type === Zone::class;
    }
}
