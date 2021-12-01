<?php

namespace App\Models;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\Model;
use App\Http\Requests\AttributeSetFormRequest;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AttributeSet extends Model
{
    use HasFactory;
    public $validation;
    public function __construct(array $attributes = [])
    {
        $this->validation = new AttributeSetFormRequest;
        $this->fillable = Schema::getColumnListing($this->getTable());
        parent::__construct($attributes);
    }

    public function translations()
    {
        return $this->hasMany(AttributeSetTranslation::class);
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
        return new AttributeSetTranslation;
    }

    public function attributes()
    {
        return $this->hasMany(Attribute::class);
    }
}
