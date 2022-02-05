@extends('admin.layouts.main')

@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Редактування поста</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.main.index')}}">Годовна</a></li>
              <li class="breadcrumb-item"><a href="{{route('admin.posts.index')}}">Пости</a></li>
              <li class="breadcrumb-item active">Редактування поста</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
        	<div class = "col-12">
              <form action="{{route('admin.posts.update', $post->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="form-group w-50">
                  <label>Назва</label>
                  <input type="text" class="form-control" name="title" value="{{$post->title}}{{old('title')}}">
                  @error('title')
                    <div class="text-danger">{{$message}}</div>
                  @enderror
                </div>
                <div class="form-group">
                  <textarea id="summernote" name="content">{{old('content')}}{{$post->content}}</textarea>
                  @error('content')
                    <div class="text-danger">{{$message}}</div>
                  @enderror
                </div>
                <div class="form-group w-50">
                  <label for="exampleInputFile">Додати превю</label>
                  <div >
                    <img src="{{url('Storage/'. $post->preview_image)}}">
                  </div>
                  <div class="input-group">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="exampleInputFile" 
                      name="preview_image">
                      <label class="custom-file-label" for="exampleInputFile">Вибрати картинку</label>
                    </div>
                    <div class="input-group-append">
                      <span class="input-group-text">Загрузка</span>
                    </div>
                  </div>
                  @error('preview_image')
                    <div class="text-danger">{{$message}}</div>
                  @enderror
                </div>
                <div class="form-group w-50">
                  <label for="exampleInputFile">Додати головну картинку</label>
                  <div class="w-25">
                    <img src="{{url('Storage/'. $post->main_image)}}">
                  </div>
                  <div class="input-group">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="exampleInputFile" name="main_image">
                      <label class="custom-file-label" for="exampleInputFile">Вибрати картинку</label>
                    </div>
                    <div class="input-group-append">
                      <span class="input-group-text">Загрузка</span>
                    </div>
                  </div>
                  @error('main_image')
                    <div class="text-danger">{{$message}}</div>
                  @enderror
                </div>
                <div class="form-group w-50">
                  <label>Додати категорію</label>
                  <select class="form-control" name="category_id">
                    @foreach($categories as $category)
                      <option value="{{$category->id}}"
                        {{$category->id == $post->category_id ? ' selected' : ''}}>
                        {{$category->title}}
                      </option>
                    @endforeach
                  </select>
                  @error('category_id')
                    <div class="text-danger">{{$message}}</div>
                  @enderror
                </div>
                <div class="form-group">
                  <label>Теги</label>
                  <select name="tag_ids[]" class="select2" multiple="multiple" data-placeholder="Виберіть теги" style="width: 100%;">
                    @foreach($tags as $tag)
                      <option value="{{$tag->id}}"{{is_array($post->tags->pluck('id')->toArray())&&in_array($tag->id, $post->tags->pluck('id')->toArray())?'selected':''}}>
                        {{$tag->title}}
                      </option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">  
                  <input type="submit" class="btn btn-primary" value="Рудактувати">
                </div>
              </form>
          </div>
          
        </div>
        <!-- /.row -->
        <!-- Main row -->
        
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection