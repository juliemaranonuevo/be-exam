<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'name',
        'category',
        'description',
        'based_image',
        'images',
        'date_time'
    ];

    public function softDelete()
    {
        dd($this->delete());
        $this->delete();
        return true;
    }
}
