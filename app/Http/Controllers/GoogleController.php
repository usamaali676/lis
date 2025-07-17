<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Google;
use Google_Service_Indexing;
use Google_Service_Indexing_UrlNotification;

class GoogleController extends Controller
{
    public function try() {
        $googleClient = new Google\Client();

        // Add here location to the JSON key file that you created and downloaded earlier.
        $googleClient->setAuthConfig( 'client_secret.json' );
        $googleClient->setScopes( Google_Service_Indexing::INDEXING );
        $googleClient->setUseBatch( true );

        $service = new Google_Service_Indexing( $googleClient );
        $batch = $service->createBatch();

        $postBody = new Google_Service_Indexing_UrlNotification();

        // Use URL_UPDATED for new or updated pages.
        // Use URL_DELETED for deleted pages.
 $urls = array(
               'https://localbeings.com/328-home-remodeling-service-shelton-ct' =>'URL_UPDATED',
                'https://localbeings.com/328-home-additions-service-woodbridge-ct' => 'URL_UPDATED',
                'https://localbeings.com/328-gutter-repair-service-watertown-ct' => 'URL_UPDATED',
                'https://localbeings.com/328-decking-repair-service-southbury-ct' => 'URL_UPDATED',
                'https://localbeings.com/328-chimney-repair-service-redding-ct' => 'URL_UPDATED',
                'https://localbeings.com/321-concrete-services-norman-ok' => 'URL_UPDATED',
        'https://localbeings.com/319-garage-clean-up-services-catoosa-ok' =>'URL_UPDATED',
                'https://localbeings.com/318-moving-service-carrollton-tx' => 'URL_UPDATED',
                'https://localbeings.com/318-junk-removal-service-coppell-tx' => 'URL_UPDATED',
                'https://localbeings.com/318-furniture-assembly-lewisville-tx' => 'URL_UPDATED',
                'https://localbeings.com/317-digging-service-st-louis-city-mo' => 'URL_UPDATED',
                'https://localbeings.com/317-demolition-service-st-louis-county-mo' => 'URL_UPDATED',
        'https://localbeings.com/313-electronic-gate-services-killeen-tx' =>'URL_UPDATED',
                'https://localbeings.com/313-fences-and-gates-installation-services-temple-tx' => 'URL_UPDATED',
                'https://localbeings.com/313-metal-roofing-services-harker-heights-tx' => 'URL_UPDATED',
                'https://localbeings.com/313-power-washing-services-belton-tx' => 'URL_UPDATED',

        );

        foreach($urls as $url => $type)
        {
          $postBody->setUrl( $url );
          $postBody->setType( $type );
          $batch->add( $service->urlNotifications->publish( $postBody ) );
        }
        $results = $batch->execute();
         return "generated";


      }
}
