@extends('admin.layouts.app')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Удобрения (виды)</h1>
        </div>
        <div class="col-sm-6 d-flex flex-row-reverse">
          <a dusk="addFertilizerButton" href={{ route('admin.fertilizers.create') }} type="button" class="btn btn-primary">Добавить вид</a>
        </div>
      </div>
    </div>
  </div>  

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">          
      <div class="row">
        <div class="col-sm-12">
          <table class="table sortable">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Имя</th>
                <th scope="col">Дата создания</th>
                <th scope="col">Кол-во</th>
                <th scope="col">Действия</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($fertilizers as $item)
                <tr>
                  <th>{{ $item->id }}</th>
                  <td>{{ $item->name }}</td>
                  <td>{{ $item->created_at }}</td>
                  <td>{{ $item->cultures_count }}</td>
                  <td class="d-flex">
                    <a dusk="viewButton{{ $item->id }}" href={{ route('admin.fertilizers.show', $item->id) }} type="button" class="btn btn-info mr-1">Смотреть</a>
                    <a dusk="editButton{{ $item->id }}" href={{ route('admin.fertilizers.edit', $item->id) }} type="button" class="btn btn-secondary mr-1">Изменить</a>
                    <form action="{{ route('admin.fertilizers.delete', $item->id) }}" method="POST">
                      @csrf
                      @method('DELETE')
                      <button dusk="deleteFertilizerButton{{ $item->id }}" type="submit" class="btn btn-danger">Удалить</button>
                    </form>                    
                  </td>
                </tr>                         
              @endforeach                   
            </tbody>
          </table>
        </div>
      </div>     
    </div>
      
   
    
@endsection

 