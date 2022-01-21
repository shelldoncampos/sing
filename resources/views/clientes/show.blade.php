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
                <div class="row g-3">
                <div class="col-md-4">
                <img src="http://127.0.0.1:8000/img/sat_logo.png" class="img-fluid mb-1 me-1 sw-35">
                    </div>
                <div class="col-md-8">
                        <h1 class="mb-0 pb-0 display-4">CONTRATO DE PRESTAÇÃO DE SERVIÇOS DE RASTREAMENTO
COM COMODATO DE EQUIPAMENTO(S) RASTREADOR(ES)</h1>
                    </div>
                </div>
                </section>
                <!-- Title End -->

                <!-- Content Start -->


                    <!-- Address Start -->
                    <section class="scroll-section" id="cad_contrato">                        
                        <form action="/clientes" method="POST" class="tooltip-end-top" id="cad_contrato" enctype="multipart/form-data">
                        @csrf
                            <div class="card mb-5">
                                <div class="card-body">
                                    <div class="row g-3">
                                        <div class="col-md-12">
                                        <p>DE UM LADO, SAT TELECOM SEVERINO JUNIOR MONTEIRO, NOME FANTASIA + LOCALIZA SAT ;EMPRESA ESTABELECIDA NA
RUA EPITÁCIO PESSOA, 13, SALA 02 - 1º ANDAR, CENTRO - AROEIRAS - PB INSCRITA NO CNPJ SOB O N° 15.389.818/0001-15
DORAVANTE DESIGNADA CONTRATADA, E DE OUTRO LADO, EMPRESA OU PESSOA FÍSICA A SEGUIR QUALIFICADA:</p>
                                            <label class="mb-3 top-label">
                                                <input class="form-control" id="nome" name="nome" value="{{$cliente->nome}}" disabled />
                                                <span>NOME</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <label class="mb-3 top-label">
                                                <input class="form-control" id="cpfcnpj" name="cpfcnpj" value="{{$cliente->cpfcnpj}}" disabled/>
                                                <span>CPF</span>
                                            </label>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="mb-3 top-label">
                                                <input class="form-control" name="rg" value="{{$cliente->rg}}" disabled/>
                                                <span>RG</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="row g-3">
                                        <div class="col-md-4">
                                            <label class="mb-3 top-label">
                                                <input class="form-control" id="cep" name="cep" value="{{$cliente->cep}}" disabled />
                                                <span>CEP</span>
                                            </label>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="mb-3 top-label">
                                                <input class="form-control" id="cidade" name="cidade" value="{{$cliente->cidade}}" disabled />
                                                <span>CIDADE</span>
                                            </label>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="mb-3 top-label">
                                                <input class="form-control" id="uf" name="uf" value="{{$cliente->uf}}" disabled />
                                                <span>ESTADO</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="row g-3">
                                        <div class="col-md-5">
                                            <label class="mb-3 top-label">
                                                <input class="form-control" id="rua" name="rua" value="{{$cliente->rua}}" disabled />
                                                <span>RUA</span>
                                            </label>
                                        </div>
                                        <div class="col-md-5">
                                            <label class="mb-3 top-label">
                                                <input class="form-control" id="bairro" name="bairro" value="{{$cliente->bairro}}" disabled/>
                                                <span>BAIRRO</span>
                                            </label>
                                        </div>
                                        <div class="col-md-2">
                                            <label class="mb-3 top-label">
                                                <input class="form-control" id="numero" name="numero" value="{{$cliente->numero}}" disabled/>
                                                <span>NÚMERO/APT</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="row g-3">
                                        <div class="col-12">
                                            <div class="mb-3 top-label">
                                                <textarea class="form-control" rows="2" id="complemento" name="complemento" value="{{$cliente->complemento}}" disabled/></textarea>
                                                <span>COMPLEMENTO</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <label class="mb-3 top-label">
                                                <input class="form-control" id="email" name="email" value="{{$cliente->email}}" disabled/>
                                                <span>E-MAIL</span>
                                            </label>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="mb-3 top-label">
                                                <input class="form-control" id="celular" name="celular" value="{{$cliente->celular}}" disabled/>
                                                <span>CELULAR</span>
                                            </label>
                                        </div>
                                    </div>
                                
                                <div class="row g-3">
                                        <div class="col-md-4">
                                            <label class="mb-3 top-label">
                                                <input class="form-control" id="qtdequips" name="qtdequips" value="{{$cliente->qtdequips}}" disabled/>
                                                <span>QTD. EQUIPAMENTOS</span>
                                            </label>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="mb-3 top-label">
                                                <input class="form-control" id="modelo" name="modelo" value="{{$cliente->modelo}}" disabled/>
                                                <span>MODELO GPS</span>
                                            </label>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="mb-3 top-label">
                                                <input class="form-control" id="imei" name="imei" type="number" value="{{$cliente->imei}}" disabled/>
                                                <span>IMEI</span>
                                            </label>
                                        </div>
                                </div>
                                <div class="row g-3">
                                        <div class="col-12">
                                            <div class="mb-3 top-label">
                                                <textarea class="form-control" rows="2" id="observ" name="observ" value="{{$cliente->observ}}" disabled/></textarea>
                                                <span>OBSERVAÇÕES</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row g-3">
                                        <p>DORAVANTE DESIGNADA CONTRATANTE, TEM ENTRE SI, JUSTOS E
