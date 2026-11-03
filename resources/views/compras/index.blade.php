@extends('layouts.app')

@section('title', 'Minhas compras — Loja de Sorvetes')

@section('content')
<h2 class="fw-bold mb-3">🧾 Minhas compras</h2>

@forelse ($vendas ?? [] as $venda)
    <div class="card shadow-sm mb-3">
        <div class="card-header d-flex justify-content-between">
            <strong>Compra #{{ $venda->id }}</strong>
            <span class="text-secondary">{{ $venda->created_at?->format('d/m/Y H:i') }}</span>
        </div>
        <table class="table table-dark mb-0">
            <thead>
                <tr>
                    <th>Sorvete</th>
                    <th>Quantidade</th>
                    <th>Preço unitário</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($venda->sorvetes as $sorvete)
                    <tr>
                        <td>{{ $sorvete->sabor }}</td>
                        <td>{{ $sorvete->pivot->quantidade }}</td>
                        <td>R$ {{ number_format($sorvete->pivot->preco_unitario, 2, ',', '.') }}</td>
                        <td>R$ {{ number_format($sorvete->pivot->quantidade * $sorvete->pivot->preco_unitario, 2, ',', '.') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="card-footer text-end fw-bold">
            Total: R$ {{ number_format($venda->sorvetes->sum(fn ($item) => $item->pivot->quantidade * $item->pivot->preco_unitario), 2, ',', '.') }}
        </div>
    </div>
@empty
    <p class="text-secondary">Você ainda não fez nenhuma compra.</p>
@endforelse
@endsection
