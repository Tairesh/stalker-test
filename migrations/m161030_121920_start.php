<?php

use yii\db\Migration;

class m161030_121920_start extends Migration
{
    
    public function safeUp()
    {
        $this->createTable('players', [
            'id' => 'INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL',
            'name' => 'VARCHAR(255) NOT NULL',
            'clan' => 'VARCHAR(255) DEFAULT NULL',
            'created_at' => 'INTEGER NOT NULL',
            'login_at' => 'INTEGER NOT NULL',
            'password' => 'VARCHAR(255) NOT NULL',
            'frags' => 'INTEGER NOT NULL DEFAULT 0',            
        ]);
        $this->createIndex('playersName', 'players', ['name'], true);
        
        $this->createTable('inventory', [
            'player_id' => 'INTEGER REFERENCES players(id) NOT NULL',
            'item_id' => 'INTEGER REFERENCES items(id) NOT NULL',
            'using_count' => 'INTEGER NOT NULL DEFAULT 0',
            'location' => 'INTEGER(1) NOT NULL DEFAULT 0',
        ]);
        $this->createIndex('inventoryItem', 'inventory', ['player_id', 'item_id'], true);
        
        $this->createTable('location_log', [
            'player_id' => 'INTEGER REFERENCES players(id) NOT NULL',
            'location_id' => 'INTEGER REFERENCES locations(id) NOT NULL',
            'updated_at' => 'INTEGER NOT NULL',
        ]);
        $this->createIndex('locationLog', 'location_log', ['player_id', 'location_id'], true);
    }

    public function safeDown()
    {
    }
    
}
