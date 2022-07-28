<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Hash;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];
    public function scopeFilter($query, array $filters)
    {

        if ($filters["search"] ?? false) {
            $query->where("name", "like", "%" . request("search") . "%");
        }
    }
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function setPasswordAttribute($password)
    {
        $this->attributes["password"] = Hash::make($password);
    }
    public function roles()
    {
        return $this->belongsToMany("App\Models\Role");
    }
    // if user has any role
    public function hasAnyRole(string $role)
    {
        return null !== $this->roles()->where("name", $role)->first();
    }
    // if user has specific role in array
    public function hasAnyRoles(array $role)
    {
        return null !== $this->roles()->whereIn("name", $role)->first();
    }

    public function assets()
    {
        return $this->hasMany(Asset::class, "asset_id");
    }
}