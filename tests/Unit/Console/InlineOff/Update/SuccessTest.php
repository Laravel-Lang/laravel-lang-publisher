<?php

/**
 * This file is part of the "Laravel-Lang/publisher" project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author Andrey Helldar <helldar@dragon-code.pro>
 *
 * @copyright 2022 Andrey Helldar
 *
 * @license MIT
 *
 * @see https://github.com/Laravel-Lang/publisher
 */

declare(strict_types=1);

namespace Tests\Unit\Console\InlineOff\Update;

use LaravelLang\Publisher\Constants\Locales;
use Tests\Unit\Console\InlineOff\TestCase;

class SuccessTest extends TestCase
{
    public function testDefaultWithInstalled(): void
    {
        $this->assertSame('All rights', $this->trans('All rights reserved.'));
        $this->assertSame('Forbidden', $this->trans('Forbidden'));
        $this->assertSame('Go to page', $this->trans('Go to page :page'));
        $this->assertSame('Hello!', $this->trans('Hello!'));

        $this->assertSame('These credentials do not match our records.', $this->trans('auth.failed'));
        $this->assertSame('The provided password is incorrect.', $this->trans('auth.password'));
        $this->assertSame('Too many login attempts. Please try again in :seconds seconds.', $this->trans('auth.throttle'));

        $this->assertSame('Next &raquo;', $this->trans('pagination.next'));
        $this->assertSame('&laquo; Previous', $this->trans('pagination.previous'));

        $this->assertSame('The :attribute must be accepted.', $this->trans('validation.accepted'));
        $this->assertSame('The :attribute must be accepted when :other is :value.', $this->trans('validation.accepted_if'));
        $this->assertSame('The :attribute is not a valid URL.', $this->trans('validation.active_url'));
        $this->assertSame('The :attribute must have between :min and :max items.', $this->trans('validation.between.array'));
        $this->assertSame('The :attribute must be between :min and :max kilobytes.', $this->trans('validation.between.file'));
        $this->assertSame('first name', $this->trans('validation.attributes.first_name'));
        $this->assertSame('last name', $this->trans('validation.attributes.last_name'));
        $this->assertSame('age', $this->trans('validation.attributes.age'));
        $this->assertSame('First name is required.', $this->trans('validation.custom.first_name.required'));
        $this->assertSame('First name must be a string.', $this->trans('validation.custom.first_name.string'));

        $this->artisan('lang:update')->run();

        $this->assertSame('Alle Rechte vorbehalten.', $this->trans('All rights reserved.'));
        $this->assertSame('Forbidden', $this->trans('Forbidden'));
        $this->assertSame('Go to page :page', $this->trans('Go to page :page'));
        $this->assertSame('Hello!', $this->trans('Hello!'));

        $this->assertSame('These credentials do not match our records.', $this->trans('auth.failed'));
        $this->assertSame('The provided password is incorrect.', $this->trans('auth.password'));
        $this->assertSame('Too many login attempts. Please try again in :seconds seconds.', $this->trans('auth.throttle'));

        $this->assertSame('Next &raquo;', $this->trans('pagination.next'));
        $this->assertSame('&laquo; Previous', $this->trans('pagination.previous'));

        $this->assertSame(':Attribute muss akzeptiert werden.', $this->trans('validation.accepted'));
        $this->assertSame('The :attribute must be accepted when :other is :value.', $this->trans('validation.accepted_if'));
        $this->assertSame('The :attribute is not a valid URL.', $this->trans('validation.active_url'));
        $this->assertSame(':Attribute muss zwischen :min & :max Elemente haben.', $this->trans('validation.between.array'));
        $this->assertSame(':Attribute muss zwischen :min & :max Kilobytes groß sein.', $this->trans('validation.between.file'));
        $this->assertSame('Vorname', $this->trans('validation.attributes.first_name'));
        $this->assertSame('last name', $this->trans('validation.attributes.last_name'));
        $this->assertSame('age', $this->trans('validation.attributes.age'));
        $this->assertSame('Dieses Vorname muss ausgefüllt werden.', $this->trans('validation.custom.first_name.required'));
        $this->assertSame('First name must be a string.', $this->trans('validation.custom.first_name.string'));
    }

