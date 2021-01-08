<?php

namespace QEEMA\controllers;

use QEEMA\models\Articles;
use QEEMA\models\Category;
use QEEMA\models\Clients;
use QEEMA\models\ComingWorkout;
use QEEMA\models\Contact;
use QEEMA\models\CourseRates;
use QEEMA\models\Courses;
use QEEMA\models\Dialect;
use QEEMA\models\Languages;
use QEEMA\models\Messages;
use QEEMA\models\Portfolio;
use QEEMA\models\Service;
use QEEMA\models\SocialLinks;
use QEEMA\models\TermsOfUse;
use QEEMA\models\Users;
use QEEMA\models\VoiceBooks;
use QEEMA\models\VoiceRates;
use QEEMA\models\Voices;
use QEEMA\models\WorkoutBooks;
use QEEMA\models\Workouts;

class DbController extends AbstractController
{
    public function defaultAction()
    {
        $languages = new Languages();
        $languages->createTable();
        $languages->addToTable([
            ['name'=>'en','dir'=>'ltr'],
            ['name'=>'ar','dir'=>'rtl']
        ]);

        $termsOfUse = new TermsOfUse();
        $termsOfUse->createTable();
        $termsOfUse->addToTable([
            ['id' => 'priv','term'=>'Lorem Ipsum Dolor Sit Amet, Consetetur Sadipscing Elitr, Sed Diam Nonumy Eirmod Tempor Invidunt Ut Labore Et Dolore Magna Aliquyam Erat, Sed Diam Voluptua. At Vero Eos Et Accusam Et Justo Duo Dolores Et Ea Rebum. Stet Clita Kasd Gubergren, No Sea Takimata Sanctus Est Lorem Ipsum Dolor Sit Amet. Lorem Ipsum Dolor Sit Amet, Consetetur Sadipscing Elitr, Sed Diam Nonumy Eirmod Tempor Invidunt Ut Labore Et Dolore Magna Aliquyam Erat, Sed Diam Voluptua. At Vero Eos Et Accusam Et Justo Duo Dolores Et Ea Rebum. Stet Clita Kasd Gubergren, No Sea Takimata Sanctus Est Lorem Ipsum Dolor Sit Amet.'],
            ['id' => 'terms','term'=>'Lorem Ipsum Dolor Sit Amet, Consetetur Sadipscing Elitr, Sed Diam Nonumy Eirmod Tempor Invidunt Ut Labore Et Dolore Magna Aliquyam Erat, Sed Diam Voluptua. At Vero Eos Et Accusam Et Justo Duo Dolores Et Ea Rebum. Stet Clita Kasd Gubergren, No Sea Takimata Sanctus Est Lorem Ipsum Dolor Sit Amet. Lorem Ipsum Dolor Sit Amet, Consetetur Sadipscing Elitr, Sed Diam Nonumy Eirmod Tempor Invidunt Ut Labore Et Dolore Magna Aliquyam Erat, Sed Diam Voluptua. At Vero Eos Et Accusam Et Justo Duo Dolores Et Ea Rebum. Stet Clita Kasd Gubergren, No Sea Takimata Sanctus Est Lorem Ipsum Dolor Sit Amet.']
        ]);

        $socialLinks = new SocialLinks();
        $socialLinks->createTable();
        $socialLinks->addToTable([
            ['id'=>'bahance','link'=>'https://www.behance.com/','class'=>'fa fa-behance'],
            ['id'=>'youtube','link'=>'https://www.youtube.com/','class'=>'fa fa-youtube'],
            ['id'=>'twitter','link'=>'https://www.twitter.com/','class'=>'fa fa-twitter'],
            ['id'=>'facebook','link'=>'https://www.facebook.com/','class'=>'fa fa-facebook'],
            ['id'=>'instagram','link'=>'https://www.instagram.com/','class'=>'fa fa-instagram'],
            ['id'=>'linkedin','link'=>'https://www.linkedin.com/','class'=>'fa fa-linkedin'],
            ['id'=>'whatsapp','link'=>'https://www.whatsapp.com/','class'=>'fa fa-whatsapp']
        ]);

        $portfolio = new Portfolio();
        $portfolio->createTable();
        $portfolio->addToTable([
            ['link' => 'hlznpxNGFGQ'],      // https://www.youtube.com/embed/{{video_id}}
            ['link' => 'Nj2U6rhnucI'],
            ['link' => 'sJXZ9Dok7u8'],
            ['link' => 'I-QfPUz1es8'],
            ['link' => 'mWRsgZuwf_8'],
            ['link' => 'tt2k8PGm-TI']
        ]);

        $services = new Service();
        $services->createTable();
        $services->addToTable([
            ['img' => '1.png', 'file'=>'1'],
            ['img' => '2.png', 'file'=>'2'],
            ['img' => '3.png', 'file'=>'3'],
            ['img' => '4.png', 'file'=>'4'],
            ['img' => '5.png', 'file'=>'5'],
            ['img' => '6.png', 'file'=>'6']
        ]);

        $clients = new Clients();
        $clients->createTable();
        $clients->addToTable([
            ['img' => 'client01.png','name'=>'client01'],
            ['img' => 'client02.png','name'=>'client02'],
            ['img' => 'client03.png','name'=>'client03'],
            ['img' => 'client04.png','name'=>'client04']
        ]);

        $contact = new Contact();
        $contact->createTable();

        $messages = new Messages();
        $messages->createTable();

        $category = new Category();
        $category->createTable();
        $category->addToTable([
            ['name'=>'motion','file'=>'Motion'],
            ['name'=>'tv','file'=>'TV_advertisement'],
            ['name'=>'promo','file'=>'Promo']
        ]);

        $dialect = new Dialect();
        $dialect->createTable();
        $dialect->addToTable([
            ['name'=>'saudi','file'=>'Saudi'],
            ['name'=>'egyptian','file'=>'Egyptian'],
            ['name'=>'jordanian','file'=>'Jordanian']
        ]);

        $voices = new Voices();
        $voices->createTable();

        $articles = new Articles();
        $articles->createTable();

        $workouts = new Workouts();
        $workouts->createTable();

        $courses = new Courses();
        $courses->createTable();

        $users = new Users();
        $users->createTable();

        $voiceBook = new VoiceBooks();
        $voiceBook->createTable();

        $voiceRate = new VoiceRates();
        $voiceRate->createTable();

        $courseRate = new CourseRates();
        $courseRate->createTable();

        $comingWorkout = new ComingWorkout();
        $comingWorkout->createTable();

        $workoutBook = new WorkoutBooks();
        $workoutBook->createTable();
    }
}
