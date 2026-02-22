<?php

namespace App\Models;

use CodeIgniter\Model;

class BookModel extends Model
{
    protected $table = 'books';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $protectFields = true;
    protected $allowedFields = [
        'title',
        'book_name',
        'genre',
        'date_publish'
    ];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat = 'int';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';

    // Validation
    protected $validationRules = [
        'title' => 'required|max_length[20]',
        'book_name' => 'required|max_length[100]',
        'genre' => 'required|max_length[50]',
        'date_publish' => 'required|integer'
    ];
    protected $validationMessages = [
        'title' => [
            'required' => 'Title is required',
            'max_length' => 'Title cannot exceed 20 characters'
        ],
        'book_name' => [
            'required' => 'Book name is required',
            'max_length' => 'Book name cannot exceed 100 characters'
        ],
        'genre' => [
            'required' => 'Genre is required',
            'max_length' => 'Genre cannot exceed 50 characters'
        ],
        'date_publish' => [
            'required' => 'Publish date is required',
            'integer' => 'Publish date must be a valid year'
        ]
    ];
    protected $skipValidation = false;
}