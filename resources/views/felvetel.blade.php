@extends('layouts.master')
@section('title','Lista')
@section('content')

    <!-- 
        .container>.row>.col-12>div
    -->
    <div class="container mt-3">
        <div class="row">
            <div class="col-12">
                <div class="p-5 bg-light rounded border">
                    <h1>Autó felvétel/módosítás</h1>
                    <form method="POST" autocomplete="off">

                        @if (session()->has('felvetelKesz'))
                            <div class="alert alert-success">
                                A felvétel sikeres!
                            </div>
                        @endif

                        @csrf
                        <div>
                            <label for="rendszam">Rendszám:</label>
                            <input type="text" name="rendszam" id="rendszam" class="form-control" 
                            value="{{ $auto->rendszam ?? old('rendszam') }}">
                        </div>
                        @error('rendszam')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror

                        <div class="mt-3">
                            <label for="motor_tipus">Motor Típusa:</label>
                            <select name="motor_tipus" id="motor_tipus" class="form-select">
                                <option value="">Válassz!</option>
                                @foreach ($motorTipusok as $key => $mt)
                                    <option value="{{ $key }}" 
                                    {{ old('motor_tipus') == $key || isset($auto->motor_tipus) && $auto->motor_tipus == $key  ? 'selected' : '' }} >{{ $mt }}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('motor_tipus')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror

                        <div class="mt-3">
                            <label for="szin_id">Szín:</label>
                            <select name="szin_id" id="szin_id" class="form-select">
                                <option value="">Válassz!</option>
                                @foreach ($szinek as $szin)
                                    <option value="{{ $szin->szin_id }}"  {{ old('szin_id') == $szin->szin_id  || isset($auto->szin_id) && $auto->szin_id == $szin->szin_id ? 'selected' : '' }}>{{ $szin->nev }}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('szin_id')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror

                        <div class="mt-3">
                            <label for="meghajtas">Megahajtás módja:</label>
                            <select name="meghajtas" id="meghajtas" class="form-select">
                                <option value="">Válassz!</option>
                                @foreach ($meghajtasok as $keyMh => $mh)
                                    <option value="{{ $keyMh }}"  {{ old('meghajtas') == $key || isset($auto->meghajtas) && $auto->meghajtas == $keyMh  ? 'selected' : '' }}>{{ $mh }}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('meghajtas')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror

                        <div class="mt-5">
                            <button type="submit" class="btn btn-success w-100">Mentés</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection