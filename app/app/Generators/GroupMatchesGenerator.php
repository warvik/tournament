<?php   

namespace App\Generators;

use App\Team;
use App\Group;

class GroupMatchesGenerator {

    private $teams;

    private $matches;

    public function __construct($teams) {
        
        $this->teams = $teams;

        $this->matches = collect();
    }

    public function generate() {

        for( $i=0; $i<count($this->teams); $i++ ) {
            if ( $i+1<count($this->teams) ) {
                for( $j=$i+1; $j<count($this->teams); $j++ ) {
                    $this->matches->push(collect([$this->teams[$i], $this->teams[$j]])->keyBy(function($item){
                        return $item->id;
                    })->shuffle());
                }
            }
        }

        return $this->matches->shuffle();
    }

}