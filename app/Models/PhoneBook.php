<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/**
 * @property string $number
 */
class PhoneBook extends Model
{

    use HasFactory;
    public $timestamps =false;
    /**
     * @var mixed|string
     */

    protected $fillable = ['number','user_id'];
}
