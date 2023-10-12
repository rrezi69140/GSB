

{!! Form::open(array('route' => array ('postmodifierFrais' ,  $unFrais->id_frais ),'method'=>'post')) !!}
<div class="col-md-12  col-sm-12 well well-md">
    <center><h1> </h1></center>
    <div class="form-horizontal">
        <input type="hidden" name="id_frais" value="{{$unFrais->id_frais ?? 0}}"/>
        <div class="form-group">
            <label class="col-md-3 col-sm-3 control-label">Période : </label>
            <div class="col-md-2 col-sm-2">
                <input type="text" name="anneemois" value=" " class="form-control" placeholder="AAAAMM" required autofocus>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 col-sm-3 control-label">Nb justificatifs : </label>
            <div class="col-md-2  col-sm-2">
                <input type="number" name="nbjustificatifs" value=" "  class="form-control" placeholder="Nombre de justificatifs" required>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3 col-sm-3 control-label">Montant validé : </label>
            <div class="col-md-3 col-sm-3">
                <label class="control-label"> </label>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3">
                <button type="submit" class="btn btn-default btn-primary">
                    <span class="glyphicon glyphicon-ok"></span> Valider
                </button>
                &nbsp;
                <button type="button" class="btn btn-default btn-primary"
                        onclick="javascript: window.location = '';">
                    <span class="glyphicon glyphicon-remove"></span> Annuler</button>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3">
                <a href="A compléter / A compléter "><button type="button" class="btn btn-default btn-primary"><span class="glyphicon glyphicon-list"></span> Frais hors forfait</button></a>
            </div>
        </div>
        <div class="col-md-6 col-md-offset-3  col-sm-6 col-sm-offset-3">

        </div>
    </div>
</div>
