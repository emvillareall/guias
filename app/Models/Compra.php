<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Compra
 *
 * @property $id
 * @property $codigo_compra
 * @property $descripcion_compra
 * @property $envio_compra
 * @property $total_pesos_compra
 * @property $total_dolares_compra
 * @property $proveedor_id
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Compra extends Model
{
    
    static $rules = [
		'codigo_compra' => 'required',
		'descripcion_compra' => 'required',
		'envio_compra' => 'required',
		'total_pesos_compra',
        'total_dolares_compra',
		'proveedor_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['codigo_compra','descripcion_compra','envio_compra','proveedor_id'];



}
