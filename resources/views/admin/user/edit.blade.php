@extends('layouts.admin_app')

@section('title', 'Список пользователей')

@section('content')
    @if (session('success'))
        <div class="alert alert-success" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i>{{ session('success') }}</h4>
        </div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i>{{ session('error') }}</h4>
        </div>
    @endif
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Fixed Header Table</h3>

                    <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0" style="height: 300px;">
                    <table class="table table-head-fixed text-nowrap">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Пользователь</th>
                            <th>Емеил</th>
                            <th>Роль</th>
                            <th>Создан</th>
                            <th>Обновлен</th>
                            <th>Действия</th>
                        </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <form method="POST"  action="{{ route('user.update', $user['id']) }}">
                                    @method('PUT')
                                    @csrf
                                <td>{{ $user['id'] }}</td>
                                <td><input type="text" class="form-control" id="name" name="name" value="{{ $user['name'] }}"></td>
                                <td><input type="email" class="form-control" id="email" name="email"  value="{{ $user['email'] }}"></td>
                                <td><select class="form-control select2" name="role_name" id="role_name" >
                                        @foreach($roles as $role)
                                            <option value="{{ $role['id'] }}" @if($user['role_id'] == $role['id']) selected="selected" @endif>{{ $role['name'] }}</option>
                                        @endforeach
                                    </select></td>
                                <td>{{ $user['created_at'] }}</td>
                                <td>{{ $user['updated_at'] }}</td>
                                <td>
                                    <button type="submit" class="btn btn-info btn-sm" >
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                        Редактировать
                                    </button>
                                </form>
                                    <form method="post" style="display:inline-block" action="{{ route('user.destroy',$user['id']) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm delete-btn">
                                            <i class="fas fa-trash">
                                            </i>
                                            Удалить
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
@endsection
