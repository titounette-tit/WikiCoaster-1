<?php

namespace App\Controller;

use App\Entity\Coaster;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Form\CoasterType;
use Symfony\Component\HttpFoundation\Request;

class CoasterController extends AbstractController
{
    #[Route('/coaster/add')]
    public function add(Request $request, EntityManagerInterface $em): Response
    {
        $entity = new Coaster();

        $form = $this->createForm(CoasterType::class, $entity);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirectToRoute('le_nom_trouvé');
    }

    return $this->render('coaster/add.html.twig', [
        'coasterForm' => $form,
    ]);
}
}

?>