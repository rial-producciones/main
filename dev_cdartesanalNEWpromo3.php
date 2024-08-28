<script src="https://rialproducciones.com/nuevo/js/jquery-1.4.3.min.js"></script>
<script src="https://rialproducciones.com/nuevo/SpryAssets/SpryValidationTextField.js"></script>
<script>
    $(document).ready(function() {
        $(".tooltip1-2").mouseover(function() {
            eleOffset = $(this).offset();
            $(this).next().fadeIn("fast").css({
                left: eleOffset.left + $(this).outerWidth(),
                top: eleOffset.top
            });
        }).mouseout(function() {
            $(this).next().hide();
        });
    });
</script>
<link rel="stylesheet" href="/autocomplete/autosuggest_inquisitor.css" type="text/css" media="screen" />
<!-- <link href="https://rialproducciones.com/nuevo/master.css" rel="stylesheet" type="text/css" /> -->
<link href="https://rialproducciones.com/nuevo/SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<div class="buscador">
    <form class="form-inline" action="../buscarCancion.php" method="post">
        <div class="dev dev_bus" style="margin-top:1px;">
            <h1 align="center">
                <?php
                if ($_GET['idBtn'] == 1) {
                    echo 'PISTAS DE TANGO';
                } else {
                    echo 'PISTAS DE OTROS RUBROS';
                }
                ?>
                <input type="hidden" id="testid" />
            </h1>
            <input style="display: none;" type="text" id="idBtn" name="idBtn" value="<?php echo $_GET['idBtn']; ?>" />
            <input class="form-control form-control-sm textbox text" type="text" id="buscarInput" name="buscarInput" value="" /><button class="btn btn-danger buscar" type="submit"><img src="https://rialproducciones.com/nuevo/assets/img/iconmonstr-magnifier-4-24.png" alt="search" /></button>
            <div class="dev dev_bus_cat" style="margin-top:15px;">
                <h6>BUSQUEDA ALFABETICA POR TITULO</h6>
                <div style="margin: 5px 0 5px 2px ;clear: both; "><a href="https://rialproducciones.com/karaoke-pistas-musicales-playbacks.php?goto=karaoke&amp;letrab=A&amp;idBtn=<?php echo $_GET['idBtn']; ?>">A</a> - <a href="https://rialproducciones.com/karaoke-pistas-musicales-playbacks.php?goto=karaoke&amp;letrab=B&amp;idBtn=<?php echo $_GET['idBtn']; ?>">B</a> - <a href="https://rialproducciones.com/karaoke-pistas-musicales-playbacks.php?goto=karaoke&amp;letrab=C&amp;idBtn=<?php echo $_GET['idBtn']; ?>">C</a> - <a href="https://rialproducciones.com/karaoke-pistas-musicales-playbacks.php?goto=karaoke&amp;letrab=D&amp;idBtn=<?php echo $_GET['idBtn']; ?>">D</a> - <a href="https://rialproducciones.com/karaoke-pistas-musicales-playbacks.php?goto=karaoke&amp;letrab=E&amp;idBtn=<?php echo $_GET['idBtn']; ?>">E</a> - <a href="https://rialproducciones.com/karaoke-pistas-musicales-playbacks.php?goto=karaoke&amp;letrab=F&amp;idBtn=<?php echo $_GET['idBtn']; ?>">F</a> - <a href="https://rialproducciones.com/karaoke-pistas-musicales-playbacks.php?goto=karaoke&amp;letrab=G&amp;idBtn=<?php echo $_GET['idBtn']; ?>">G</a> - <a href="https://rialproducciones.com/karaoke-pistas-musicales-playbacks.php?goto=karaoke&amp;letrab=H&amp;idBtn=<?php echo $_GET['idBtn']; ?>">H</a> - <a href="https://rialproducciones.com/karaoke-pistas-musicales-playbacks.php?goto=karaoke&amp;letrab=I&amp;idBtn=<?php echo $_GET['idBtn']; ?>">I</a> - <a href="https://rialproducciones.com/karaoke-pistas-musicales-playbacks.php?goto=karaoke&amp;letrab=J&amp;idBtn=<?php echo $_GET['idBtn']; ?>">J</a> - <a href="https://rialproducciones.com/karaoke-pistas-musicales-playbacks.php?goto=karaoke&amp;letrab=K&amp;idBtn=<?php echo $_GET['idBtn']; ?>">K</a> - <a href="https://rialproducciones.com/karaoke-pistas-musicales-playbacks.php?goto=karaoke&amp;letrab=L&amp;idBtn=<?php echo $_GET['idBtn']; ?>">L</a> - <a href="https://rialproducciones.com/karaoke-pistas-musicales-playbacks.php?goto=karaoke&amp;letrab=M&amp;idBtn=<?php echo $_GET['idBtn']; ?>">M</a> - <a href="https://rialproducciones.com/karaoke-pistas-musicales-playbacks.php?goto=karaoke&amp;letrab=N&amp;idBtn=<?php echo $_GET['idBtn']; ?>">N</a> - <a href="https://rialproducciones.com/karaoke-pistas-musicales-playbacks.php?goto=karaoke&amp;letrab=O&amp;idBtn=<?php echo $_GET['idBtn']; ?>">O</a> - <a href="https://rialproducciones.com/karaoke-pistas-musicales-playbacks.php?goto=karaoke&amp;letrab=P&amp;idBtn=<?php echo $_GET['idBtn']; ?>">P</a> - <a href="https://rialproducciones.com/karaoke-pistas-musicales-playbacks.php?goto=karaoke&amp;letrab=Q&amp;idBtn=<?php echo $_GET['idBtn']; ?>">Q</a> - <a href="https://rialproducciones.com/karaoke-pistas-musicales-playbacks.php?goto=karaoke&amp;letrab=R&amp;idBtn=<?php echo $_GET['idBtn']; ?>">R</a> - <a href="https://rialproducciones.com/karaoke-pistas-musicales-playbacks.php?goto=karaoke&amp;letrab=S&amp;idBtn=<?php echo $_GET['idBtn']; ?>">S</a> - <a href="https://rialproducciones.com/karaoke-pistas-musicales-playbacks.php?goto=karaoke&amp;letrab=T&amp;idBtn=<?php echo $_GET['idBtn']; ?>">T</a> - <a href="https://rialproducciones.com/karaoke-pistas-musicales-playbacks.php?goto=karaoke&amp;letrab=U&amp;idBtn=<?php echo $_GET['idBtn']; ?>">U</a> - <a href="https://rialproducciones.com/karaoke-pistas-musicales-playbacks.php?goto=karaoke&amp;letrab=V&amp;idBtn=<?php echo $_GET['idBtn']; ?>">V</a> - <a href="https://rialproducciones.com/karaoke-pistas-musicales-playbacks.php?goto=karaoke&amp;letrab=W&amp;idBtn=<?php echo $_GET['idBtn']; ?>">W</a> - <a href="https://rialproducciones.com/karaoke-pistas-musicales-playbacks.php?goto=karaoke&amp;letrab=X&amp;idBtn=<?php echo $_GET['idBtn']; ?>">X</a> - <a href="https://rialproducciones.com/karaoke-pistas-musicales-playbacks.php?goto=karaoke&amp;letrab=Y&amp;idBtn=<?php echo $_GET['idBtn']; ?>">Y</a> - <a href="https://rialproducciones.com/karaoke-pistas-musicales-playbacks.php?goto=karaoke&amp;letrab=Z&amp;idBtn=<?php echo $_GET['idBtn']; ?>">Z</a></div>
            </div>
        </div>
    </form>
</div>
<p>&nbsp;</p>
<!--<div>        <a class="btn btn-outline-dark" href="http://www.viacerino.com.ar/demos.php">Escuche algunos demos</a>		</div>--> <?php /*?><?php include('dev_cdartesanalNEWal.php');?><?php */ ?>