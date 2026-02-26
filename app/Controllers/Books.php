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
     * Display all books with DataTables
     */
    public function index()
    {
        return view('books/index');
    }

    /**
     * Store new book via AJAX
     */
    public function store()
    {
        $validation = $this->validate([
            'title' => 'required|max_length[20]',
            'book_name' => 'required|max_length[100]',
            'genre' => 'required|max_length[50]',
            'date_publish' => 'required|integer|min_length[4]|max_length[4]'
        ]);

        if (!$validation) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Validation failed']);
        }

        $data = [
            'title' => $this->request->getPost('title'),
            'book_name' => $this->request->getPost('book_name'),
            'genre' => $this->request->getPost('genre'),
            'date_publish' => $this->request->getPost('date_publish')
        ];

        if ($this->bookModel->insert($data)) {
            return $this->response->setJSON(['status' => 'success']);
        } else {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Failed to save book']);
        }
    }

    /**
     * Get book data for editing via AJAX
     */
    public function edit($id = null)
    {
        $book = $this->bookModel->find($id);
        
        if ($book) {
            return $this->response->setJSON(['data' => $book]);
        } else {
            return $this->response->setStatusCode(404)->setJSON(['error' => 'Book not found']);
        }
    }

    /**
     * Update book via AJAX
     */
    public function update($id = null)
    {
        $validation = $this->validate([
            'title' => 'required|max_length[20]',
            'book_name' => 'required|max_length[100]',
            'genre' => 'required|max_length[50]',
            'date_publish' => 'required|integer|min_length[4]|max_length[4]'
        ]);

        if (!$validation) {
            return $this->response->setJSON(['success' => false, 'message' => 'Validation failed']);
        }

        $data = [
            'title' => $this->request->getPost('title'),
            'book_name' => $this->request->getPost('book_name'),
            'genre' => $this->request->getPost('genre'),
            'date_publish' => $this->request->getPost('date_publish')
        ];

        $updated = $this->bookModel->update($id, $data);

        if ($updated) {
            return $this->response->setJSON([
                'success' => true,
                'message' => 'Book updated successfully.'
            ]);
        } else {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Error updating book.'
            ]);
        }
    }

    /**
     * Delete book via AJAX
     */
    public function delete($id = null)
    {
        $book = $this->bookModel->find($id);
        
        if (!$book) {
            return $this->response->setJSON(['success' => false, 'message' => 'Book not found.']);
        }

        $deleted = $this->bookModel->delete($id);

        if ($deleted) {
            return $this->response->setJSON(['success' => true, 'message' => 'Book deleted successfully.']);
        } else {
            return $this->response->setJSON(['success' => false, 'message' => 'Failed to delete book.']);
        }
    }

    /**
     * Fetch records for DataTables
     */
    public function fetchRecords()
    {
        $request = service('request');
        $model = $this->bookModel;

        $start = $request->getPost('start') ?? 0;
        $length = $request->getPost('length') ?? 10;
        $searchValue = $request->getPost('search')['value'] ?? '';
        $orderColumn = $request->getPost('order')[0]['column'] ?? 0;
        $orderDirection = $request->getPost('order')[0]['dir'] ?? 'ASC';

        // Get column name from DataTables column index
        $columns = ['id', 'title', 'book_name', 'genre', 'date_publish'];
        $orderBy = $columns[$orderColumn] ?? 'id';

        // Get total records
        $totalRecords = $model->countAll();

        // Get filtered records
        $builder = $model->builder();
        
        if (!empty($searchValue)) {
            $builder->groupStart();
            $builder->like('title', $searchValue);
            $builder->orLike('book_name', $searchValue);
            $builder->orLike('genre', $searchValue);
            $builder->groupEnd();
        }

        $recordsFiltered = $builder->countAllResults(false);
        
        // Get paginated results
        $result = $builder->orderBy($orderBy, $orderDirection)
                        ->limit($length, $start)
                        ->get()
                        ->getResultArray();

        $data = [];
        $counter = $start + 1;
        foreach ($result as $row) {
            $row['row_number'] = $counter++;
            $data[] = $row;
        }

        return $this->response->setJSON([
            'draw' => intval($request->getPost('draw')),
            'recordsTotal' => $totalRecords,
            'recordsFiltered' => $recordsFiltered,
            'data' => $data,
        ]);
    }
}