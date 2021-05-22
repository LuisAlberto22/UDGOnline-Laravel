
    <a class="download android">
        <i class="fa fa fa-android fa-3x"></i>
        <span class="df">Variable</span>
        <span class="dfn">Descargar</span>
    </a>


    <style>
        @import url("https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css");
        @import url(https://fonts.googleapis.com/css?family=Open+Sans);

        * {
            font-family: 'Open Sans', 'sans-serif';
        }

        html,
        body {
            overflow: hidden;
        }

        .download {
            width: 200px;
            height: 75px;
            background: black;
            float: left;
            border-radius: 5px;
            position: relative;
            color: #fff;
            cursor: pointer;
            border: 1px solid #fff;
        }

        .download>.fa {
            color: #fff;
            position: absolute;
            top: 50%;
             left: 15px;
            transform: translateY(-50%);
        }

        .df,
        .dfn {
            position: absolute;
            left: 70px;
        }

        .df {
            top: 20px;
            font-size: .68em;
        }

        .dfn {
            top: 33px;
            font-size: 1.08em;
        }

        .download:hover {
            -webkit-filter: invert(100%);
            filter: invert(100%);
        }
    </style>
