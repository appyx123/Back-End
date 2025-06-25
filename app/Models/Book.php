<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
