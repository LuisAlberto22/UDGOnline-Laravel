<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="{{route('prueba')}}"  enctype="multipart/form-data" method="post">
        @csrf
        <input type="text" name="name" id="">
        <input type="text" name="body" id="">
        <input type="file" name="files[]" id="">
        <input type="submit" value="Subir">
        @error('file')
            {{$message}}
        @enderror
    </form>
</body>
</html>