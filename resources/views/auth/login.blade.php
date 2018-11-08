<html lang="en" class="uk-height-1-1">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Milo</title>
    {{--<link rel="icon" href="img/favicon.ico">--}}
    <!-- CSS FILES -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-rc.20/css/uikit.min.css">
</head>
<body class="uk-height-1-1">
<div class="uk-flex uk-flex-center uk-flex-middle uk-background-muted uk-height-viewport">
    <div class="uk-position-bottom-center uk-position-small uk-visible@m">
        <span class="uk-text-small uk-text-muted">© 2018 sakoju - Built with <a href="http://getuikit.com" title="Visit UIkit 3 site" target="_blank" data-uk-tooltip><span data-uk-icon="uikit"></span></a></span>
    </div>
    <div class="uk-width-medium uk-padding-small">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <fieldset class="uk-fieldset">
                <legend class="uk-legend">Login</legend>
                <div class="uk-margin">
                    <div class="uk-inline uk-width-1-1">
                        <span class="uk-form-icon uk-form-icon-flip" data-uk-icon="icon: user"></span>
                        <input name="username" class="uk-input uk-form-large" required placeholder="Username" type="text" value="{{old('username')}}">
                    </div>
                </div>
                <div class="uk-margin">
                    <div class="uk-inline uk-width-1-1">
                        <span class="uk-form-icon uk-form-icon-flip" data-uk-icon="icon: lock"></span>
                        <input name="password" class="uk-input uk-form-large" required placeholder="Password" type="password">
                    </div>
                </div>

                <div class="uk-margin">
                    <label><input class="uk-checkbox" type="checkbox"> Keep me logged in</label>
                </div>
                <div class="uk-margin">
                    <button type="submit" class="uk-button uk-button-primary uk-button-primary uk-button-large uk-width-1-1">LOG IN</button>
                </div>
            </fieldset>
        </form>
    </div>
</div>

<!-- JS FILES -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-rc.20/js/uikit.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-rc.20/js/uikit-icons.min.js"></script>
</body>
</html>


