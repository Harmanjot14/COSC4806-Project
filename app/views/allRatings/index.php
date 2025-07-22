<?php require_once 'app/views/templates/header.php' ?>

<div class="all-ratings">
  <!-- Breadcrumbs -->
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">All Ratings</li>
    </ol>
  </nav>
  <br>

  <div class="page-container">
    <h4><strong>All Movie Ratings:</strong> </h4>

    <div class="row">
      <div class="col-md-10">
        <div class="card mb-4 rating-card">
          <div class="card-header">Movie Rated by Users</div>
          <div class="card-body rating-body">
            <table class="table table-striped color-stripes">
              <thead>
                <tr>
                  <th>Username</th>
                  <th>Movie Title</th>
                  <th>Rating</th>
                  <th>Date Rated</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($ratings as $rating): ?>
                  <tr>
                    <td><?= $rating['username'] ?></td>
                    <td><?= $rating['movie_title'] ?></td>
                    <td><?= $rating['user_rating'] ?></td>
                    <td><?= $rating['created_at'] ?></td>
                  </tr>
                <?php endforeach;?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>



  </div>
</div>

<?php require_once 'app/views/templates/footer.php' ?>