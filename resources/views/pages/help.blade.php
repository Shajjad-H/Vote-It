@extends('layouts.app')
@section('titre')
    Help
@endsection


@section('content')



@php
    $helps = [
        [
            'Qui peut Voter ?',
            "Si tu est etudiants a l'universite Claude Bernard, et que t'as une idee a suggerer pour ammeliorer le fonctionnement des cours, la vie sur le campus ... cette appli est ce qu'il faut."
        ],
        [
            "Comment Voter ?",
            "Se Connecter qvec djg sfjs fsf lsf fsdkfj sdhfkjsfhskd fs fsdf shfksh fshf sk hff kfhf hsfhkshf sk"

        ], 
        [
            "Je ne parvient a me connecter?",
            "Se heofhewefjwefwfldjgregrg ngfgrgefljjslg khfksfutiuoyur ksdkdhgshgkhgkjfdhg bvnbdyhe hyydh gst beh gdhyhf kjjj s"

        ]
    ];
@endphp



<div class="container mt-3">  
    
@foreach ($helps as $help)

    <p>
    <button class="btn bg-info text-white" type="button" data-toggle="collapse" data-target="#help-{{$loop->index}}" aria-expanded="false" aria-controls="collapseExample">
            {{ $help[0] }}
        </button>
        <div class="collapse " id="help-{{$loop->index}}">
            <div class="card card-body">
                {{ $help[1] }}
            </div>
        </div>
    </p>
    
@endforeach

</div>






@endsection