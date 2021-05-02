@extends('plantillas.principal')
@section('name','UDGOnline-CrearTarea')
@section('body')
<!-- Include the default stylesheet -->


<body>

    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script>
        $(document).ready(function() {
            $("#test").CreateMultiCheckBox({
                width: '230px',
                defaultText: 'Select Below',
                height: '250px'
            });
        });
    </script>

    <div class="h-full p-6 bg-gray-100 border-gray-200">
        <a class="bg-blue-600 hover:bg-blue-500 px-4 py-2 m-1.5 rounded text-white focus:outline-none" class="segmento-tarea" href="javascript:history.back()"> Volver Atrás</a>

        <form method="POST" action="{{route('clases.tareas.store' , $lesson)}}">
            @csrf
            <div class="mb-4">
                <label class="text-xl text-gray-600">Titulo <span class="text-red-500">*</span></label></br>
                <input type="text" class="border-2 border-gray-300 p-2 w-full" name="name" id="title" value="" required></input>
            </div>

            <div class="mb-8">
                <label class="text-xl  text-gray-600">Contenido <span class="text-red-500">*</span></label></br>
                <textarea name="description" placeholder="(Opcional)" class="border-2  w-full h-48 border-gray-500">

                </textarea>
            </div>
            <div style="display: flex; align-items: center;">
                <p style=" margin-right: 2rem;">Añadir Archivo</p>
                <input type="file" multiple name="file">
            </div>
            <div style="margin-top: .5rem;">
                <input type="checkbox">
                <span>Fecha de Entrega: </span>
                <input class="bg-gray-300 " width="3rem" type="date" id="start" name="fecha" value="2021-03-30" min="2021-01-01" max="2030-12-31">
            </div>
            <div style="display: colum; align-items: center;">
                <label for="users">Asignar a: </label>
                <select class="ml-4" name="users" id="test">
                   @foreach ($users as $user)
                        <option value="{{$user->id}}">{{$user->name}}</option>
                   @endforeach
                </select>
            </div>

            <div style="direction: rtl;">
                <button class="bg-blue-500 hover:bg-blue-600 px-4 py-2 rounded text-white focus:outline-none">Crear</button>
            </div>


        </form>
    </div>

    <script>
        $(document).ready(function() {
            $(document).on("click", ".MultiCheckBox", function() {
                var detail = $(this).next();
                detail.show();
            });
            $(document).on("click", ".MultiCheckBoxDetailHeader input", function(e) {
                e.stopPropagation();
                var hc = $(this).prop("checked");
                $(this).closest(".MultiCheckBoxDetail").find(".MultiCheckBoxDetailBody input").prop("checked", hc);
                $(this).closest(".MultiCheckBoxDetail").next().UpdateSelect();
            });
            $(document).on("click", ".MultiCheckBoxDetailHeader", function(e) {
                var inp = $(this).find("input");
                var chk = inp.prop("checked");
                inp.prop("checked", !chk);
                $(this).closest(".MultiCheckBoxDetail").find(".MultiCheckBoxDetailBody input").prop("checked", !chk);
                $(this).closest(".MultiCheckBoxDetail").next().UpdateSelect();
            });
            $(document).on("click", ".MultiCheckBoxDetail .cont input", function(e) {
                e.stopPropagation();
                $(this).closest(".MultiCheckBoxDetail").next().UpdateSelect();
                var val = ($(".MultiCheckBoxDetailBody input:checked").length == $(".MultiCheckBoxDetailBody input").length)
                $(".MultiCheckBoxDetailHeader input").prop("checked", val);
            });
            $(document).on("click", ".MultiCheckBoxDetail .cont", function(e) {
                var inp = $(this).find("input");
                var chk = inp.prop("checked");
                inp.prop("checked", !chk);
                var multiCheckBoxDetail = $(this).closest(".MultiCheckBoxDetail");
                var multiCheckBoxDetailBody = $(this).closest(".MultiCheckBoxDetailBody");
                multiCheckBoxDetail.next().UpdateSelect();
                var val = ($(".MultiCheckBoxDetailBody input:checked").length == $(".MultiCheckBoxDetailBody input").length)
                $(".MultiCheckBoxDetailHeader input").prop("checked", val);
            });
            $(document).mouseup(function(e) {
                var container = $(".MultiCheckBoxDetail");
                if (!container.is(e.target) && container.has(e.target).length === 0) {
                    container.hide();
                }
            });
        });
        var defaultMultiCheckBoxOption = {
            width: '220px',
            defaultText: 'Select Below',
            height: '200px'
        };
        jQuery.fn.extend({
            CreateMultiCheckBox: function(options) {
                var localOption = {};
                localOption.width = (options != null && options.width != null && options.width != undefined) ? options.width : defaultMultiCheckBoxOption.width;
                localOption.defaultText = (options != null && options.defaultText != null && options.defaultText != undefined) ? options.defaultText : defaultMultiCheckBoxOption.defaultText;
                localOption.height = (options != null && options.height != null && options.height != undefined) ? options.height : defaultMultiCheckBoxOption.height;
                this.hide();
                this.attr("multiple", "multiple");
                var divSel = $("<div class='MultiCheckBox'>" + localOption.defaultText + "<span class='k-icon k-i-arrow-60-down'><svg aria-hidden='true' focusable='false' data-prefix='fas' data-icon='sort-down' role='img' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 320 512' class='svg-inline--fa fa-sort-down fa-w-10 fa-2x'><path fill='currentColor' d='M41 288h238c21.4 0 32.1 25.9 17 41L177 448c-9.4 9.4-24.6 9.4-33.9 0L24 329c-15.1-15.1-4.4-41 17-41z' class=''></path></svg></span></div>").insertBefore(this);
                divSel.css({
                    "width": localOption.width
                });
                var detail = $("<div class='MultiCheckBoxDetail'><div class='MultiCheckBoxDetailHeader'><input type='checkbox' class='mulinput' value='-1982' /><div>Select All</div></div><div class='MultiCheckBoxDetailBody'></div></div>").insertAfter(divSel);
                detail.css({
                    "width": parseInt(options.width) + 10,
                    "max-height": localOption.height
                });
                var multiCheckBoxDetailBody = detail.find(".MultiCheckBoxDetailBody");
                this.find("option").each(function() {
                    var val = $(this).attr("value");
                    if (val == undefined)
                        val = '';
                    multiCheckBoxDetailBody.append("<div class='cont'><div><input type='checkbox' class='mulinput' value='" + val + "' /></div><div>" + $(this).text() + "</div></div>");
                });
                multiCheckBoxDetailBody.css("max-height", (parseInt($(".MultiCheckBoxDetail").css("max-height")) - 28) + "px");
            },
            UpdateSelect: function() {
                var arr = [];
                this.prev().find(".mulinput:checked").each(function() {
                    arr.push($(this).val());
                });
                this.val(arr);
            },
        });
    </script>

</body>


@endsection