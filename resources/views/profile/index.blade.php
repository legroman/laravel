@extends('layouts.app')

@section('content')
<div class="container profile pt-5 pb-5">
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
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Ім'я</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{ $user->name }}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Прізвище</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{ $user->last_name }}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">E-Mail</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{ $user->email }}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Телефон</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <span id="phone">{{ $user->phone }}</span>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Місто</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{ $user->city }}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Адреса</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{ $user->address }}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">{{ $user->is_legal_entity ? 'ЄДРПОУ' : 'ІПН' }}</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{ $user->taxpayer_identification_number}}
                            </div>
                        </div>
                        <hr>
                        <div class="row" style="display: {{ $user->is_legal_entity ? 'flex' : 'none' }}">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Найменування</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{ $user->firm_name}}
                            </div>
                        </div>
                        <hr>

                        <div class="row pt-3">
                            <div class="col-sm-12">
                                <a class="btn btn-info main-btn" href="{{ route('profile.edit', [$user]) }}">Редагувати</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


