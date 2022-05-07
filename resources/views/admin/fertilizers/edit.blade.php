@extends('admin.layouts.app')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Форма для редактирования {{ $fertilizer->name }}</h1>
        </div>
        <div class="col-sm-6 d-flex flex-row-reverse">
          <a href={{ route('admin.fertilizers.index') }} type="button" class="btn btn-outline-secondary">Назад к списку видов</a>
        </div>
      </div>
      <div class="row mb-2">
        <div class="col-sm-6 mt-2">
          <form action={{ route('admin.fertilizers.update', $fertilizer->id) }} method="POST">
            @csrf
            @method('PATCH')
            <div class="form-group">
              <label for="fertilizer_name">Наименование</label>
              <input type="text" name="name" value="{{ $fertilizer->name }}" class="form-control" id="fertilizer_name" aria-describedby="fertilizerNameHelp">
              @error('name')
                <small id="fertilizerNameHelp" class="form-text text-danger">{{ $message }}</small>                  
              @enderror              
            </div>            
            <button type="submit" class="btn btn-primary">Обновить</button>
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

 