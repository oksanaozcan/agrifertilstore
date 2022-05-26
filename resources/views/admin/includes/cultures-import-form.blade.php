<div class="row mb-2">  
  <form action="{{ route('admin.cultures.file-import') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group mb-4" style="max-width: 500px; margin: 0 auto;">        
      <input type="file" name="file" class="form-control-file text-danger">      
        @if($errors->any())
          {!! implode('', $errors->all('<span class="text-danger">:message</span>')) !!}
        @endif       
    </div>
    <button class="btn btn-primary">Импорт данных</button>
    <a class="btn btn-success" href="{{ route('admin.cultures.file-export') }}">Экспорт данных</a>
  </form>
  @if (session('status'))
    <div class="alert alert-success ml-1" role="alert">
      {{ session('status') }}
    </div>            
  @endif

  @if(auth()->user()) 

    @forelse($notifications as $notification)
     
      <div class="alert alert-info" role="alert">
        [{{ $notification->created_at }}] Статус импорта файла {{ $notification->data['path'] }}: ({{ $notification->data['status'] }}).
        <form action="{{ route('markNotification') }}" method="POST">
          @csrf
          <input type="hidden" value="{{ $notification->id }}" name="id"/>
          <button type="submit" class="btn btn-dark">Пометить как прочитанное</button>          
        </form>        
      </div>     
     
      @if($loop->last)
        <form action="{{ route('markallasread') }}" method="POST">
          @csrf        
          <input type="hidden" value="all" name="all"/>
          <button type="submit" class="btn btn-danger">Пометить все как прочитанное</button>          
        </form>               
      @endif
    @empty
      У вас нет новых уведомлений
    @endforelse
  @endif

</div>