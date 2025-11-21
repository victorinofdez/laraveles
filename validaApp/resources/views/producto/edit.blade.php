<form action="{{ url('producto') }}" method="post">
    @error('producto')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    @csrf
    Nombre:
    <input type="text" name="nombre" value="{{ old('nombre')}}"><br>
    @error('nombre')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    Ancho:
    <input type="text" name="ancho" value="{{ old('ancho')}}"><br>
    @error('ancho')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    Alto:
    <input type="text" name="alto" value="{{ old('alto')}}"><br>
    @error('alto')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    Peso:
    <input type="text" name="peso" value="{{ old('peso')}}"><br>
    @error('peso')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    Precio:
    <input type="text" name="precio" value="{{ old('precio')}}"><br>
    @error('precio')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    Fecha alta:
    <input type="text" name="fechaAlta" value="{{ old('fechaAlta')}}"><br>
    @error('fechaAlta')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    Estado:
    <input type="text" name="estado" value="{{ old('estado')}}"><br>
    @error('estado')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <input type="submit">
</form>