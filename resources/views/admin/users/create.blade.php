@extends('admin.layouts.app')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Форма для добавления пользователя</h1>
        </div>
        <div class="col-sm-6 d-flex flex-row-reverse">
          <a href={{ route('admin.users.index') }} type="button" class="btn btn-outline-secondary">Назад к списку</a>
        </div>
      </div>
      <div class="row mb-2">
        <div class="col-sm-6 mt-2">
          <form action={{ route('admin.users.store') }} method="POST">
            @csrf

            <div class="form-group">
              <label>Имя</label>
              <input type="text" name="name" class="form-control">
              @error('name')
                <small class="form-text text-danger">{{ $message }}</small>                  
              @enderror              
            </div>        
            
            <div class="form-group">
              <label>Почта</label>
              <input type="email" name="email" class="form-control">
              @error('email')
                <small class="form-text text-danger">{{ $message }}</small>                  
              @enderror              
            </div>       

            <div class="form-group">
              <label>Пароль</label>
              <input type="password" name="password" class="form-control">
              @error('password')
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

 