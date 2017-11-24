<div class="page-header">
    <h2>Gerenciar <small>Períodos</small></h2>		
</div>	

<table class="table table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>Período</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($periodos as $periodo) :?>
            <tr>
                <td><?= $periodo->getId(); ?></td>
                <td><?= $periodo->getDescricao(); ?></td>
                <td>
                    <a class="btn btn-info" href="?r=periodos&f=edit&id=<?= $periodo->getId(); ?>" role="button">Editar Período</a>
                    <form action="?r=periodos&f=delete" method="post" class="action-delete">
                        <input type="hidden" name="id" value="<?= $periodo->getId(); ?>">
                        <button type="submit" class="btn btn-danger">Excluir Período</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<div class="pull-right">
    <a class="btn btn-primary" href="?r=periodos&f=new" role="button">Novo Período</a>
</div>

<div class="clearfix"></div>