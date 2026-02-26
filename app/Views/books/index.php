<?= $this->extend('theme/template') ?>

<?= $this->section('content') ?>
<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Books Management</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Books</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">List of Books</h3>
              <div class="float-right">
                <button type="button" class="btn btn-md btn-primary" data-toggle="modal" data-target="#AddNewModal">
                  <i class="fa fa-plus-circle fa fw"></i> Add New
                </button>
              </div>
            </div>
            <div class="card-body">
               <table id="booksTable" class="table table-bordered table-striped table-sm">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th style="display:none;">id</th>
                    <th>Title</th>
                    <th>Book Name</th>
                    <th>Genre</th>
                    <th>Publish Date</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- ✅ Add New Modal -->
    <div class="modal fade" id="AddNewModal" tabindex="-1" role="dialog" aria-labelledby="AddNewModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <form id="addBookForm">
          <?= csrf_field() ?>
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title"><i class="fa fa-plus-circle fa fw"></i>  Add New Book</h5>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">
              <div class="form-group">
                <label>Title</label>
                <input type="text" name="title" class="form-control" required maxlength="20" />
              </div>

              <div class="form-group">
                <label>Book Name</label>
                <input type="text" name="book_name" class="form-control" required maxlength="100" />
              </div>

              <div class="form-group">
                <label>Genre</label>
                <input type="text" name="genre" class="form-control" required maxlength="50" />
              </div>

              <div class="form-group">
                <label>Publish Date (Year)</label>
                <input type="number" name="date_publish" class="form-control" required min="1000" max="9999" />
              </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class='fas fa-times-circle'></i> Cancel</button>
            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
          </div>
        </div>
      </form>
    </div>
  </div>

  <div class="modal fade" id="editBookModal" tabindex="-1" role="dialog" aria-labelledby="editBookModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editBookModalLabel"><i class="far fa-edit fa fw"></i> Edit Book</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="editBookForm">
           <?= csrf_field() ?>
          <div class="modal-body">

            <input type="hidden" id="bookId" name="id">

             <div class="form-group">
                <label>Title</label>
                <input type="text" name="title" id="title" class="form-control" required maxlength="20" />
              </div>

            <div class="form-group">
              <label for="book_name">Book Name</label>
              <input type="text" class="form-control" id="book_name" name="book_name" required maxlength="100">
            </div>

            <div class="form-group">
              <label for="genre">Genre</label>
              <input type="text" class="form-control" id="genre" name="genre" required maxlength="50">
            </div>

            <div class="form-group">
              <label for="date_publish">Publish Date (Year)</label>
              <input type="number" class="form-control" id="date_publish" name="date_publish" required min="1000" max="9999">
            </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class='fas fa-times-circle'></i> Cancel</button>
            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
</div>
<div class="toasts-top-right fixed" style="position: fixed; top: 1rem; right: 1rem; z-index: 9999;"></div>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script> const baseUrl = "<?= base_url() ?>"; </script>
<script src="<?= base_url('js/books/books.js') ?>"></script>
<?= $this->endSection() ?>