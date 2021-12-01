<?php

namespace App\Models;

use App\Http\Requests\UserFormRequest;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    public $validation;
    protected static $logFillable = true;
    public function __construct(array $attributes = [])
    {
        $this->fillable = Schema::getColumnListing($this->getTable());
        $this->validation = new UserFormRequest;
        parent::__construct($attributes);
    }
    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->created_by = auth()->id();
            $model->updated_at = null;
        });
        self::updating(function ($model) {
            $model->updated_by = auth()->id();
        });
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'dob' => 'date',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
}
