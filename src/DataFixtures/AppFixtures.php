<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

use App\Entity\JobOffer;
use App\Entity\Category;
use App\Entity\Tag;


class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $category_names = ["Backend", "Frontend", "Fullstack"];
        $tag_names = ["PHP", "HTML5", "CSS3", "React.js", "JavaScript", "Symfony"];
        $categories = [];
        $tags = [];
        
        foreach($category_names as $name) {
            $category = new Category();
            $category->setName($name);
            array_push($categories, $category);
            $manager->persist($category);
        }

        foreach($tag_names as $name) {
            $tag = new Tag();
            $tag->setName($name);
            array_push($tags, $tag);
            $manager->persist($tag);
        }

        $manager->flush();

        // Create some job offers
        $jobOffer1 = new JobOffer();
        $jobOffer1->setTitle('Web Developer');
        $jobOffer1->setDescription('This is the first job offer');
        $jobOffer1->setCreatedAt(new \DateTimeImmutable());
        $jobOffer1->addTag($tags[0]);
        $jobOffer1->addTag($tags[5]);
        $jobOffer1->setCategory($categories[2]);

        $jobOffer2 = new JobOffer();
        $jobOffer2->setTitle('Senior Frontend Developer');
        $jobOffer2->setDescription('This is the second job offer');
        $jobOffer2->setCreatedAt(new \DateTimeImmutable());
        $jobOffer2->addTag($tags[1]);
        $jobOffer2->addTag($tags[2]);
        $jobOffer2->addTag($tags[3]);
        $jobOffer2->addTag($tags[4]);
        $jobOffer2->setCategory($categories[1]);

        // // Persist the job offers
        $manager->persist($jobOffer1);
        $manager->persist($jobOffer2);

        // // Flush the changes to the database
        $manager->flush();

        // $manager->flush();
    }
}