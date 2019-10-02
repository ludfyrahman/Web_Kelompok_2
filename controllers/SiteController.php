<?php


App::LoadModels(['Restoran', 'Hotel', 'Event', 'Pariwisata', 'Slider']);
class SiteController {
    private $restoran, $hotel, $event, $pariwisata, $slider;

    public function __construct() {
        $this->hotel = new Hotel;
        $this->restoran = new Restoran;
        $this->event = new Event;
        $this->pariwisata = new Pariwisata;
        $this->slider = new Slider;
    }

    public function home() {
        $slider = $this->slider->Select('*', "", "ORDER BY position ASC LIMIT 0, 5")[1];
        $pariwisata = $this->pariwisata->Select('title, cover, permalink, text, name', "p JOIN kabupaten k ON p.kabupaten_id = k.id", "ORDER BY p.id DESC LIMIT 0, 4")[1];
        $restoran = $this->restoran->Select('title, cover, permalink, text, name', "p JOIN kabupaten k ON p.kabupaten_id = k.id", "ORDER BY p.id DESC LIMIT 0, 10")[1];
        $hotel = $this->hotel->Select('title, cover, permalink, text, name', "p JOIN kabupaten k ON p.kabupaten_id = k.id", "ORDER BY p.id DESC LIMIT 0, 10")[1];
        $event = $this->event->Select('*', "", "ORDER BY id DESC LIMIT 0, 4")[1];

        Response::render('front/index', ['title' => 'Jelajahin Homepage', 'content' => 'site/home', 'pariwisata' => $pariwisata, 'restoran' => $restoran, 'hotel' => $hotel, 'event' => $event, 'slider' => $slider]);
    }

    public function filter() {
        $kw = Input::getOr('kw');
        $ty = strtolower(Input::getOr('ty'));

        $lists = [0, []];

        if($ty == 'pariwisata') {
            $lists = $this->pariwisata->Select('*', "WHERE title LIKE '%$kw%'", "ORDER BY id DESC");
        }
        else if($ty == 'event') {
            $lists = $this->event->Select('*', "WHERE title LIKE '%$kw%'", "ORDER BY id DESC");
        }
        else if($ty == 'hotel') {
            $lists = $this->hotel->Select('*', "WHERE title LIKE '%$kw%'", "ORDER BY id DESC");
        }
        else if($ty == 'restaurant') {
            $lists = $this->restoran->Select('*', "WHERE title LIKE '%$kw%'", "ORDER BY id DESC");
        }

        Response::render('front/index', ['title' => 'Jelajahin Filter', 'content' => 'site/filter', 'lists' => $lists[1], 'type' => $ty]);
    }

    public function sitemap() {
        header("Content-Type: application/xml");

        echo "<?xml version='1.0' encoding='UTF-8' ?>";
        echo "<urlset xmns='http://sitemaps.org/schemas/sitemap/0.9'>";
        $this->createLink(BASEURL);

        $pariwisata = $this->pariwisata->Select("title, cover, permalink, text, name, 'pariwisata' type", "p JOIN kabupaten k ON p.kabupaten_id = k.id", "ORDER BY p.id DESC")[1];
        $restoran = $this->restoran->Select("title, cover, permalink, text, name, 'restaurant' type", "p JOIN kabupaten k ON p.kabupaten_id = k.id", "ORDER BY p.id DESC")[1];
        $hotel = $this->hotel->Select("title, cover, permalink, text, name, 'hotel' type", "p JOIN kabupaten k ON p.kabupaten_id = k.id", "ORDER BY p.id DESC")[1];
        $event = $this->event->Select("'event' type, permalink", "", "ORDER BY id DESC LIMIT 0, 4")[1];
        
        foreach(array_merge($pariwisata, $restoran, $hotel, $event) as $c)
            $this->createLink(BASEURL . "$c[type]/$c[permalink]/");
        
        echo "</urlset>";
    }

    public function createLink($link) {
        echo "<url>";
        echo "<loc>$link</loc>";
        echo "<priority>0.5</priority>";
        echo "</url>";
    }
}