@php
    $html_tag_data = ["scrollspy"=>"true"];
    $title = 'Cadastro Cliente';
    $description= 'Cadastro de clientes para contrato.';
    $breadcrumbs = ["/"=>"Incio","/cadastro"=>"Cadastro","/cliente/formulario"=>"Formulário"]
@endphp
@extends('layout',[
'html_tag_data'=>$html_tag_data,
'title'=>$title,
'description'=>$description
])

@section('css')
    <link rel="stylesheet" href="{{ asset('/css/vendor/select2.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('/css/vendor/select2-bootstrap4.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('/css/vendor/bootstrap-datepicker3.standalone.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('/css/vendor/dropzone.min.css') }}"/>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.css">    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css"/>        
    <link rel="stylesheet" type="text/css" href="http://keith-wood.name/css/jquery.signature.css">
    <style>
        .kbw-signature { width: 100%; height: 200px;}
        #sign canvas{ width: auto !important; height: 198px;}
    </style>
@endsection

@section('js_vendor')

    <script src="{{ asset('/js/vendor/select2.full.min.js') }}"></script>
    <script src="{{ asset('/js/vendor/datepicker/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('/js/vendor/datepicker/locales/bootstrap-datepicker.es.min.js') }}"></script>
    <script src="{{ asset('/js/vendor/jquery.validate/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('/js/vendor/jquery.validate/additional-methods.min.js') }}"></script>
    <script src="{{ asset('/js/cs/scrollspy.js') }}"></script>
    <script src="{{ asset('/js/vendor/dropzone.min.js') }}"></script>
    <script src="{{ asset('/js/vendor/singleimageupload.js') }}"></script>
    <script src="{{ asset('/js/vendor/jquery.mask.min.js') }}"></script>
    <script src="{{ asset('/js/vendor/jquery.mask.js') }}"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <script type="text/javascript" src="http://keith-wood.name/js/jquery.signature.js"></script>
    <script>

    var sign = $('#sign').signature({syncField: '#signature', syncFormat: 'PNG'});
    $('#clear').click(function(e) {
        e.preventDefault();
        sign.signature('clear');
        $("#signature").val('');
    });

        $(document).ready(function() {

            function limpa_formulário_cep() {
                // Limpa valores do formulário de cep.
                $("#rua").val("");
                $("#bairro").val("");
                $("#cidade").val("");
                $("#uf").val("");
            }
            
            //Quando o campo cep perde o foco.
            $("#cep").blur(function() {

                //Nova variável "cep" somente com dígitos.
                var cep = $(this).val().replace(/\D/g, '');

                //Verifica se campo cep possui valor informado.
                if (cep != "") {

                    //Expressão regular para validar o CEP.
                    var validacep = /^[0-9]{8}$/;

                    //Valida o formato do CEP.
                    if(validacep.test(cep)) {

                        //Preenche os campos com "..." enquanto consulta webservice.
                        $("#rua").val("...");
                        $("#bairro").val("...");
                        $("#cidade").val("...");
                        $("#uf").val("...");

                        //Consulta o webservice viacep.com.br/
                        $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                            if (!("erro" in dados)) {
                                //Atualiza os campos com os valores da consulta.
                                $("#rua").val(dados.logradouro);
                                $("#bairro").val(dados.bairro);
                                $("#cidade").val(dados.localidade);
                                $("#uf").val(dados.uf);
                            } //end if.
                            else {
                                //CEP pesquisado não foi encontrado.
                                limpa_formulário_cep();
                                alert("CEP não encontrado.");
                            }
                        });
                    } //end if.
                    else {
                        //cep é inválido.
                        limpa_formulário_cep();
                        alert("Formato de CEP inválido.");
                    }
                } //end if.
                else {
                    //cep sem valor, limpa formulário.
                    limpa_formulário_cep();
                }
            });
        });

// jQuery Mask Plugin v1.14.11
$("#cpfcnpj").keydown(function(){
    try {
        $("#cpfcnpj").unmask();
    } catch (e) {}

    var tamanho = $("#cpfcnpj").val().length;

    if(tamanho < 11){
        $("#cpfcnpj").mask("999.999.999-99");
    } else {
        $("#cpfcnpj").mask("99.999.999/9999-99");
    }

    // ajustando foco
    var elem = this;
    setTimeout(function(){
        // mudo a posição do seletor
        elem.selectionStart = elem.selectionEnd = 10000;
    }, 0);
    // reaplico o valor para mudar o foco
    var currentValue = $(this).val();
    $(this).val('');
    $(this).val(currentValue);
});
$("#celular").mask("(99) 99999-9999");
$("#cep").mask("99.999-999");

