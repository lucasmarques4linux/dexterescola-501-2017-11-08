<div class="page-header">
	<h2>Novo <small>Período</small></h2>		
</div>
<?php if(isset($_SESSION['erro'])): ?>
    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <?php
        echo $_SESSION['erro'];
        unset($_SESSION['erro']);
        ?>
    </div>
<?php endif?>

<form action="?r=periodos&f=save" method="POST">
	<div class="form-group">
		<label>Período</label>
		<input type="text" name="descricao" class="form-control" placeholder="Período" required>
	</div>
	<a class="btn btn-warning" href="?r=periodos" role="button">Voltar</a>
	<button type="submit" class="btn btn-default">Salvar</button>
</form>