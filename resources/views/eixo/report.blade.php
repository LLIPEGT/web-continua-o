<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1 clas>CURSOS</h1>
    @foreach($cursos as $item)
        <hr>
        <h2>{{$item->nome}}({{$item->abreviatura}})</h2>
        <p><b>Duração: </b>{{$item->duracao}} ano(s)</p>
        <p><b>Eixo: </b>{{$item->eixo->name}}</p>
    @endforeach

</body>
</html>
