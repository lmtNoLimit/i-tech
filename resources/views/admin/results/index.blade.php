@extends('layouts.admin')

@section('content')
<div class="container-fluid">
  @include('message')
  <div class="d-sm-flex align-items-center justify-content-between mb-5">
    <h1 class="h3 mb-0 text-gray-800">Quản tin điểm</h1>
  </div>
  <div class="row m-2 d-flex justify-content-end">
    <a href="/admin/results/create" class="btn btn-sm btn-success">
      <i class="fas fa-plus"></i>
      <span>Cập nhật bảng điểm</span>
    </a>
  </div>
  <div class="row mx-2">
    <table class="table table-bordered table-hover">
      <thead class="thead-light">
        <tr>
          <th scope="col">Mã lớp</th>
          <th scope="col">Tên lớp</th>
          <th scope="col">Môn học</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        {{-- @foreach ($news as $new)
        <tr>
          <th scope="row">{{$new->id}}</th>
        <td>{{$new->title}}</td>
        <td>{{$new->type}}</td>
        <td>
          <a href="/admin/news/{{$new->id}}/edit" class="btn btn-sm btn-info mr-1">Sửa</a>
          <button data-toggle="modal" data-target="#deleteModal{{$new->id}}" class="btn btn-sm btn-danger">Xoá</button>
        </td>
        <div class="modal fade" id="deleteModal{{$new->id}}" tabindex="-1" role="dialog"
          aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header border-0">
                <h5 class="modal-title" id="exampleModalLabel">Bạn có chắc chắn muốn xoá?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
              <div class="modal-footer border-0">
                <form class="form-inline" action="/admin/news/{{$new->id}}" method="POST" id="form">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-sm btn-secondary mr-2" type="button" data-dismiss="modal">Huỷ</button>
                  <button class="btn btn-sm btn-danger" id="btnSubmit" type="submit">Xoá</button>
                </form>
              </div>
            </div>
          </div>
        </div>
        </tr>
        @endforeach --}}
      </tbody>
    </table>
  </div>
</div>

@endsection