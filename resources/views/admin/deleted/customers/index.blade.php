@extends('admin.layouts.app')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Удаленные Клиенты</h1>
        </div>
        {{-- <div class="col-sm-6 d-flex flex-row-reverse">
          <a href={{ route('admin.customers.create') }} type="button" class="btn btn-primary">Добавить</a>
        </div> --}}
      </div>
    </div>
  </div>  

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">  
      
      <div class="row">
        <div class="card card-secondary w-100">
          <div class="card-header">
            <h3 class="card-title">Фильтр данных</h3>
          </div>
          <form action="#" method="POST">
            @csrf
            @method('GET')
            <div class="card-body">
              <div class="row mb-3">
                <div class="col-6 form-group">
                  <input type="text" class="form-control" placeholder="Имя" name="name">
                </div>
                <div class="col-3 form-group">
                  <input type="date" class="form-control" name="date_from">
                  <small class="text-secondary">Дата договора (от)</small>
                </div>
                <div class="col-3 form-group">
                  <input type="date" class="form-control" name="date_to">
                  <small class="text-secondary">Дата договора (до)</small>
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-3 form-group">
                  <input type="number" step="0.01" class="form-control" name="cost_from" placeholder="руб">
                  <small class="text-secondary">Стоимость (от)</small>
                </div>
                <div class="col-3 form-group">
                  <input type="number" step="0.01" class="form-control" name="cost_to" placeholder="руб">
                  <small class="text-secondary">Стоимость (до)</small>
                </div>
                <div class="col-6 form-group">                  
                  <select id="regions" class="select2 form-control" name="regions[]" multiple="multiple">                    
                    <option value="{{ null }}">Не выбран</option>    
                    @foreach ($regions as $region)
                      <option value="{{ $region }}">{{ $region }}</option>                           
                    @endforeach
                  </select>                   
                  <small>Регион</small>                           
                </div>                
              </div>
              <diV>
                <button type="submit" class="btn btn-success">Фильтровать</button>
              </diV>
            </div>
          </form>        
        </div>        
      </div>     
      
      <div class="row d-flex justify-content-end">
        <a type="button" class="btn btn-primary m-3" href="#" >Очистить фильтр</a>
      </div>
      
      <div class="row">
        <div class="col-sm-12">
          <table class="table sortable">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Имя</th>
                <th scope="col">Дата контракта</th>
                <th scope="col">Cтоимость</th>
                <th scope="col">Регион</th>
                <th scope="col">Дата удаления</th>
                <th scope="col">Действия</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($customers as $item)
                <tr>
                  <th>{{ $item->id }}</th>
                  <td>{{ $item->name }}</td>
                  <td>{{ $item->contract_date }}</td>
                  <td>{{ $item->cost }}</td>
                  <td>{{ $item->region }}</td>
                  <td>{{ $item->deleted_at }}</td>
                  <td class="d-flex">
                    {{-- <a href={{ route('admin.customers.show', $item->id) }} type="button" class="btn btn-info mr-1">Смотреть</a>
                    <a href={{ route('admin.customers.edit', $item->id) }} type="button" class="btn btn-secondary mr-1">Изменить</a>
                    <form action="{{ route('admin.customers.delete', $item->id) }}" method="POST">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger">Удалить</button>
                    </form>                     --}}
                  </td>
                </tr>                         
              @endforeach                   
            </tbody>
          </table>
        </div>
      </div>
    </div>   
@endsection

 