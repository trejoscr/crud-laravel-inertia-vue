<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
  use HasFactory;

  protected $fillable = ['name'];

  public function scopeFilter($query, array $filters)
  {
    $query->when($filters['search'] ?? null, function ($query, $search) {
      $query->where('name', 'like', '%'.$search.'%');
    });
  }

  public function products()
  {
    // hasMany: una marca tiene muchos productos
    return $this->hasMany(Product::class, 'id');
  }

}
