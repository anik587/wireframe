<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Wireframe</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="{{asset('js/jquery-ui-1.12.1.custom/jquery-ui.css')}}" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }
            .app-header {
                position: fixed;
                z-index: 100;
                top: 0;
                right: 0;
                left: 0;
                background: #fff;
                box-shadow: 0 1px 4px rgba(0, 0, 0, .06);
            }
            .branding-wrap{
                top: 0;
                background: #94424200;
                height: 80px;
            }
            .app-body{
                margin-top: 100px;
            }

            .content-wrapper-notAuth {
                position: relative;
                min-height: calc(100vh - 75px);
                /* padding-top: 3rem; */
                padding-bottom: 56px;
                background: #f2f6fc;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            #sortable1  {
                border: 1px solid #6b3e3e;
                width: 100%;
                min-height: 20px;
                list-style-type: none;
                margin: 0;
                padding: 5px 10px 5px 5px;
                float: left;
                margin-right: 10px;
            }
            #sortable2 {
                border: 1px solid #a7b345;
                width: 100%;
                min-height: 20px;
                list-style-type: none;
                margin: 0;
                padding: 5px 10px 5px 5px;
                float: left;
                margin-right: 10px;
            }
            #sortable3{
                border: 1px solid #30713b;
                width: 100%;
                min-height: 20px;
                list-style-type: none;
                margin: 0;
                padding: 5px 10px 5px 5px;
                float: left;
                margin-right: 10px;
            }
            #sortable1 li {
                background-color: #c3c1e2;
                margin: 0 5px 5px 5px;
                padding: 5px;
                font-size: 1.2em;
                width: 100%;
            }


            #sortable2 li {
                background-color: #cae826;
                margin: 0 5px 5px 5px;
                padding: 5px;
                font-size: 1.2em;
                width: 100%;
            }
            #sortable3 li{
                background-color: #9ae86a;
                margin: 0 5px 5px 5px;
                padding: 5px;
                font-size: 1.2em;
                width: 100%;
            }

            .labeling{
                font-weight: bold;
                font-size: 2rem;
                font-variant: full-width;
            }
           .sticky-footer {
                padding: 2rem 0;
                -ms-flex-negative: 0;
                flex-shrink: 0;
            }
            .has-error .checkbox,.has-error .checkbox-inline,.has-error .control-label,.has-error .help-block,
            .has-error .radio,.has-error .radio-inline,.has-error.checkbox label,.has-error.checkbox-inline label,
            .has-error.radio label,.has-error.radio-inline label{color:#a94442}.has-error .form-control
             {border-color:#a94442;-webkit-box-shadow:inset 0 1px 1px rgba(0,0,0,.075);box-shadow:inset 0 1px 1px rgba(0,0,0,.075)}.has-error .form-control:focus{border-color:#843534;-webkit-box-shadow:inset 0 1px 1px rgba(0,0,0,.075),0 0 6px #ce8483;box-shadow:inset 0 1px 1px rgba(0,0,0,.075),0 0 6px #ce8483}.has-error .input-group-addon{color:#a94442;background-color:#f2dede;border-color:#a94442}.has-error .form-control-feedback{color:#a94442}
        </style>
    </head>
    <body>


    @include('layout.header')

    @include('layout.modal')

    @if(Session::has('message'))
        <div class="alert {{ Session::get('alert-class', 'alert-info') }} alert-box">
            <a href="javascript:void(0)" class="close" data-dismiss="alert" aria-label="close">×</a>
            <strong>{{ Session::get('message') }}</strong>
        </div>
    @endif
    <div class="flash_message"
         style="position: absolute; top: 70px; text-align: center; z-index: 1500; width: 100%; padding: 0px 20%;">
        @include('flash::message')
    </div>

        <div class="app-body">

                <button style="margin: 10px" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    Add List
                </button>
                @include('list')
                @include('layout.footer')

        </div>






    <script src="{{asset('js/jquery-ui-1.12.1.custom/external/jquery/jquery.js')}}"></script>
    <script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="{{asset('js/jquery-ui-1.12.1.custom/jquery-ui.js')}}"></script>
    <script>
        var changeState = [];
        var changeSort = [];
        $('.flash_message div.alert').delay(2000).slideUp(500);
        $( function() {

            $( "#sortable1" ).sortable({
                connectWith: ".connectedSortable",
                start: function(e, ui) {
                    $(this).attr('data-previndex', ui.item.index()+1);
                },
                receive: ( event, ui ) =>{
                    changeState.push({id: $(ui.item.context).data('id'), status: 1});
                },
                stop: function(event, ui) {
                    changeSort.push({previndex: $(ui.item.context).data('previndex')-(ui.item.index()+1),tag: $(ui.item.context).data('tag'),id: $(ui.item.context).data('id'), position: ui.item.index()+1});
                }
            }).disableSelection();

            $( "#sortable2" ).sortable({
                connectWith: ".connectedSortable",
                start: function(e, ui) {
                    $(this).attr('data-previndex', ui.item.index()+1);
                },
                receive: ( event, ui ) =>{
                    changeState.push({id: $(ui.item.context).data('id'), status: 2});
                },
                stop: function(event, ui) {
                    changeSort.push({previndex: $(ui.item.context).data('previndex')-(ui.item.index()+1), tag: $(ui.item.context).data('tag'),id: $(ui.item.context).data('id'), position: ui.item.index()+1});
                }

            }).disableSelection();

            $( "#sortable3" ).sortable({
                connectWith: ".connectedSortable",
                start: function(e, ui) {
                    $(this).attr('data-previndex', ui.item.index()+1);
                },
                receive: ( e, ui ) =>{
                    changeState.push({id: $(ui.item.context).data('id'), status: 3});
                },
                stop: function(event, ui) {
                    changeSort.push({previndex: $(ui.item.context).data('previndex')-(ui.item.index()+1),tag: $(ui.item.context).data('tag'),id: $(ui.item.context).data('id'), position: ui.item.index()+1});
                }

            }).disableSelection();
        } );

        $('#saveChanges').on('click', (e)=>{

            $.ajax({
                url: '{{route('todoList.update')}}',
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                data: { dataState : changeState, dataPosition: changeSort},
                success: function(data){

                    window.location.href = '/';
                },
                error: function (data) {
                    alert('failed');
                }
            });
        })

    </script>
    </body>
</html>
