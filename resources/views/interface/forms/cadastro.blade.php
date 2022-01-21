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
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('/css/vendor/select2-bootstrap4.min.css') }}"/>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.css">    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css"/>        
    <link rel="stylesheet" type="text/css" href="http://keith-wood.name/css/jquery.signature.css">
    <style>
        .kbw-signature { width: 100%; height: 200px;}
        #sign canvas{ width: auto !important; height: 198px;}
    </style>
@endsection

@section('js_vendor')

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="{{ asset('/js/vendor/jquery.validate/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('/js/vendor/jquery.validate/additional-methods.min.js') }}"></script>
    <script src="{{ asset('/js/cs/scrollspy.js') }}"></script>
    <script src="{{ asset('/js/vendor/singleimageupload.js') }}"></script>
    <script src="{{ asset('/js/vendor/jquery.mask.min.js') }}"></script>
    <script src="{{ asset('/js/vendor/jquery.mask.js') }}"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script type="text/javascript" src="http://keith-wood.name/js/jquery.signature.js"></script>
    <script src="{{ asset('/js/vendor/input-spinner.min.js') }}"></script>
    <script src="{{ asset('/js/forms/controls.spinner.js') }}"></script>
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
$("#imei").mask("999999999999999");
$("#renavam").mask("9999999999-9");

$('input[name=placa]').mask('AAA 0U00', {
    translation: {
        'A': {
            pattern: /[A-Za-z]/
        },
        'U': {
            pattern: /[A-Za-z0-9]/
        },
    },
    onKeyPress: function (value, e, field, options) {
        // Convert to uppercase
        e.currentTarget.value = value.toUpperCase();

        // Get only valid characters
        let val = value.replace(/[^\w]/g, '');

        // Detect plate format
        let isNumeric = !isNaN(parseFloat(val[4])) && isFinite(val[4]);
        let mask = 'AAA 0U00';
        if(val.length > 4 && isNumeric) {
            mask = 'AAA-0000';
        }
        $(field).mask(mask, options);
    }
});
</script>
@endsection

@section('js_page')
    <script src="{{ asset('/js/forms/controls.select2.js') }}"></script>    
    <script src="{{ asset('/js/forms/genericforms.js') }}"></script>
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
                                                <input class="form-control" id="nome" name="nome" required/>
                                                <span>NOME</span>
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
                                                <input class="form-control" name="rg"/>
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
                                
                                <div class="row g-4">
        
                                        <div class="col-md-3">
                                            <label class="mb-3 top-label">
                                                <input class="form-control" id="modelo" name="modelo" required/>
                                                <span>MODELO GPS</span>
                                            </label>
                                        </div>
                                        <div class="col-md-3">
                                            <label class="mb-3 top-label">
                                                <input class="form-control" id="imei" name="imei" required/>
                                                <span>IMEI</span>
                                            </label>
                                        </div>

                            <div class="col-md-3">
                                <div class="form-floating input-group spinner" data-trigger="spinner">
                                    <input type="text" class="form-control" value="1" id="qtdequips" name="qtdequips" data-rule="quantity" required/>
                                    <label>QUANTIDADE</label>
                                    <div class="input-group-text">
                                        <button type="button" class="spin-up" data-spin="up">
                                            <span class="arrow"></span>
                                        </button>
                                        <button type="button" class="spin-down" data-spin="down">
                                            <span class="arrow"></span>
                                        </button>
                                    </div>
                                </div>
                            </div>

                                    <div class="col-md-3">
                                        <label class="top-label mb-0 w-100">
                                            <select id="planos" name="planos" required>
                                                <option label="&nbsp;"></option>
                                                <option value="39.90">39,90</option>
                                                <option value="49.90">49,90</option>
                                                <option value="59.90">59,90</option>
                                            </select>
                                            <span>PLANOS</span>
                                        </label>
                                    </div>

                                </div>


                                
                                <div class="row g-3">
                                        <div class="col-12">
                                            <div class="mb-3 top-label">
                                                <textarea class="form-control" rows="3" id="observ" name="observ"></textarea>
                                                <span>OBSERVAÇÕES</span>
                                            </div>
                                        </div>
                                    </div>

                                    <p class="small-title mb-3">
                                        DADOS DO VEÍCULO
                                    </p>
                                    <div class="row g-3">
                                        <div class="col-md-4">
                                            <label class="mb-3 top-label filled mb-0 w-100">
                                                <input class="form-control" id="marca" name="marca" required/>
                                                <span>MARCA</span>
                                            </label>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="mb-3 top-label filled mb-0 w-100">
                                                <input class="form-control" id="model" name="model" required />
                                                <span>MODELO</span>
                                            </label>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="mb-3 top-label filled mb-0 w-100">
                                                <input class="form-control" id="placa" name="placa" required/>
                                                <span>PLACA</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="row g-3">
                                        <div class="col-md-4">
                                            <label class="mb-3 top-label filled mb-0 w-100">
                                                <input class="form-control" id="cor" name="cor" required/>
                                                <span>COR</span>
                                            </label>
                                        </div>
                                        <div class="col-md-4">
                                <div class="form-floating input-group spinner filled mb-0 w-100" data-trigger="spinner">
                                    <input type="text" class="form-control" data-max="2030"
                                           data-min="2000" data-step="1" value="2010" id="ano" name="ano" data-rule="quantity" required/>
                                    <label>ANO</label>
                                    <div class="input-group-text">
                                        <button type="button" class="spin-up" data-spin="up">
                                            <span class="arrow"></span>
                                        </button>
                                        <button type="button" class="spin-down" data-spin="down">
                                            <span class="arrow"></span>
                                        </button>
                                    </div>
                                </div>
                                </div>
                                        <div class="col-md-4 filled mb-0 w-100">
                                            <label class="mb-3 top-label">
                                                <input class="form-control" id="renavam" name="renavam" required/>
                                                <span>RENAVAM</span>
                                            </label>
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
                  
                </div>
                <!-- Content End -->
            </div> 
        </div>
    </div>
   
@endsection
