class NavbarGeneral extends HTMLElement {
    connectedCallback() {
        this.innerHTML = `
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid px-lg-5 px-3 py-1">
                <a class="navbar-brand pe-3" href="../index.html">
                    <img class="align-top" src="../img/logos/mei_logo_h_transparent.svg" width="100"></img>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item ms-auto pe-3">
                            <a class="nav-link" href="../index.html">Inicio</a>
                        </li>
                        <li class="nav-item ms-auto pe-3">
                            <a class="nav-link" href="about-us.html">Nosotros</a>
                        </li>
                        <li class="nav-item ms-auto pe-3">
                            <a class="nav-link" href="contact.html">Contacto</a>
                        </li>
                    </ul>

                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item ms-auto mb-2 mb-lg-0">
                            <a type="button" class="btn btn-outline-secondary rounded-4 mx-1" href="login.html" style="width: 150px;">Iniciar sesión</a>
                        </li>
                        <li class="nav-item ms-auto ">
                            <a type="button" class="btn btn-primary rounded-4 mx-1" href="prices.html" style="width: 150px;">Comprar</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        `
    }
}

class FooterBasic extends HTMLElement {
    connectedCallback() {
        this.innerHTML = `
        <div class="container-fluid text-mei">
            <div class="row align-items-center px-3 px-lg-5 bg-dark">
                <div class="col-lg-6 text-center text-lg-start py-2">
                    <span class="text-muted">Copyright © 2021 Mei PoS. Todos los derechos reservados.</span>
                </div>
            </div>
        </div>
        `
    }
}

customElements.define('navbar-general', NavbarGeneral);
customElements.define('footer-basic', FooterBasic);