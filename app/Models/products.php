<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\categories;

class products extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'description', 'price', 'stock', 'slug'
    ];

    public function categories()
    {
        return $this->belongsTo(categories::class);
    }
    public function users()
    {
        return $this->belongsTo(users::class);
    }
    public function detail_transactions()
    {
        return $this->hasMany(detail_transactions::class);
    }
}
