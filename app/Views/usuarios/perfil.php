<div class="container my-3">

    <div class="card bg-light">
        <?= Sessao::mensagem('usuario') ?>
        <div class="row">
            <div class="col-md-4">
                <div class="card m-3">
                    <div class="card-header bg-secondary text-white">
                        <h5 class="card-title text-center"><?= $dados['nome'] ?></h5>
                    </div>
                    <div class="card-body">
                        <p class="card-text"><?= $dados['biografia'] ?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card m-3">
                    <div class="card-header bg-secondary">
                        Dados Pessoais
                    </div>
                    <div class="card-body">
                        <?php

                        //resolvendo o problema de index undefined das variáveis de erro, verifica se existem campos vazios das variáveis de erro e os remove caso estejam vazios.
                        if (empty($dados['nome_erro'])) {
                            unset($dados['nome_erro']);
                        } 
                        if (empty($dados['email_erro'])) {
                            unset($dados['email_erro']);
                        }
                        if (empty($dados['senha_erro'])) {
                            unset($dados['senha_erro']);
                        }

                        ?>
                        <form name="atualizar" method="POST" action="<?= URL ?>/usuarios/perfil/<?= $dados['id'] ?>">
                            <div class="form-group">
                                <label for="nome">Nome: <sup class="text-danger">*</sup></label>
                                <input type="text" name="nome" id="nome" value="<?= $dados['nome'] ?>" class="form-control <?= isset($dados['nome_erro']) ? 'is-invalid' : '' ?>">
                                <div class="invalid-feedback">
                                    <?= isset($dados['nome_erro']) ? $dados['nome_erro'] : '' ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email">E-mail: <sup class="text-danger">*</sup></label>
                                <input type="text" name="email" id="email" value="<?= $dados['email'] ?>" class="form-control <?= isset($dados['email_erro']) ? 'is-invalid' : '' ?>">
                                <div class="invalid-feedback">
                                    <?= isset($dados['email_erro']) ? $dados['email_erro'] : '' ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="senha">Senha:</label>
                                <input type="password" name="senha" id="senha" class="form-control  <?= isset($dados['senha_erro']) ? 'is-invalid' : '' ?>">
                                <div class="invalid-feedback">
                                    <?= isset($dados['senha_erro']) ? $dados['senha_erro'] : '' ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="biografia">Biografia:</label>
                                <textarea name="biografia" id="biografia" class="form-control" rows="5"><?= $dados['biografia'] ?></textarea>
                            </div>

                            <input type="submit" value="Atualizar" data-toggle="tooltip" title="Atualizar Dados do Perfil" class="btn btn-info btn-block">

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>