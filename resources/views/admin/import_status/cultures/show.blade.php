@extends('admin.layouts.app')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">{{ $importstatus->path }}</h1>
        </div>
        <div class="col-sm-6 d-flex flex-row-reverse">
          <a href={{ route('admin.statusimport.cultures.index') }} type="button" class="btn btn-outline-secondary">Назад к списку</a>
        </div>
      </div>
      <div class="row mb-2">
        <div class="col-sm-6 mt-2">
          <div class="card" style="width: 38rem;">
            <div class="card-body">
              <h5 class="card-title">{{ $importstatus->path}}</h5>
              <p class="card-text"> {{ $importstatus->user->name }}</p>
              <p class="card-text"> {{ $importstatus->status }}</p>
              <p class="card-text"> {{ $importstatus->created_at }}</p>

              <h5 class="card-title">Ошибки импорта</h5>
              <ul class="list-group list-group-flush">
                @if (isset($errorsArray))
                @foreach ($errorsArray as $errorRow)
                <li class="list-group-item"> Аттрибут {{ $errorRow[ "attribute"] }}, 
                  Строка {{ $errorRow[ "row"] }}, 
                  Ошибка: {{ $errorRow[ "errors"] }}
                </li>                  
                @endforeach       
                @else
                <li class="list-group-item">Ошибок нет</li>                                                        
                @endif                
              </ul>
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

 