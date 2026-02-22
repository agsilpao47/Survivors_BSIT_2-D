<?php

namespace App\Controllers;

use App\Models\BookModel;

class Books extends BaseController
{
    protected $bookModel;

    public function __construct()
    {
        $this->bookModel = new BookModel();
    }

    /**
     * Display all books
     */
    public function index()
    {
        $data['books'] = $this->bookModel->orderBy('id', 'DESC')->findAll();
        $data['title'] = 'Books List';
        
        return view('books/index', $data);
    }

    /**
     * Show form to create new book
     */
    public function create()
    {
        $data['title'] = 'Add New Book';
        
        return view('books/create', $data);
    }

}