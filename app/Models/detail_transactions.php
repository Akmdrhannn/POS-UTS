<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detail_transactions extends Model
{
    use HasFactory;
    protected $fillable = [
        'qty', 'sub_total'
    ];

    public function transactions()
    {
        return $this->belongsTo(transactions::class);
    }
}
