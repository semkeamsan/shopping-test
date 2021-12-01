<?php

namespace App\Models;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductAttribute extends Model
{
    use HasFactory;
    protected $casts = ['values' => 'collection'];
    public function __construct(array $attributes = [])
    {
        $this->fillable = Schema::getColumnListing($this->getTable());
        parent::__construct($attributes);
    }
    public function attribute()
    {
        return $this->belongsTo(Attribute::class);
    }
    public function values()
    {
        return $this->attribute->values->whereIn('id', $this->values);
    }
}
