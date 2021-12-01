<?php

namespace App\Models;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\Model;
use App\Http\Requests\CategoryFormRequest;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;
    protected $with = ['translations'];
    public $validation;
    public function __construct(array $data = array(),array $attributes = [])
    {
        foreach($data as $key => $value) {
            $this->$key = $value;
        }
        $this->validation = new CategoryFormRequest;
        $this->fillable = Schema::getColumnListing($this->getTable());
        parent::__construct($attributes);
    }

    public function translations()
    {
        return $this->hasMany(CategoryTranslation::class);
    }
    public function translation($locale = null)
    {

        if ($locale == null) {
            $locale = app()->getLocale();
        }
        $translation = $this->translations()->where('locale', $locale);

        if ($translation->count()) {
            return $translation->first();
        }
        return new CategoryTranslation;
    }
    public function children()
    {
        return $this->hasMany(self::class,'parent_id');
    }
}