</script>
@endsection

@section('js_page')
    <script src="{{ asset('/js/forms/genericforms.js') }}"></script>
    <script src="{{ asset('/js/cs/dropzone.templates.js') }}"></script>
    <script src="{{ asset('/js/forms/controls.dropzone.js') }}"></script>
    <script src="{{ asset('/js/forms/validation.js') }}"></script>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <!-- Title Start -->
                <section class="scroll-section" id="title">
                    <div class="page-title-container">
                        <h1 class="mb-0 pb-0 display-4">{{ $title }}</h1>
                        @include('_layout.breadcrumb',['breadcrumbs'=>$breadcrumbs])
                    </div>
                </section>
                <!-- Title End -->

                <!-- Content Start -->


                    <!-- Address Start -->
                    <section class="scroll-section" id="cad_contrato">
                        <h2 class="small-title">Cadastro Contrato</h2>
                        <form action="/clientes" method="POST" class="tooltip-end-top" id="cad_contrato" enctype="multipart/form-data">
                        @csrf
                            <div class="card mb-5">
                                <div class="card-body">
                                    <p class="text-alternate mb-4">
                                        Preencha seus dados cadastrais e assine digitalmente esse 
                                        formulário para que possamos tê-lo em nosso sistema e relizar
                                        a instalção do seu rastreador. 
                                    </p>
                                
                                    <div class="row g-3">
                                        <div class="col-md-12">
                                            <label class="mb-3 top-label">
                                                <input class="form-control" id="nome" name="nome" />
                                                <span>{{$cliente->nome}}</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <label class="mb-3 top-label">
                                                <input class="form-control" id="cpfcnpj" name="cpfcnpj" required/>
                                                <span>CPF</span>
                                            </label>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="mb-3 top-label">
                                                <input class="form-control" name="rg" required/>
                                                <span>RG</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="row g-3">
                                        <div class="col-md-4">
                                            <label class="mb-3 top-label">
                                                <input class="form-control" id="cep" name="cep" required/>
                                                <span>CEP</span>
                                            </label>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="mb-3 top-label">
                                                <input class="form-control" id="cidade" name="cidade" />
                                                <span>CIDADE</span>
                                            </label>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="mb-3 top-label">
                                                <input class="form-control" id="uf" name="uf" />
                                                <span>ESTADO</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="row g-3">
                                        <div class="col-md-5">
                                            <label class="mb-3 top-label">
                                                <input class="form-control" id="rua" name="rua" />
                                                <span>RUA</span>
                                            </label>
                                        </div>
                                        <div class="col-md-5">
                                            <label class="mb-3 top-label">
                                                <input class="form-control" id="bairro" name="bairro" />
                                                <span>BAIRRO</span>
                                            </label>
                                        </div>
                                        <div class="col-md-2">
                                            <label class="mb-3 top-label">
                                                <input class="form-control" id="numero" name="numero" />
                                                <span>NÚMERO/APT</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="row g-3">
                                        <div class="col-12">
                                            <div class="mb-3 top-label">
                                                <textarea class="form-control" rows="2" id="complemento" name="complemento"></textarea>
                                                <span>COMPLEMENTO</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <label class="mb-3 top-label">
                                                <input class="form-control" id="email" name="email" required/>
                                                <span>E-MAIL</span>
                                            </label>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="mb-3 top-label">
                                                <input class="form-control" id="celular" name="celular" required/>
                                                <span>CELULAR</span>
                                            </label>
                                        </div>
                                    </div>
                                
                                <div class="row g-3">
                                        <div class="col-md-4">
                                            <label class="mb-3 top-label">
                                                <input class="form-control" id="qtdequips" name="qtdequips" required/>
                                                <span>QTD. EQUIPAMENTOS</span>
                                            </label>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="mb-3 top-label">
                                                <input class="form-control" id="modelo" name="modelo" required/>
                                                <span>MODELO GPS</span>
                                            </label>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="mb-3 top-label">
                                                <input class="form-control" id="imei" name="imei" type="number"/>
                                                <span>IMEI</span>
                                            </label>
                                        </div>
                                </div>
                                <div class="row g-3">
                                        <div class="col-12">
                                            <div class="mb-3 top-label">
                                                <textarea class="form-control" rows="2" id="observ" name="observ"></textarea>
                                                <span>OBSERVAÇÕES</span>
                                            </div>
                                        </div>
                                    </div>
                                <div class="input-group mb-3">
                                    <input type="file" class="form-control" id="image" name="image"/>
                                    <label class="input-group-text" for="image">.jpg ou .png</label>
                                </div>
                                <div class="row g-3">
                                    <div class="col-12">
                                        <div class="mb-3 top-label">
                                        <label for="">ASSINATURA</label>
                                    <br/>
                                    <div id="sign" name="sign"></div>
                                    <br><br>
                            <button id="clear" class="btn btn-danger">Limpar</button>
                            <textarea id="signature" name="signed" style="display: none"></textarea>
                                        </div>
                                    </div>
                                </div>
                                    <!-- Floating Label Start -->
                    <!-- Floating Label End -->
                                <div class="card-footer border-0 pt-0 d-flex justify-content-end align-items-center">
                                    <div>
                                        <button class="btn btn-icon btn-icon-end btn-primary" type="submit">
                                            <span>Salvar</span>
                                            <i data-cs-icon="chevron-right"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </section>
                    <!-- Address End -->

                   
                </div>
                <!-- Content End -->
            </div>

            <!-- Tersm and Conditions Modal Start -->
            <div class="modal fade scroll-out" id="termsModal" tabindex="-1" role="dialog"
                 aria-labelledby="termsModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-md modal-dialog-scrollable short modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="termsModalLabel">Terms and Conditions</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="scroll-track-visible">
                                <p>
                                    Liquorice caramels apple pie chupa chups bonbon. Jelly-o candy apple pie sugar plum
                                    icing chocolate cake lollipop jujubes bear claw.
                                    Pastry sweet roll carrot cake cake macaroon gingerbread cookie. Lemon drops brownie
                                    candy cookie candy pie sweet roll biscuit marzipan.
                                    Chocolate bar candy canes macaroon liquorice danish biscuit biscuit. Tiramisu toffee
                                    brownie sweet roll sesame snaps halvah. Icing
                                    carrot cake cupcake gummi bears danish. Sesame snaps muffin macaroon tiramisu ice
                                    cream jelly-o pudding marzipan tootsie roll. Muffin
                                    candy icing tootsie roll wafer powder danish cheesecake macaroon. Sweet marshmallow
                                    oat cake marshmallow ice cream carrot cake. Bonbon
                                    powder carrot cake marzipan jelly beans pie cotton candy cotton candy. Gummies donut
                                    caramels chocolate bar. Powder soufflé brownie
                                    jelly beans gingerbread candy.
                                </p>
                                <p>
                                    Apple pie gummies marshmallow wafer. Cookie macaroon croissant tart topping jelly
                                    pie sesame snaps jelly. Chocolate tootsie roll
                                    marshmallow tootsie roll gummi bears jelly beans lollipop macaroon gummi bears. Ice
                                    cream gingerbread tart cheesecake. Brownie jelly
                                    beans cookie liquorice candy bear claw powder muffin sweet roll. Carrot cake
                                    gingerbread pudding chocolate cake cake chocolate bar
                                    sesame snaps wafer. Pie jelly beans tart donut chupa chups caramels sesame snaps
                                    wafer gummies. Cake marshmallow cupcake donut.
                                    Marshmallow cookie gummies chocolate cake dragée topping cheesecake halvah carrot
                                    cake. Cupcake bear claw carrot cake candy canes bonbon
                                    croissant biscuit liquorice fruitcake. Jelly liquorice gummies. Biscuit croissant
                                    croissant liquorice. Gummi bears pie powder fruitcake
                                    caramels brownie danish pastry pudding. Caramels sugar plum cookie cotton candy
                                    tootsie roll jelly pudding.
                                </p>
                                <p>
                                    Tiramisu brownie tart chupa chups icing chupa chups. Gummi bears fruitcake carrot
                                    cake chocolate bonbon. Sesame snaps brownie gummi
                                    bears tootsie roll caramels dragée. Powder cake gummies jelly beans toffee carrot
                                    cake bonbon powder muffin. Marshmallow jelly beans
                                    cake donut cotton candy chocolate bar biscuit macaroon marzipan. Cake cupcake
                                    gummies. Gingerbread bonbon wafer. Pastry sweet cookie
                                    danish lollipop sweet toffee topping bear claw. Apple pie dessert cake dessert.
                                    Tiramisu pie sugar plum gingerbread cupcake brownie
                                    candy canes gummies jelly. Bonbon chocolate cake lollipop lollipop jelly beans apple
                                    pie halvah sweet roll. Macaroon jujubes powder
                                    cheesecake sesame snaps fruitcake marzipan muffin.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Tersm and Conditions Modal End -->
        </div>
    </div>
   
@endsection
