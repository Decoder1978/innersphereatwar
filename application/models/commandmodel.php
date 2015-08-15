<?php

Class Commandmodel extends MY_Model {

    /**
     * Default constructor
     */
    function __construct()
    {
        parent::__construct();
        $this->table_id = 'command_id';
        $this->table = 'combat_commands';
    }
    
    /**
     * Get all combat commands in a faction
     */
    function get_by_faction($faction_id)
    {
        return $this->db->query('SELECT * FROM combat_commands WHERE faction_id='.$faction_id)->result();        
    }
    
    /**
     * Get all commands on a planet
     */
    function get_by_planet($planet_id)
    {
        return $this->db->query('SELECT combat_commands.*, factions.name AS faction_name FROM combat_commands '
                . 'JOIN factions on factions.faction_id=combat_commands.faction_id '
                . 'WHERE planet_id='.$planet_id)->result(); 
    }
    
}