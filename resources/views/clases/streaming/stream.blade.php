@extends('plantillas.principal')

@section('name', 'UDGOnline-Streaming')

@section('body')
    @include('plantillas.secciones.nav')
    <div id="meet"">

    </div>
    <script src='https://meet.udgonline.com/external_api.js'></script>
    <script>
        const domain = 'meet.udgonline.com';
        const options = {
            roomName: '{{$lesson->nrc}}',
            width: '100%',
            height: '600px',
            parentNode: document.querySelector('#meet'),
            userInfo: {
                email: '{{$user->email}}',
                displayName: '{{$user->name}}',
            },
        };   
        const api = new JitsiMeetExternalAPI(domain, options);
    </script>
@endsection