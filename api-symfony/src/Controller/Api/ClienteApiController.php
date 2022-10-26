<?php

declare(strict_types=1);

namespace App\Controller\Api;


use App\Repository\ClienteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\SerializerInterface;

class ClienteApiController extends AbstractController
{   
    public function __construct(
        private ClienteRepository $respository,
        private SerializerInterface $serializer
    )
    {
        
    }
    public function getList(): Response
        //buscando os clientes no banco de dados
    {   $clientes = $this->respository->findAll();
            // 
            $json = $this->serializer->serialize($clientes,'json');
        return new Response(
            $json
        );
           
    }

    public function getOne(string $id): Response
    {   
        $cliente = $this->respository->find($id);
            if(!$cliente){
                return new JsonResponse(null,Response::HTTP_NOT_FOUND);
            }

        return new Response(
            $this->serializer->serialize($cliente,'json')
        );
    }

    public function remove(string $id): JsonResponse
    {   
        $cliente= $this->respository->find($id);
        $this->respository->remove($cliente,true);
        return new JsonResponse(null,Response::HTTP_NO_CONTENT);
    }

    public function update(string $id): JsonResponse
    {
        return new JsonResponse([]);
    }

    public function create(Request $request): JsonResponse
    {
        $cliente = $this->serializer->deserialize(
            $request->getContent(),
            Cliente::class,
            'json'
        );
        $this->respository->save($cliente,true);
        return new Response(
            $this->serializer->serialize($cliente,'json')
        );
    }

}