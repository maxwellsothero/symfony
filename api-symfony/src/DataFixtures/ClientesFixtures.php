<?php

namespace App\DataFixtures;

use App\Entity\Cliente;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class ClientesFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
       $faker = Factory::create('pt_BR');
            for($i=1;$i <=40; $i++){
                $cliente =new Cliente();
                $cliente->setNome($faker->name);
                $cliente->setEmail($faker->email);
                $cliente->setCpf($faker->bothify('###.###.###-##'));
                $cliente->setEndereco($faker->address);

                $manager->persist($cliente);
            }


        $manager->flush();
    }
}
