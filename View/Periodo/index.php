<div>
	<h2>Gerenciar <small>Períodos</small></h2>	
</div>

<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Período</th>
      <th scope="col">Ações</th>
    </tr>
  </thead>
  <tbody>
  		<?php foreach ($periodos as $periodo) : ?>
  			<tr>
		      <th scope="row"><?= $periodo->getId();?></th>
		      <td><?= $periodo->getDescricao();?></td>
		      <td></td>
		    </tr>
  		<?php endforeach; ?>
    
  </tbody>
</table>
