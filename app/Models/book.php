<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class book extends Model
{
    use HasFactory;


    protected $visible = ['title','author_id','amount','cover'];
    protected $fillable = ['title','author_id','amount','cover'];
    public $timetamps = true;

    public function author()
    {
        //data model "Book" bisa dimiliki oleh author
        //melalui fk author
        return $this->belongsTo('App\Models\Author', 'author_id');
    }
}
