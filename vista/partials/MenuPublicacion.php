<div class="contenedorMenuPublicacion-img">
  <label for="item<?php echo $num; ?>">
    <img src="../imagenes/imagenes_app/menu2.png" alt="">
  </label>
</div>
  <input type="checkbox" name="one" id="item<?php echo $num; ?>">
  <div class="hide<?php echo $num; ?>">
    Equation billions upon billions! Courage of our questions decipherment, take root and flourish, cosmic ocean paroxysm of global death. Light years inconspicuous motes of rock and gas from which we spring something incredible is waiting to be known, muse about!
  </div>


<style>
            #item{
              display:none;
            }
             .hide {
                width: 100px;
                height: 0px;
                opacity: 0;
                position: absolute;
                z-index: 1;
                overflow: hidden;
                background: #ecf0f1;
                transition: all 0.5s ease;

              }
              input[type="checkbox"]:checked + .hide {
                width: 200px;
                height: auto;
                opacity: 1;
                padding: 20px;
              }
              #ifOne {
                background: green;
                transition: all 0.5s ease;
                height: 0px;
              }
              #inlineRadio2:checked~#ifOne {
                height: 100px;
                opacity: 1;
              }
</style>