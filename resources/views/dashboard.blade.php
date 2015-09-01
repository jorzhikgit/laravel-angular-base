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


        <div class="container" role="main" ng-show="!pageBusy">
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
                error_log: '{{ action("ErrorLogController@log") }}',
                logout: '{{ action("Auth\AuthController@getLogout") }}',
                signup: '{{ action("Auth\AuthController@postRegister") }}',
                login: '{{ action("Auth\AuthController@postLogin") }}',
                password: '{{ action("Auth\PasswordController@postEmail") }}',
                resetPassword: '{{ action("Auth\PasswordController@postReset") }}'
            };

            window._app_data = {};

            _app_data.csrfToken = '{!! csrf_token() !!}';
            _app_data.activeUser = {!! $user ? $user : 'null' !!};
            _app_data.preferredLanguage = {"key" : "en-US", "strings" : <?php include(realpath(public_path('i18n/locale-en-US.json'))); ?> };
        </script>

        <script src="{{ elixir('js/vendors.js') }}"></script>
        <script src="{{ elixir('js/templates.js') }}"></script>
        <script src="{{ elixir('js/app.js') }}"></script>
    </body>
</html>
