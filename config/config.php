<?php

return [
    "enabled" => env('WHATSAPP_ENABLED', false),
    "api_url" => env('WHATSAPP_API_URL', 'https://graph.facebook.com/v21.0/%s/messages'),
    "api_key" => env('WHATSAPP_API_KEY', ''),
    "phone_id" => env('WHATSAPP_PHONE_ID', ''),
    "priority" => env('WHATSAPP_PRIORITY', 1),
    "prefix" => env('WHATSAPP_PREFIX', "any"),
    "tags" => env('WHATSAPP_TAGS', '#ws, #whatsapp'),
    "default" => env('WHATSAPP_DEFAULT', false),
    "devmode" => env('WHATSAPP_DEVMODE', false),
];
