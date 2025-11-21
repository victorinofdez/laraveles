<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <style type="text/css">
        body {
  font-family: Arial, sans-serif;
  background-color: #f4f4f4;
  margin: 0;
  padding: 0;
}

h2 {
  text-align: center;
  color: #333;
}

form {
  max-width: 400px;
  margin: 20px auto;
  background-color: #fff;
  padding: 20px;
  border-radius: 8px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

label {
  display: block;
  margin-bottom: 8px;
  color: #333;
}

input,
select {
  width: 100%;
  padding: 8px;
  margin-bottom: 16px;
  box-sizing: border-box;
  border: 1px solid #ccc;
  border-radius: 4px;
}

input[type="submit"] {
  background-color: #4caf50;
  color: #fff;
  cursor: pointer;
}

input[type="submit"]:hover {
  background-color: #45a049;
}


    </style>
</head>
<body>
    <form action="{{ url('producto') }}" method="post">
    @csrf
    Nombre:
    <input type="text" name="nombre" value="{{ old('nombre') }}"><br>
    Ancho:
    <input type="text" name="ancho" value="{{ old('ancho') }}"><br>
    Alto:
    <input type="text" name="alto" value="{{ old('alto') }}"><br>
    Peso:
    <input type="text" name="peso" value="{{ old('peso') }}"><br>
    Precio:
    <input type="text" name="precio" value="{{ old('precio') }}"><br>
    Fecha alta:
    <input type="text" name="fechaAlta" value="{{ old('fechaAlta') }}"><br>
    Estado:
    <input type="text" name="estado"><br>
    <input type="submit">
</form>
@if ($errors->any())
<div class="alert alert-danger">
<ul>
@foreach ($errors->all() as $error)
<li>{{ $error }}</li> @endforeach
</ul> </div>
@endif

</body>
</html>
