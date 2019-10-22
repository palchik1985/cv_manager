<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <title>CV Generator</title>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.1/css/materialize.min.css">
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <style>
        img#brand-logo {
            margin: 10px;
        }
        .mt-15 {
            margin-top: 15px;
        }
        i.mt-15 {
            margin-top: 35px;
        }

    </style>
</head>
<body>
<div class="container" id="root">
    <nav>
        <div class="nav-wrapper blue ">
            <img id="brand-logo" class="brand-logo right" src="{{ url('/') }}/img/white-logo.svg" alt="BIG DIG"/>
            <ul id="nav-mobile" class="left hide-on-med-and-down">
                <li><router-link to="/list"><i class="left material-icons">toc</i>List</router-link></li>
                <li><router-link to="/edit"><i class="left material-icons">add</i>Add new</router-link></li>
            </ul>
            <ul class="right" style="margin-right: 150px">
                <li><a href="/logout">Logout</a></li>
                <li><a href="/register">Register new user</a></li>
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
<script src="https://cdn.jsdelivr.net/vee-validate/2.0.0-beta.25/vee-validate.min.js"></script>
<script>
    Vue.use(VeeValidate);
</script>

<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<script src="/js/app.js"></script>

</body>
</html>
