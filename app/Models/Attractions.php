<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use App\Models\Review;

class Attractions extends Model
{
    protected $table = 'attractions';

    protected $fillable = [
        'name',
        'description',
        'ticket_price',
        'image',
        'created_at',
        'updated_at',
    ];

    public function zone(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Zone::class);
    }

    public function reviews(): MorphMany
    {
        return $this->morphMany(Reviews::class, 'reviewable');
    }

    public function approvedReviews(): MorphMany
    {
        return $this->reviews()->where('is_approved', true);
    }

    public function averageRting()
    {
        return $this->approvedReviews()->avg('rating');
    }
}
