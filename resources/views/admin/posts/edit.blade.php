@extends('admin.layouts.main')
@section('content')
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Редактирование статьи</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <form action="{{ route('admin.post.update', $post->id) }}" method="POST" enctype="multipart/form-data">
              @csrf
              @method('PATCH')
              <div class="form-group" class="w-25">
                <label>Название</label>
                <input type="text" class="form-control" name="title" placeholder="Название статьи" value="{{ $post->title }}">
                @error('title')
                <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group">
                <textarea id="summernote" name="content">{{ $post->content }}</textarea>
                @error('content')
                <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group w-50">
                <label for="exampleInputFile">Добавить картинку</label>
                <div class="w-25 mb-2">
                  <img src="{{ asset('storage/' . $post->preview_image) }}" alt="preview_image" class="w-50">
                </div>
                <div class="input-group">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" name="preview_image">
                    <label class="custom-file-label">Выберите файл</label>
                  </div>
                  <div class="input-group-append">
                    <span class="input-group-text">Загрузить</span>
                  </div>
                </div>
                @error('preview_image')
                <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group w-50">
                <label>Select</label>
                <select class="form-control" name="category_id">
                  @foreach($categories as $category)
                  <option value="{{ $category->id }}" {{ $category->id == $post->category_id ? 'selected' : '' }}>{{ $category->title }}</option>
                  @endforeach
                </select>
                @error('category_id')
                <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group">
                <label>Теги</label>
                <select class="select2" multiple="multiple" data-placeholder="Выберите теги" style="width: 100%;" name="tag_ids[]">
                  @foreach($tags as $tag)
                  <option value="{{ $tag->id }}" {{ is_array($post->tags->pluck('id')->toArray()) && in_array($tag->id, $post->tags->pluck('id')->toArray()) ? 'selected' : '' }}>{{ $tag->title }}</option>
                  @endforeach
                </select>
                @error('tag_ids')
                <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group">
                <br>
                <input type="submit" class="btn btn-block btn-primary" value="Обновить">
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
  </div>
@endsection