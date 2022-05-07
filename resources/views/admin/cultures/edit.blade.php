@extends('admin.layouts.app')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Форма для редактирования {{ $culture->name }}</h1>
        </div>
        <div class="col-sm-6 d-flex flex-row-reverse">
          <a href={{ route('admin.cultures.index') }} type="button" class="btn btn-outline-secondary">Назад к списку товаров</a>
        </div>
      </div>
      <div class="row mb-2">
        <div class="col-sm-6 mt-2">
          <form action={{ route('admin.cultures.update', $culture->id) }} method="POST">
            @csrf
            @method('PATCH')

            <div class="form-group">
              <label for="culture_name">Наименование</label>
              <input type="text" name="name" value="{{ $culture->name }}" class="form-control" id="culture_name">
              @error('name')
                <small class="form-text text-danger">{{ $message }}</small>                  
              @enderror              
            </div>

            <div class="form-group">
              <label for="culture_nitrogen">Состав азота</label>
              <input type="number" step="0.01" name="nitrogen" value="{{ $culture->nitrogen }}" class="form-control" id="culture_nitrogen">
              @error('nitrogen')
                <small class="form-text text-danger">{{ $message }}</small>                  
              @enderror              
            </div>

            <div class="form-group">
              <label for="culture_phosphorus">Состав фосфора</label>
              <input type="number" step="0.01" name="phosphorus" value="{{ $culture->phosphorus }}" class="form-control" id="culture_phosphorus">
              @error('phosphorus')
                <small class="form-text text-danger">{{ $message }}</small>                  
              @enderror              
            </div>

            <div class="form-group">
              <label for="culture_potassium">Состав калия</label>
              <input type="number" step="0.01" name="potassium" value="{{ $culture->potassium }}" class="form-control" id="culture_potassium">
              @error('potassium')
                <small class="form-text text-danger">{{ $message }}</small>                  
              @enderror              
            </div>            

            <div class="form-group">
              <select class="form-select form-control" name="fertilizer_id">                
                @foreach ($fertilizers as $fertilizer)
                  <option value="{{ $culture->fertilizer_id}}" 
                    {{ $fertilizer->id == $culture->fertilizer_id ? ' selected' : '' }}
                    >{{ $fertilizer->name }}</option>                  
                @endforeach              
              </select>
              @error('fertilizer_id')
                <small class="form-text text-danger">{{ $message }}</small>                  
              @enderror  
            </div>            

            <div class="form-group">
              <label for="culture_region">Регион</label>
              <input type="text" name="region" value="{{ $culture->region }}" class="form-control" id="culture_region">
              @error('region')
                <small class="form-text text-danger">{{ $message }}</small>                  
              @enderror              
            </div>

            <div class="form-group">
              <label for="culture_price">Цена</label>
              <input type="number" step="0.01" name="price" value="{{ $culture->price }}" class="form-control" id="culture_price">
              @error('price')
                <small class="form-text text-danger">{{ $message }}</small>                  
              @enderror              
            </div>   

            <div class="form-floating">
              <textarea class="form-control" name="description" id="floatingTextarea2" style="height: 100px">{{ $culture->description }}</textarea>
              <label for="floatingTextarea2">Описание</label>
              @error('description')
                <small class="form-text text-danger">{{ $message }}</small>                  
              @enderror     
            </div>

            <div class="form-group">
              <label for="culture_purpose">Предназначение</label>
              <input type="text" name="purpose" value="{{ $culture->purpose }}" class="form-control" id="culture_purpose">
              @error('purpose')
                <small class="form-text text-danger">{{ $message }}</small>                  
              @enderror              
            </div>  

            <div class="form-group">
              <label>Тэги</label>
              <select name="tags[]" class="select2" multiple="multiple" data-placeholder="Выберите тэги" style="width: 100%;">
                @foreach ($tags as $tag)
                  <option value="{{ $tag->id }}"
                    {{ is_array($culture->tags->pluck('id')->toArray()) && in_array($tag->id, $culture->tags->pluck('id')->toArray()) ? ' selected' : '' }}
                  >{{ $tag->name }}</option>                    
                @endforeach               
              </select>
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

 