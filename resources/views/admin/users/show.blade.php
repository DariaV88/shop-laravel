@extends('admin.layouts.main')

@section('content')
 <!-- Content Header (Page header) -->
 <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Пользователь</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('admin.main.index')}}">Главная</a></li>
            <li class="breadcrumb-item active">Пользователь</li>
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
              <div class="card-header d-flex p-3">
                <form action="{{route('admin.users.destroy', $user->id)}}" method="post">
                  @csrf
                  @method('delete')
                  <input type="submit" value="Удалить" class="btn btn-danger">
                </form>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                    <th>ID</th>
                      <th>{{$user->id}}</th>
                    </tr>
                    <tr>
                      <th>Имя</th>
                      <th>{{$user->name}}</th>
                    </tr>
                    <tr>
                      <th>Фамилия</th>
                      <th>{{$user->surname}}</th>
                    </tr>
                    <tr>
                      <th>Отчество</th>
                      <th>{{$user->patronymic}}</th>
                    </tr>
                    <tr>
                      <th>Email</th>
                      <th>{{$user->email}}</th>
                    </tr>
                    <tr>
                      <th>Возраст</th>
                      <th>{{$user->age}}</th>
                    </tr>
                    <tr>
                      <th>Пол</th>
                      <th>{{$user->genderTitle}}</th>
                    </tr>
                    <tr>
                      <th>Адрес</th>
                      <th>{{$user->address}}</th>
                    </tr>
                  </thead>
                  <tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
       </div>
        <!-- /.row -->
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection