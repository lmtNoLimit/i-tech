@extends('layouts.admin')
@section('content')
<div class="container-fluid">
  @include('message')
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Quản lý ngành đào tạo</h1>
  </div>
  <div class="row m-2 d-flex justify-content-end">
    <a href="/admin/majors/create" class="btn btn-sm btn-success">
      <i class="fas fa-plus"></i>
      <span>Thêm ngành đào tạo</span>
    </a>
  </div>

  <div class="row mx-2">
    <table class="table table-bordered table-hover">
      <thead class="thead-light">
        <tr>
          <th scope="col">Mã ngành</th>
          <th scope="col">Tên ngành</th>
          <th scope="col">Loại hình đào tạo</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($majors as $item)
        <tr>
          <th scope="row">{{$item->majors_id}}</th>
          <td>{{$item->name}}</td>
          <td>{{$item->type == "short_term" ? "Ngắn hạn" : "Dài hạn"}}</td>
          <td>
            <form class="form-inline" action="/admin/majors/{{$item->majors_id}}" method="POST">
              <a href="/admin/majors/{{$item->majors_id}}/edit" class="btn btn-sm btn-info mr-1">
                Edit
              </a>
              @method('DELETE')
              @csrf
              <button type="submit" class="btn btn-sm btn-danger">Delete</button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection