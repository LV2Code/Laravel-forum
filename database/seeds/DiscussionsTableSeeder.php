<?php

use Illuminate\Database\Seeder;

class DiscussionsTableSeeder extends Seeder
{
    
    public function run() {
        

        $title1 = "Alternative for PHP/TCPDF";
        $title2 = "PHP mysql select result without field names";        
        $title3 = "How to extract files not into public folder in Laravel, zipper";        
        $title4 = "How to access PHP object's individual value?";        
        $title5 = "PHP - Allow client to send a message to a TLS server";


        $discussion1 = [

            'title' => $title1,

            'content' => 'I am trying to understand how we can use Php socket to let our client send messages to our  
                          Node.js server using TLS My problem is that i dont know how that is done in Php. Can someone 
                          please show me how that can be done in php and explain the steps please??? ',

            'channel_id' => 1,

            'user_id' => 2
        ];

        $discussion2 = [

            'title' => $title2,

            'content' => 'I am trying to understand how we can use Php socket to let our client send messages to our  
                          Node.js server using TLS My problem is that i dont know how that is done in Php. Can someone 
                          please show me how that can be done in php and explain the steps please??? ',

            'channel_id' => 1,

            'user_id' => 2
        ];

        $discussion3 = [

            'title' => $title3,

            'content' => 'I am trying to understand how we can use Php socket to let our client send messages to our  
                          Node.js server using TLS My problem is that i dont know how that is done in Php. Can someone 
                          please show me how that can be done in php and explain the steps please??? ',

            'channel_id' => 1,

            'user_id' => 2
        ];

        $discussion4 = [

            'title' => $title4,

            'content' => 'I am trying to understand how we can use Php socket to let our client send messages to our  
                          Node.js server using TLS My problem is that i dont know how that is done in Php. Can someone 
                          please show me how that can be done in php and explain the steps please??? ',

            'channel_id' => 1,

            'user_id' => 2
        ];

        $discussion5 = [

            'title' => $title5,

            'content' => 'I am trying to understand how we can use Php socket to let our client send messages to our  
                          Node.js server using TLS My problem is that i dont know how that is done in Php. Can someone 
                          please show me how that can be done in php and explain the steps please??? ',

            'channel_id' => 1,

            'user_id' => 2
        ];



        App\Discussion::create( $discussion1 );
        App\Discussion::create( $discussion2 );
        App\Discussion::create( $discussion3 );
        App\Discussion::create( $discussion4 );
        App\Discussion::create( $discussion5 );
    }
}
