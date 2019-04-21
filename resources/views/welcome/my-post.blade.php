<div class="w3-row-padding">
    <div class="w3-col m12">
        <div class="w3-card w3-round w3-white">
            <div class="w3-container w3-padding">

              <form class="form-group">
                <h6 class="w3-opacity">Creer un vote </h6>
                <input type="text" name="creervote" class="w3-border w3-padding form-control" placeholder="Titre du vote"></br>

                <h6 class="w3-opacity">Description du vote </h6>
                <textarea type="text" name="description" class="w3-border w3-padding form-control" placeholder="Detailles et description du vote" ></textarea>

                <h6 class="w3-opacity">Tags</h6>
                <input type="text" name="tags"  id="tag-people" class="w3-border w3-padding form-control" placeholder="Taguer des personnes" ></br>

                <h6 class="w3-opacity">Groupes</h6>
                <input type="text" name="groupes"  id="tag-groupes" class="w3-border w3-padding form-control" placeholder="Taguer des Groupe" ></br>
                
              </form>

              <button type="submit" class="btn btn-success"{{-- w3-button w3-theme" --}} ><i class="fas fa-pen"></i>  Publier</button> 
            </div>
        </div>
     </div>
</div>