@extends('admin.layouts.app')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Форма для добавления клиента</h1>
        </div>
        <div class="col-sm-6 d-flex flex-row-reverse">
          <a href={{ route('admin.customers.index') }} type="button" class="btn btn-outline-secondary">Назад к списку</a>
        </div>
      </div>
      <div class="row mb-2">
        <div class="col-sm-6 mt-2">
          <form action={{ route('admin.customers.store') }} method="POST">
            @csrf
            
            <div class="form-group">
              <label for="customer_name">Имя</label>
              <input type="text" name="name" class="form-control" id="customer_name">
              @error('name')
                <small class="form-text text-danger">{{ $message }}</small>                  
              @enderror              
            </div>        
            
            <div class="form-group">
              <label>Дата контракта</label>
              <input type="date" name="contract_date" class="form-control">
              @error('contract_date')
                <small class="form-text text-danger">{{ $message }}</small>                  
              @enderror              
            </div>      

            <div class="form-group">
              <label>Цена</label>
              <input type="number" step="0.01" name="cost" class="form-control">
              @error('cost')
                <small class="form-text text-danger">{{ $message }}</small>                  
              @enderror              
            </div>   

            <div class="form-group">
              <label>Регион</label>
              <input type="text" name="region" class="form-control">
              @error('region')
                <small class="form-text text-danger">{{ $message }}</small>                  
              @enderror              
            </div>

            <button type="submit" class="btn btn-primary">Добавить</button>
          </form>
        </div>
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

 