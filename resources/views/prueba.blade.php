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
        <input type="text" name="description" id="">
        <input type="date" name="delivery_date">
        <input type="number"name="lesson_id">
        <input type="file" name="files[]" multiple>
        <input type="checkbox" name="users[]" value="2" id="">LUIS ALBERTO GARCIA OROZCO
        <input type="checkbox" name="users[]" value="4" id="">SALOMON 
        <input type="submit" value="Subir">
    </form>
</body>
</html>