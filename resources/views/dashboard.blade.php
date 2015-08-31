<!doctype html>
<html lang="en"  data-ng-app="LaravelAngularApp">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel 5 + AngularJS</title>

        <link rel="stylesheet" href="{{ elixir('css/app.css') }}" type='text/css'>
    </head>
    <body>
        <div ng-include="'layout/header.html'"></div>


        <div class="container" role="main" ui-view ng-show="!pageBusy">
            <div class="content">
                <div ui-view></div>
            </div>
        </div>

        <div ng-include="'layout/footer.html'"></div>

        <script type="text/javascript">
            window._routes = {
                home: '/',
                users: '/users/:id',
                files: '/files/:id',
                logout: '{{ action("Auth\AuthController@getLogout") }}',
                signup: '{{ action("Auth\AuthController@postRegister") }}'
            };

            window._app_data = {};

            _app_data.activeUser = {!! $user ? $user : 'null' !!};
        </script>

        <script src="{{ elixir('js/vendors.js') }}"></script>
        <script src="{{ elixir('js/templates.js') }}"></script>
        <script src="{{ elixir('js/app.js') }}"></script>
    </body>
</html>