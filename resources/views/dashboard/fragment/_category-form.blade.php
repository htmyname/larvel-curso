@csrf
<label for="">Titulo</label>
<input class="form-control" type="text" name="title" value="{{ old('title', $category->title) }}">

<label for="">Slug</label>
<input class="form-control" type="text" name="slug" value="{{ old('slug', $category->slug) }}">

<input type="submit" class="btn btn-success mt-3" value="Enviar">
