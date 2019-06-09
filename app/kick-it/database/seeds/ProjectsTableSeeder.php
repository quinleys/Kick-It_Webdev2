<?php

use Illuminate\Database\Seeder;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('projects')->insert([
            'name' => 'imagiCharm: the accessory every girl will love to program',
            'shortintro' => 'Empowering girls to explore their creativity and learn programming straight from their phone.',
            'intro' => 'Empowering girls to explore their creativity and learn programming straight from their phone.',
            'description' => 'Sara is an awesome mom from Stockholm who encouraged her daughter Linn to attend our beginner coding workshop where we tested our imagiCharm prototypes and app curriculum. Now a big fan and reoccurring workshop attendee, Linn is learning how to become a coding pro and loves programming fun projects with her friends. Anurag works with bridging the gap between education and technology at Stockholm International School where he helps to design and facilitate technology initiatives within the curriculums. His students participated in a coding workshop with the imagiLabs team and were able to explore the imagiLabs app and imagiCharm during the prototype phase. Now becoming a reality, imagiCharm is a great product for all students to tangibly see the results of their code and express themselves creatively. ',
            'creditgoal' => 200,
            'credits' => 100,
            'user_id' => 1,
            'filename' => 'test',
            'category_id' => 3,
            'created_at' => '2019-06-08 14:20:53',
            'updated_at' => '2019-06-08 14:20:53'
        ]);
        DB::table('projects')->insert([
            'name' => 'Lupe Cordless Vacuum Cleaner. Powerful. Enduring. Flexible.',
            'shortintro' => 'Say hello to the Lupe Pure Cordless. ',
            'intro' => 'Say hello to the Lupe Pure Cordless. ',
            'description' => 'Especially in cordless vacuums, many companies launch new products year after year which drives perfectly usable, or easily repairable product to waste.

            Lupe is different. And the Pure Cordless is different. It is fully serviceable and almost every part can be replaced. It has been designed to be as long-lasting as possible: using the best components and materials. We are so confident in this we are offering all our Kickstarter backers a special 7 year warranty (see below for details).
            
            Its been designed to be as easy to maintain as possible. We will support long-term ownership through open supply of spares and making upgrades available to battery packs and motors as technology moves on. 
            
            You dont throw your whole bicycle away if you want to upgrade a wheel or fit a new tyre - we take that approach to vacuum cleaners.  
            
            We all need great performing products but in an age of huge waste a more conscious effort is required to make essential products last just a little longer. 
            
            Its our founding principle.',
            'creditgoal' => 500,
            'credits' => 230,
            'user_id' => 2,
            'filename' => 'test',
            'category_id' => 2,
            'created_at' => '2019-06-08 14:20:53',
            'updated_at' => '2019-06-08 14:20:53'
        ]);
        DB::table('projects')->insert([
            'name' => 'Travel Tripod by Peak Design',
            'shortintro' => 'Were a San Francisco based product design company, and we pride ourselves in doing things a bit differently.
            Were entirely crowdfunded and are live with our 9th Kickstarter project. We have no outside investors, no revenue goals, no PowerPoint presentations. That means its just us, our backers, and our brilliantly skilled suppliers. ',
            'intro' => 'Were a San Francisco based product design company, and we pride ourselves in doing things a bit differently.
            Were entirely crowdfunded and are live with our 9th Kickstarter project. We have no outside investors, no revenue goals, no PowerPoint presentations. That means its just us, our backers, and our brilliantly skilled suppliers. ',
            'description' => 'But we didnt stop at space savings. 
            We made a tool that deploys and packs down rapidly—nearly twice as fast as a traditional tripod. We made it intuitive and delightful to use. We engineered professional-quality stability and performance. And we added thoughtful features to help you get the shot— with any gear, in any environment, from any point of view.  
            We built the Travel Tripod around the photographers workflow. How? We are photographers.',
            'creditgoal' => 1000,
            'credits' => 300,
            'user_id' => 3,
            'filename' => 'test',
            'category_id' => 4,
            'created_at' => '2019-06-08 14:20:53',
            'updated_at' => '2019-06-08 14:20:53'
        ]);
        DB::table('projects')->insert([
            'name' => 'Theater of Terror: Revenge of the Queers',
            'shortintro' => 'Weve sold several of the ORIGINAL ART rewards and lined up some with new artists. There are currently art rewards from William O. Tyler, Diego Gómez, and Emeric Kennard.',
            'intro' => 'Weve sold several of the ORIGINAL ART rewards and lined up some with new artists. There are currently art rewards from William O. Tyler, Diego Gómez, and Emeric Kennard.',
            'description' => "The book will be published by Seattle publisher Northwest Press, a small press specializing in LGBTQ comics and graphic novels. They've teamed up with award-winning editor Justin Hall (No Straight Lines, Hard to Swallow) and assistant editor William O. Tyler (The Goth Queen Needs a Mate) to produce Theater of Terror: Revenge of the Queers.",
            'creditgoal' => 420,
            'credits' => 42,
            'user_id' => 4,
            'filename' => 'test',
            'category_id' => 3,
            'created_at' => '2019-06-08 17:20:53',
            'updated_at' => '2019-06-08 17:20:53'
        ]);
        DB::table('projects')->insert([
            'name' => 'Mary Lambert: Grief Creature',
            'shortintro' => "Grief Creature is my life's work, my masterpiece, a break-up album to shame, an ode to mental illness, a love letter to hope.",
            'intro' => "Grief Creature is my life's work, my masterpiece, a break-up album to shame, an ode to mental illness, a love letter to hope.",
            'description' => "I've never been more terrified to release a project. Grief Creature is my life's work. A collection of the best songs I've ever written, paired with poems and beautiful orchestration. In confidence with loved ones, I refer to this album as my masterpiece.

            This album has taken 5 years and gone through 20 different incarnations; different titles, release dates, multiple versions of songs, producers, studios, poems, features, maybe partnering with a label, maybe locking it in a vault because every track is really scary and vulnerable. As terrifying as releasing this album is, I know how important it has been for my own healing, and I believe it might help other people who deal with the same kind of trauma and experiences that I have. ",
            'creditgoal' => 600,
            'credits' => 5,
            'user_id' => 2,
            'filename' => 'test',
            'category_id' => 5,
            'created_at' => '2019-06-08 17:20:53',
            'updated_at' => '2019-06-08 17:20:53'
        ]);
        DB::table('projects')->insert([
            'name' => 'Flic 2: The Perfect Button - Control anything with a push',
            'shortintro' => "You don’t talk to it, you don’t swipe it, you don’t unlock it… just push a button! The Swedish Smart Button is back, perfected.",
            'intro' => "You don’t talk to it, you don’t swipe it, you don’t unlock it… just push a button! The Swedish Smart Button is back, perfected.",
            'description' => "There are a large number of integrations already in the Flic App and ready to use! Through third-party services such as IFTTT, Zapier, and Microsoft Flow, practically anything is possible. And if you're an advanced tech user, with our versatile HTTP Request function you can write your own commands in the Flic App. There are a large number of integrations already in the Flic App and ready to use! Through third-party services such as IFTTT, Zapier, and Microsoft Flow, practically anything is possible. And if you're an advanced tech user, with our versatile HTTP Request function you can write your own commands in the Flic App. ",
            'creditgoal' => 200,
            'credits' => 100,
            'user_id' => 3,
            'filename' => 'test',
            'category_id' => 6,
            'created_at' => '2019-06-08 17:20:53',
            'updated_at' => '2019-06-08 17:20:53'
        ]);
    }
}
