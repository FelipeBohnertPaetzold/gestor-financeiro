<?php

use Illuminate\Database\Seeder;

class CriaTemas extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Tema::create([
            'nome'=>'Padrão',
            'chave_de_tema'=>'ls-theme-turquoise'
        ]);

        App\Tema::create([
            'nome'=>'Ouro',
            'chave_de_tema'=>'ls-theme-gold'
        ]);

        App\Tema::create([
            'nome'=>'Água',
            'chave_de_tema'=>'ls-theme-light-green'
        ]);

        App\Tema::create([
            'nome'=>'Dark',
            'chave_de_tema'=>'ls-theme-gray'
        ]);
    }
}
