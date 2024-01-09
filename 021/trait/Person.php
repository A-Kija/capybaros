<?php


class Person extends Sing {

    use Stories, Paint {
        Paint::scrolling insteadof Stories;
        Stories::scrolling as scrolling2;
    }

    // public $song = 'la ku, ku, bam, bam';

    public function sayHello() {
        echo '<h1>Hello</h1>';
    }

    // public function scrolling() {
    //     echo '<h1>TikTok</h1>';
    // }

}