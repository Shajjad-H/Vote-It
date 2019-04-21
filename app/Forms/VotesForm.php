<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class VotesForm extends Form
{
    public function buildForm()
    {
        $this
        ->add('titre', 'text', [
            'rules' => 'required|min:2',
            'error_messages' => [
                'titre.required' => 'Vous devez mettre un titire'
            ],
            'label' => 'Titre : *',
            'attr' => [
                'placeholder' => 'Titre pour le vote'
            ],
        ])
        ->add('description', 'textarea', [
            'rules' => 'required|min:2',
            'error_messages' => [
                'titre.required' => 'Vous devez mettre un titire'
            ],
            'label' => 'Description : *',
            'attr' => [
                'placeholder' => 'Description pour le vote'
            ],
        ])
        ->add('users', 'text', [
            'label' => 'Tags :',
            'attr' => [
                'placeholder' => 'vous pouvez taggez une ou plusieur personne',
                'id' => 'tag-people'
            ],
        ])
        ->add('groupes', 'text', [
            'label' => 'Groupes : *',
            'rules' => 'required',
            'attr' => [
                'placeholder' => 'Vous pouvez mettre plusieur UE',
                'id' => 'tag-groupes'
            ],
        ])
        ->add('Publier', 'submit', [
            'attr' => [
                'class' => ['form-control btn btn-success']
            ]
        ]);
    }
}
