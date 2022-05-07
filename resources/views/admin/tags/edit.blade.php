@extends('admin.layouts.app')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Форма для редактирования {{ $tag->name }}</h1>
        </div>
        <div class="col-sm-6 d-flex flex-row-reverse">
          <a href={{ route('admin.tags.index') }} type="button" class="btn btn-outline-secondary">Назад к списку</a>
        </div>
      </div>
      <div class="row mb-2">
        <div class="col-sm-6 mt-2">
          <form action={{ route('admin.tags.update', $tag->id) }} method="POST">
            @csrf
            @method('PATCH')
            <div class="form-group">
              <label for="tag_name">Наименование</label>
              <input type="text" name="name" value="{{ $tag->name }}" class="form-control" id="tag_name" aria-describedby="tagNameHelp">
              @error('name')
                <small id="tagNameHelp" class="form-text text-danger">{{ $message }}</small>                  
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

 