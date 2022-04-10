<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class GamesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Game::create([
            'title' => 'League of Legends',
            'thumbnail_url' => 'https://esports.as.com/2021/01/22/league-of-legends/URF-ARAM_1430866911_570762_667x386.jpg',
            'url' => 'https://www.leagueoflegends.com/es-es/'
        ]);

        Game::create([
            'title' => 'Fortnite',
            'thumbnail_url' => 'https://i.pinimg.com/474x/8c/e8/ab/8ce8aba0edcb78be32945243a3d9b4e6.jpg',
            'url' => 'https://www.epicgames.com/fortnite/es-ES/home'
        ]);

        Game::create([
            'title' => 'Warcraft III',
            'thumbnail_url' => 'https://i.pinimg.com/474x/8c/e8/ab/8ce8aba0edcb78be32945243a3d9b4e6.jpg',
            'url' => 'https://www.epicgames.com/fortnite/es-ES/home'
        ]);

        Game::create([
            'title' => 'Diablo III',
            'thumbnail_url' => 'https://i.pinimg.com/474x/8c/e8/ab/8ce8aba0edcb78be32945243a3d9b4e6.jpg',
            'url' => 'https://www.epicgames.com/fortnite/es-ES/home'
        ]);

        Game::create([
            'title' => 'World of Warcraft',
            'thumbnail_url' => 'https://i.pinimg.com/474x/8c/e8/ab/8ce8aba0edcb78be32945243a3d9b4e6.jpg',
            'url' => 'https://www.epicgames.com/fortnite/es-ES/home'
        ]);



    }
}
