<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;
use App\Models\Author;
class BooksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $author1 = Author::create(['name' => 'Aam Amiludin']);
        $author2 = Author::create(['name' => 'Asep Awaludin']);
        $author3 = Author::create(['name' => 'Amin amiludin']);

        $book1 = Book::create(['title' => 'Kupinang kau dengan hamdallah',
        'amount' => 3, 'author_id'     =>  $author1->id]);
        $book2 = Book::create(['title' => 'Jalan para pejuang',
        'amount' => 2, 'author_id'     =>  $author2->id]);
        $book3 = Book::create(['title' => 'Seminggu belajar laravel',
        'amount' => 3, 'author_id'     =>  $author3->id]);
        $book4 = Book::create(['title' => 'Menyelami buku laravel',
        'amount' => 4, 'author_id'     =>  $author3->id]);
    }
}