CONTRATADOS, O PRESENTE INSTRUMENTO PARTICULAR DE
PRESTAÇÃO DE SERVIÇOS DE RASTREAMENTO COM COMODATO, QUE
SE REGERÁ PELAS SEGUINTES CLÁUSULAS E CONDIÇÕES:
</p>
    <div class="col-6">

<h6> 1 – O SERVIÇO DE RASTREAMENTO CONTRATADO CONSISTE EM:</h6>
<p><b>A)</b> ARMAZENAMENTO, NO SERVIDOR DA CONTRATADA POR ATÉ 06 MESES (180 DIAS), DE
POSIÇÕES CAPTADAS VIA SATÉLITE E TRANSMITIDAS POR TELEFONIA CELULAR;</p>
<h6>2 – NÃO CABERÁ A CONTRATADA QUALQUER RESPONSABILIDADE POR:</h6>
<p><b>A)</b> DANOS EMERGENTES E LUCROS CESSANTES DO CONTRATANTE FRUTO DA SUBTRAÇÃO
DA CARGA TRANSPORTADA, VEÍCULO, PASSAGEIROS, OBJETOS NO INTERIOR DO VEÍCULO,
PEÇAS E ACESSÓRIOS DO VEÍCULO;</p>
<p><b>B)</b> DANOS EMERGENTES OU LUCROS CESSANTES DO CONTRATANTE, CUJAS CAUSAS
POSSAM SER CORRELACIONADAS DIRETA OU INDIRETAMENTE À UTILIZAÇÃO OU
INTERRUPÇÃO DOS SERVIÇOS DE RASTREAMENTO, INOPERÂNCIA DO RASTREADOR OU
AGENDAMENTO DE SERVIÇO TÉCNICO EM HORÁRIO DISPONIBILIZADO PELA
CONTRATADA QUE NÃO SATISFAÇA A CONTRATANTE PARA EXECUÇÃO DE REPARO.</p>
<p><b>C)</b> DECORRÊNCIA DE ATOS DE TERCEIROS QUE NÃO SEJAM SEUS EMPREGADOS OU
PREPOSTOS.</p>
<p><b>D)</b> FALHAS NO FUNCIONAMENTO DO HARDWARE OU SOFTWARE DO RASTREADOR
EMBARCADO UTILIZADO PELA CONTRATANTE; FALHAS FRUTO DE: FALTA DE TELEFONIA
FIXA E INTERNET , FALHA NOS SINAIS DE SATÉLITE E TELEFONIA CELULAR QUE SÃO
SUJEITOS A INTERFERÊNCIAS EM ÁREAS COM OCORRÊNCIA DE ”SOMBRAS” PROJETADAS
POR EDIFÍCIOS, MONTANHAS E/OU OUTROS OBSTÁCULOS À PROPAGAÇÃO DAS ONDAS
EMANADAS DAS TORRES DE TRANSMISSÃO DA OPERADORA DE TELEFONIA, OU OUTRO
MEIO DE COMUNICAÇÃO UTILIZADO PELO PROVEDOR DA TECNOLOGIA DE
RASTREAMENTO; EM DECORRÊNCIA DE EVENTOS DA NATUREZA, TAIS COMO: RAIOS,
TEMPO NUBLADO, DESCARGAS ELÉTRICAS OU VENDAVAL OU ATO OU FATO DO HOMEM
QUE IMPLIQUE NA PERDA DE SINAL E CONSEQUENTE IMPOSSIBILIDADE DE
RASTREAMENTO EM VIRTUDE DESTES ACONTECIMENTOS, BEM COMO NA HIPÓTESE DE
CASO FORTUITO E OU FORÇA MAIOR. QUAISQUER TIPOS DE ACIDENTES OU DANOS AO
VEÍCULO E/OU TERCEIROS QUE VENHAM A SER PROVOCADOS PELO BLOQUEIO DO
VEÍCULO EM VIAS PÚBLICAS OU PRIVADAS.</p>
<p><b>E)</b> OMISSÃO OU NEGLIGÊNCIA DO CONTRATANTE DAS SUAS RESPONSABILIDADES.</p>
<p><b>F)</b> DANOS EMERGENTES OU LUCROS CESSANTES DO CONTRATANTE, POR PERDA DE
GARANTIA DO VEÍCULO DECORRENTE DA INSTALAÇÃO DO EQUIPAMENTO RASTREADOR.</p>
    </div>
    <div class="col-6">
   <h6> 3 – OBRIGAÇÕES DA CONTRATANTE:</h6>
   <p><b>A)</b> A REALIZAÇÃO DE 01 (UM) TESTE DE POSIÇÃO E BLOQUEIO (SE CONTRATADO) MENSAL,
