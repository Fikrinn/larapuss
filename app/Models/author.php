<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class author extends Model
{

    use HasFactory;
    //memberikan akses data apa saja yang bisa dilihat
    protected $visible = ['name'];
    //memberikan akses data apa saja yang bisa di isi
    protected $fillable = ['name'];
    //mencatat waktu pembuatan dan update data otomatis
    public $timetamps = true;

    //membuat relasi one to many
    public function books()
    {
        //data model "Author" bisa memiliki banyak data
        //data model "Book" melalui fk "author_id"
        $this->hasMany('App\Models\Book', 'author_id');
    }
}
