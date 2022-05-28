@extends('admin.layouts.app')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Сведения о результатах импорта файлов</h1>
        </div>
        {{-- <div class="col-sm-6 d-flex flex-row-reverse">
          <a href={{ route('admin.cultures.create') }} type="button" class="btn btn-primary">Добавить</a>
        </div> --}}
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
                <th scope="col">Имя файла(путь)</th>
                <th scope="col">Статус</th>      
                <th scope="col">Ошибки строк</th>      
                <th scope="col">Пользователь</th>               
                <th scope="col">Дата импота</th>               
                <th scope="col">Действия</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($importStatuses as $item)
                <tr>
                  <th>{{ $item->id }}</th>
                  <td>{{ $item->path }}</td>
                  <td>{{ $item->status }}</td>
                  <td>{{ $item->errors == null ? "Ошибок нет" : "Обнаружены строки не прошедшие валидацию. Подробнее нажмите Смотреть" }}</td>
                  <td>{{ $item->user->name }}</td>                                    
                  <td>{{ $item->created_at }}</td>                                                                                   
                  <td class="d-flex">
                    <a href={{ route('admin.statusimport.customers.show', $item->id) }} type="button" class="btn btn-info mr-1">Смотреть</a>                            
                  </td>
                </tr>                         
              @endforeach                   
            </tbody>
          </table>
        </div>
      </div>
    </div>   
@endsection