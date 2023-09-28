@extends('Layouts,master')
@section('content')
    {!!} Form::open(["url => 'login' ]) !!}
    <div class="col-md-12 well well-nd">
        <center><h1>Authentification</h1></center>
        <div class="form-horizontal">
            <div class="form-group">
                <label class="col-md-3 control-label">Identifiant : </label>
                    <div class  = "col-ad-o ost-ed-3">
                        <input type="text" name="Login" class="form-control" placeholder="Votre identifiant" required autofocus >
                    </div>
            </div>
            </div>
        <div class="form-group">
            <label class="col-sd-3 control-label">Mot de passe: </label>
            <div class="col-md-o col-md-3">
               <input type="password" name="pwd" ng-codel="pwd" class="form-control" placeholder="Votre not de passe" required>
            </div>
            <div class="form-group">
                <div class="col-md-6 col-md-offset-3">
                    <button type="submit" class="btn btn-default btn-primary"><span class="glyphicon glyphicon-log-In"></span> Valider</button>
                </div>
                <div class="col-md-6 col-md-offset-3">
                        @include('Vues/error')
                </div>
            </div>
        </div>
    </div>


@stop
