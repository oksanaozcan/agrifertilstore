<div class="row mb-2">  
  <div class="col">
    <form action="{{ route('admin.customers.file-import') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="form-group mb-4">        
        <input type="file" name="file" class="form-control-file text-danger">      
          @if($errors->any())
            {!! implode('', $errors->all('<span class="text-danger">:message</span>')) !!}
          @endif       
      </div>
      <button class="btn btn-primary">Импорт данных</button>
      <a class="btn btn-success" href="{{ route('admin.customers.file-export') }}">Экспорт данных</a>
    </form>
  </div>
  @if (session('status'))
    <div class="col col-4">
      <div class="alert alert-success ml-1" role="alert">
        {{ session('status') }}
      </div>            
    </div>
  @endif
</div>

<div class="row">
  @if(auth()->user())
    <div class="col order-12">   
      <button class="btn btn-info" type="button" data-toggle="collapse" data-target=".multi-collapse" aria-expanded="false" aria-controls="multiCollapseExample1 multiCollapseExample2">Уведомления</button>    
    </div>
    @forelse($notifications as $notification)    
      <div class="col">
        <div class="collapse multi-collapse" id="multiCollapseExample1">
          <div class="card card-body">
            <div class="alert alert-light" role="alert">
              Файл {{ $notification->data['path'] }}: ({{ $notification->data['status'] }}).
              <form action="{{ route('markNotificationCustomers') }}" method="POST">
                @csrf
                <input type="hidden" value="{{ $notification->id }}" name="id"/>
                <button type="submit" class="btn btn-dark">Пометить как прочитанное</button>          
              </form>        
            </div>     
          </div>
        </div>
      </div>    
      @if($loop->last)
      <div class="col">
        <form action="{{ route('markallasreadcustomers') }}" method="POST">
          @csrf        
          <input type="hidden" value="all" name="all"/>
          <button type="submit" class="btn btn-danger">Пометить все</button>          
        </form>               
      </div>
      @endif
    @empty
    <div class="mt-2">
      У вас нет новых уведомлений
    </div>      
    @endforelse
  @endif
</div>