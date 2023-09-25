@extends('layouts.master')
@section('title','Lista')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div>
                    <h1>Felvett gépjárművek listája</h1>
                    <table class="table table-info table-striped table-hover">
                        <tr>
                            <th>#id</th>
                            <th>Rendszám</th>
                            <th>Motor típus</th>
                            <th>Szín</th>
                            <th>Meghajtás</th>
                            <th>Módosítás</th>
                            <th>Törlés</th>
                        </tr>
                        @foreach ($autok as $auto)
                            <tr id="sor_{{ $auto->a_id }}">
                                <td>{{ $auto->a_id }}</td>
                                <td>{{ $auto->rendszam }}</td>
                                <td> {{ $motorTipusok[$auto->motor_tipus] }} </td>
                                <td>{{ $auto->szin_id }}</td>
                                <td>{{ $meghajtasok[$auto->meghajtas] }}</td>
                                <td>
                                    <a href="./modositas/{{$auto->a_id}}" class="btn btn-sm btn-dark">módosítás</a>
                                </td>
                                <td>
                                    <button id="torlesGomb_{{$auto->a_id}}" type="button" onclick="torles({{$auto->a_id}});" class="btn btn-sm btn-danger">törlés</button>
                                </td>
                            </tr>
                        @endforeach
                            
                    </table>

                    {{ $autok->links() }}
                </div>
            </div>
        </div>
    </div>

<script>

function torles(aid){
    $.ajax(
        {
            url:"./torles",
            type: "POST",
            cache:false,
            async:false,
            data:{"aid":aid},
            headers:{
                "X-CSRF-TOKEN":$('meta[name="csrf-token"]').attr('content')
            },
            beforeSend:function(){
                $("#torlesGomb_"+aid).attr("disabled",true);
                $("#torlesGomb_"+aid).html("Folyamatban....");
            },
            success:function(data){
                if(data.error == false){
                    $("#sor_"+aid).remove();
                }else{
                    $("#torlesGomb_"+aid).attr("disabled",false);
                    $("#torlesGomb_"+aid).html("Törlés");
                }
            }
        }
    );
}

</script>
@endsection