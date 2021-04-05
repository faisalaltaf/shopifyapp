@extends('shopify-app::layouts.default')

@section('content')
   
   customer
@endsection
@section('scripts')
    @parent

<!-- <h2>forward_static_call_array</h2> -->
    <script type="text/javascript">
        var AppBridge = window['app-bridge'];
        var actions = AppBridge.actions;
        var TitleBar = actions.TitleBar;
        var Button = actions.Button;
        var Redirect = actions.Redirect;
        var titleBarOptions = {
            title: 'customer',
        };
        var myTitleBar = TitleBar.create(app, titleBarOptions);
    </script>

@endsection

