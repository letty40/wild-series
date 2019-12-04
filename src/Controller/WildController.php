<?php
// src/Controller/WildController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class WildController extends AbstractController
{
    /**
     * @Route("/wild", name="wild_index")
     */
    public function index(): Response
    {
        return $this->render('wild/index.html.twig', [
            'website'=> 'Wild Series'
        ]);
    }
    /**
     * @Route("/wild/show/{slug}",
     *     requirements={"slug"="[a-zA-Z0-9\-]+"},
     *     defaults={"slug"=null}),
     *     name="wild_show",
     */

    public function show($slug) : Response
    {
        if (null === $slug) {
            $newSlug = "Aucune serie selectionne, veuillez choisir une serie";
        } else {
            $newSlug = str_replace("-", ' ', $slug);
            $newSlug = ucwords($newSlug);
        }
        return $this->render('wild/index.html.twig', ['slug'=>$newSlug]);

    }
}
