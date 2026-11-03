@extends('layouts.app')

@section('title', 'Comprar — Loja de Sorvetes')

@section('content')
<h2 class="fw-bold mb-3">🛒 Nova compra</h2>
<p class="text-secondary">Informe a quantidade de cada item. Itens com quantidade 0 ficam de fora da compra.</p>

<form method="POST" action="{{ route('compras.store') }}">
    @csrf
    <div class="card shadow-sm mb-3">
        <table class="table table-dark align-middle mb-0">
            <thead>
                <tr>
                    <th>Sorvete</th>
                    <th>Preço</th>
                    <th>Em estoque</th>
                    <th style="width: 9rem">Quantidade</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($sorvetes ?? [] as $sorvete)
                    <tr>
                        <td>{{ $sorvete->sabor }}</td>
                        <td>R$ {{ number_format($sorvete->preco, 2, ',', '.') }}</td>
                        <td>{{ $sorvete->estoque }}</td>
                        <td>
                            <input type="number" min="0" name="itens[{{ $sorvete->id }}]"
                                   value="{{ old('itens.' . $sorvete->id, 0) }}" class="form-control">
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center text-secondary py-4">Nenhum produto para mostrar.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <button type="submit" class="btn btn-primary fw-bold">Finalizar compra</button>
</form>
@endsection
