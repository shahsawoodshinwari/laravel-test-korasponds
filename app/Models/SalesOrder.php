<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesOrder extends Model
{
    use HasFactory;

    protected $with = [
        'items',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function items()
    {
        return $this->belongsToMany(Item::class)
            ->as('purchase')
            ->withPivot('quantity')
            ->withTimestamps();
    }

    public function total()
    {
        $total = 0;
        foreach ($this->items as $item) {
            $total += $item->price * $item->purchase->quantity;
        }

        return $total;
    }

    public function createdAt(): Attribute
    {
        return new Attribute(
            get: fn ($value) => Carbon::parse($value)->diffForHumans(),
        );
    }
}
