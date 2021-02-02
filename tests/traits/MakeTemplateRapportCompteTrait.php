<?php

use Faker\Factory as Faker;
use App\Models\TemplateRapportCompte;
use App\Repositories\TemplateRapportCompteRepository;

trait MakeTemplateRapportCompteTrait
{
    /**
     * Create fake instance of TemplateRapportCompte and save it in database
     *
     * @param array $templateRapportCompteFields
     * @return TemplateRapportCompte
     */
    public function makeTemplateRapportCompte($templateRapportCompteFields = [])
    {
        /** @var TemplateRapportCompteRepository $templateRapportCompteRepo */
        $templateRapportCompteRepo = App::make(TemplateRapportCompteRepository::class);
        $theme = $this->fakeTemplateRapportCompteData($templateRapportCompteFields);
        return $templateRapportCompteRepo->create($theme);
    }

    /**
     * Get fake instance of TemplateRapportCompte
     *
     * @param array $templateRapportCompteFields
     * @return TemplateRapportCompte
     */
    public function fakeTemplateRapportCompte($templateRapportCompteFields = [])
    {
        return new TemplateRapportCompte($this->fakeTemplateRapportCompteData($templateRapportCompteFields));
    }

    /**
     * Get fake data of TemplateRapportCompte
     *
     * @param array $postFields
     * @return array
     */
    public function fakeTemplateRapportCompteData($templateRapportCompteFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'compte_id' => $fake->randomDigitNotNull,
            'rang' => $fake->randomDigitNotNull,
            'template_rapport_id' => $fake->randomDigitNotNull,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $templateRapportCompteFields);
    }
}
