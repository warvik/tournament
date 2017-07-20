<?php

namespace App\Generators;

use App\Tournamentclass;
use App\Team;
use App\Group;

class TeamsIntoGroupsGenerator {

    private $class;
    private $teams;

    public function __construct(Tournamentclass $class) {
        $this->class = $class;
        $this->teams = $class->teams->shuffle();
        // dd($this->teams);

        $this->groupTeamsByClub();

    }

    /**
     * A tournament class has teams and groups. 
     * 
     * This generator attempts to organize the teams into groups, where we try 
     * to create groups where teams doesn't come from the same club. We also 
     * want to distributed the teams into evenly sized groups.
     *
     * This is totaly randomized, every time generator is ran for a class, it 
     * should return different result. This way an administrator can 
     * re-generate the groups inside a class.
     * 
     * @return array groups
     */
    public function generate() {

        $teams = [];
        
        // After teams have been grouped by clubs, we then merge them into one
        // array again by shifting the first item of each group until we have 
        // no more teams left to shift.
        while( $_teams = $this->parse() ) {
            $teams = array_merge($_teams, $teams);
        }

        // The merged array is then split into groups. 
        $groups = collect($teams)->chunk($this->class->group_size);
        $groups = $this->checkAndFixGroupsWithSizeLessThanGroupSize($groups);

        return $groups;
    }

    private function groupTeamsByClub() {
        $this->teams = $this->teams->shuffle()->groupBy(function($item, $key) {
            return $item->club_id;
        }) ->map(function($item) {
            return $item->shuffle()->keyBy(function($item) {
                return $item->id;
            })->keys();
        })->toArray();
    }

    /** 
     * Returns the first team from each club in an array. 
     * 
     * @return array 
     */
    private function parse() {

        $data = $this->teams;
        $numbers = [];

        if ( ! count($data) ) return false;

        foreach( $data as $key => $vlue ) {
                
            if ( count($data[$key]) ) {
                
                $numbers[] = array_shift($data[$key]);
                
            }       
        }
        
        foreach($data as $key => $value) {
            if ( ! count($data[$key]) ) {
                unset($data[$key]);
            }
        }
                          
        $this->teams = array_values($data);
        
        return $numbers;

    }

    private function checkAndFixGroupsWithSizeLessThanGroupSize($chunks) {

        if ( $chunks->last()->count() !== $this->class->group_size) {
            $chunks->pop()->each(function($item) use (&$chunks) {
                $chunks->get(rand(0, $chunks->count()-1))->push($item);
            });

        }

        return $chunks;

    }

}