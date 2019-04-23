
     
<div class="w3-light-grey w3-padding-64 w3-margin-bottom text-center">
  <h1 class="w3-jumbo">"Vote It"</h1>
</div>

<div class="container-fluid">

  @component('unconnected.images-description')
      @slot('left')
        <img src="/images/screenshots/home.png" class="img-fluid">
      @endslot
      @slot('right')
        "Vote it" est une application qui vous permettera de partager vos idees et de suggerer une amelioration du deroulement au seins de votre universite LYON 1. 
        Ici vous pourrait avoir votre propre profil en vous connectant grace à vos identifiant ( identique aux identifiants de l'universite )
      @endslot
  @endcomponent

  @component('unconnected.images-description')
    @slot('left')
      Pour créer un vote: il suffit de donner un titre, une déscription ainsi que de mentionner un ou plusieurs groupes, avec la possibilité de taguer des personnes.
    @endslot
    @slot('right')
      <img src="/images/screenshots/vote.png" class="img-fluid">
    @endslot
  @endcomponent

  @component('unconnected.images-description')
    @slot('left')
      <img src="/images/screenshots/ue.png" class="img-fluid">
    @endslot
    @slot('right')
     Pour s'abonner à un groupe il suffit d'entrer le nom de l'UE et cliquer sur le boutton "Abonner".
     Si vous etes enseignant vous pouvez créer un nouveau groupe en selectionnant des étudiants.
    @endslot
  @endcomponent  

</div>



