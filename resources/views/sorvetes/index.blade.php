@extends('layouts.app')

@section('title', 'Sorvetes — Loja de Sorvetes')

@section('content')
<h2 class="fw-bold mb-3">📦 Sorvetes à venda</h2>

<div class="card shadow-sm">
    <table class="table table-dark table-hover mb-0">
        <thead>
            <tr>
                <th>Sabor</th>
                <th>Tipo</th>
                <th>Volume (ml)</th>
                <th>Preço (R$)</th>
                <th>Estoque</th>
                <th>Vendedor</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($sorvetes ?? [] as $sorvete)
                <tr>
                    <td>{{ $sorvete->sabor }}</td>
                    <td>{{ $sorvete->tipo }}</td>
                    <td>{{ $sorvete->volume_ml }}</td>
                    <td>R$ {{ number_format($sorvete->preco, 2, ',', '.') }}</td>
                    <td>{{ $sorvete->estoque }}</td>
                    <td>{{ $sorvete->vendedor->name }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="99" class="text-center text-secondary py-4">Nenhum produto para mostrar.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
