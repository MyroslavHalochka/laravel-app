@extends('admin.layouts.main')
@section('content')

<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Добавление пользователя</h1>
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
            <form action="{{ route('admin.user.store') }}" method="POST" class="w-25">
              @csrf
              <div class="form-group">
                <label>Имя</label>
                <input type="text" class="form-control" name="name" placeholder="Имя пользователя">
                @error('name')
                <div class="text-danger">Поле обязательно для заполнения</div>
                @enderror
                <label>Почта</label>
                <input type="text" class="form-control" name="email" placeholder="Почта пользователя">
                @error('email')
                <div class="text-danger">Поле обязательно для заполнения</div>
                @enderror
                <label>Пароль</label>
                <input type="text" class="form-control" name="password" placeholder="Пароль пользователя">
                @error('password')
                <div class="text-danger">Поле обязательно для заполнения</div>
                @enderror
                <div class="form-group w-50">
                  <label>Выберите роль</label>
                  <select class="form-control" name="role">
                    @foreach($roles as $id => $role)
                    <option value="{{ $id }}" {{ $id == old('role_id') ? 'selected' : '' }}>{{ $role }}</option>
                    @endforeach
                  </select>
                  @error('role')
                  <div class="text-danger">{{ $message }}</div>
                  @enderror
                </div>
                <br>
                <input type="submit" class="btn btn-block btn-primary" value="Добавить">
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
  </div>

  @endsection