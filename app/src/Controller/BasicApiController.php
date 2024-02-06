<?php

namespace App\Controller;

use App\Entity\Client;
use App\Repository\ClientRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class BasicApiController extends AbstractController
{

    #[Route("/listPhotos")]
    public function listPhotos(Request $request)
    {
        $images = [];
        $query = "";
        
        // Création d'un formulaire pour la saisie de l'utilisateur.
        $form = $this->createFormBuilder()
        ->add("query", TextType::class, [
                "label" => "Champs de recherche"
            ])
            ->add('ask', SubmitType::class, [
                "label" => "Envoyer"
                ])->getForm();
                
                $form->handleRequest($request);
                
                // Gérer la soumission du formulaire et effectuer une requête API si le formulaire est soumis et valide.
                if ($form->isSubmitted() && $form->isValid()) {
                    $query = $form->get("query")->getData();
                    
                    // Création d'un client HTTP pour effectuer des requêtes API.
                    $client = HttpClient::create();
                    
                    // Effectuer une requête GET vers l'API Unsplash avec un paramètre de requête.
                    $response = $client->request(
                        'GET', "https://api.unsplash.com/search/photos/".
                        "?client_id=ElKVPSB6iK9_oYJUMufK37zRnd2rFDWdgywM1CLAYAg".
                        "&query=".$query
                    );
                    
                    $status = $response->getStatusCode();
                    $contentType = $response->getHeaders()['content-type'][0];
                    
                    // Obtenir le contenu JSON de la réponse.
                    $content = $response->getContent();
                    
                    // Convertir le contenu JSON en tableau associatif.
                    $contentArray = $response->toArray();
                    
                    // Dump and die pour inspecter le contenu.
                    //dd($contentArray);
                    
            foreach ($contentArray["results"] as $resultat){
                $images[] = $resultat["urls"]["small"];
                // array_push($images, $resultat["urls"]["small"]);
            }
        }
        
        // Rendre le formulaire et transmettre les données au modèle.
        return $this->render("home/listPhotos.html.twig", [
            "form" => $form->createView(),
            "images" => $images,
            "query" => $query,
        ]);

    }

   
    
}