PARA VERIFICAR O FUNCIONAMENTO DO SISTEMA. AO VERIFICAR IRREGULARIDADE NA
POSIÇÃO GEOGRÁFICA OU AÇÃO DO BLOQUEIO (SE CONTRATADO) DEVERÁ SOLICITAR
REPARO A CONTRATADA.</p>
<p><b>B)</b> TODO E QUALQUER PROBLEMA OU ACIDENTE PROVENIENTE DO SERVIÇO SOLICITADO
PELO CONTRATANTE, SERÁ DE SUA INTEIRA RESPONSABILIDADE.</p>
<p><b>C)</b>EM CASO DE CONSTATAÇÃO DE DEFEITO DO RASTREADOR, O CONTRATANTE DEVERÁ
EXECUTAR OS SEGUINTES PROCEDIMENTOS:</p>
<p><b>C.1)</b> COMUNICAR A CONTRATADA O DEFEITO E SOLICITAR TESTES PARA DEPURAR O
PROBLEMA;</p>
<p><b>C.2)</b> SE CONFIRMADO O DEFEITO, O CONTRATANTE DEVERÁ ENCAMINHAR O
RASTREADOR OU O VEÍCULO AO POSTO MAIS PRÓXIMO CREDENCIADO PELA
CONTRATADA; OU EM COMUM ACORDO MANUTENIR O RASTREADOR NO MESMO LOCAL
QUE FOI REALIZADO A INSTALAÇÃO, PODENDO NESTE CASO SER COBRADO VALOR PARA
DESLOCAMENTO DO TÉCNICO AO LOCAL SOLICITADO PELO CONTRATANTE;</p>
<p><b>C.3)</b> PARA DEFEITOS QUE GERE A IMOBILIZAÇÃO DO VEÍCULO, O CONTRATANTE DEVERÁ
ENCAMINHAR O VEÍCULO PARA AUTO- ELÉTRICA MAIS PRÓXIMA E SOLICITAR A
DESATIVAÇÃO DO RASTREADOR INSTALADO. QUALQUER PROBLEMA COM RASTREADOR
QUE NÃO SEJA PROVENIENTE DE SUA FABRICAÇÃO, A MANUTENÇÃO NÃO SERÁ DE
RESPONSABILIDADE DA CONTRATADA , QUE CASO ACIONADA INDEVIDAMENTE SERÁ
COBRADA UMA TAXA DE MANUTENÇÃO.</p>
<p><b>D)</b> EM CASO DE VEÍCULO EM PERÍODO DE GARANTIA DO FABRICANTE, VERIFICAR SE A
INSTALAÇÃO DO RASTREADOR PODERÁ ACARRETAR A PERDA DA GARANTIA.</p>
<h6>4 – OBRIGAÇÕES DA CONTRATADA:</h6>
<p><b>A)</b> SERVIÇOS DE MANUTENÇÃO SÓ SERÃO EXECUTADOS EM DIAS ÚTEIS, HORÁRIO
COMERCIAL E NO MESMO MUNICÍPIO DE DOMICÍLIO DECLARADO NESTE CONTRATO PELO
CONTRATANTE MEDIANTE AGENDAMENTO PRÉVIO.</p>
<p><b>B)</b> EM HAVENDO A OCORRÊNCIA DE SINISTRO, FALHA OPERACIONAL NÃO DECORRENTE
DA CLÁUSULA 2-D, E COMPROVADA OU ADMITIDA À CULPA DA CONTRATADA, AS PARTES
CONTRATANTES DO PRESENTE INSTRUMENTO CONCORDAM EXPRESSAMENTE QUE A
CONTRATADA RESSARCIRÁ À CONTRATANTE ATÉ A QUANTIA MÁXIMA DE 12 VEZES O
VALOR MENSAL EFETIVAMENTE COBRADO PELO SERVIÇO DE MONITORAMENTO
INDIVIDUAL DO VEÍCULO SINISTRADO, COMO VALOR MÁXIMO DE INDENIZAÇÃO EM
QUALQUER HIPÓTESE, MESMO QUE JUDICIAL.</p>
    </div>
