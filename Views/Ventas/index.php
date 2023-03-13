<?php
    include "Views/Templates/header.php";
?>
   <div class="container-fluid">
        <div class="row">
            <div class="col-lg-7">
                <div class="card">
                    <div class="card-header bg-green">
                        <h4 class="card-title text-white"><i class="fa fa-tasks"></i>Productos</h4>
                    </div>
                    <div class="form body">
                        <div class="card-body">
                            <div id="loading">
                                <div class="row-horizon">
                                    <span class="categories selectedGat" id=""><i class="fa fa-home"></i></span>
                                    <span class="categories" id="">PROMOCION</span>
                                    <span class="categories" id="">FAMILIAR</span>
                                    <span class="categories" id="">OTROS</span>
                                    <span class="categories" id="">FAMILIAR</span>
                                    <span class="categories" id="">OTROS</span>
                                    <span class="categories" id="">FAMILIAR</span>
                                    <span class="categories" id="">OTROS</span>
                                    <span class="categories" id="">FAMILIAR</span>
                                    <span class="categories" id="">OTROS</span>
                                </div>

                                <div class="col-md-12">
                                    <div id="searchContaner"> 
                                        <div class="form-group has-feedback2"> 
                                            <label class="control-label"></label>
                                            <input type="text" class="form-control" name="busquedaproductov" id="busquedaproductov" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" placeholder="Realice la Búsqueda del Producto por Nombre">
                                            <i class="fa fa-search form-control-feedback2"></i>
                                        </div>
                                    </div>
                                </div>

                                <div id="productList2">
                                    <div class="row row-vertical">

                                        <div OnClick="DoAction();" class="col-md-4 producto"> 
                                            <div id="">
                                                <div class="darkblue-panel pn" title="">
                                                    <div class="darkblue-header">
                                                        <div id="proname" class="text-white"></div>
                                                    </div>
                                                    <img src='./Assets/img/default.jpg' class='' style='width:150px;height:134px;'>
                                                    <input type="hidden" id="category" name="category" value="">
                                                    <div class="mask">
                                                        <a class="text-white">
                                                        <br>
                                                        </a>
                                                        <h5>Stock: </h5>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                        <div OnClick="DoAction();" class="col-md-4 producto"> 
                                            <div id="">
                                                <div class="darkblue-panel pn" title="">
                                                    <div class="darkblue-header">
                                                        <div id="proname" class="text-white"></div>
                                                    </div>
                                                    <img src='./Assets/img/default.jpg' class='' style='width:150px;height:134px;'>
                                                    <input type="hidden" id="category" name="category" value="">
                                                    <div class="mask">
                                                        <a class="text-white">
                                                        <br>
                                                        </a>
                                                        <h5>Stock: </h5>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                        <div OnClick="DoAction();" class="col-md-4 producto"> 
                                            <div id="">
                                                <div class="darkblue-panel pn" title="">
                                                    <div class="darkblue-header">
                                                        <div id="proname" class="text-white"></div>
                                                    </div>
                                                    <img src='./Assets/img/default.jpg' class='' style='width:150px;height:134px;'>
                                                    <input type="hidden" id="category" name="category" value="">
                                                    <div class="mask">
                                                        <a class="text-white">
                                                        <br>
                                                        </a>
                                                        <h5>Stock: </h5>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                        <div OnClick="DoAction();" class="col-md-4 producto"> 
                                            <div id="">
                                                <div class="darkblue-panel pn" title="">
                                                    <div class="darkblue-header">
                                                        <div id="proname" class="text-white"></div>
                                                    </div>
                                                    <img src='./Assets/img/default.jpg' class='' style='width:150px;height:134px;'>
                                                    <input type="hidden" id="category" name="category" value="">
                                                    <div class="mask">
                                                        <a class="text-white">
                                                        <br>
                                                        </a>
                                                        <h5>Stock: </h5>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-5">
                <div class="card">
                    <div class="card-header bg-green">
                        <h4 class="card-title text-white"><i class="fa fa-pencil"></i> Gestión de Ventas</h4>
                    </div>
                    <form class="form form-material" method="post" action="#" name="saveventas" id="saveventas">

                        <div id="save">
                        <!-- error will be shown here ! -->
                        </div>

                    <div class="form-body">

                        <div class="card-body">

                        <div id="muestradetallemesa"><center>SELECCIONE PRODUCTOS PARA CONTINUAR -></center></div>
                
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
   </div>

<?php
    include "Views/Templates/footer.php";
?>
