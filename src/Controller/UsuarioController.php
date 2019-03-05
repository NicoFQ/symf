<?php

namespace App\Controller;
use App\Entity\Usuario;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class UsuarioController extends AbstractController
{
    /**
     * @Route("/usuario", name="usuario")
     */
    public function index()
    {
    	// you can fetch the EntityManager via $this->getDoctrine()
        // or you can add an argument to your action: index(EntityManagerInterface $entityManager)
        $entityManager = $this->getDoctrine()->getManager();

        $usuario = new Usuario();
        $usuario->setNombre('Nicolas');
        $usuario->setNombreUsuario('nico');
        $usuario->setContrasena('1234');

        // tell Doctrine you want to (eventually) save the Product (no queries yet)
        $entityManager->persist($usuario);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();

        return $this->render('usuario/index.html.twig', [
            'nuevo_usuario' => $usuario,
        ]);
    }
}
