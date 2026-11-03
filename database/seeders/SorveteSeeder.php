<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Sorvete;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

/**
 * CONTRATO DO R1: este seeder define o nome da model (Sorvete), da tabela
 * (sorvetes) e das colunas. Sua migration e sua model precisam ser
 * compatíveis com ele. Não altere este arquivo.
 */
class SorveteSeeder extends Seeder
{
    public function run(): void
    {
        $sorvetes = [
            ['sabor' => 'Chocolate Belga', 'tipo' => 'massa', 'volume_ml' => 1500, 'preco' => 39.9, 'estoque' => 10],
            ['sabor' => 'Morango', 'tipo' => 'picolé', 'volume_ml' => 100, 'preco' => 6.9, 'estoque' => 40],
            ['sabor' => 'Açaí com Granola', 'tipo' => 'açaí', 'volume_ml' => 500, 'preco' => 22.9, 'estoque' => 15],
            ['sabor' => 'Flocos', 'tipo' => 'massa', 'volume_ml' => 2000, 'preco' => 45.9, 'estoque' => 8],
            ['sabor' => 'Limão', 'tipo' => 'picolé', 'volume_ml' => 100, 'preco' => 5.9, 'estoque' => 30],
        ];

        $colunas = [...array_keys($sorvetes[0]), 'vendedor_id'];

        if (! class_exists(Sorvete::class) || ! Schema::hasColumns('sorvetes', $colunas)) {
            $this->command->warn('Sorvetes não semeados: faça o R1 (model Sorvete + migration com as colunas '
                . implode(', ', $colunas) . ') e rode "php artisan migrate:fresh --seed".');

            return;
        }

        $vendedores = User::where('tipo', 'vendedor')->orderBy('id')->pluck('id');

        foreach ($sorvetes as $i => $dados) {
            Sorvete::forceCreate($dados + ['vendedor_id' => $vendedores[$i % $vendedores->count()]]);
        }
    }
}
