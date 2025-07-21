<?php require_once 'app/views/templates/headerPublic.php' ?>

<div class="home">
    <div class="page-container">
        <div class="page-header" id="banner">
            <div class="row">
                <div>
                    <h1>Welcome!</h1>
                    <p class="lead">This is a movie review website</p>
                    <form method="Get" action="/movie/search">
                        <input type="text" name="movie" placeholder="Search for a movie">
                        <br><br>
                        <input type="submit" value="Search">
                        <br><br>
                    </form>
                    <p class="lead"><strong><?= date("F jS, Y"); ?></strong> </p>
                </div>
            </div>
        </div>
    </div>
</div>


<?php require_once 'app/views/templates/footer.php' ?>