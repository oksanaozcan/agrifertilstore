<div class="row">
  <div class="card card-secondary w-100">
    <div class="card-header">
      <h3 class="card-title">Фильтр данных</h3>
    </div>
    <form action="{{ route('admin.cultures.filter') }}" method="POST">
      @csrf
      @method('GET')
      <div class="card-body">
        <div class="row mb-3">
          <div class="col-6 form-group">
            <input type="text" class="form-control" placeholder="Имя" name="name"
              value="{{ request()->input('name', old('name')) }}"
            >
          </div>
          <div class="col-1 form-group">
            <input type="number" class="form-control" name="n_from"
              value="{{ request()->input('n_from', old('n_from')) }}"
            >
            <small class="text-secondary">Азот (N) от</small>
          </div>
          <div class="col-1 form-group">
            <input type="number" class="form-control" name="n_to"
              value="{{ request()->input('n_to', old('n_to')) }}"
            >
            <small class="text-secondary">Азот (N) до</small>
          </div>
          <div class="col-1 form-group">
            <input type="number" class="form-control" name="p_from"
              value="{{ request()->input('p_from', old('p_from')) }}"
            >
            <small class="text-secondary">Фосфор (P) от</small>
          </div>
          <div class="col-1 form-group">
            <input type="number" class="form-control" name="p_to"
              value="{{ request()->input('p_to', old('p_to')) }}"
            >
            <small class="text-secondary">Фосфор (P) до</small>
          </div>
          <div class="col-1 form-group">
            <input type="number" class="form-control" name="k_from"
              value="{{ request()->input('k_from', old('k_from')) }}"
            >
            <small class="text-secondary">Калий (K) от</small>
          </div>
          <div class="col-1 form-group">
            <input type="number" class="form-control" name="k_to"
              value="{{ request()->input('k_to', old('k_to')) }}"
            >
            <small class="text-secondary">Калий (K) до</small>
          </div>              
        </div>
        <div class="row mb-3">
          <div class="col-1 form-group">
            <input type="number" step="0.01" class="form-control" name="price_from" placeholder="руб"
              value="{{ request()->input('price_from', old('price_from')) }}"
            >
            <small class="text-secondary">Стоимость (от)</small>
          </div>
          <div class="col-1 form-group">
            <input type="number" step="0.01" class="form-control" name="price_to" placeholder="руб"
              value="{{ request()->input('price_to', old('price_to')) }}"
            >
            <small class="text-secondary">Стоимость (до)</small>
          </div>
          <div class="col-2 form-group">
            <select class="form-control" name="fertilizer_id">
              <option value="{{ null }}">Не выбран</option>    
              @foreach ($fertilizers as $fertilizer)
                <option value="{{ $fertilizer->id }}"
                  @selected(request()->input('fertilizer_id') == $fertilizer->id)
                >
                  {{ $fertilizer->name }}
                </option>                                    
              @endforeach                                                   
            </select>       
          </div>
          <div class="col-4 form-group">                  
            <select class="select2 form-control" name="tags[]" multiple="multiple">                   
              @foreach ($tags as $tag)
                <option value="{{ $tag->id }}"
                  @if (null !== request()->input('tags'))
                    @selected(in_array($tag->id, request()->input('tags')))                               
                  @else
                    @selected(false)                            
                  @endif       
                >
                  {{ $tag->name }}
                </option>                           
              @endforeach
            </select>                   
            <small>Теги</small>                           
          </div>               
          <div class="col-4 form-group">                  
            <select class="select2 form-control" name="regions[]" multiple="multiple">                                      
              @foreach ($regions as $region)
                <option value="{{ $region }}"
                  @if (null !== request()->input('regions'))
                    @selected(in_array($region, request()->input('regions')))                               
                  @else
                    @selected(false)                            
                  @endif                           
                >
                  {{ $region }}
                </option>                           
              @endforeach
            </select>                   
            <small>Регион</small>                           
          </div>                
        </div>
        <div class="row mb-3">
          <div class="col-6 form-group">
            <input type="text" class="form-control" placeholder="Назначение" name="purpose"
              value="{{ request()->input('purpose', old('purpose')) }}"
            >
          </div>
          <div class="col-6 form-group">
            <input type="text" class="form-control" placeholder="Описание" name="description"
              value="{{ request()->input('description', old('description')) }}"
            >                  
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
  <a type="button" class="btn btn-primary m-3" href="{{ route('admin.cultures.index') }}" >Очистить фильтр</a>
</div>