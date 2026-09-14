<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class BaseController extends AbstractController 
{

    #[Route('/')] /** changer la route de symfony  pour afficher la focntion home */
    public function home(): Response
    {
        //crée  un rendu html du template twig
        return $this->render('base/home.html.twig');
    }
}