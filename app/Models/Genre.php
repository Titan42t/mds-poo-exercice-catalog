<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'genres';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    public function movies() {
        return $this->BelongsToMany(Movie::class, 'movies_genres');
    }

    public function series() {
        return $this->BelongsToMany(Series::class, 'series_genres');
    }
}
