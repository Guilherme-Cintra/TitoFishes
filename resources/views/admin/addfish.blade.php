@extends('layouts.main')
@section('title', 'Add Fish')

@section('content')
<h1>Seja bem vindo marcelo!</h1>
<h3>Aqui você pode adicionar peixes</h3>
<form action="/addfish" method="POST" enctype="multipart/form-data">
<div class="form-group">
        <label for="image">Image de l'évennement</label>
       <input type="file" id="image" name="image" class="form-control-file">
    </div>
    <div class="form-group">
        <label for="title">Évennement</label>
        <input type="text" class="form-control" id="title" name="title" placeholder="Nom de l'évennement">
        
    </div>

    <div class="form-group">
        <label for="city">Ville</label>
        <input type="text" class="form-control" id="city" name="city" placeholder="Nom de l'évennement">

    </div>
    <div class="form-group">
        <label for="private">Est-ce un évennement privé?</label>
        <select class="form-control" id="private" name="private"> 
            <option value="0">Non</option>
            <option value="1">Oui</option>
        </select>
    </div>
    <div class="form-group">
        <label for="description">Description</label>
       <textarea name="description" id="description" class="form-control" placeholder="Décrivez votre évennement..."></textarea>
    </div>
    <div class="form-group">
        <label for="description">Ajoutez des détails</label>
        <div class="form-group">
            <input type="checkbox" name="items[]" value = "chaises">chaises
        </div>
        <div class="form-group">
            <input type="checkbox" name="items[]" value = "Alcool à volonté">Alcool à volonté
        </div>
        <div class="form-group">
            <input type="checkbox" name="items[]" value = "Buffet">Buffet
        </div>
    </div>

    <input type="submit" class="btn btn-primary" value ="créer l'évennement">
</form>
@endsection