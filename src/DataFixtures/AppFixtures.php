<?php

namespace App\DataFixtures;

use App\Entity\Resume;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class AppFixtures extends Fixture
{


    public function __construct() {
    }

    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('ru_RU');

        $posts = array();
        $educationType = array();
        $skills = array();

        $posts = [
            'frontend programmist',
            'product manager',
            'lead',
            'backend programmist',
            'project manager',
        ];

        $educationType = [
            'secondary education',
            'secondary special education',
            'incomplete higher education',
            'higher education',
        ];

        $skillsList = [
            'php',
            'sql',
            'js',
            'vue',
            'react',
            'python',
            'c#',
            'c++',
            'ruby',
            'golang'
        ];

        for ($i = 0; $i < 40; $i++) {
            $resume = new Resume();
            $resume->setFullname($faker->name);
            $resume->setCity($faker->city);
            $resume->setEmail($faker->email);
            $resume->setPhoneNumber($faker->e164PhoneNumber);

            if ($i < 10) {
                $resume->setResumeStatus('new');
            } elseif ($i >= 10 && $i < 20) {
                $resume->setResumeStatus('interview scheduled');
            } elseif ($i >= 20 && $i < 30) {
                $resume->setResumeStatus('hired');
            } else {
                $resume->setResumeStatus('refused');
            }

            $resume->setProfession($posts[rand(0,4)]);
            $resume->setImageURL($this->getImageUrlFromLorem());
            $resume->setDateBirth(\DateTime::createFromFormat('Y-m-d', $faker->date($format = 'Y-m-d', $max = 'now')));

            $edctType = rand(0,3);

            $resume->setEducationType($educationType[$edctType]);

            if ($edctType > 0) {
                $resume->setEducationList(
                    [
                    '0' => [
                            'educational_institution' => 'ei 0',
                            'faculty' => 'Faculty 0',
                            'specialization' => 'Specialization 0',
                            'year_ending' => '2016'
                        ],
                    '1' => [
                            'educational_institution' => 'ei 1',
                            'faculty' => 'Faculty 1',
                            'specialization' => 'Specialization 1',
                            'year_ending' => '2017'
                        ],
                    ]
                    );
            }

            $resume->setSalary($faker->randomFloat($nbMaxDecimals = 2, $min = 3000.00, $max = 20000.00));

            $skills = '';

            $skills_number = rand(0,9);

            for ($j = 0; $j < $skills_number; $j++) {
                $skills .= $skillsList[$j] . ' ';
            }

            $resume->setSkills($skills);
            $resume->setAbout('good person and other soft skills');

            $manager->persist($resume);

            $manager->flush();

            echo "resume #$i was created\n";
            sleep(2);
        }
    }

    public function getImageUrlFromLorem() {

        $url="https://loremflickr.com/640/360/";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true); // Must be set to true so that PHP follows any "Location:" header
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $a = curl_exec($ch); // $a will contain all headers

        $url = curl_getinfo($ch, CURLINFO_EFFECTIVE_URL); // This is what you need, it will return you the last effective URL

        return $url;
    }
}