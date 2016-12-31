<?php

namespace CodeCommerce;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable=[
        'user_id',
        'total',
        'status'
    ];

    protected $statuses = array(
        '0' => 'Pending Payment',
        '1' => 'Processing',
        '2' => 'On Hold',
        '3' => 'Completed',
        '4' => 'Cancelled',
        '5' => 'Refunded',
        '6' => 'Failed',
    );

    public function getStatusAttribute($value)
    {
        return $this->statuses[$value];
    }

    public function items(){

        return $this->hasMany('CodeCommerce\OrderItem');
    }

    public function user(){

        return $this->belongsTo('CodeCommerce\User');
    }
}
