@extends('layouts.main_app')

  @section('content')
    <div class="container">    
      @include('includes.navbar')

      <h1>Для заказа удобрений: </h1>   
      <h3>свяжитесь с нами по телефону: </h3>
      <a class="btn btn-primary mb-3" href="tel:+79000000">+7 900 00 00</a>

      <h3 class="mb-3">или оставьте ваше сообщение и контакты и наш менеджер свяжется с вами: </h3>

      <div class="row">
        <div class="col-8">
          <form action="#" method="POST">
            @csrf
            <div class="form-group">
              <label>Укажите телефон для связи</label>
              <input type="text" class="form-control" placeholder="+7 900 00 00" name="phone_number">
              <small class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group mb-3">
              <label>Дополнительные сведения</label>
              <textarea class="form-control" rows="4" 
                placeholder="Задайте вопрос, оставьте дополнительные контакты, предпочтительный способ связи (мессенджер, почта, др)..."
                name="info"
              ></textarea>
            </div>      
            <button type="submit" class="btn btn-primary">Отправить</button>
          </form>
        </div>
      </div>     
    </div>    
  @endsection