<!DOCTYPE html>
<html>

<head>
<title></title>
</head>

<body>
<!--
<h1>REPORTES</h1>


<form action="<?php echo base_url();?>index.php/reportes/generarReportes" method = "POST">

<input type="text" name = "txtPDF"><br>
<input type="submit" value="btnDownload">

</form>

-->



                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-6">
                        <h2>Datos Ultrasonido</h2>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Fecha</th>
                                        <th>Distancia</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                        foreach($ult -> result_array() as $u){
                                            echo "<tr>";
                                            echo "<td>".$u['id']."</td>";
                                            echo "<td>".$u['fecha']."</td>";
                                            echo "<td>".$u['distancia']."</td>";
                                            echo "</tr>";
                                        }

                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

</body>

</html>
