<div class="limiter">
        <div class="container-login100" style="background-image: url('boot/images/bg-02.jpg');">
            <div class="wrap-login100 p-t-30 p-b-50">
                <form class="login100-form validate-form p-b-33 p-t-5"  method="post" action="index.php?controller=Semesters&action=sem">
                    
                    <span class="login100-form-title p-b-48">
                        <img src="boot/images/logo.png" style="width: 100%">
                    </span>

                    <div class="wrap-input100 validate-input" data-validate = "RGA valido: somente numeros">
                        <input class="input100" type="text" name="rga">
                        <span class="focus-input100" data-placeholder="RGA"></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Entre com a senha">
                        <span class="btn-show-pass">
                            <i class="zmdi zmdi-eye"></i>
                        </span>
                        <input class="input100" type="password" name="pass">
                        <span class="focus-input100" data-placeholder="Senha"></span>
                    </div>

                    <div class="container-login100-form-btn">
                        <div class="wrap-login100-form-btn">
                            <div class="login100-form-bgbtn"></div>
                            <button class="login100-form-btn" type="submit">
                                Login
                            </button>
                        </div>
                        <!-- Button trigger modal --><br></br>
                        <button type="button" class="btn btn-secundary" data-toggle="modal" data-target="#exampleModalCenter">
                          TERMOS DE USO
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalCenterTitle">TERMOS DE USO</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">TERMOS DE USO</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                - O primeiro acesso irá demorar aproximadamente 5 minutos.<br>
                                - Está ciente que o app apresente apenas as notas<br>
                                - Não utilizaremos login/senha para outra coisa que não seja consultar o siscad periodicamente.<br>
                                - O app depende do site, portanto, alterações podem ocasionar falhas.<br>
                                - Está ciente que o sistema é um trabalho de conclusão de curso, assim, não é de responsabilidade da instituição UFMS.<br>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              </div>
                            </div>
                          </div>
                        </div>

                    </div>

                </form>
            </div>
        </div>
    </div>