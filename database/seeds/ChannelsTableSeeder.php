<?php

use App\Channel;

use Illuminate\Database\Seeder;

class ChannelsTableSeeder extends Seeder
{

    public function run() {

        $channel1 = [ 'name' => 'Laravel' ];
        
        $channel2 = [ 'name' => 'Refactoring' ];

        $channel3 = [ 'name' => 'OOP concepts' ];

        $channel4 = [ 'name' => 'Smalltalk' ];


        Channel::create( $channel1 );

        Channel::create( $channel2 );
        
        Channel::create( $channel3 );
        
        Channel::create( $channel4 );
    }
}