</div>
<div class="row g-3">
    <div class="col-6">

    5 – SERVIÇOS ESPECIAIS:
A) PEDIDO POR PARTE DO CONTRATANTE PARA REALIZAÇÃO DE TRANSFERÊNCIA DE
RASTREADOR DE UM PARA OUTRO VEÍCULO DE SUA PROPRIEDADE.
B) AS TARIFAS SOBRE SERVIÇOS ESPECIAIS UTILIZADOS PELO CONTRATANTE SERÃO
COBRADAS NO ATO DA PRESTAÇÃO DO SERVIÇO E SERÃO DE INTEIRA E ÚNICA
RESPONSABILIDADE DO CONTRATANTE QUE DESDE JÁ DECLARA ESTAR CIENTE DE QUE A
UTILIZAÇÃO DE TAIS SERVIÇOS DEPENDE DE ÚNICA E EXCLUSIVAMENTE DE SUA VONTADE.
6 – SERVIÇOS EXTRAS:
A) NO CASO DE OCORRÊNCIA POLICIAL, O DEPARTAMENTO DE POLÍCIA DEVERÁ SER
ACIONADO DIRETAMENTE PELO CONTRATANTE. NO CASO DE REALIZAR O ACIONAMENTO
DESCRITO E PELA INDISPONIBILIDADE DAS AUTORIDADES E SERVIÇOS PÚBLICOS OU
PRIVADOS NÃO COMPARECEREM, A CONTRATADA NÃO PODERÁ SER RESPONSABILIZADA.
B) O SERVIÇO DE PRONTA RESPOSTA (RESGATE DO VEÍCULO) É USADO PARA
OCORRÊNCIAS NO RIO E GRANDE RIO E É DE DECISÃO DA CONTRATANTE O EMPREGO OU
NÃO, SENDO O CUSTO DA OPERAÇÃO TOTALMENTE DA CONTRATANTE.
C) O PORTAL DE INTERNET PARA ACESSAR POSIÇÕES DO VEÍCULO ATRAVÉS DE LOGIN E
SENHA FORNECIDOS PELA CONTRATADA.
7 – VALOR E FORMA DE PAGAMENTO DOS SERVIÇOS:
A) O PAGAMENTO REFERENTE AO SERVIÇO DE MONITORAMENTO SERÁ EFETUADO PELA
CONTRATANTE, MENSALMENTE NO DIA E VALOR CONTRATADO.
B) CASO NÃO RECEBA O AVISO DE COBRANÇA DE MENSALIDADE, A CONTRATANTE SE
OBRIGA A COMUNICAR A CONTRATADA ATÉ 5 (CINCO) DIAS DO DIA DE VENCIMENTO,
PARA RECEBER INSTRUÇÕES PARA O RESPECTIVO PAGAMENTO.
C) OS VALORES DAS MENSALIDADES SERÃO REAJUSTADOS ANUALMENTE, OU PELO
MENOR PERÍODO PERMITIDO PELA LEGISLAÇÃO VIGENTE, CONFORME VALOR DA
INFLAÇÃO ACUMULADA NOS ÚLTIMOS 12 MESES.
D) O NÃO PAGAMENTO DAS OBRIGAÇÕES ASSUMIDAS PELA CONTRATANTE DOS SEUS
VENCIMENTOS OBRIGARÁ A CONTRATANTE AO PAGAMENTO DA PERMANÊNCIA DIÁRIA
DE 0,33% CONTADOS A PARTIR DA DATA DO VENCIMENTO ATÉ A DATA DO EFETIVO
PAGAMENTO, TENDO COMO BASE O ÍNDICE DE REAJUSTE DO IGPM OU CONFORME
ÍNDICE ECONÔMICO QUE VENHA A SUBSTITUÍ-LO, ACRESCIDO DE MULTA MORATÓRIA DE
2% (DOIS POR CENTO) SOBRE O VALOR PRINCIPAL CORRIGIDO.
E) APÓS 10 DIAS EM ATRASO, A CONTRATADA SUSPENDERÁ OS SERVIÇOS ATÉ
REGULARIZAÇÃO DO PAGAMENTO E DESATIVAÇÃO DEFINITIVA APÓS 30 DIAS;
F) A INADIMPLENCIA SUPERIOR A 30 DIAS ACARRETARÁ A CONTRATANTE A INCLUSÃO DE
SEU NOME JUNTO AOS ÓRGÃOS DE PROTEÇÃO AO CRÉDITO (SPC/SERASA);
G) A CONTRATADA PODERÁ RESCINDIR, INDEPENDENTE DE QUALQUER COMUNICADO
FORMAL, A PARTIR DA INADIMPLÊNCIA DA 1ª MENSALIDADE. E AINDA, DEVIDO A
INADIMPLENCIA DO CONTRATANTE, FICA A CONTRATADA ISENTA POR QUAISQUER
RESPONSABILIDADES ORIUNDAS SUPERVENIENTES A PARTIR DESTE PRAZO.
H) A CONTRATADA EXERCERÁ SEU DIREITO DE COBRANÇA DE TODO O DÉBITO GERADO
NO PERÍODO DE 60 (SESSENTA) DIAS EM INADIMPLÊNCIA, INCLUINDO: MULTA DIÁRIA,
MORA E JUROS LEGAIS, ALÉM DE EXERCER O DIREITO DE EXECUTAR O PROTESTO
LEGÍTIMO DE CRÉDITO, COBRANÇA JUDICIAL E HONORÁRIOS ADVOCATÍCIOS, NO
PATAMAR DE 20% SOBRE O TOTAL DA DÍVIDA.
8 – A INSTALAÇÃO E MANUTENÇÃO DO RASTREADOR SERÁ DA SEGUINTE
FORMA:
A) O CONTRATANTE ACEITA SUBMETER O SEU VEÍCULO A UMA INSPEÇÃO PRÉVIA,
ANTERIOR AO INÍCIO DOS SERVIÇOS DE INSTALAÇÃO, MANUTENÇÃO OU RETIRADA;
ASSINANDO JUNTAMENTE COM O INSTALADOR UM RELATÓRIO DESCRITIVO ONDE
DEVERÁ CONSTAR EXISTÊNCIA OU NÃO DE AVARIAS, RISCOS, AMASSADOS E OUTROS
DANOS. APÓS OS ENCERRAMENTOS DOS SERVIÇOS O CONTRATANTE CONCORDA EM
REALIZAR A CONSTATAÇÃO DO ESTADO GERAL DO VEÍCULO, FIRMANDO, JUNTAMENTE
COM REPRESENTANTE DA CONTRATADA, RELATÓRIO FINAL, APÓS O QUE NADA MAIS
PODERÁ RECLAMAR A TÍTULO DE INDENIZAÇÃO POR PROBLEMAS HAVIDOS DURANTE OS
MENCIONADOS SERVIÇOS.
B) O RASTREADOR TEM GARANTIA DE FUNCIONAMENTO POR TODA VIGÊNCIA DESTE;
C) A INSTALAÇÃO E USO DO RASTREADOR REDEVEICULOS.COM NÃO DANIFICAM PARTE
ELÉTRICA DO VEÍCULO, TÃO POUCO A PARTE AUTOMOTIVA. QUALQUER RECLAMAÇÃO
NESTE SENTIDO, OU SEJA, EVENTUAL PROBLEMA NO VEÍCULO QUE POSSA SER ATRIBUÍDO
À INSTALAÇÃO/USO DO APARELHO, DEVERÁ SER COMPROVADO ATRAVÉS DE TÉCNICOS
DA CONTRATADA OU QUEM ESTA INDICAR.
D) NOS CHAMADOS PARA MANUTENÇÃO, QUANDO SE CONSTAR E SE FUNDAMENTAR
QUE O PROBLEMA NÃO FOI CAUSADO PELO NOSSO RASTREADOR OU OCORRER UMA
VISITA TÉCNICA
EM QUE NÃO SEJA EXECUTADO O SERVIÇO POR FALTA DE DISPONIBILIDADE DO VEÍCULO
SERÁ COBRADO TAXA DE VISITA CONFORME “TABELA DE SERVIÇOS DA CONTRATADA”
EXISTENTE NO WEB SITE: WWW.LOCALIZASAT.COM
    </div>
    <div class="col-6">
   
    9 – ÁREA DE ABRANGÊNCIA:
