@extends('layaouts.app')
@section('content')
@include('common.errors')
@include('common.success')
<div class="myDiv">
    <div class="test"></div>
    <div class="header">
        <h1 class="titre">
            <i class="glyphicon glyphicon-check"></i>
            Exercice To-do list
        </h1>
        <form action="{{url('tache')}}" method="post" class="form-ajout" >
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input class="input-text-ajout" type="text" name="tache" placeholder="Nouvelle tâche ...">
            <i class="glyphicon glyphicon-calendar"> <input class="calendrier" type="text" name="date_limite"  id='datetimepicker'></button></i>
            <button type="submit" class="addBtn" >AJOUTER</button>
        </form> 
    </div> 
    <HR>
    @if (count($taches) > 0)
    <div class="container">
            @foreach ($taches as $tache)
                <div class="row">
                    <div class="col-md-auto">
                        <form action="/tache/{{ $tache->id }}"  method="POST">
                            <input type="hidden" name="_token" value="{{ csrf_token()}}">
                            <input type="hidden" name="_method" value="PUT">
                            @if(  $tache->est_fait == 1)
                                <input type="checkbox" checked name="est_fait" onChange="this.form.submit()">
                            @else
                                <input type="checkbox"  name="est_fait" onChange="this.form.submit()">
                            @endif
                        </form>
                    </div>
                    <div class="col-5">
                        @if(  $tache->est_fait == 1)
                            <s> {{ $tache->tache }} </s>
                        @else
                            <form action="/tache/{{ $tache->id }}/edit"  method="POST">
                                <input type="hidden" name="_token" value="{{ csrf_token()}}">
                                <input type="hidden" name="_method" value="PUT">
                                <input type="text" name="tache"  disabled="disabled" id="tache" value="{{ $tache->tache }}">
                                <input type="hidden"  name="date_limite"  id='datetimepicker' >
                            </form>
                        @endif
                    </div>

                    
                    @if(  $tache->date_limite && $tache->est_fait == 0)
                        <div class="col-md-auto" id="date">
                            <i span class="glyphicon glyphicon-star"></i>
                            {{ date('d M Y',strtotime($tache->date_limite))}}
                        </div>  
                    @endif

                    
                    @if( $tache->est_fait == 0)
                        <div class="col-md-auto" id="modif">
                            <button id="modifier" ><span class="glyphicon glyphicon-edit"></span></button>
                        </div>
                    @endif

                    
                    @if( $tache->est_fait == 0)
                        <div class="col-md-auto" id="calen">
                            <button><i class="glyphicon glyphicon-calendar"></i></button>
                        </div>
                    @endif
                    

                    <div class="col-md-auto" id="supprimer">
                        <form action="/tache/{{ $tache->id }}"  method="POST">
                            <input type="hidden" name="_token" value="{{ csrf_token()}}">
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btn btn-danger">
                                <span class="glyphicon glyphicon-trash"></span>
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
    </div>
@endif

</div>
@endsection