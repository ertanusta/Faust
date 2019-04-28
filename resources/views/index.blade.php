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
            top: 50%;
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
<div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
    <header class="masthead mb-auto">
        <div class="inner">
            <h3 class="masthead-brand"><a href="{{route('index')}}">Faust</a></h3>
            <nav class="nav nav-masthead justify-content-center">
                <a href="https://github.com/ertanusta" class=""><i class="fa fa-github fa-2x"></i></a>
            </nav>
        </div>
    </header>

    <main role="main" class="inner cover">
        <h1 class="cover-heading">Dene Bakalım.</h1>
        <p class="lead">Hangi sınıfa ait olduğunu merak ettiğiniz metni aşağıdaki kutuya girebilirsiniz. </p>
        <p class="lead">
            <form class="form" action="{{route('process')}}" method="post">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="sel1">Algoritma Seçimi:</label>
                <select class="form-control" name="model" id="sel1">
                    <option value="0">Random Forest Classifier</option>
                    <option value="1">Naive Bayes Classifier</option>
                    <option value="2">Linear Support Vector Machine</option>
                    <option value="3">Logistic Regression</option>
                </select>
            </div>
            <input type="text"  class="form-control" name="text" placeholder="Bekliyoruz.." required autocomplete="off">

            <br>
            <input type="submit" class="btn btn-lg btn-success" value="Yolla Gelsin" onclick="showProcess()">

        </form>

        @if(!empty($errors->first()))
            <div class="">
                <div class="alert alert-success">
                    <span>{{ $errors->first() }}</span>
                </div>
            </div>
            @endif

        </p>
            <div id="circle" style="display: none">
                <div class="loader">
                    <div class="loader">
                        <div class="loader">
                            <div class="loader"></div></div></div>
                </div></div>
            <p class="lead">
                6 farklı kategori içerisinden girilen metnin hangi kategoriye ait olduğunu tahmin eden 4 farklı algoritma kullanılıyor. </p>
            <p class="lead">
                Kullanılan algoritmalar; Random Forest Classifier,
                Naive Bayes Classifier, Linear Support Vector Machine, Logistic Regression.
            </p>
            <p class="lead">
                Kategoriler; Ekonomi, Kültür ve Sanat, Spor, Siyaset, Teknoloji, Sağlık.
            </p>

    </main>


</div>


</body></html>