<div class="nav-content d-flex">
    <!-- Logo Start -->
    <div class="logo position-relative">
        <a href="/">
            <!-- Logo can be added directly -->
        <!-- <img src="{{ asset('/img/logo/logo-white.svg') }}" alt="logo" /> -->
            <!-- Or added via css to provide different ones for different color themes -->
            <div class="img"></div>
        </a>
    </div>
    <!-- Logo End -->
    <!-- Language Switch Start -->
    <div class="language-switch-container">
        <button class="btn btn-empty language-button dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false">PT
        </button>
        <div class="dropdown-menu">
            <a href="#" class="dropdown-item">PT</a>
        </div>
    </div>
    <!-- Language Switch End -->
    <!-- User Menu Start -->
    <div class="user-container d-flex">

        <div class="dropdown-menu dropdown-menu-end user-menu wide">
            <div class="row mb-3 ms-0 me-0">
                <div class="col-12 ps-1 mb-2">
                    <div class="text-extra-small text-primary">CONTA</div>
                </div>
                <div class="col-6 ps-1 pe-1">
                    <ul class="list-unstyled">
                        <li>
                            <a href="#">Informações</a>
                        </li>
                        <li>
                            <a href="#">Preferências</a>
                        </li>
                    </ul>
                </div>
                <div class="col-6 pe-1 ps-1">
                    <ul class="list-unstyled">
                        <li>
                            <a href="#">Segurança</a>
                        </li>
                        <li>
                            <a href="#">Logs</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="row mb-1 ms-0 me-0">
                <div class="col-12 p-1 mb-2 pt-2">
                    <div class="text-extra-small text-primary">APLICAÇÃO</div>
                </div>
                <div class="col-6 ps-1 pe-1">
                    <ul class="list-unstyled">
                        <li>
                            <a href="#">Temas</a>
                        </li>
                        <li>
                            <a href="#">Linguagens</a>
                        </li>
                    </ul>
                </div>
                <div class="col-6 pe-1 ps-1">
                    <ul class="list-unstyled">
                        <li>
                            <a href="#">Aparelhos</a>
                        </li>
                        <li>
                            <a href="#">Disco</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="row mb-1 ms-0 me-0">
                <div class="col-12 p-1 mb-3 pt-3">
                    <div class="separator-light"></div>
                </div>
                <div class="col-6 ps-1 pe-1">
                    <ul class="list-unstyled">
                        <li>
                            <a href="#">
                                <i data-cs-icon="help" class="me-2" data-cs-size="17"></i>
                                <span class="align-middle">Ajuda</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i data-cs-icon="document-full" class="me-2" data-cs-size="17"></i>
                                <span class="align-middle">Docs</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-6 pe-1 ps-1">
                    <ul class="list-unstyled">
                        <li>
                            <a href="#">
                                <i data-cs-icon="gear" class="me-2" data-cs-size="17"></i>
                                <span class="align-middle">Configurações</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i data-cs-icon="logout" class="me-2" data-cs-size="17"></i>
                                <span class="align-middle">Sair</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- User Menu End -->
    <!-- Icons Menu Start -->
    <ul class="list-unstyled list-inline text-center menu-icons">
        <li class="list-inline-item">
            <a href="#" data-bs-toggle="modal" data-bs-target="#searchPagesModal">
                <i data-cs-icon="search" data-cs-size="18"></i>
            </a>
        </li>
        <li class="list-inline-item">
            <a href="#" id="pinButton" class="pin-button">
                <i data-cs-icon="lock-on" class="unpin" data-cs-size="18"></i>
                <i data-cs-icon="lock-off" class="pin" data-cs-size="18"></i>
            </a>
        </li>
        <li class="list-inline-item">
            <a href="#" id="colorButton">
                <i data-cs-icon="light-on" class="light" data-cs-size="18"></i>
                <i data-cs-icon="light-off" class="dark" data-cs-size="18"></i>
            </a>
        </li>
        <li class="list-inline-item">
            <a href="#" data-bs-toggle="dropdown" data-bs-target="#notifications" aria-haspopup="true"
               aria-expanded="false" class="notification-button">
                <div class="position-relative d-inline-flex">
                    <i data-cs-icon="bell" data-cs-size="18"></i>
                    <span class="position-absolute notification-dot rounded-xl"></span>
                </div>
            </a>
            <div class="dropdown-menu dropdown-menu-end wide notification-dropdown scroll-out" id="notifications">
                <div class="scroll">
                    <ul class="list-unstyled border-last-none">
                        <li class="mb-3 pb-3 border-bottom border-separator-light d-flex">
                            <img src="{{ asset('/img/profile/profile-1.jpg') }}"
                                 class="me-3 sw-4 sh-4 rounded-xl align-self-center" alt="..."/>
                            <div class="align-self-center">
                                <a href="#">Joisse Kaycee just sent a new comment!</a>
                            </div>
                        </li>
                        <li class="mb-3 pb-3 border-bottom border-separator-light d-flex">
                            <img src="{{ asset('/img/profile/profile-2.jpg') }}"
                                 class="me-3 sw-4 sh-4 rounded-xl align-self-center" alt="..."/>
                            <div class="align-self-center">
                                <a href="#"></a>
                            </div>
                        </li>
                        <li class="mb-3 pb-3 border-bottom border-separator-light d-flex">
                            <img src="{{ asset('/img/profile/profile-3.jpg') }}"
                                 class="me-3 sw-4 sh-4 rounded-xl align-self-center" alt="..."/>
                            <div class="align-self-center">
                                <a href="#"></a>
                            </div>
                        </li>
                        <li class="pb-3 pb-3 border-bottom border-separator-light d-flex">
                            <img src="{{ asset('/img/profile/profile-6.jpg') }}"
                                 class="me-3 sw-4 sh-4 rounded-xl align-self-center" alt="..."/>
                            <div class="align-self-center">
                                <a href="#"></a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </li>
    </ul>
    <!-- Icons Menu End -->
    <!-- Menu Start -->
    <div class="menu-container flex-grow-1">
        <ul id="menu" class="menu">
            <li>
                <a href="/Interface/Forms/Cadastro" data-href="/Dashboards">
                    <i data-cs-icon="home" class="icon" data-cs-size="18"></i>
                    <span class="label">Cadastrar</span>
                </a>  
            </li>
            <li>
                <a href="#apps" data-href="/Apps">
                    <i data-cs-icon="screen" class="icon" data-cs-size="18"></i>
                    <span class="label">Listar</span>
                </a>
            </li>
            <li>
                <a href="#pages" data-href="/Pages">
                    <i data-cs-icon="notebook-1" class="icon" data-cs-size="18"></i>
                    <span class="label">Gerar PDF</span>
                </a>   
            </li>
            
    </div>
    <!-- Menu End -->
    <!-- Mobile Buttons Start -->
    <div class="mobile-buttons-container">
        <!-- Scrollspy Mobile Button Start -->
        <a href="#" id="scrollSpyButton" class="spy-button" data-bs-toggle="dropdown">
            <i data-cs-icon="menu-dropdown"></i>
        </a>
        <!-- Scrollspy Mobile Button End -->
        <!-- Scrollspy Mobile Dropdown Start -->
        <div class="dropdown-menu dropdown-menu-end" id="scrollSpyDropdown"></div>
        <!-- Scrollspy Mobile Dropdown End -->
        <!-- Menu Button Start -->
        <a href="#" id="mobileMenuButton" class="menu-button">
            <i data-cs-icon="menu"></i>
        </a>
        <!-- Menu Button End -->
    </div>
    <!-- Mobile Buttons End -->
</div>
<div class="nav-shadow"></div>
