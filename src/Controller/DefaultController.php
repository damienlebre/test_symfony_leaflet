<?php

namespace App\Controller;

use App\Form\ZipType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index( Request $request): Response
    {
        $form = $this->createForm(ZipType::class);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // $form->getData() holds the submitted values       

            // ... perform some action, such as saving the task to the database

            return $this->redirectToRoute('default/index.html.twig');
        }

        return $this->renderForm('default/index.html.twig', [
            'form' => $form,
        ]);
    }
}
