<?php require_once 'app/views/templates/header.php' ?>

    <div class="home">
        <div class="page-container">
            <div class="page-header" id="banner">
                <div class="row">
                    <div>
                        <br>
                        <h1 style="font-size: 24px;">Welcome!</h1>
                        <br>
                        <form method="Get" action="/omdb/search">
                            <input type="text" name="movie" placeholder="Search for a movie">
                            <input type="submit" value="Search">
                            <br><br>
                        </form>
                        <p><strong><?= date("F jS, Y"); ?></strong> </p>                      
                    </div>
                </div>
            </div>
        </div>
    </div>


<?php require_once 'app/views/templates/footer.php' ?>