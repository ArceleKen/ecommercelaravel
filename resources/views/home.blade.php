@extends('layouts.app')

@section("css")
    <style>
        li.jstree-node{
            padding-top: 17px;
        }
    </style>
@stop

@section('content')
    <section class="content-header">
        <h1>
            Accueil
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Accueil</a></li>
        </ol>

    </section>
    <br/>

    <section class="content">

        @include('adminlte-templates::common.errors')
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="box box-primary">
            <div class="box-header">
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="">
                            Accueil

                        </h3>
                    </div>
                </div>
            </div>

            <div class="box-body">
                <div class="row">
                  <h3 style="text-align: center">Bienvenue sur <b>E-Commerce.</b></h3>
                </div>
            </div>
        </div>
    
</section>
@endsection

@section("scripts")
    <script>
        window.data = [];
        $(function () {
            $("#tree").jstree({
                "checkbox": {
                    "keep_selected_style": false
                },
                "plugins": ["checkbox"]
            });
            $("#tree").bind("changed.jstree",
                function (e, data) {
                    console.log("Checked: " + data.node.id);
                    console.log("Parent: " + data.node.parent);
                    window.data = data;
                });
        });

        $("#btnSubmit").click(function (e) {
            e.preventDefault();
            let IDS = window.data;
            var ids_string = "";

            if(IDS.selected==undefined || IDS.selected.length==0){
                swal({
                    title: 'ERREUR',
                    text: 'Selectionnez au moins un compte',
                    type: 'error',
                    confirmButtonColor: '#21c256',
                })
            }else{
                for (let i=0;IDS.selected.length>i;i++){
                    ids_string+=(IDS.selected[i]).toString()+';';
                }
                ids_string=ids_string.slice(0,-1);

                localStorage.setItem("comptes", ids_string);
                swal({
                    position: 'top-right',
                    type: 'success',
                    title: 'Enregistrement effectué',
                    showConfirmButton: false,
                    timer: 1500
                })

               // let route = window.baseURL+"/display/comptes?identifiants="+ids_string;
                //window.location.replace(route);
            }
        })
    </script>
@stop