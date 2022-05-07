<div class="row">
  <div class="col-12">
    <div class="accordion" id="accordionExample">
      <div class="accordion-item">
        <h2 class="accordion-header" id="headingOne">
          <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">                    
            Фильтр товаров
          </button>
        </h2>
        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
          <div class="accordion-body">
            <form action="{{ route('filter') }}" method="POST">
              @csrf
              @method('GET')                     
              <div class="form-floating mb-3">
                <input type="text" class="form-control" id="productname" name="name" placeholder="Наименование товара"                   
                  value="{{ request()->input('name', old('name')) }}"
                >
                <label for="productname">Наименование товара</label>
              </div>
              <div class="row">                       
                <div class="col-3">
                  <div class="mb-3">
                    <h5>Азот <small>(N)</small></h5>
                    <div class="d-flex align-items-center">
                      <div class="form-floating">
                        <input type="number" step="0.01" id="nFrom" class="form-control" placeholder="от" name="n_from"
                          value="{{ request()->input('n_from', old('n_from')) }}"
                        >                            
                        <label for="nFrom">от</label>
                      </div>                             
                      <div class="m-1">/</div>
                      <div class="form-floating">
                        <input type="number" step="0.01" id="nTo" class="form-control" placeholder="до" name="n_to"
                        value="{{ request()->input('n_to', old('n_to')) }}"
                        >                            
                        <label for="nTo">до</label>
                      </div>                                                                                  
                    </div>                            
                  </div>
                </div>       
                <div class="col-3">
                  <div class="mb-3">
                    <h5>Фосфор <small>(P)</small></h5>
                    <div class="d-flex align-items-center">
                      <div class="form-floating">
                        <input type="number" step="0.01" id="pFrom" class="form-control" placeholder="от" name="p_from"
                          value="{{ request()->input('p_from', old('p_from')) }}"
                        >                            
                        <label for="pFrom">от</label>
                      </div>                             
                      <div class="m-1">/</div>
                      <div class="form-floating">
                        <input type="number" step="0.01" id="pTo" class="form-control" placeholder="до" name="p_to"
                          value="{{ request()->input('p_to', old('p_to')) }}"
                        >                            
                        <label for="pTo">до</label>
                      </div>                                                                                  
                    </div>                            
                  </div>
                </div>        
                <div class="col-3">
                  <div class="mb-3">
                    <h5>Калий <small>(K)</small></h5>
                    <div class="d-flex align-items-center">
                      <div class="form-floating">
                        <input type="number" step="0.01" id="kFrom" class="form-control" placeholder="от" name="k_from"
                          value="{{ request()->input('k_from', old('k_from')) }}"
                        >                            
                        <label for="kFrom">от</label>
                      </div>                             
                      <div class="m-1">/</div>
                      <div class="form-floating">
                        <input type="number" step="0.01" id="kTo" class="form-control" placeholder="до" name="k_to"
                          value="{{ request()->input('k_to', old('k_to')) }}"
                        >                            
                        <label for="kTo">до</label>
                      </div>                                                                                  
                    </div>                            
                  </div>
                </div>          
                <div class="col-3">
                  <div class="mb-3">
                    <h5>Стоимость <small>руб.</small></h5>
                    <div class="d-flex align-items-center">
                      <div class="form-floating">
                        <input type="number" step="0.01" id="rubFrom" class="form-control" placeholder="от" name="price_from"
                          value="{{ request()->input('price_from', old('price_from')) }}"
                        >                            
                        <label for="rubFrom">от</label>
                      </div>                             
                      <div class="m-1">/</div>
                      <div class="form-floating">
                        <input type="number" step="0.01" id="rubTo" class="form-control" placeholder="до" name="price_to"
                          value="{{ request()->input('price_to', old('price_to')) }}"
                        >                            
                        <label for="rubTo">до</label>
                      </div>                                                                                  
                    </div>                            
                  </div>
                </div>                      
              </div> 
              <div class="row g-3 align-items-center mb-3">
                <div class="col-2">
                  <label class="col-form-label">Вид</label>
                </div>
                <div class="col-10">
                  <select class="form-select" name="fertilizer_id">                                                   
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
              </div>                                         
              <div class="row g-3 align-items-center mb-3">
                <div class="col-1">
                  <label for="tags" class="col-form-label">Теги</label>
                </div>
                <div class="col-11">
                  <select id="tags" class="js-multiple-tags form-select" name="tags[]" multiple="multiple">                    
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
                </div>                            
              </div>
              <div class="row g-3 align-items-center mb-3">
                <div class="col-1">
                  <label for="regions" class="col-form-label">Регион</label>
                </div>
                <div class="col-11">
                  <select id="regions" class="js-multiple-regions form-select" name="regions[]" multiple="multiple">                      
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
                </div>                            
              </div>           
              <div class="form-floating mb-3">
                <input type="text" class="form-control" id="productPurpose" name="purpose" placeholder="Назначение товара"
                  value="{{ request()->input('purpose', old('purpose')) }}"
                >
                <label for="productPurpose">Назначение товара</label>
              </div>
              <div class="mb-3">
                <label for="descr" class="form-label">Описание</label>
                <textarea class="form-control" id="descr" rows="3" name="description">{{ request()->input('description', old('description')) }}</textarea>
              </div>                    
              
              <div class="row g-3 align-items-center mb-3">
                <h4>Сортировать по</h4>                      
                <div class="col-6">
                  <label class="col-form-label">Цене</label>
                  <select class="form-select" name="order_price">
                    <option value="{{ null }}">Не выбран</option>    
                    <option value="asc" @selected(request()->input('order_price') == "asc")>По возрастанию</option>    
                    <option value="desc" @selected(request()->input('order_price') == "desc")>По убыванию</option>                                                                          
                  </select>                                                               
                </div>     
                <div class="col-6">
                  <label class="col-form-label">Названию</label>
                  <select class="form-select" name="order_name">
                    <option value="{{ null }}">Не выбран</option>    
                    <option value="asc" @selected(request()->input('order_name') == "asc")>По возрастанию</option>    
                    <option value="desc" @selected(request()->input('order_name') == "desc")>По убыванию</option>                                                                          
                  </select>                                                               
                </div>                           
              </div>     
              <button type="submit" class="btn btn-primary">Искать</button>
            </form>
          </div>
        </div>
      </div>                     
    </div>             
  </div>
</div>

<div class="row d-flex justify-content-end">
  <a type="button" class="btn btn-secondary m-3 w-50" href="{{ route('main') }}" >Очистить фильтр</a>
</div>