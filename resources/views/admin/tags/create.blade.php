@extends('admin.layouts.main')

@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Додавання тега</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.main.index')}}">Годовна</a></li>
              <li class="breadcrumb-item"><a href="{{route('admin.tags.index')}}">теги</a></li>
              <li class="breadcrumb-item active">Додавання тега</li>
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
        	<div class = "col-4">
              <form action="{{route('admin.tags.store')}}" method="POST">
                @csrf
                <div class="form-group">
                  <label>Назва</label>
                  <input type="text" class="form-control" name="title" placeholder="Назва категорії">
                  @error('title')
                    <div class="text-danger">{{$message}}</div>
                  @enderror
                </div>
                <button type="submit" class="btn btn-primary">Додати</button>
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