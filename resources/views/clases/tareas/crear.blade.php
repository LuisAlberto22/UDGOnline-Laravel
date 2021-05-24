@extends('plantillas.principal')
@section('name','UDGOnline-CrearTarea')
@section('body')
<!-- Include the default stylesheet -->


    @include('plantillas.secciones.nav')
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script>
        $(document).ready(function() {
            $("#test").CreateMultiCheckBox({
                width: '230px',
                defaultText: 'Seleccionar Alumnos',
                height: '250px'
            });
        });
    </script>

    <div class="h-full p-6 bg-white-500 sombra1" style="margin: 1rem;">
   
        <form method="POST" enctype="multipart/form-data" action="{{route('clases.tareas.store' , $lesson)}}">
            @csrf
            <div class="mb-4">
                <label class="text-xl text-gray-600">Titulo <span class="text-red-500">*</span></label></br>
                <input type="text" class="border-2 border-gray-300 p-2 w-full" name="name" id="title" value="" required></input>
            </div>
            @error("name")
                {{ $message }}
            @enderror

            <div class="mb-8">
                <label class="text-xl  text-gray-600">Contenido <span class="text-red-500">*</span></label></br>
                <textarea name="description" placeholder="(Opcional)" class="border-2  w-full h-48 border-gray-500">
                </textarea>
            </div>
            @error("description")
            {{ $message }}
        @enderror
            <div style="display: flex; align-items: center;">
                <p style=" margin-right: 2rem;">Añadir Archivo</p>
                <input type="file" name="files[]" multiple >
            </div>
            @error("files")
            {{ $message }}
        @enderror
            <div style="margin-top: .5rem;">
                <input type="checkbox" onchange="toggle(start)">
                <span>Fecha de Entrega: </span>
                <input class="bg-gray-300 " disabled width="3rem" type="datetime-local" id="start" name="delivery_date" >
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
        function toggle(e){
            e.toggleAttribute('disabled');
        }
    </script>

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
            defaultText: 'Seleccionar Alumnos',
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


@endsection