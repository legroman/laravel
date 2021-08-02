@extends('layouts.app')

@section('content')
    <div class="container contact-us pt-5 pb-5 pr-4 pl-4">
        <div class="row">
            <div class="col-md-3">
                <div class="contact-info">
                    <img src="https://image.ibb.co/kUASdV/contact-image.png" alt="image"/>
                    <h2>Напишіть Нам</h2>
                    <h4>Ваша думка важлива для нас!</h4>
                </div>
            </div>

            <div class="col-md-9">
                <form action="{{ route('send-mail') }}" class="contact-form" method="POST">
                    @csrf
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="name">Ім'я:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name">

                            @error('name')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="last-name">Прізвище:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control @error('last_name') is-invalid @enderror" id="last-name" name="last_name">

                            @error('last_name')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="email">E-Mail:</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email">

                            @error('email')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="comment">Коментар:</label>
                        <div class="col-sm-10">
                            <textarea class="form-control @error('comment') is-invalid @enderror" rows="5" id="comment" name="comment"></textarea>

                            @error('comment')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-info main-btn">Відправити</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
