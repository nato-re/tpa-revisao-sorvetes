@extends('layouts.app')

@section('title', 'Cadastrar Sorvete — Loja de Sorvetes')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow-sm p-4">
            <h3 class="fw-bold mb-3">➕ Cadastrar Sorvete</h3>
            <form method="POST" action="{{ route('sorvetes.store') }}">
                @csrf
                <div class="mb-3">
                    <label for="sabor" class="form-label text-secondary">Sabor</label>
                    <input type="text" name="sabor" id="sabor" value="{{ old('sabor') }}" class="form-control @error('sabor') is-invalid @enderror">
                    @error('sabor') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="mb-3">
                    <label for="tipo" class="form-label text-secondary">Tipo</label>
                    <select name="tipo" id="tipo" class="form-select @error('tipo') is-invalid @enderror">
                        <option value="">Selecione…</option>
                        <option value="massa" @selected(old('tipo') == 'massa')>massa</option>
                        <option value="picolé" @selected(old('tipo') == 'picolé')>picolé</option>
                        <option value="açaí" @selected(old('tipo') == 'açaí')>açaí</option>
                    </select>
                    @error('tipo') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="mb-3">
                    <label for="volume_ml" class="form-label text-secondary">Volume (ml)</label>
                    <input type="number" name="volume_ml" id="volume_ml" value="{{ old('volume_ml') }}" class="form-control @error('volume_ml') is-invalid @enderror">
                    @error('volume_ml') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="mb-3">
                    <label for="preco" class="form-label text-secondary">Preço (R$)</label>
                    <input type="number" step="0.01" name="preco" id="preco" value="{{ old('preco') }}" class="form-control @error('preco') is-invalid @enderror">
                    @error('preco') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="mb-3">
                    <label for="estoque" class="form-label text-secondary">Estoque</label>
                    <input type="number" name="estoque" id="estoque" value="{{ old('estoque') }}" class="form-control @error('estoque') is-invalid @enderror">
                    @error('estoque') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <button type="submit" class="btn btn-primary w-100 fw-bold">Cadastrar</button>
            </form>
        </div>
    </div>
</div>
@endsection
