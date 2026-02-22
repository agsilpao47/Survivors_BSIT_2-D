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
                        <?php if(session()->getFlashdata('error')): ?>
                            <div class="alert alert-danger">
                                <?= session()->getFlashdata('error') ?>
                            </div>
                        <?php endif; ?>
                        
                        <form action="/books/store" method="post">
                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" class="form-control" id="title" name="title" value="<?= old('title') ?>" required maxlength="20">
                                <?php if(isset($validation) && $validation->getError('title')): ?>
                                    <div class="text-danger"><?= $validation->getError('title') ?></div>
                                <?php endif; ?>
                            </div>
                            
                            <div class="mb-3">
                                <label for="book_name" class="form-label">Book Name</label>
                                <input type="text" class="form-control" id="book_name" name="book_name" value="<?= old('book_name') ?>" required maxlength="100">
                                <?php if(isset($validation) && $validation->getError('book_name')): ?>
                                    <div class="text-danger"><?= $validation->getError('book_name') ?></div>
                                <?php endif; ?>
                            </div>
                            
                            <div class="mb-3">
                                <label for="genre" class="form-label">Genre</label>
                                <input type="text" class="form-control" id="genre" name="genre" value="<?= old('genre') ?>" required maxlength="50">
                                <?php if(isset($validation) && $validation->getError('genre')): ?>
                                    <div class="text-danger"><?= $validation->getError('genre') ?></div>
                                <?php endif; ?>
                            </div>
                            
                            <div class="mb-3">
                                <label for="date_publish" class="form-label">Publish Date (Year)</label>
                                <input type="number" class="form-control" id="date_publish" name="date_publish" value="<?= old('date_publish') ?>" required min="1000" max="9999">
                                <?php if(isset($validation) && $validation->getError('date_publish')): ?>
                                    <div class="text-danger"><?= $validation->getError('date_publish') ?></div>
                                <?php endif; ?>
                            </div>
                            
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <a href="/books" class="btn btn-secondary">Cancel</a>
                                <button type="submit" class="btn btn-primary">Save Book</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>