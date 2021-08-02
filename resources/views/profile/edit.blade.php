@extends('layouts.app')

@section('content')
    <div class="container pt-5 pb-5">
        <div class="main-body">
            <div class="row gutters-sm">
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                @if($imgUrl = $user->getFirstMediaUrl('profile_img'))
                                    <div class="profile-image-wrapper">
                                        @include('parts.profile-image', ['imgUrl' => $imgUrl])
                                    </div>
                                @else
                                    <img src="{{ asset("images/no-image.jpg") }}" alt="img" class="rounded-circle" width="150">
                                @endif
                                <div class="mt-3">
                                    <h4>{{ $user->name }} {{ $user->last_name }}</h4>
                                    <p class="text-secondary mb-1">{{ $user->email }}</p>
                                    <p class="text-muted font-size-sm">{{ $user->is_legal_entity ? 'Юридична Особа' : 'Фізична Особа' }}</p>
                                    <form action="{{ route('update-img', [$user->id]) }}">
                                        <input class="upload js-file-upload hide" id="profile-img" type="file" name="profile_img"/>
                                        <label for="profile-img" class="btn btn-outline-info">Змінити Фото</label>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card mb-3">
                        <div class="card-body">
                            <form action="{{ route('profile.update', [$user]) }}" method="POST">
                                @csrf
                                @method('PATCH')

                                <div class="form-group row">
                                    <label for="name" class="col-sm-3 col-form-label">{{ __("Ім'я") }}</label>

                                    <div class="col-sm-9">
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}">

                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="last-name" class="col-sm-3 col-form-label">{{ __('Прізвище') }}</label>

                                    <div class="col-sm-9">
                                        <input id="last-name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ $user->last_name }}">

                                        @error('last_name')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="email" class="col-sm-3 col-form-label">{{ __('E-Mail') }}</label>

                                    <div class="col-sm-9">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}">

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="phone" class="col-sm-3 col-form-label">{{ __('Телефон') }}</label>

                                    <div class="col-sm-9">
                                        <input id="phone" type="tel" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ $user->phone }}">

                                        @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="city" class="col-sm-3 col-form-label">{{ __('Місто') }}</label>

                                    <div class="col-sm-9">
                                        <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ $user->city }}">

                                        @error('city')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="address" class="col-sm-3 col-form-label">{{ __('Адреса') }}</label>

                                    <div class="col-sm-9">
                                        <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ $user->address }}">

                                        @error('address')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="identification-code" class="col-sm-3 col-form-label">{{ $user->is_legal_entity ? __('ЄДРПОУ') : __('ІПН') }}</label>

                                    <div class="col-sm-9">
                                        <input id="identification-code" type="text" class="form-control @error('taxpayer_identification_number') is-invalid @enderror" name="taxpayer_identification_number" value="{{ $user->taxpayer_identification_number }}">

                                        @error('taxpayer_identification_number')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row" style="display: {{ $user->is_legal_entity ? 'flex' : 'none' }}">
                                    <label for="firm-name" class="col-sm-3 col-form-label">{{ __('Найменування') }}</label>

                                    <div class="col-sm-9">
                                        <input id="firm-name" type="text" class="form-control @error('firm_name') is-invalid @enderror" name="firm_name" value="{{ $user->firm_name }}">

                                        @error('firm_name')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row pt-3">
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-info main-btn">Оновити</button>
                                        <a class="btn btn-outline-info main-btn" href="{{ route('profile.index') }}">Скасувати</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


