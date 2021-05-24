<div style="float:left; margin-top: 2rem; margin-left: 1rem; margin-bottom: 1rem; " class="download sombra2">
    <a href="{{route('file.download',$file)}}">
        <div style="display: flex; align-items: center; ">
            <img style="width: 32px;" src="{{Asset('img/Leon.png')}}">
            <div>
                <p>Descagar</p>
                <p style="white-space: nowrap; width: 150px;overflow: hidden; text-overflow: ellipsis; ">{{$file->name}}</p>
                <p style="white-space: nowrap; width: 150px;overflow: hidden; text-overflow: ellipsis; ">Extension: {{$file->type}}</p>
            </div>
        </div>
    </a>
</div>


<style>
    .download {
        width: 200px;
        height: 6rem;
        background: whitesmoke;
        border-radius: 5px;
        color: #000;
        cursor: pointer;
        border: 1px solid #fff;
    }

    .download:hover {
        -webkit-filter: invert(100%);
        filter: invert(100%);
    }
</style>