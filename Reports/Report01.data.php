<!-- Aquí se diseña el PDF -->
<h1 class="text-md text-center"><?=$titulo?></h1>
<table class="table table-border mt-3">
  <colgroup>
    <col style='width: 10%'>
    <col style='width:25%'>
    <col style='width:25%'>
    <col style='width:20%'>
    <col style='width:20%'>
  </colgroup>
  <thead>
    <tr>
      <th>ID</th>
      <th>Carrera</th>
      <th>Datos del postulante</th>
      <th>Estado matrícula</th>
      <th>Pago de la matrícula</th>
    </tr>
  </thead>
  <tbody>
      <?php foreach($datos as $registro): ?>
        <tr>
          <td><?=$registro['idCarrera']?></td>
          <td><?=$registro['nombreCarrera']?></td>
          <td><?=$registro['nombres']?> <?=$registro['apellidos']?></td>
          <td><?=$registro['estado']?></td>
          <td><?=$registro['estadoPago']?></td>
        </tr>
      <?php endforeach; ?>
  </tbody>
</table>