<?php

namespace App\Controller;

use App\Repository\AlbumsRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class HomeController extends AbstractController
{
    #[Route("/accueil", name: "accueil")]
    public function home()
    {
        // $lien = "<a href='page/2'>liens vers la page 2</a>";
        // $lien2 = "<a href='page/3'>liens vers la page 3</a>";
        // $page = $this->html("Hello World <br/>"."$lien<br/>"."$lien2", "page d'accueil");
        // return new Response($page);

        return $this->render("home/home.html.twig", []);
    }

    private $albumRepo;
    public function __construct(AlbumsRepository $albumRepository)
    {
        $this->albumRepo = $albumRepository;
    }

    // #[Route("/discover", name: "discover")]
    // public function contact()
    // {
    //     return $this->render("home/discover.html.twig", [
    //         "albums" => $this->albumRepo->findAll(),
    //     ]);
    // }

    #[Route("/playlist", name: "playlist")]
    public function contactbook()
    {
        return $this->render("home/playlist.html.twig", []);
    }


    #[Route("/page/{numPage}", name: "page")]
    public function page(string $numPage)
    {
        
        return new Response($this->html("Bienvenue sur la page", "page", $numPage));
    }

    #[Route("/about", name: "about")]
    public function aboutbook()
    {
        return $this->render("home/about.html.twig", []);
    }

    #[Route("/categories", name: "categories")]
    public function categories()
    {
        return $this->render("home/categories.html.twig", []);
    }

    #[Route("/error", name: "error")]
    public function error(Request $request)
    {
        return $this->render('error.html.twig', [
            'msg' => $request->get('message')
        ]);
    }

    #[Route("/login", name: "login", methods: ["GET", "POST"])]
    public function login(AuthenticationUtils $authenticationUtils)
    {
        $error = $authenticationUtils->getLastAuthenticationError();
        $lastMail = $authenticationUtils->getLastUsername();
        return $this->render("form/login.html.twig", [
            "lastMail" => $lastMail,
            "error" => $error
        ]);
    }

    /**
     * function de construction de la page
     * @param $titre
     * @return String
     */
    
    private function html($message, $titre, $number = ""): String
    {
        $html ="<html><head><title>$titre</title></head><body><p>$message</p>"
        ."<p>$number</p></body></html>";
    
        return $html;
    }


}
