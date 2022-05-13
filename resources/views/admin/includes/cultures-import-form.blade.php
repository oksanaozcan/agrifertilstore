<div class="row mb-2">  
  <form action="{{ route('admin.cultures.file-import') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group mb-4" style="max-width: 500px; margin: 0 auto;">
        <div class="custom-file text-left">
            <input type="file" name="file" class="custom-file-input" id="customFile">
            <label class="custom-file-label" for="customFile">Выберите файл</label>
        </div>
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
</div>      



{{-- @if ($errors->any())
     @foreach ($errors->all() as $error)
         <div>{{$error}}</div>
     @endforeach
 @endif --}}