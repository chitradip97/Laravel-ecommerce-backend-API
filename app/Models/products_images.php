<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class products_images extends Model
{
    use HasFactory;
    protected $fillable = [
        "product_name",
        "image_path"
        ];
}
