@extends('admin.layouts.main')

@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Додати користувача</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.main.index')}}">Годовна</a></li>
              <li class="breadcrumb-item"><a href="{{route('admin.users.index')}}">Користувачі</a></li>
              <li class="breadcrumb-item active">Додати користувача</li>
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
              <form action="{{route('admin.users.store')}}" method="POST">
                @csrf
                <div class="form-group">
                  <label>Логін</label>
                  <input type="text" class="form-control" name="name" placeholder="Назва категорії"
                  value="{{old('name')}}">
                  @error('name')
                    <div class="text-danger">{{$message}}</div>
                  @enderror
                </div>
                <div class="form-group">
                  <label>email</label>
                  <input type="email" class="form-control" name="email" placeholder="Назва категорії" value="{{old('email')}}">
                  @error('email')
                    <div class="text-danger">{{$message}}</div>
                  @enderror
                </div>
                <div class="form-group w-50">
                  <label>Додати роль</label>
                  <select class="form-control" name="role_id">
                    @foreach($roles as $role)
                      <option value="{{$role->id}}"
                        {{$role->id == old('category_id') ? ' selected' : ''}}>
                        {{$role->title}}
                      </option>
                    @endforeach
                  </select>
                  @error('role_id')
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