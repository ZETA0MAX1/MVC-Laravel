<h1>Crear Artículo</h1>
<form action="{{ route('categorias.store') }}" method="POST">
    @csrf
    <label for="titulo">Título:</label>
    <input type="text" name="titulo" id="titulo" required>
    <label for="contenido">Contenido:</label>
    <textarea name="contenido" id="contenido" required></textarea>
    <button type="submit">Guardar</button>
</form>
