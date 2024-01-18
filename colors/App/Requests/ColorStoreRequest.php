<?php

namespace Colors\App\Requests;

use Colors\App\Message;


class ColorStoreRequest {

    public static function validate($request) {

        $color = $request['color'] ?? null;
        $size = $request['size'] ?? null;

        if (!$color) {
            Message::get()->set('danger', 'Color is required');
        } elseif (!preg_match('/^#[a-f0-9]{6}$/i', $color)) {
            Message::get()->set('danger', 'Color is not valid');
        }

        if (!$size) {
            Message::get()->set('danger', 'Size is required');
        } elseif (!is_numeric($size)) {
            Message::get()->set('danger', 'Size is not valid');
        } elseif ($size < 0 || $size > 90) {
            Message::get()->set('danger', 'Size must be between 0 and 90');
        }

        if (Message::get()->hasErrors()) {
            return false;
        }

        return true;
    }
}