    public function testFallbackWithInstalled(): void
    {
        $this->fallback_locale = Locales::FRENCH;

        $this->assertSame('Tous droits réservés.', $this->trans('All rights reserved.'));
        $this->assertSame('Interdit', $this->trans('Forbidden'));
        $this->assertSame('Aller à la page :page', $this->trans('Go to page :page'));
        $this->assertSame('Bonjour !', $this->trans('Hello!'));

        $this->assertSame('Ces identifiants ne correspondent pas à nos enregistrements.', $this->trans('auth.failed'));
        $this->assertSame('Le mot de passe fourni est incorrect.', $this->trans('auth.password'));
        $this->assertSame('Tentatives de connexion trop nombreuses. Veuillez essayer de nouveau dans :seconds secondes.', $this->trans('auth.throttle'));

        $this->assertSame('Suivant &raquo;', $this->trans('pagination.next'));
        $this->assertSame('&laquo; Précédent', $this->trans('pagination.previous'));

        $this->assertSame('Le champ :attribute doit être accepté.', $this->trans('validation.accepted'));
        $this->assertSame('Le champ :attribute doit être accepté quand :other a la valeur :value.', $this->trans('validation.accepted_if'));
        $this->assertSame('Le champ :attribute n\'est pas une URL valide.', $this->trans('validation.active_url'));
        $this->assertSame('Le tableau :attribute doit contenir entre :min et :max éléments.', $this->trans('validation.between.array'));
        $this->assertSame('La taille du fichier de :attribute doit être comprise entre :min et :max kilo-octets.', $this->trans('validation.between.file'));
        $this->assertSame('prénom', $this->trans('validation.attributes.first_name'));
        $this->assertSame('nom', $this->trans('validation.attributes.last_name'));
        $this->assertSame('âge', $this->trans('validation.attributes.age'));
        $this->assertSame('Le champ :attribute est obligatoire.', $this->trans('validation.custom.first_name.required'));
        $this->assertSame('Le champ :attribute doit être une chaîne de caractères.', $this->trans('validation.custom.first_name.string'));

        $this->artisan('lang:update')->run();

        $this->assertSame('Alle Rechte vorbehalten.', $this->trans('All rights reserved.'));
        $this->assertSame('Interdit', $this->trans('Forbidden'));
        $this->assertSame('Aller à la page :page', $this->trans('Go to page :page'));
        $this->assertSame('Bonjour !', $this->trans('Hello!'));

        $this->assertSame('Ces identifiants ne correspondent pas à nos enregistrements.', $this->trans('auth.failed'));
        $this->assertSame('Le mot de passe fourni est incorrect.', $this->trans('auth.password'));
        $this->assertSame('Tentatives de connexion trop nombreuses. Veuillez essayer de nouveau dans :seconds secondes.', $this->trans('auth.throttle'));

        $this->assertSame('Suivant &raquo;', $this->trans('pagination.next'));
        $this->assertSame('&laquo; Précédent', $this->trans('pagination.previous'));

        $this->assertSame(':Attribute muss akzeptiert werden.', $this->trans('validation.accepted'));
        $this->assertSame('Le champ :attribute doit être accepté quand :other a la valeur :value.', $this->trans('validation.accepted_if'));
        $this->assertSame('Le champ :attribute n\'est pas une URL valide.', $this->trans('validation.active_url'));
        $this->assertSame(':Attribute muss zwischen :min & :max Elemente haben.', $this->trans('validation.between.array'));
        $this->assertSame(':Attribute muss zwischen :min & :max Kilobytes groß sein.', $this->trans('validation.between.file'));
        $this->assertSame('Vorname', $this->trans('validation.attributes.first_name'));
        $this->assertSame('nom', $this->trans('validation.attributes.last_name'));
        $this->assertSame('âge', $this->trans('validation.attributes.age'));
        $this->assertSame('Dieses Vorname muss ausgefüllt werden.', $this->trans('validation.custom.first_name.required'));
        $this->assertSame('Le champ :attribute doit être une chaîne de caractères.', $this->trans('validation.custom.first_name.string'));
    }
}
