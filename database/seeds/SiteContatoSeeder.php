<?php

use Illuminate\Database\Seeder;
use App\SiteContato;

class SiteContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        $contato = new SiteContato();
//        $contato->nome = 'Sistema SG';
//        $contato->telefone = '(62) 998693561';
//        $contato->email = 'jamariobatista@gmail.com';
//        $contato->motivo_contato = '1';
//        $contato->mensagem = 'Seja bem vindo ao Super Gestão';
//        $contato->save;

            factory(SiteContato::class,100)->create();
    }
}
