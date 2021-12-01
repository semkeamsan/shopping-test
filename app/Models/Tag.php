<?php

namespace App\Models;

use App\Http\Requests\TagFormRequest;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tag extends Model
{
    use HasFactory;
    public $validation;
    public function __construct(array $attributes = [])
    {
        $this->validation = new TagFormRequest;
        $this->fillable = Schema::getColumnListing($this->getTable());
        parent::__construct($attributes);
    }

    public function translations()
    {
        return $this->hasMany(TagTranslation::class);
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
        return new TagTranslation;
    }
    public function meta()
    {
        return  $this->hasOne(Meta::class, 'entity_id')->where('entity',self::class);
    }
}
