<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

/**
 * Register vacation days of users
 */
class Vacation extends Model
{
    use HasFactory;

    protected $fillable = [
        'spent_days',
        'total_days',
        'user_id',
    ];

    /** ========================
     * ACCESSOR
     * =========================
     */
    /**
     * Returns remaining vacations days of current user
     */
    protected function remainingVacationDays(): Attribute {
       return Attribute::make(
            get: fn (int $value, array $attributes) => $attributes['spent_days'] - $attributes['total_days']
        );
    }

    /** ========================
     * MUTATORS
     * =========================
     */

    /** ========================
     * EVENTS
     * =========================
     */

    /** ========================
     * RELATIONSHIPS
     * =========================
     */
}
