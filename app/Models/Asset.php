<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Asset extends Model
{
    use Sortable;
    protected $fillable = [
        'name',
        'category',
        'user_id',
    ];

    public $sortable = ["id", "name", "category"];

    public function scopeFilter($query, array $filters)
    {
        if ($filters["category"] ?? false) {
            $query->where("category", "like", "%" . request("category") . "%");
        }
        if ($filters["search"] ?? false) {
            $query->where("name", "like", "%" . request("search") . "%")
                ->orWhere("category", "like", "%" . request("search") . "%");
        }
    }
    use HasFactory;
    public function user()
    {
        return $this->belongsTo(User::class, "user_id");
    }
}