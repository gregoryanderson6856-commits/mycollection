<?php

arch('no debug statements left in the codebase')
    ->expect('App')
    ->not->toUse(['dd', 'dump', 'var_dump', 'ray']);

arch('models extend Eloquent')
    ->expect('App\Models')
    ->toExtend('Illuminate\Database\Eloquent\Model')
    ->toBeClasses();
/*
arch('jobs implement ShouldQueue')
    ->expect('App\Jobs')
    ->toImplement('Illuminate\Contracts\Queue\ShouldQueue');
*/
arch('controllers stay in the HTTP layer')
    ->expect('App\Http\Controllers')
    ->toOnlyBeUsedIn('App\Http');
arch()
    ->expect('App\Http')
    ->toOnlyBeUsedIn('App\Http');
/*
arch()
   ->expect('App\*\Traits')
   ->toBeTraits();
*/
arch()->preset()->php();
arch()->preset()->security()->ignoring('md5');

arch('Cased Correctly')
    ->expect('App')
    ->toBeCasedCorrectly();

arch('No Suspicious Characters')
    ->expect('App\Http\Controllers')
    ->not->toHaveSuspiciousCharacters();
