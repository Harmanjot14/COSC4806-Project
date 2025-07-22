<?php require_once 'app/views/templates/header.php' ?>

    <div class="home">
        <div class="page-container">
            <div class="page-header" id="banner">
                <div class="row">
                    <div class="home-wrapper text-center">
                        <br><br><br><br><br><br><br>
                        <h1 style="font-size: 32px;">Welcome!</h1>
                        <br>
                        <form method="Get" action="/omdb/search">
                            <input type="text" name="movie" placeholder="Search for a movie" style="width: 400px;">
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