@extends('admin.layouts.app')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">{{ $customer->name }}</h1>
        </div>
        <div class="col-sm-6 d-flex flex-row-reverse">
          <a href={{ route('admin.customers.index') }} type="button" class="btn btn-outline-secondary">Назад к списку</a>
        </div>
      </div>
      <div class="row mb-2">
        <div class="col-sm-6 mt-2">
          <div class="card" style="width: 18rem;">
            <div class="card-body">
              <h5 class="card-title">{{ $customer->name }}</h5>
              <p class="card-text">id {{ $customer->id }}</p>
            </div>
            <ul class="list-group list-group-flush">
              <li class="list-group-item">Дата заключения контракта: {{ $customer->contract_date }}</li>                            
            </ul>
            <div class="card-body d-flex">
              <a href={{ route('admin.customers.edit', $customer->id) }} class="card-link mr-2">Изменить</a>
              <form action="{{ route('admin.customers.delete', $customer->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-danger card-link border-0 bg-transparent">Удалить</button>
              </form>        
            </div>
          </div>          
        </div>
        <div class="col-sm-6 mt-2">          
        </div>
      </div>
      
      <div class="row mb-2">
        <a href="{{ route('admin.customers.word-export', $customer->id) }}" class="btn btn-warning">Экспорт справки</a>
      </div>
    </div>
  </div>  

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">     
      <div class="row">
        
       
      </div>     
    </div>   
@endsection

 