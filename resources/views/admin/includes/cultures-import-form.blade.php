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
      @if ($notification->data['status'] === 'processing')
        <div class="alert alert-warning" role="alert">
          [{{ $notification->created_at }}] Import of file {{ $notification->data['path'] }} is ({{ $notification->data['status'] }}) status.
          <a href="#" class="float-right mark-as-read" data-id="{{ $notification->id }}">
              Mark as read
          </a>
        </div>                
      @endif
      @if ($notification->data['status'] === 'failed')
        <div class="alert alert-danger" role="alert">
          [{{ $notification->created_at }}] Import of file {{ $notification->data['path'] }} is ({{ $notification->data['status'] }}) status.
          <a href="#" class="float-right mark-as-read" data-id="{{ $notification->id }}">
              Mark as read
          </a>
        </div>                
      @endif
      @if ($notification->data['status'] === 'success')
        <div class="alert alert-success" role="alert">
          [{{ $notification->created_at }}] Import of file {{ $notification->data['path'] }} is ({{ $notification->data['status'] }}) status.
          <a href="#" class="float-right mark-as-read" data-id="{{ $notification->id }}">
              Mark as read
          </a>
        </div>          
      @endif
      @if($loop->last)
        <a href="#" id="mark-all">
            Mark all as read
        </a>
      @endif
    @empty
      There are no new notifications
    @endforelse
  @endif

</div>