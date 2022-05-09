@extends('admin.layouts.app')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Культуры (товары)</h1>
        </div>
        <div class="col-sm-6 d-flex flex-row-reverse">
          <a href={{ route('admin.cultures.create') }} type="button" class="btn btn-primary">Добавить</a>
        </div>
      </div>

      @include('admin.includes.cultures-import-form')

    </div>
  </div>  

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">         
      
      @include('admin.includes.cultures-filter')

      <div class="row">
        <div class="col-sm-12">
          <table class="table sortable">
            <thead>
              <tr>               
                <th scope="col">Имя</th>
                <th scope="col">N</th>
                <th scope="col">P</th>
                <th scope="col">K</th>
                <th scope="col">Вид</th>
                <th scope="col">Регион</th>
                <th scope="col">Цена</th>               
                <th scope="col">Предназначение</th>               
                <th scope="col">Действия</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($cultures as $item)
                <tr>
                  <th>{{ $item->name }}</th>
                  <td>{{ $item->nitrogen }}</td>
                  <td>{{ $item->phosphorus }}</td>
                  <td>{{ $item->potassium }}</td>
                  <td>{{ $item->fertilizer->name }}</td>
                  <td>{{ $item->region }}</td>                                    
                  <td>{{ $item->price }}</td>                                    
                  <td>{{ $item->purpose }}</td>                                    
                  <td class="d-flex">
                    <a href={{ route('admin.cultures.show', $item->id) }} type="button" class="btn btn-info mr-1">Смотреть</a>
                    <a href={{ route('admin.cultures.edit', $item->id) }} type="button" class="btn btn-secondary mr-1">Изменить</a>
                    <form action="{{ route('admin.cultures.delete', $item->id) }}" method="POST">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger">Удалить</button>
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

 