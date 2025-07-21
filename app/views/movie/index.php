<?php require_once 'app/views/templates/header.php'?>

<div class="movie">
  <div class="page-container">
    
    <!-- Breadcrumbs -->
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Movie Search</li>
      </ol>
    </nav>
    <br>
    <!-- Search Form -->
    <form method="Get" action="/omdb/search">
      <input type="text" name="movie" placeholder="Search for a movie">
      <input type="submit" value="Search">
      <br><br>
    </form>
   
    <?php if(isset($movie) && $movie['Resposnive'] !== 'False'): ?>
    <!--Movie Information-->
    <div class="page-header" id="banner">
        <div class="col-md-6">
          <div class="row">
            <div class="card mb-4">
              <div class="card-header">Movie Information</div>
              <div class="card-body">
                
                <h2 class="card-title"><?= $movie['Title'] ?> (<?= $movie['Year'] ?>)</h2>
                <img src="<?= $movie['Poster'] ?>" alt="Movie Poster">
  
                <p><strong>Released: </strong><?= $movie['Released']?></p>
                <p><strong>Runtime: </strong><?= $movie['Runtime']?></p>
                
                <p><strong>Genre: </strong><?= $movie['Genre']?></p>
                <p><strong>Director: </strong><?= $movie['Director']?></p>
                <p><strong>Writer: </strong><?= $movie['Writer']?></p>
                <p><strong>Actors: </strong><?= $movie['Actors']?></p>
                
                <p><strong>Plot: </strong><?= $movie['Plot']?></p>
                <p><strong>Language: </strong><?= $movie['Language']?></p>
                <p><strong>Country: </strong><?= $movie['Country']?></p>
                <p><strong>Awards: </strong><?= $movie['Awards'] ?></p>
               
                <p><strong>IMDB Rating: </strong><?= $movie['imdbRating']?></p>
                <p><strong>IMDB Votes: </strong><?= $movie['imdbVotes']?></p>
                <p><strong>Box Office: </strong><?= $movie['BoxOffice']?></p>
                      
              </div>
            </div>
          </div>
        </div>    
    </div>
    <?php elseif(isset($error)): ?>
      <div class="alert alert-warning text-center">
        <?= $error ?>
      </div>
  <?php endif; ?>
    
  </div>
</div>


<?php require_once 'app/views/templates/footer.php'?>