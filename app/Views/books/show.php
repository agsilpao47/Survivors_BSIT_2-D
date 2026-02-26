<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title) ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">
                        <h4><?= esc($title) ?></h4>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <strong>ID:</strong>
                            <p><?= esc($book['id']) ?></p>
                        </div>
                        
                        <div class="mb-3">
                            <strong>Title:</strong>
                            <p><?= esc($book['title']) ?></p>
                        </div>
                        
                        <div class="mb-3">
                            <strong>Book Name:</strong>
                            <p><?= esc($book['book_name']) ?></p>
                        </div>
                        
                        <div class="mb-3">
                            <strong>Genre:</strong>
                            <p><?= esc($book['genre']) ?></p>
                        </div>
                        
                        <div class="mb-3">
                            <strong>Publish Date:</strong>
                            <p><?= esc($book['date_publish']) ?></p>
                        </div>
                        
                        <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                            <a href="/books" class="btn btn-secondary">Back to List</a>
                            <a href="/books/edit/<?= esc($book['id']) ?>" class="btn btn-primary">Edit Book</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>