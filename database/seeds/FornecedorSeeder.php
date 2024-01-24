<?php

use Illuminate\Database\Seeder;
use App\Fornecedor;
use Illuminate\Support\Facades\DB;

class FornecedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // instanciando objeto e criando
        $fornecedor = new Fornecedor();
        $fornecedor->nome = 'Jamario Nascimento';
        $fornecedor->site = 'jamario.com.br';
        $fornecedor->uf = 'BA';
        $fornecedor->email = 'jamariobatista@gmail.com';
        $fornecedor->save;

        // usando metodo create ( é preciso ter o private fillable na classe )
        Fornecedor::create([
            'nome'  => 'Ludmila Rodriques',
            'site'  => 'ludmila.com.br',
            'uf'    => 'GO',
            'email' => 'ludmilarodriques@gmail.com',
            ]);

        // Metodo insert
//        DB::table('fornecedors')->insert([
//            'nome'  => 'Leonardo Nunes',
//            'site'  => 'leozinhosodelas.com.br',
//            'uf'    => 'SP',
//            'email' => 'leozinhosodelas@gmail.com',
//        ]);
    }
}
