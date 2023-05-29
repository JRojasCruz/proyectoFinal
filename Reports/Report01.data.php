<!-- Aquí se diseña el PDF -->
<h1 class="text-md text-center"><?=$titulo?></h1>
<table class="table table-border mt-3">
  <colgroup>
    <col style='width: 10%'>
    <col style='width:20%'>
    <col style='width:20%'>
    <col style='width:10%'>
    <col style='width:20%'>
    <col style='width:10%'>
    <col style='width:10%'>
  </colgroup>
  <thead>
    <tr>
      <th>ID</th>
      <th>Datos del postulante</th>
      <th>Cert. de Estudios</th>
      <th>Foto</th>
      <th>Ant. Policiales</th>
      <th>Estado de matrícula</th>
      <th>Estado de pago</th>
    </tr>
  </thead>
  <tbody>
      <?php foreach($datos as $registro): ?>
        <tr>
          <td><?=$registro['idMatricula']?></td>
          <td><?=$registro['nombres']?><?=$registro['apellidos']?></td>
          <td><?=$registro['certEstudios']?></td>
          <td><?=$registro['foto']?></td>
          <td><?=$registro['certAntPoliciales']?></td>
          <td><?=$registro['estadoPago']?></td>
        </tr>
      <?php endforeach; ?>
  </tbody>
</table>