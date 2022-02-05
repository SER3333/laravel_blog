@extends('admin.layouts.main')

@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Користувачі</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.main.index')}}">Годовна</a></li>
              <li class="breadcrumb-item active">Користувачі</li>
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
        	<div class = "col-2">
             <a href="{{route('admin.users.create')}}" class="btn btn-block btn-success">Добавити</a>
          </div>  
        </div>
        <div class="row">
          <div class="col-8">
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Назва</th>
                      <th>Діяї</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($users as $user)
                      <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td>
                          <button type="button" class="btn btn-block btn-success">
                          <a class="text-white" href="{{route('admin.users.show', $user->id)}}"><i class="fas fa-eye"></i>Переглянути</a>
                        </button>
                        </td>
                        <td>
                          <button type="button" class="btn btn-block btn-primary">
                            <a class="text-white" href="{{route('admin.users.edit', $user->id)}}"><i class="fas fa-pencil-alt"></i>Редактування</a>
                          </button> 
                        </td>
                        <td>
                          <form action="{{route('admin.users.delete', $user->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-block btn-danger">
                              <i class="far fa-trash-alt" role="button">Видалити</i>
                            </button>
                          </form>
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
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