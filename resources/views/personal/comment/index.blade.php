
@extends('personal.layouts.main')

@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Коментарі</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('personal.main.index')}}">Головна</a></li>
              <li class="breadcrumb-item active">Коментарі</li>
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
          <div class="col-12">
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
                    
                    @foreach($comments as $comment)
                      <tr>
                        <td>{{$comment->id}}</td>
                        <td>{{$comment->message}}</td>
                        <td>
                          <button type="button" class="btn btn-block btn-success">
                          <a class="text-white" href="{{route('posts.show', $comment->post->id)}}"><i class="fas fa-eye"></i>Переглянути пост</a>
                        </button>
                        </td>
                        <td>
                          <button type="button" class="btn btn-block btn-primary">
                            <a class="text-white" href="{{route('personal.comment.edit', $comment->id)}}"><i class="fas fa-pencil-alt"></i>Редактування</a>
                          </button> 
                        </td>
                        <td>
                          <form action="{{route('personal.comment.delete', $comment->id)}}" method="POST">
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