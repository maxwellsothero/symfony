<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\Product;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Persistence\ObjectRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class ProductController extends AbstractController
{   private ObjectRepository $repository;
    public function __construct(
        private ManagerRegistry $manager
    )
    {
        $this->repository = $manager->getRepository(Product::class);
    }

    public function add(Request $request): Response
    {   $data = $request->request;
        if($data->get('name')){
            $product = new Product();
            $product->setName($data->get('name'));
            $product->setPrice( (float) $data->get('price'));
            $product->setDescription($data->get('description'));

            $this->manager->getManager()->persist($product);
            $this->manager->getManager()->flush();

            return $this->redirectToRoute('product_list');

        }
        return $this->render('product/add.html.twig');
    }

    public function list(): Response
    {
        return $this->render('product/list.html.twig',[
            'products'=> $this->repository->findAll(),
        ]);
    }

    public function edit(): Response
    {
        return $this->render('product/edit.html.twig');
    }
    public function remove(string $id): Response
    {   $product = $this->repository->find($id);
        $this->manager->getManager()->remove($product);
        $this->manager->getManager()->flush();
        return new Response('Removido');

       // return $this->render('product/remove.html.twig');
    }
}    