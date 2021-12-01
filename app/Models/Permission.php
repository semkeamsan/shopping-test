<?php

namespace App\Models;

use App\Http\Requests\PermissionFormRequest;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Permission extends Model
{
    use HasFactory;
    public $validation;
    protected $casts = ['routes' => 'collection'];
    public function __construct(array $attributes = []) {
        $this->validation = new PermissionFormRequest;
        $this->fillable = Schema::getColumnListing($this->getTable());
        parent::__construct($attributes);
    }
    public function translations()
    {
        return $this->hasMany(PermissionTranslation::class);
    }
    public function translation($locale = null)
    {
        if ($locale == null) {
            $locale = app()->getLocale();
        }
        $translation = $this->translations->where('locale', $locale);
        if ($translation->count()) {
            return $translation->first();
        }
        return new PermissionTranslation;
    }
    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }
}
