@extends('layaouts.app')
@section('content')
@include('common.errors')
@include('common.success')
<div class="myDiv">
    <div class="header">
        <h1 class="titre">
            <i class="bi bi-check-square-fill"></i>
            Exercice To-do list
        </h1>
        <form action="{{url('tache')}}" method="post" class="form-ajout" >
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input class="input-text-ajout" type="text" name="tache" placeholder="Nouvelle tâche ..."> 
            <input name="date_limite" class="datetimepicker" type="hidden">
            <i class="bi bi-calendar2-week-fill btnCalIn"></i>
            <button type="submit" class="addBtn" >AJOUTER</button>
        </form> 
    </div> 

    <HR>

    @if (count($taches) > 0)
    <div class="container">
        @foreach ($taches as $tache)
        <div class="row liste">
            <div class="col col-md-auto">
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
            <div class="col col-10 tache">
                @if(  $tache->est_fait == 1)
                <s> {{ $tache->tache }} </s>
                @else
                {{ $tache->tache }}
                @endif
            </div>
            <div class="col  col-11 editTache">
                <form action="/tache/{{ $tache->id }}/edit" class="editForm" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token()}}">
                    <input type="hidden" name="_method" value="PUT">
                    <div class="row">
                        <div class="col col-10 tacheEdit">
                            <input type="text" name="tache" value="{{ $tache->tache }}">
                        </div>
                        <div  class="col col-btn btnCal ">
                            <input type="text" class="datetimepicker" name='date_limite' value="{{ $tache->date_limite}}">
                            <i class="bi bi-calendar2-week-fill"></i>
                        </div>
                        <div class="col col-md-auto">
                            <input type="submit" style="visibility: hidden;" />
                        </div>
                    </div>
                </form>
            </div>
            <div class="col col-md-auto dateTable">
                @if(  $tache->date_limite && $tache->est_fait == 0)
                <div class="date">
                    <i class="bi bi-hourglass-split"></i>
                    {{ date('d M Y',strtotime($tache->date_limite))}}
                </div>  
                @endif
            </div>
            <div  class="col col-btn btnModif">
                @if( $tache->est_fait == 0)
                    <button class="modifier" ><i class="bi bi-pencil-fill"></i></button>
                @endif
            </div>
            
            <div class="col col-btn btnSupp">
                <form action="/tache/{{ $tache->id }}"  method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token()}}">
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="submit" class="btn-supp">
                        <i class="bi bi-trash-fill"></i>
                    </button>
                </form>
            </div>
        </div>
        @endforeach
    </div>
    @endif
</div>
@endsection