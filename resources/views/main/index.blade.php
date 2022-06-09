@extends('layouts.main_app')

@section('content')
  <div class="container">        
    @include('includes.navbar')
    
    @include('includes.culture_filter')
    
    <div class="row mt-3">
      @foreach ($cultures as $item)
        <div class="col-md-6 col-sm-12">
          <div class="card mb-2">
            <div class="card-body">
              <div class="bg-success">
                <h5 class="card-title culture-title text-white text-center p-2">{{ $item->name }}</h5>
              </div>              
              <h6 class="card-subtitle mb-2 text-muted">{{ $item->purpose }}</h6>
              <div class="d-flex">
                <div>N: {{ $item->nitrogen }} | </div>
                <div>P: {{ $item->phosphorus }} | </div>
                <div>K: {{ $item->potassium }}</div>
              </div>                  
              <p class="card-text">Регион: {{ $item->region }}</p>                 
              <p class="card-text">Вид: {{ $item->fertilizer->name }}</p>                 
              <p class="card-text">Цена: {{ $item->price }}</p>                 
              <p class="card-text pb-0 mb-0">Описание:</p>                 
              <p class="card-text">{{ $item->description }}</p>                 
              <p class="card-text pb-0 mb-0">Назначение: </p>                 
              <p class="card-text">{{ $item->purpose }}</p>                 
              <p class="card-text">
              @foreach ($item->tags as $itemTag)
                <span class="p-1 bg-secondary text-white">{{ $itemTag->name }}</span>
              @endforeach
              </p>                 
            </div>
          </div>
        </div>                  
      @endforeach         
    </div>
    <div class="row mt-3">
      {{ $cultures->withQueryString()->links() }}
    </div>
  </div>    
@endsection