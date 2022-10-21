<?php

declare(strict_types=1);
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class TesteController extends AbstractController
{
    public function listar(): Response
    {
        $usuario = "Maxwell";
        $produtos = [
            'sabão',
            'Arroz',
            'Cheiro verde',
        ];

       // return new Response("Ola Mundo");
       return $this->render('teste/listar.html.twig',[
        'usuario' => $usuario,
        'produtos'=> $produtos,
       ]);
    }
    
    public function cadastrar(): Response
    {
       // return new Response("Cadastrando");
       return $this->render('teste/cadastrar.html.twig');
    }
}