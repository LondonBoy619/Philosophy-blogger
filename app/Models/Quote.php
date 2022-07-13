<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    use HasFactory;

    public static function randomQuote(){
        $quotes = Quote::all();
        foreach ($quotes as $key => $value) {
            if (rand(1,6) == $key) {
                return $value;
            }
        }
    }
}
