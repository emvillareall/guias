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
 * @property $recargo_compra
 * @property $total_compra
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
		'recargo_compra' => 'required',
		'total_compra' => 'required',
		'proveedor_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['codigo_compra','descripcion_compra','envio_compra','recargo_compra','total_compra','proveedor_id'];



}
