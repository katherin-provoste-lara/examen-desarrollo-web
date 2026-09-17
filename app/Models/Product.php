<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'sku', 'nombre', 'descripcion_corta', 'descripcion_larga', 'imagen',
        'precio_neto', 'precio_venta', 'stock_actual', 'stock_minimo', 'stock_bajo', 'stock_alto',
    ];

    protected $appends = ['precio_venta'];

    public function setPrecioNetoAttribute($value): void
    {
        $this->attributes['precio_neto'] = $value;
        $this->attributes['precio_venta'] = round((float) $value * 1.19, 2);
    }

    // precio_venta = precio_neto + IVA 19%, calculado automáticamente
    public function getPrecioVentaAttribute()
    {
        return round($this->precio_neto * 1.19, 2);
    }
}
