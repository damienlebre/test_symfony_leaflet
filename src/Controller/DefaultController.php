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
        
        
        $lat= 0.0; 
        $lon = 0.5;  

        $form->handleRequest($request); 
        if ($form->isSubmitted() && $form->isValid()) {
            $zipcode = $form->getData()['zip'];
            $city = $form->getData()['city'];
            function geocode($zip, $city){              
            
                $url = "https://nominatim.openstreetmap.org/?search=1&city=$city&postalcode=$zip&country=france&format=json&limit=1";
            
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_URL,$url);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                curl_setopt($ch, CURLOPT_HEADER, false);
                curl_setopt($ch, CURLOPT_REFERER, $url);
                curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.86 Safari/537.36");
            
                $result = curl_exec($ch);
            
                curl_close($ch);
                $data=json_decode($result, true);
                $lat= $data[0]['lat']; 
                $lon = $data[0]['lon'];      
                 
                return [$lat, $lon];
                
            }  

            $localisations = geocode($zipcode, $city);         
            $lat= $localisations[0];
            $lon=$localisations[1];
        }

        return $this->renderForm('default/index.html.twig', [
            'form' => $form,
            'locationLat' => $lat,
            'locationLon' => $lon,
        ]);
    }
}
