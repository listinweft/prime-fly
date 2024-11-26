<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\File;

class ExportRoutesToPostman extends Command
{
    // Command signature to run in the terminal
    protected $signature = 'export:postman-routes';
    // Description of the command
    protected $description = 'Export API routes to a Postman collection JSON file';

    public function handle()
    {
        // Get all routes
        $routes = Route::getRoutes();

        // Base structure of the Postman collection
        $collection = [
            'info' => [
                'name' => 'Primefly API Collection',
                'schema' => 'https://schema.getpostman.com/json/collection/v2.1.0/collection.json',
            ],
            'item' => []
        ];

        // Predefined bodies for POST routes
        $bodies = [
            'registerpublic' => [
                'mode' => 'formdata',
                'formdata' => [
                    ['key' => 'firstname', 'value' => 'john', 'type' => 'text'],
                    ['key' => 'email', 'value' => 'john@example.com', 'type' => 'text'],
                    ['key' => 'phone', 'value' => '234134153', 'type' => 'text'],
                ]
            ],
            'registercorporate' => [
                'mode' => 'formdata',
                'formdata' => [
                    ['key' => 'companyname', 'value' => 'abhi', 'type' => 'text'],
                    ['key' => 'address', 'value' => 'abhi', 'type' => 'text'],
                    ['key' => 'email', 'value' => 'abhi@gmail.com', 'type' => 'text'],
                    ['key' => 'phone', 'value' => '323545645667', 'type' => 'text'],
                ]
            ],
            'forgot-password' => [
                'mode' => 'raw',
                'raw' => json_encode([
                    'email' => 'john@example.com'
                ])
            ],
            // Add more routes and their bodies as necessary
        ];

        // Iterate through all routes and build the Postman collection
        foreach ($routes as $route) {
            // Make sure the route belongs to the 'api' middleware group
            if (in_array('api', $route->gatherMiddleware())) {
                $method = $route->methods()[0]; // GET, POST, etc.
                $uri = $route->uri(); // Route URI

                // Check if the route has a predefined body mapping
                $bodyKey = $this->getBodyKeyFromUri($uri);

                // Build the request for the collection
                $request = [
                    'method' => $method,
                    'header' => [],
                    'url' => [
                        'raw' => '{{base_url}}/api/' . $uri,
                        'host' => ['{{base_url}}'],
                        'path' => explode('/', $uri),
                    ],
                ];

                // Add request body if it's a POST route with a body mapping
                if (in_array($method, ['POST', 'PUT', 'PATCH']) && isset($bodies[$bodyKey])) {
                    $request['body'] = $bodies[$bodyKey];
                }

                // Add the route request to the Postman collection
                $collection['item'][] = [
                    'name' => $route->uri(),
                    'request' => $request
                ];
            }
        }

        // Export the collection to a JSON file in the public folder
        $json = json_encode($collection, JSON_PRETTY_PRINT);
        File::put(public_path('primefly_postman_collection.json'), $json);

        $this->info('Postman collection exported to public/primefly_postman_collection.json');
    }

    // Helper function to map URIs to body keys
    private function getBodyKeyFromUri($uri)
    {
        $uriToKeyMapping = [
            'registercorporate' => 'registercorporate',
            'registerpublic' => 'registerpublic',
            'forgot-password' => 'forgot-password',
            // Add more URI to body key mappings here
        ];

        return $uriToKeyMapping[$uri] ?? null;
    }
}
  