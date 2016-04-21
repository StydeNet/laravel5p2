<?php

Route::group(['prefix' => 'v1/'], function () {

    Route::get('upper/{word}', function ($word) {
        return [
            'original' => $word,
            'upper'    => strtoupper($word)
        ];
    });

});