<?php require_once 'app/views/templates/headerPublic.php' ?>

<div class="home">
    <div class="page-container">
        <div class="page-header" id="banner">
            <div class="row">
                <div>
                    <h1>Welcome!</h1>
                    <form method="Get" action="/homePublic/search">
                        <input type="text" name="movie" class="search-input" placeholder="Search for a movie">
                        <br><br>
                        <input type="submit" class="search-button" value="Search">
                        <br><br>
                    </form>
                    
                </div>
                <br>
                <hr>

                 <?php if(isset($movie) && $movie['Resposnive'] !== 'False'): ?>
                    <!--Movie Information-->
                        <p>Movie Information:</p>
                            <div class="card-body">
                                <h2 class="card-title"><?= $movie['Title'] ?> (<?= $movie['Year'] ?>)</h2>
                                <img src="<?= $movie['Poster'] ?>" alt="Movie Poster">

                                <p><strong>Plot: </strong><?= $movie['Plot']?></p>
                                <p><strong>Language: </strong><?= $movie['Language']?></p>

                                <p><strong>IMDB Rating: </strong><?= $movie['imdbRating']?></p>
                            </div>
                            <a href="/login">For More information Login to account</a>
                    <br><br><br><br>
                    <p class="lead"><strong><?= date("F jS, Y"); ?></strong> </p>
                    
    
                <?php elseif(isset($error)): ?>
                    <div class="alert alert-warning text-center">
                       <?= $error ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>       
    </div>
</div>


<?php require_once 'app/views/templates/footer.php' ?>