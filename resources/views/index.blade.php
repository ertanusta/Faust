<html lang="en"><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <title>Faust-Metin Sınıflandırma</title>


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link href="{{URL::asset("css/bootstrap.min.css")}}" rel="stylesheet" >

<script>
    function showProcess() {
        document.getElementById("circle").style.display = "block";


    }
</script>
    <style>
        #circle {
            position: absolute;
            top: 20%;
            left: 50%;
            transform: translate(-50%,-50%);
            width: 150px;
            height: 150px;
        }

        .loader {
            width: calc(100% - 0px);
            height: calc(100% - 0px);
            border: 8px solid #162534;
            border-top: 8px solid #09f;
            border-radius: 50%;
            animation: rotate 5s linear infinite;
        }

        @keyframes rotate {
            100% {transform: rotate(360deg);}
        }
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
    <!-- Custom styles for this template -->
    <link href="{{URL::asset("css/cover.css")}}" rel="stylesheet">
</head>
<body class="text-center">
<div class="cover-container d-flex w-100 h-75 p-3 mx-auto flex-column ">
    <header class="masthead mb-auto">
        <div class="inner">
            <h3 class="masthead-brand"><a href="https://www.youtube.com/watch?v=VMw0EjLFPXw">Faust</a></h3>
            <nav class="nav nav-masthead justify-content-center">

                &nbsp;&nbsp;&nbsp;
                <a href="https://github.com/ertanusta" class="nav"><i class="fa fa-github fa-3x"></i></a>
            </nav>
        </div>
    </header>


    <main role="main" class="inner cover">
        <p class="lead">
        <div id="circle" style="display: none;">
            <div class="loader">
                <div class="loader">
                    <div class="loader">
                        <div class="loader"></div></div></div>
            </div></div>
        </p>
        <h1 class="cover-heading">Faust Metin Sınıflandırma Aracı.</h1>

        <p class="lead">

        <form class="form" action="{{route('process')}}" method="post">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="sel1">Algoritma Seçimi:</label>
                <select class="form-control" name="model" id="sel1">
                    <option value="0">Keras Classifier</option>
                    <option value="1">Naive Bayes Classifier</option>
                    <option value="2">Linear Support Vector Machine</option>
                    <option value="3">Logistic Regression</option>
                </select>
            </div>
            <div class="form-group">
            <input type="text"  class="form-control" name="text" placeholder="Bekliyoruz.." required autocomplete="off">
            </div>
            <input type="submit" class="btn btn-lg btn-success" value="Tahmin" onclick="showProcess()">

        </form>


        </p>
        <p class="lead">
        @if(!empty($errors->first()))
            <div class="">
                <div class="alert alert-secondary">
                    <span>{!! $errors->first() !!}</span>
                </div>
            </div>
            @endif
        </p>



    </main>


</div>


</body></html>