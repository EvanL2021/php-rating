<!DOCTYPE html>
    <head>
        <title><?=$title?></title>
        <link rel="stylesheet" type="text/css" href=<?= "css/" . $stylepage . ".css"?> />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        
        <header class="bg-primary">
            <div class="row">
                <img src="images/star.png" width="50", height="50" style="margin-left: 1em; margin-bottom: 0.3em; margin-top: 0.5em">
                <h1 class="text-justify" style="color: white; margin-left: 0.25em; margin-bottom: 0.3em; margin-top: 0.3em"><a style="color: inherit; text-decoration: inherit;" href="index.php?controller=avis-lister">Rating</a></h1>
            </div>
        </header>

        <?=$content?>    
    </body>
</html>