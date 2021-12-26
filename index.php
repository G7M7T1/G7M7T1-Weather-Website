<!DOCTYPE html>
<html lang="zh-hans">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="author" content="G7M7T1"/>
    <meta name="description" content="Weather Website by G7M7T1"/>
    <meta name="robots" content="index,follow"/>
    <title>Weather | G7M7T1</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
            integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="shortcut icon" href="./logo.png"/>
    <link rel="bookmark" href="./logo.png"/>
    <style>
        .heroImage {
            background-image: url("./img/Leave-10s-3000px.svg");
            border-radius: 0;
            height: 100vh;
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .alert {
            display: none;
        }

        .fw-bold {
            color: rgba(0,0,0,0.7);
        }
    </style>
</head>
<body>
<div class="jumbotron heroImage text-center">
    <div class="container">
        <h1 class="display-4 fw-bold">Weather</h1>
        <p class="lead">Enter <strong>City Name</strong> You Want To Search</p>

        <form>
            <div class="input-group mb-3 w-75 mx-auto">
                <input id="city" type="text" class="form-control" placeholder="Toronto, London, Paris...">
                <button id="findMyWeather" class="btn btn-outline-secondary" type="submit">Search</button>
            </div>
        </form>

        <div class="col-5 mx-auto mt-3">
            <div id="success" class="alert alert-success">
                Search Success
            </div>
            <div id="fail" class="alert alert-danger">
                Search Fail, We Can't Find That City
            </div>
            <div id="noCity" class="alert alert-danger">
                Please Enter City Name before Search
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $("#findMyWeather").click(function (event) {
        event.preventDefault();
        $(".alert").hide();
        if ($("#city").val() !== "") {
            $.get("scraper.php?city="+$("#city").val(), function (data) {
                if (data == "") {
                    $("#fail").fadeIn();
                } else {
                    $("#success").html(data).fadeIn();
                }
            });
        } else {
            $("#noCity").fadeIn();
        }
    });
</script>
</body>
</html>
