<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/all.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap-tokenfield.css" />
        <link rel="stylesheet" href="css/main.css">
        <script src="js/jquery-3.4.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/typeahead.bundle.js"></script>
        <script src="js/bootstrap-tokenfield.js"></script>
        <script src="js/main.js"></script>
        <title>Ambitieproject Search page</title>
    </head>
    <body>
        <div class="container-fluid pt-5">
            <div class="row">
                <div class="col-md-4 col-sm-12"></div>
                <div class="col-md-4 col-sm-12">
                    <h1 class="pt-5 pb-2">Dataset Search</h1>
                    <form id="zoek-form" action="zoek.php" method="GET">
                        <div class="input-group mb-3">
                            <input id="dataset-search-input" name="query" type="text" class="form-control">
                            <div class="input-group-append">
                                <button id="submit-button" class="btn btn-primary" type="submit" form="zoek-form" value="Submit">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-4 col-sm-12"></div>
            </div>
        </div>
    </body>
</html>
