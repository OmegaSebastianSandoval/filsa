<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<table border="1" cellpadding="2">
    <thead>
        <tr>
            <td>Fecha de Creación</td>
            <td>Nombre</td>
            <td>Nit</td>
            <td>Nivel</td>
            <td>Correo</td>
            <td>Telefono</td>
            <td>Departamento</td>
            <td>Municipio</td>
            <td>Dirección</td>
            <td>Nombre de contacto</td>
            <td>Telefono de contacto</td>
        </tr>
    </thead>
    <tbody></tbody>
    <?php foreach ($this->lists as $content) { ?>
        <?php $id =  $content->user_id; ?>
        <tr>
            <td><?= $content->user_date; ?></td>
            <td><?= $content->user_names; ?></td>
            <td><?= $content->user_cedula  ?></td>
            <td><?= $this->list_user_nivel_cliente[$content->user_level]  ?></td>
            <td><?= $content->user_email   ?></td>
            <td><?= $content->user_telefono  ?></td>
            <td><?= $this->departamentos[$content->user_departamento] ?></td>
            <td><?= $this->municipios[$content->user_municipio]  ?></td>
            <td><?= $content->user_addres  ?></td>
            <td><?= $content->user_contacto  ?></td>
            <td><?= $content->user_telefono_contacto  ?></td>
        </tr>
    <?php } ?>
    </tbody>
</table>