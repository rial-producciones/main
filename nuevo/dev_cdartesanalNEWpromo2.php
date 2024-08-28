<script src="js/jquery-1.4.3.min.js"></script>
<script src="SpryAssets/SpryValidationTextField.js"></script>
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
<link rel="stylesheet" href="autocomplete/autosuggest_inquisitor.css" type="text/css" media="screen" />
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<div class="buscador">
    <form class="form-inline" action="buscarCancion.php" method="post">
        <div class="dev dev_bus" style="margin-top:1px;">
            <h1 align="center">PISTAS DE TANGO <input type="hidden" id="testid" /> </h1> <input class="form-control form-control-sm textbox text" type="text" id="buscarInput" name="buscarInput" value="" />&nbsp;&nbsp;<button class="btn btn-danger buscar" type="submit"><img src="https://rialproducciones.com/nuevo/assets/img/iconmonstr-magnifier-4-24.png" alt="search" /></button>
            <div class="dev dev_bus_cat" style="margin-top:15px;">
                <h6>BUSQUEDA ALFABETICA POR TITULO</h6>
                <div style="margin: 5px 0 5px 2px ;clear: both; "><a href="https://rialproducciones.com/karaoke-pistas-musicales-playbacks.php?goto=karaoke&amp;letrab=A&amp;idBtn=1">A</a> - <a href="https://rialproducciones.com/karaoke-pistas-musicales-playbacks.php?goto=karaoke&amp;letrab=B&amp;idBtn=1">B</a> - <a href="https://rialproducciones.com/karaoke-pistas-musicales-playbacks.php?goto=karaoke&amp;letrab=C&amp;idBtn=1">C</a> - <a href="https://rialproducciones.com/karaoke-pistas-musicales-playbacks.php?goto=karaoke&amp;letrab=D&amp;idBtn=1">D</a> - <a href="https://rialproducciones.com/karaoke-pistas-musicales-playbacks.php?goto=karaoke&amp;letrab=E&amp;idBtn=1">E</a> - <a href="https://rialproducciones.com/karaoke-pistas-musicales-playbacks.php?goto=karaoke&amp;letrab=F&amp;idBtn=1">F</a> - <a href="https://rialproducciones.com/karaoke-pistas-musicales-playbacks.php?goto=karaoke&amp;letrab=G&amp;idBtn=1">G</a> - <a href="https://rialproducciones.com/karaoke-pistas-musicales-playbacks.php?goto=karaoke&amp;letrab=H&amp;idBtn=1">H</a> - <a href="https://rialproducciones.com/karaoke-pistas-musicales-playbacks.php?goto=karaoke&amp;letrab=I&amp;idBtn=1">I</a> - <a href="https://rialproducciones.com/karaoke-pistas-musicales-playbacks.php?goto=karaoke&amp;letrab=J&amp;idBtn=1">J</a> - <a href="https://rialproducciones.com/karaoke-pistas-musicales-playbacks.php?goto=karaoke&amp;letrab=K&amp;idBtn=1">K</a> - <a href="https://rialproducciones.com/karaoke-pistas-musicales-playbacks.php?goto=karaoke&amp;letrab=L&amp;idBtn=1">L</a> - <a href="https://rialproducciones.com/karaoke-pistas-musicales-playbacks.php?goto=karaoke&amp;letrab=M&amp;idBtn=1">M</a> - <a href="https://rialproducciones.com/karaoke-pistas-musicales-playbacks.php?goto=karaoke&amp;letrab=N&amp;idBtn=1">N</a> - <a href="https://rialproducciones.com/karaoke-pistas-musicales-playbacks.php?goto=karaoke&amp;letrab=O&amp;idBtn=1">O</a> - <a href="https://rialproducciones.com/karaoke-pistas-musicales-playbacks.php?goto=karaoke&amp;letrab=P&amp;idBtn=1">P</a> - <a href="https://rialproducciones.com/karaoke-pistas-musicales-playbacks.php?goto=karaoke&amp;letrab=Q&amp;idBtn=1">Q</a> - <a href="https://rialproducciones.com/karaoke-pistas-musicales-playbacks.php?goto=karaoke&amp;letrab=R&amp;idBtn=1">R</a> - <a href="https://rialproducciones.com/karaoke-pistas-musicales-playbacks.php?goto=karaoke&amp;letrab=S&amp;idBtn=1">S</a> - <a href="https://rialproducciones.com/karaoke-pistas-musicales-playbacks.php?goto=karaoke&amp;letrab=T&amp;idBtn=1">T</a> - <a href="https://rialproducciones.com/karaoke-pistas-musicales-playbacks.php?goto=karaoke&amp;letrab=U&amp;idBtn=1">U</a> - <a href="https://rialproducciones.com/karaoke-pistas-musicales-playbacks.php?goto=karaoke&amp;letrab=V&amp;idBtn=1">V</a> - <a href="https://rialproducciones.com/karaoke-pistas-musicales-playbacks.php?goto=karaoke&amp;letrab=W&amp;idBtn=1">W</a> - <a href="https://rialproducciones.com/karaoke-pistas-musicales-playbacks.php?goto=karaoke&amp;letrab=X&amp;idBtn=1">X</a> - <a href="https://rialproducciones.com/karaoke-pistas-musicales-playbacks.php?goto=karaoke&amp;letrab=Y&amp;idBtn=1">Y</a> - <a href="https://rialproducciones.com/karaoke-pistas-musicales-playbacks.php?goto=karaoke&amp;letrab=Z&amp;idBtn=1">Z</a></div>
            </div>
        </div>
    </form>
</div>
<p>&nbsp;</p>
<!--<div>        <a class="btn btn-outline-dark" href="http://www.rialproducciones/nuevo/demos.php">Escuche algunos demos</a>		</div>--> <?php /*?><?php include('dev_cdartesanalNEWal.php');?><?php */ ?>