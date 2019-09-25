<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = [
      'name',
      'text',
      'user_id'
    ];

    protected $currencies = ['USD', 'EUR'];

    public function photos()
    {
        return $this->hasOne('App\Models\ProductPhoto');
    }

    public function price()
    {
        return $this->hasOne('App\Models\ProductPrice');
    }

    public function currency($price)
    {
        $currency = file_get_contents('https://api.privatbank.ua/p24api/pubinfo?exchange&json&coursid=11');
        $currency = json_decode($currency, true);
        foreach ($this->currencies as $curr_name)
        {
            foreach ($currency as $curr){
                if(strtoupper($curr['ccy']) == strtoupper($curr_name)){
                    $result[strtolower($curr_name)] = floatval(((int)$price / (int)$curr['sale']));
                }
            }
        }
        $result['uah'] = floatval($price);
        return $result;
    }

    public function delete()
    {
        $this->photos()->delete();
        $this->price()->delete();
        return parent::delete();
    }
}
