@extends('admin.layouts.app')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">{{ $fertilizer->name }}</h1>
        </div>
        <div class="col-sm-6 d-flex flex-row-reverse">
          <a href={{ route('admin.fertilizers.index') }} type="button" class="btn btn-outline-secondary">Назад к списку видов</a>
        </div>
      </div>
      <div class="row mb-2">
        <div class="col-sm-6 mt-2">
          <div class="card" style="width: 18rem;">
            <div class="card-body">
              <h5 class="card-title">{{ $fertilizer->name }}</h5>
              <p class="card-text">id {{ $fertilizer->id }}</p>
            </div>
            <ul class="list-group list-group-flush">
              <li class="list-group-item">{{ $fertilizer->created_at }}</li>
              <li class="list-group-item">{{ $fertilizer->updated_at }}</li>              
            </ul>
            <div class="card-body d-flex">
              <a dusk="editButtonFromSingleFertilizer{{ $fertilizer->id }}" href={{ route('admin.fertilizers.edit', $fertilizer->id) }} class="card-link mr-2">Изменить</a>
              <form action="{{ route('admin.fertilizers.delete', $fertilizer->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button dusk="deleteButtonFromSingleFertilizer{{ $fertilizer->id }}" type="submit" class="text-danger card-link border-0 bg-transparent">Удалить</button>
              </form>        
            </div>
          </div>          
        </div>
        <div class="col-sm-6 mt-2">
          
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

 