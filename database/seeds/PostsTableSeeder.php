<?php

use Illuminate\Database\Seeder;
use App\User;
use Carbon\Carbon;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ben = User::where('name', 'Ben Patterson')->firstOrFail();
        $ben->created_at = new Carbon($ben->created_at, config('timezone'));

        $bobbybob = User::where('name', 'Bobby Bob')->firstOrFail();
        $bobbybob->created_at = new Carbon($bobbybob->created_at, config('timezone'));

        $bobbertbob = User::where('name', 'Bobbert Bob')->firstOrFail();
        $bobbertbob->created_at = new Carbon($bobbertbob->created_at, config('timezone'));

        $borisbobford = User::where('name', 'Boris Bobford')->firstOrFail();
        $borisbobford->created_at = new Carbon($borisbobford->created_at, config('timezone'));

        $bonniebobbington = User::where('name', 'Bonnie Bobbington')->firstOrFail();
        $bonniebobbington->created_at = new Carbon($bonniebobbington->created_at, config('timezone'));

        $billybobbly = User::where('name', 'Billy Bobbly')->firstOrFail();
        $billybobbly->created_at = new Carbon($billybobbly->created_at, config('timezone'));

        $bongobor = User::where('name', 'Bongo Bor')->firstOrFail();
        $bongobor->created_at = new Carbon($bongobor->created_at, config('timezone'));

        $users = [$bobbybob, $bobbertbob, $borisbobford, $bonniebobbington, $billybobbly, $bongobor];

        // Ben's posts
        DB::table('posts')->insert([
            'title' => 'Veggies es bonus vobis',
            'body' => 'Gumbo beet greens corn soko endive gumbo gourd. Parsley shallot courgette tatsoi pea sprouts fava bean collard greens dandelion okra wakame tomato. Dandelion cucumber earthnut pea peanut soko zucchini.',
            'user_id' => $ben->id,
            'created_at' => $ben->created_at->addMinutes(60),
            'updated_at' => $ben->created_at->addMinutes(rand(61, 600)),
        ]);

        DB::table('posts')->insert([
            'title' => 'proinde vos postulo essum',
            'body' => 'Turnip greens yarrow ricebean rutabaga endive cauliflower sea lettuce kohlrabi amaranth water spinach avocado daikon napa cabbage asparagus winter purslane kale. Celery potato scallion desert raisin horseradish spinach carrot soko. Lotus root water spinach fennel kombu maize bamboo shoot green bean swiss chard seakale pumpkin onion chickpea gram corn pea. Brussels sprout coriander water chestnut gourd swiss chard wakame kohlrabi beetroot carrot watercress. Corn amaranth salsify bunya nuts nori azuki bean chickweed potato bell pepper artichoke.',
            'user_id' => $ben->id,
            'created_at' => $ben->created_at->addMinutes(60),
            'updated_at' => $ben->created_at->addMinutes(rand(61, 600)),
        ]);

        DB::table('posts')->insert([
            'title' => 'Nori grape silver beet broccoli kombu beet greens fava bean potato quandong celery.',
            'body' => 'Bunya nuts black-eyed pea prairie turnip leek lentil turnip greens parsnip. Sea lettuce lettuce water chestnut eggplant winter purslane fennel azuki bean earthnut pea sierra leone bologi leek soko chicory celtuce parsley jícama salsify.',
            'user_id' => $ben->id,
            'created_at' => $ben->created_at->addMinutes(60),
            'updated_at' => $ben->created_at->addMinutes(rand(61, 600)),
        ]);

        DB::table('posts')->insert([
            'title' => 'Celery quandong',
            'body' => 'Salsify taro catsear garlic gram celery bitterleaf wattle seed collard greens nori. Grape wattle seed kombu beetroot horseradish carrot squash brussels sprout chard.',
            'user_id' => $ben->id,
            'created_at' => $ben->created_at->addMinutes(60),
            'updated_at' => $ben->created_at->addMinutes(rand(61, 600)),
        ]);

        DB::table('posts')->insert([
            'title' => 'Pea horseradish azuki bean',
            'body' => 'Kohlrabi radish okra azuki bean corn fava bean mustard tigernut jícama green bean celtuce collard greens avocado quandong fennel gumbo black-eyed pea. Grape silver beet watercress potato tigernut corn groundnut.',
            'user_id' => $ben->id,
            'created_at' => $ben->created_at->addMinutes(60),
            'updated_at' => $ben->created_at->addMinutes(rand(61, 600)),
        ]);




        // Other users' posts

        foreach ($users as $user) {

            $count = rand(5, 50);

            for ($i = 0; $i < $count; $i++) {

                DB::table('posts')->insert([
                    'title' => str_random(rand(5, 255)),
                    'body' => str_random(rand(100, 500)),
                    'user_id' => $user->id,
                    'created_at' => $user->created_at->addMinutes(60),
                    'updated_at' => $user->created_at->addMinutes(rand(61, 600)),
                ]);

            }

        }


    }
}
