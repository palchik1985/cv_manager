<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <title>CV Generator</title>
    <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.1/css/materialize.min.css">
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

</head>
<body>
<div class="container" id="root">
    <nav>
        <div class="nav-wrapper blue ">
            <img class="brand-logo right" style="margin:10px;color:white" src="{{ url('/') }}/img/itrex-logo.svg" alt="ITRex">
            <ul id="nav-mobile" class="left hide-on-med-and-down">
                <li><router-link to="/list"><i class="left material-icons">toc</i>Home</router-link></li>
                <li><router-link to="/add"><i class="left material-icons">add</i>Add new</router-link></li>
                <li>
                    <form>
                        <div class="input-field">
                            <input id="search" type="search" required>
                            <label class="label-icon" for="search"><i class="material-icons">search</i></label>
                            <i class="material-icons">close</i>
                        </div>
                    </form>
                </li>
            </ul>


        </div>
    </nav>

    <router-view></router-view>



</div>

<!--Import jQuery before materialize.js-->
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.1/js/materialize.min.js"></script>

<script src="https://unpkg.com/vue"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src="https://unpkg.com/vue-router/dist/vue-router.js"></script>

<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<script src="/js/app.js"></script>

</body>
</html>