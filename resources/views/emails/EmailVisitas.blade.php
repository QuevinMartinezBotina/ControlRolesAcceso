<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik&display=swap" rel="stylesheet">

    <title>Autorización visitas</title>

    <style>
        .correo-visitas {
            font-family: 'Rubik', sans-serif !important;
        }

    </style>
</head>

<body class="container-fluid d-flex justify-content-center correo-visitas">
    {{-- <div class="row d-flex justify-content-center m-3  shadow-lg">
        <div class="col-md-12 d-flex justify-content-center  shadow p-2 bg-success">
            <p class="h2 text-center  text-white">
                <strong>
                    Nueva visita a instalaciones
                </strong>
            </p>
        </div>
        <div class="col-md-12 d-flex justify-content-center">
            <i class="i">
                <strong>
                    Visitante:
                </strong>
                {{ /* $request->nom_visitante */ ' Juan perez' }}
            </i>

        </div>
        <div class="col-md-12 d-flex justify-content-center">
            <i class="i">
                <strong>
                    Motivo de la visita:
                </strong>
                {{ /* $request->nom_visitante */ ' Reunion de negocios' }}
            </i>

        </div>
        <div class="col-md-12 d-flex justify-content-center">
            <i class="i">
                <strong>
                    Empresa de la que visita:
                </strong>
                {{ /* $request->nom_visitante */ ' Amazon' }}
            </i>

        </div>
        <div class="col-md-12 d-flex justify-content-center">
            <i class="i">
                <strong>
                    Motivo de la visita:
                </strong>
                {{ /* $request->nom_visitante */ ' Reunion de negocios' }}
            </i>

        </div>
        <div class="col-md-12 d-flex justify-content-center">
            <i class="i">
                <strong>
                    Fecha programada:
                </strong>
                {{ /* $request->nom_visitante */ ' 22-03-2022' }}
            </i>

        </div>
        <div class="col-md-12 d-flex justify-content-center">
            <div class="row d-flex justify-content-center m-2">

                <div class="col-5">
                    <a class="btn btn-success" href="http://127.0.0.1:8000/aprobaciones">Autorizar Visica</a>
                </div>

                <div class="col-5">
                    <a class="btn btn-danger" href="http://127.0.0.1:8000/aprobaciones">Denegar Visica</a>
                </div>
            </div>
        </div>
    </div> --}}

    <div class="row d-flex justify-content-center m-3  shadow-lg rounded">
        <div class="col-md-12 d-flex justify-content-center  p-2 bg-success avi-bg-green rounded-top">
            <p class="h3 text-center  text-white">
                <strong>
                    Nueva visita a instalaciones
                </strong>
            </p>
        </div>

        <div class="col-md-12 d-flex justify-content-center">
            <div class="col-md-4 border d-flex justify-content-center  avi-target-orange  rounded p-3 m-2">
                <div class="row">
                    <div class="col-md-12 h3 d-flex justify-content-center">
                        <strong class="text-center text-muted">
                            {{ $request->nom_visitante }}
                        </strong>
                    </div>
                    <div class="col-md-12 h5 d-flex justify-content-center">
                        <i class="far fa-user avi-icon-xl"></i>
                    </div>

                    <div class="col-md-12 h5 d-flex justify-content-center text-muted">
                        Motivo de la visita
                    </div>
                    <div class="col-md-12 h6 d-flex justify-content-center  ">
                        <strong>
                            {{ $request->motivo_visita }}
                        </strong>
                    </div>

                    <div class="col-md-12 h5 d-flex justify-content-center text-muted">
                        Empresa de la que visita
                    </div>
                    <div class="col-md-12 h6 d-flex justify-content-center ">
                        <strong>
                            {{ $request->nom_empresa }}
                        </strong>
                    </div>

                    <div class="col-md-12 h5 d-flex justify-content-center text-muted">
                        Fecha programada
                    </div>
                    <div class="col-md-12 h6 d-flex justify-content-center ">
                        <strong>
                            {{ date('d-m-Y', strtotime($request->fecha_programada)) }}
                        </strong>
                    </div>


                    <div class="col-md-12 h6 d-flex justify-content-center  my-2">
                        <div class="row d-flex justify-content-center">
                            <div class="col-12 col-md-12">
                                <a href="http://127.0.0.1:8000/visitas/{{ $request->id }}" class="btn btn-success "
                                    type="submit">Ver detalles
                                </a>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>



    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js"
        integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous">
    </script>
    -->
</body>

</html>
