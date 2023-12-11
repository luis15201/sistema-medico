<!-- ▓▓▓▓▓▓▓▓▓▓╬══  MENU LATERAL CÓDIGO ══╬▓▓▓▓▓▓▓▓▓▓ -->
<a class="btn btn-primary" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
    <i class="material-icons">menu</i>
</a>


<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasExampleLabel">Menú Lateral</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <div>



            <div class="list-group list-group-mine">


                <!-- Elementos  acordeón 1 -->
                <div class="list-group-item list-group-item-action">
                    <a href="#" data-bs-toggle="collapse" data-bs-target="#submenu_Mantenimientos" data-bs-parent="#submenu-container" style="text-decoration:none" class="list-group-item list-group-item-action">
                        <i class="material-icons">tabs</i>Mantenimientos</a>
                    <div class="collapse" id="submenu_Mantenimientos" data-bs-parent="#submenu-container">
                        <!-- Elementos  acordeón 1.2 -->
                        <div class="list-group-item list-group-item-action">
                            <a href="menu-pacientes.php" data-bs-toggle="collapse" data-bs-target="#submenu_paciente" data-bs-parent="#submenu-container" style="text-decoration:none" class="list-group-item list-group-item-action">Menu Pacientes</a>
                            <div class="collapse" id="submenu_paciente" data-bs-parent="#submenu-container">
                                <a href="paciente.php" class="list-group-item list-group-item-action">Pacientes</a>
                                <a href="#" class="list-group-item list-group-item-action">Vacunas</a>
                                <a href="#" class="list-group-item list-group-item-action">Padecimientos</a>
                                
                            </div>

                        </div>
                        <a href="mant_seguro.php" class="list-group-item list-group-item-action"> Seguros</a>
                        <a href="mant-Agregaruser.php" class="list-group-item list-group-item-action"> Usuarios</a>
                        <a href="mant-centromedico.php" class="list-group-item list-group-item-action"> Centro Médico</a>
                        <a href="mant_medicamentos.php" class="list-group-item list-group-item-action"> Medicamentos</a>
                    </div>

                </div>
                <!-- Elementos  acordeón 2 -->
                <div class="list-group-item list-group-item-action">
                    <a href="#" data-bs-toggle="collapse" data-bs-target="#submenu_procesos" data-bs-parent="#submenu-container" style="text-decoration:none" class="list-group-item list-group-item-action">Procesos</a>
                    <div class="collapse" id="submenu_procesos" data-bs-parent="#submenu-container">
                        <a href="#" class="list-group-item list-group-item-action">Subitem 1</a>
                        <a href="#" class="list-group-item list-group-item-action">Subitem 2</a>
                    </div>

                </div>
                <a href="#" class="list-group-item list-group-item-action"> <i class="material-icons">logout</i>
                    Volver al Login</a>
            </div>
        </div>

    </div>

    <!-- <div class="dropdown mt-3">
                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                    Dropdown button
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
            </div> -->
</div>
</div>

<!-- ▓▓▓▓▓▓▓▓▓▓╬══ FIN CÓDIGO MENU LATERAL ══╬▓▓▓▓▓▓▓▓▓▓ -->