A) A ÁREA DE COBERTURA DO RASTREAMENTO É A MESMA COBERTA PELA OPERADORA
DE TELEFONIA USADA NO RASTREADOR INSTALADO.
B) EVENTUALMENTE PODERÃO OCORRER MODIFICAÇÕES NA ÁREA DE ABRANGÊNCIA, OU
SEJA, ALGUMAS ÁREAS DE COBERTURA PODERÃO SER EXCLUÍDAS OU INCLUÍDAS PELA
OPERADORA DE TELEFONIA CELULAR.
10 – VIGÊNCIA E RESCISÃO DO CONTRATO:
A) ESTE CONTRATO TERÁ DURAÇÃO MÍNIMA DE 12 MESES, PODENDO SER PRORROGADO
POR TEMPO INDETERMINADO APÓS ESTE PERÍODO.
B) ESTE CONTRATO PODERÁ SER RESCINDIDO A QUALQUER MOMENTO APÓS O PERÍODO
DE CARÊNCIA MÍNIMA DE 12 MESES, POR QUAISQUER DAS PARTES, MEDIANTE
COMUNICAÇÃO POR ESCRITO COM ANTECEDÊNCIA DE 30 DIAS FICANDO O
CONTRATANTE OBRIGADO A ENTREGAR O RASTREADOR DADO EM COMODATO EM ATÉ
05(CINCO) DIAS ÚTEIS.
C) QUANDO A RESCISÃO FOR MOTIVADA PELO CONTRATANTE, ANTES DE 12 MESES APÓS
A ASSINATURA DO PRESENTE, SERÁ COBRADO A TÍTULO DE MÃO DE OBRA PARA RETIRADA
DO RASTREADOR DADO EM COMODATO O VALOR DE R$ 100,00 E MULTA DE 50% DO
VALOR DA MENSALIDADE DOS MESES RESTANTES QUE COMPLETARIAM O PERÍODO DE
CARÊNCIA.
11 – DO COMODATO (EMPRÉSTIMO DO EQUIPAMENTO RASTREADOR):
A) A CONTRATADA EMPRESTARÁ, SOB REGIME DE COMODATO, AO CONTRATANTE, O
EQUIPAMENTO RASTREADOR DE SUA PROPRIEDADE A SER INSTALADO EM UM VEÍCULO
QUE SERÁ INDICADO PELA CONTRATANTE NO ATO DA ADESÃO E RATIFICADO COM
ASSINATURA DO RELATÓRIO DE SERVI ÇO NO DIA DA INSTALAÇÃO DO RASTREADOR.
B) RESPONSABILIZA-SE O CONTRATANTE PELO USO ADEQUADO DO RASTREADOR QUE
ORA LHE É DADO EM COMODATO, BEM COMO POR MANTÊ-LO A SALVO DE PERDA,
FURTO, ROUBO, OU DANO POR MÁ UTILIZAÇÃO, OBRIGANDO-SE, POR FIM, A DEVOLVÊLOS EM PERFEITO ESTADO DE USO E CONSERVAÇÃO A CONTRATADA NA RESCISÃO DESTE
CONTRATO, EXCETUADOS OS DESGASTES NATURAIS DE TEMPO, USO, FURTO OU ROUBO
DO VEÍCULO; ESTA ÚLTIMA DESDE QUE APRESENTADO CÓPIA REPROGRÁFICA
DEVIDAMENTE AUTENTICADA DO BOLETIM DE OCORRÊNCIA REGISTRADO EM DELEGACIA
POLICIAL.
C) A FALTA DE DEVOLUÇÃO FÍSICA DO RASTREADOR POR RESCISÃO DO PRESENTE
CONTRATO, EM ATÉ 5 DIAS ÚTEIS, NO ENDEREÇO DA CONTRATADA, IMPORTA NA
OBRIGAÇÃO DO CONTRATANTE PAGAR À CONTRATADA, IMEDIATAMENTE, O VALOR DE
R$350,00 (TREZENTOS E CINQUENTA REAIS) PARA CADA EQUIPAMENTO RASTREADOR.
12 – DISPOSIÇÕES GERAIS FINAIS:
A) O CONTRATO ORA ESTABELECIDO NÃO CONSTITUI E NÃO REPRESENTA, EM HIPÓTESE
ALGUMA, UMA APÓLICE DE SEGURO, NÃO HAVENDO E OU NÃO IMPLICANDO EM
QUALQUER COBERTURA OU INDENIZAÇÃO, DE QUALQUER NATUREZA, PARA A
CONTRATANTE, PARA OS USUÁRIOS DOS VEÍCULOS DE SUA FROTA E/OU TERCEIROS, OU
PARA OS PRÓPRIOS VEÍCULOS OU CARGAS, BEM COMO, NÃO SENDO GARANTIDA A
INFALIBILIDADE OU PROMETIDA PELA CONTRATADA A TOTAL SEGURANÇA E SUBTRAÇÃO
DO CARREGAMENTO OU PARTE, VEÍCULO OU PARTE DESTE, PASSAGEIROS, OBJETOS NO
INTERIOR, PEÇAS, ACESSÓRIOS E/OU A NÃO OCORRÊNCIA DOS DELITOS DE DESVIO DE
CARGA.
B) CONTRATANTE E CONTRATADA AJUSTAM QUE A PARTE QUE MUDAR DE ENDEREÇO, SE
OBRIGA A INFORMAR A OUTRA, O NOVO ENDEREÇO.
C) O CONTRATANTE DECLARA TER SIDO DEVIDAMENTE INSTRUÍDO PELA CONTRATADA
SOBRE O CORRETO FUNCIONAMENTO DO RASTREADOR E ACESSÓRIOS, SENDO
INFORMADO QUE O MANUAL DO USUÁRIO CONTENDO TODAS AS INFORMAÇÕES
NECESSÁRIAS À SUA OPERACIONALIZAÇÃO ENCONTRA-SE DISPONÍVEL NO ENDEREÇO DE
INTERNET.
D) O INTEIRO TEOR DO PRESENTE CONTRATO ENCONTRA -SE DISPONÍVEL NO ENDEREÇO
DE INTERNTE DA CONTRATADA, PODENDO SER ACESSADO PELO CONTRATANTE A
QUALQUER MOMENTO.
E) O E-MAIL DECLARADO PELA CONTRATANTE E QUALQUER E-MAIL DA CONTRATADA
COM FORMATO “xx@REDEVEICULOS.COM” SERÁ USADO PARA COMUNICAÇÃO FORMAL
E OFICIAL ENTRE AS PARTES.
F) DÚVIDAS LIGAR PARA CENTRAL DE ATENDIMENTO: (21) 3942.4252 NO HORÁRIO
COMERCIAL
13 – DO FORO:
A) PARA DIRIMIR QUAISQUER CONTROVÉRSIAS ORIUNDAS DO PRESENTE CONTRATO, AS
PARTES ELEGEM O FORO DA COMARCA DO RIO DE JANEIRO/RJ, INDEPENDENTEMENTE DE
QUALQUER OUTRA, POR MAIS PRIVILEGIADA QUE SEJA.
POR ESTAREM ASSIM JUSTOS E CONTRATADOS, FIRMAM O PRESENTE INSTRUMENTO, EM
DUAS VIAS DE IGUAL TEOR E FORMA

    </div>
</div>
                                </div>
                                    <!-- Floating Label Start -->
                    <!-- Floating Label End -->
                            </div>
                        </form>
                    </section>
                    <!-- Address End -->

                   
                </div>
                <!-- Content End -->
            </div>

            
        </div>
    </div>
    <a class="btn btn-primary" href=" URL::to('/employee/pdf') ">Export to PDF</a>



@endsection
