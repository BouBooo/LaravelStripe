<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id', 'paiement_email', 'paiement_country', 'paiement_address', 'paiement_city',
        'paiement_card_name', 'paiement_discount', 'paiement_subtotal', 'paiement_tax', 'paiement_total',
        'error'
    ];

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function products() {
        return $this->belongsToMany('App\Products')->withPivot('quantity');
    }
}
