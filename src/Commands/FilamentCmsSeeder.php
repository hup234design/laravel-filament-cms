<?php

namespace Hup234design\FilamentCms\Commands;

use Carbon\Carbon;
use Faker\Factory as Faker;;

use Hup234design\FilamentCms\Models\Event;
use Hup234design\FilamentCms\Models\EventCategory;
use Hup234design\FilamentCms\Models\Page;
use Hup234design\FilamentCms\Models\Post;
use Hup234design\FilamentCms\Models\PostCategory;
use Hup234design\FilamentCms\Models\Project;
use Hup234design\FilamentCms\Models\ProjectCategory;
use Hup234design\FilamentCms\Models\Service;
use Hup234design\FilamentCms\Models\Testimonial;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Str;

class FilamentCmsSeeder extends Command
{
    public $signature = 'cms:seed';

    public $description = 'Seeds CMS content into your project.';

    public function handle(): int
    {
        //$this->warn('This will seed Filament CMS into your project and replace existing content.');

        //$confirmed = $this->confirm('Do you wish to continue?', true);

        $this->seed();

        return self::SUCCESS;
    }

    protected function seed()
    {
        $faker = Faker::create();

        // disable foreign key checks
        //DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // truncate all tables
        DB::table('pages')->truncate();
        //DB::table('posts')->truncate();
        //DB::table('post_categories')->truncate();
        //DB::table('services')->truncate();
        //DB::table('projects')->truncate();
        //DB::table('project_categories')->truncate();
        //DB::table('events')->truncate();
        //DB::table('event_categories')->truncate();
        //DB::table('testimonials')->truncate();

        // enable foreign key checks
//        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        Page::create([
            'title'   => 'Home',
            'slug'    => 'home',
            'content' => $this->makeContent(),
            'home'    => true,
        ]);

        $this->info('Home Page Created');

        $pages = [
            'about'            => 'About',
            'contact'          => 'Contact',
            'terms-conditions' => 'Terms & Conditions',
            'privacy-policy'   => 'Privacy Policy',
            'cookie-policy'    => 'Cookie Policy',
        ];

        foreach ($pages as $slug=>$title) {
            Page::create([
                'title'   => $title,
                'slug'    => $slug,
                'content' => $this->makeContent(),
                'home'    => false,
            ]);
        }

        $this->info(Page::count()-1 . ' Additional Pages Created');

        // $categories = [
        //     'blog' => 'Blog',
        //     'news' => 'News',
        //     'press-release' => 'Press Release',
        // ];

        // foreach ($categories as $name=>$slug) {
        //     PostCategory::create([
        //         'name' => $name,
        //         'slug' => $slug,
        //         'summary' => $this->makeSummary(),
        //     ]);
        // }

        // $this->info(PostCategory::count() . ' Post Categories Created');

        // $published_at = Carbon::now();

        // for ($x = rand(20,30); $x >= 1; $x--) {
        //     $published = rand(1,5) < 5;
        //     Post::create([
        //         'post_category_id' => rand(1, count($categories)),
        //         'title'            => "Post {$x}",
        //         'slug'             => "post-{$x}",
        //         'summary'          => $this->makeSummary(),
        //         'content'          => $this->makeContent(),
        //         'published'        => $published,
        //         'published_at'     => $published ? $published_at : null,
        //     ]);

        //     $published_at->subDays(rand(2, 5))->subHours(rand(1, 24))->subMinutes(rand(1, 60))->subSeconds(rand(1, 60));
        // }

        // $this->info(Post::count() . ' Posts Created');

        // for ($x = 1; $x <= rand(8,10); $x++) {
        //     Service::create([
        //         'title'        => "Service {$x}",
        //         'slug'         => "service-{$x}",
        //         'summary'      => $this->makeSummary(),
        //         'content'      => $this->makeContent()
        //     ]);
        // }

        // $this->info(Service::count() . ' Services Created');

        // $received_at = Carbon::now();

        // for ($x = rand(15,25); $x >= 1; $x--) {

        //     $location  = rand(1,5) < 5 ? $faker->city : null;
        //     $company   = rand(1,5) < 5 ? $faker->company : null;
        //     $job_title = $company && (rand(1,5) < 5) ? $faker->jobTitle : null;

        //     Testimonial::create([
        //         'name'         => $faker->firstName . " " . $faker->lastName,
        //         'location'     => $location,
        //         'company'      => $company,
        //         'job_title'    => $job_title,
        //         'received_at'  => $received_at,
        //         'content'      => $this->makeContent(1)
        //     ]);

        //     $received_at->subDays(rand(2, 5))->subHours(rand(1, 24))->subMinutes(rand(1, 60))->subSeconds(rand(1, 60));
        // }

        // $this->info(Testimonial::count() . ' Testimonials Created');

        // $categories = [
        //     'music' => 'Music',
        //     'sport' => 'Sport',
        //     'drama' => 'Drama',
        //     'education' => 'Education',
        // ];

        // foreach ($categories as $name=>$slug) {
        //     EventCategory::create([
        //         'name' => $name,
        //         'slug' => $slug,
        //         'summary' => $this->makeSummary(),
        //     ]);
        // }

        // $this->info(EventCategory::count() . ' Event Categories Created');


        // $date = Carbon::now()->addMonths(rand(12, 18))->addWeeks(rand(2, 4))->addDays(rand(2, 5));

        // $times = [
        //     [ 'start_time' => null, 'end_time' => null ],
        //     [ 'start_time' => '09:00', 'end_time' => '17:30' ],
        //     [ 'start_time' => '10:00', 'end_time' => '16:00' ],
        //     [ 'start_time' => '12:00', 'end_time' => '17:00' ],
        //     [ 'start_time' => '19:30', 'end_time' => '22:00' ],
        //     [ 'start_time' => '19:30', 'end_time' => '23:00' ],
        //     [ 'start_time' => '20:00', 'end_time' => '23:30' ],
        // ];

        // for ($x = rand(20,30); $x >= 1; $x--) {
        //     $visible = rand(1,10) < 10;
        //     $time = rand(0,6);
        //     Event::create([
        //         'event_category_id' => rand(1, count($categories)),
        //         'title'             => "Event {$x}",
        //         'slug'              => "event-{$x}",
        //         'summary'           => $this->makeSummary(),
        //         'content'           => $this->makeContent(),
        //         'visible'           => $visible,
        //         'date'              => $date,
        //         'start_time'        => $times[$time]['start_time'],
        //         'end_time'          => $times[$time]['end_time'],
        //     ]);

        //     $date->subMonths(rand(1, 2))->subWeeks(rand(1, 4))->subDays(rand(2, 5));
        // }

        // $this->info(Event::count() . ' Events Created');

        // $categories = [
        //     'cat-a' => 'Category A',
        //     'cat-b' => 'Category B',
        //     'cat-c' => 'Category C',
        // ];

        // foreach ($categories as $name=>$slug) {
        //     ProjectCategory::create([
        //         'name' => $name,
        //         'slug' => $slug,
        //         'summary' => $this->makeSummary(),
        //     ]);
        // }

        // $this->info(ProjectCategory::count() . ' Project Categories Created');

        // $date = Carbon::now();

        // for ($x = rand(10,15); $x >= 1; $x--) {
        //     $visible = rand(1,5) < 5;
        //     Project::create([
        //         'project_category_id' => rand(1, count($categories)),
        //         'title'               => "Project {$x}",
        //         'slug'                => "project-{$x}",
        //         'summary'             => $this->makeSummary(),
        //         'content'             => $this->makeContent(),
        //         'visible'             => $visible,
        //         'date'                => $date,
        //     ]);

        //     $date->subDays(rand(2, 5))->subHours(rand(1, 24))->subMinutes(rand(1, 60))->subSeconds(rand(1, 60));
        // }

        // $this->info(Project::count() . ' Projects Created');

    }

    protected function makeContent($paragraphs = null)
    {
        $faker = Faker::create();
        $content = '';

        $paragraphs = $paragraphs ?: rand(2, 3);

        for ($x = 1; $x <= $paragraphs; $x++) {
            $content .= '<p>'.implode(' ', $faker->paragraphs(rand(4, 6))).'</p>';
        }

        return $content;
    }

    protected function makeSummary()
    {
        $faker = Faker::create();
        $summary = $faker->sentences(rand(4, 8));

        return implode(' ', $summary);
    }
}
