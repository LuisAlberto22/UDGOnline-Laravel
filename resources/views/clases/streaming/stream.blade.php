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
                    roomName: '{{ $lesson->nrc }}',
                    width: '100%',
                    height: '600px',
                    parentNode: document.querySelector('#meet'),
                    configOverwrite: { startWithAudioMuted: true , startWithVideoMuted: true },
                    userInfo: {
                        email: '{{ $user->email }}',
                        displayName: '{{ $user->name }}',
                        avatar: 'https://gifimage.net/wp-content/uploads/2017/11/gif-para-descargar-1.gif'
                    },
                };   
                const api = new JitsiMeetExternalAPI(domain, options);
                
            </script>
             @if (auth()->user()->hasRole('Maestro'))
        <script>
            api.on('authenticationRequired', function() {
                api.executeCommand('user', 'maestro');
                api.executeCommand('password', 'root');
            });
        </script>
        @endif
    @endsection
