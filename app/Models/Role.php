<?php

namespace App\Models;
use App\Http\Requests\RoleFormRequest;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Role extends Model
{
    use HasFactory;
    public $validation;
    public function __construct(array $attributes = [])
    {
        $this->validation = new RoleFormRequest;
        $this->fillable = Schema::getColumnListing($this->getTable());
        parent::__construct($attributes);
    }

    public function translations()
    {
        return $this->hasMany(RoleTranslation::class);
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
        return new RoleTranslation;
    }

    public function permissions()
    {
        return $this->hasMany(Permission::class, 'role_id')->orderBy('index');
    }
}
