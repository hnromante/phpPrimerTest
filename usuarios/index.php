<?php include '../extend/header.php'; ?>

<div class="row">
    <div class="col s12 m12 l12">
      <div class="card">
          <div class="card-content">
              <span class="card-title">ALTA DE USUARIOS</span>

              <form class="form"  action="ins_usuarios.php" method="post" enctype="multipart/form-data">
                <div class="input-field">
                  <input type="text" id="tf_nick"  name="nick" required autofocus title="Ingrese un nombre entre 5 a 15 letras" pattern="[A-Za-z]{5,15}"
                  onblur="mayus(this.value,this.id)">
                  <label for="tf_nick">Nombre de inicio:</label>
                </div>
                <div class="validacion"></div>

                <div class="input-field">
                  <input type="password" id="tf_pass1" name="pass" required title="CONTRASEÑA CON NUMEROS, LETRAS MAYUSCULAS Y MINUSCULAS. ENTRE 8 A 15 CARACTERES" pattern"[A-Za-z0-9]{8,15}" >
                  <label for="tf_pass">contraseña:</label>
                </div>
                <div class="input-field">
                  <input type="password" id="tf_pass2" required name="pass"  title="CONTRASEÑA CON NUMEROS, LETRAS MAYUSCULAS Y MINUSCULAS" pattern"[A-Za-z0-9]{8,15}"  title="">
                  <label for="tf_pass2">Verificar contraseña:</label>
                </div>

                <select name="nivel" required>
                  <option value="" disabled selected>ELIGE UN NIVEL DE USUARIO</option>
                  <option value="administrador">administrador</option>
                  <option value="asesor">Asesor</option>
                </select>

                <div class="input-field">
                  <input type="text" id="tf_nombre"  name="nombre" title="NOMBRE DE USUARIO COMPLETO, solo letras y espacios" onblur="mayus(this.value, this.id)" required
                  pattern="[A-Z/s ]+">
                  <label for="tf_nombre">Nombre completo del usuario:</label>
                </div>

                <div class="input-field">
                  <input type="email" id="tf_correo"  name="correo" title="Correo electronico">
                  <label for="tf_correo">Correo electrónico:</label>
                </div>

                <div class="file-field input-field">
                  <div class="btn">
                    <span>Foto:</span>
                    <input type="file" id="in_foto"  name="foto" title="">
                  </div>
                  <div class="file-path-wrapper">
                    <div class="input-field">
                      <input type="text" class="file-path validate">
                    </div>
                  </div>
                </div>
                <button id="btn_guardar" type="submit" class="btn black">Guardar <i class="material-icons small">send</i></button>
              </form> 

      </div>
    </div> 
  </div>
</div>
 
<?php include '../extend/scripts.php'; ?>
  <script src="../js/validacion_usuario.js"></script>
</body>