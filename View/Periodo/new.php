<div class="page-header">
	<h2>Novo <small>Período</small></h2>		
</div>

<form action="/periodos?f=insert" method="POST">
  <div class="form-group">
    <label>Período</label>
    <input type="text" name="descricao" class="form-control" placeholder="Período" required>
  </div>
  <a class="btn btn-warning" href="/periodos?f=home" role="button">Voltar</a>
  <button type="submit" class="btn btn-default">Salvar</button>
</form>