<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Producto
 *
 * @property $id
 * @property $codigo_producto
 * @property $descripcion_producto
 * @property $cantidad_compra_producto
 * @property $stock_venta_producto
 * @property $precio_pesos_producto
 * @property $precio_dolares_producto
 * @property $precio_venta_producto
 * @property $compras_id
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Producto extends Model
{
    
    static $rules = [
		'codigo_producto' => 'required',
		'descripcion_producto' => 'required',
		'cantidad_compra_producto' => 'required',
		'stock_venta_producto' => 'required',
		'precio_pesos_producto' => 'required',
		'precio_dolares_producto',
		'precio_venta_producto',
		'compras_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['codigo_producto','descripcion_producto','cantidad_compra_producto','stock_venta_producto','precio_pesos_producto','compras_id'];



}
