<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Pedido
 *
 * @property $id
 * @property $clientes_id
 * @property $tienda_id
 * @property $created_at
 * @property $updated_at
 * @property $descripcion
 * @property $estado
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Pedido extends Model
{
    
    static $rules = [
		'clientes_id',
		'tienda_id' ,
        'descripcion',
        'estado',
        'subtotal_pedido', 
        'descuentos_pedido'
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['clientes_id','tienda_id','descripcion','estado','subtotal_pedido','descuentos_pedido'];



}
