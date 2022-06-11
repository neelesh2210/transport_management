<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class User extends Controller
{
    public function fcft(Request $request){
   
    	
$recipients = [
    'fB1IIJppSu6jnYQlD3Gq_L:APA91bGegt2vxc0zN8fLGfutTQOZu0oL3Auiqd8s7i8gIOLXxJCyXQoejHNKLoWpAZ3BZhdXsaomVKTiHnIoEAFP54dC_9BhIxk15f0KJf705aia_fNDDRGs9IMFT95sBsdu1TGt-OfH',
];

fcm()
    ->to($recipients) // $recipients must an array
    ->priority('high')
    ->timeToLive(0)
    ->notification([
        'title' => 'Test FCM',
        'body' => 'Ashutosh FCM',
    ])
    ->send();



    
        
   }

}
