<?php

namespace App\Models;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BrandTranslation extends Model
{
    use HasFactory;
    public function __construct(array $attributes = []) {
        $this->fillable = Schema::getColumnListing($this->getTable());
        parent::__construct($attributes);
    }
}
