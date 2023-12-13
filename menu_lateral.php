<!-- ▓▓▓▓▓▓▓▓▓▓╬══  MENU LATERAL CÓDIGO ══╬▓▓▓▓▓▓▓▓▓▓ -->
<a class="btn btn-primary" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
    <i class="material-icons">menu</i>
</a>


<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasExampleLabel">Menú General</h5>
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
                    <a href="menu-mant.php" class="list-group-item list-group-item-action" style="text-align: right;"><i class="material-icons">menu</i> Menu Mant</a>
                        <!-- Elementos  acordeón 1.2 -->
                        <div class="list-group-item list-group-item-action">
                            <a href="menu-pacientes.php" data-bs-toggle="collapse" data-bs-target="#submenu_paciente" data-bs-parent="#submenu-container" style="text-decoration:none" class="list-group-item list-group-item-action"> <i class="material-icons">personal_injury</i> Pacientes</a>
                            <div class="collapse" id="submenu_paciente" data-bs-parent="#submenu-container">
                            <a href="menu-pacientes.php" class="list-group-item list-group-item-action" style="text-align: right;"><i class="material-icons">menu</i> Menu Pacientes</a>
                               
                                <a href="paciente.php" class="list-group-item list-group-item-action"><i class="material-icons">group</i> Pacientes</a>
                                <a href="MANT-pacientevacuna.php" class="list-group-item list-group-item-action"><i class="material-icons">vaccines</i> Vacunas</a>
                                <a href="mant_paciente_historiaClinica.php" class="list-group-item list-group-item-action"><i class="material-icons">healing</i> Padecimientos</a>

                            </div>

                        </div>
                        <a href="mant_seguro.php" class="list-group-item list-group-item-action"><i class="material-icons">medical_information</i>  Seguros</a>
                        <a href="mant-Agregaruser.php" class="list-group-item list-group-item-action"> <i class="material-icons">account_circle</i> Usuarios</a>
                        <a href="mant-centromedico.php" class="list-group-item list-group-item-action"><i class="material-icons">medical_services</i>  Centro Médico</a>
                        <a href="mant_medicamentos.php" class="list-group-item list-group-item-action"> <i class="material-icons">local_pharmacy</i> Medicamentos</a>
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
                <!-- Elementos  acordeón 3 -->
                <div class="list-group-item list-group-item-action">
                    <a href="#" data-bs-toggle="collapse" data-bs-target="#submenu_procesos" data-bs-parent="#submenu-container" style="text-decoration:none" class="list-group-item list-group-item-action"> <i class="material-icons">analytics</i> Consultas y Reportes</a>
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