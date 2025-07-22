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
      <div class="row">
        <div class="col-md-6 mb-4">
            <div class="card h-100">
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

          <!-- Rating Form -->
          <div class="col-md-6 mb-4">
            <div class="card h-30">
              <div class="card-header">Rate this Movie</div>
              <div class="card-body">
                <form method="POST" action="/movie/rate">
                  <input type="hidden" name="movie_title" value="<?= $movie['Title'] ?>">
                  <p>Please Rate: </p>
                  <div class="d-flex gap-2 mb-3">
                    <?php for ($i = 1; $i <= 5; $i++): ?>
                      <i class="bi bi-star star-icon" data-rating="<?= $i ?>" style="font-size: 30px; cursor: pointer;"></i>
                    <?php endfor;?>  
                  </div>
                  <input type="hidden" name="user_rating" value="">
                  <button type="submit" class="btn btn-primary">Submit Rating</button>
                </form> 
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

    
    <!-- JavaScript for star rating -->
    <script>
      const stars = document.querySelectorAll('.star-icon');
      const ratingInput = document.querySelector('input[name="user_rating"]');

      stars.forEach((star, index) => {
        star.addEventListener('click', () => {
          stars.forEach(s => {
            s.classList.remove('bi-star-fill');
            s.classList.add('bi-star');
          });
          for (let i = 0; i <= index; i++){
            stars[i].classList.remove('bi-star');
            stars[i].classList.add('bi-star-fill');
            stars[i].style.color = 'gold';
          }
          ratingInput.value = index + 1;
        });
      });
    </script> 
  </div>
</div>


<?php require_once 'app/views/templates/footer.php'?>