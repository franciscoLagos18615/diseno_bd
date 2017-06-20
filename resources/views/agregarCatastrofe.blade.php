    <link href="https://fonts.googleapis.com/css?family=Oleo+Script:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Teko:400,700" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="css/estilo.css" rel="stylesheet">

<section id="contact">
      <div class="section-content">
        <h1 class="section-header"><span class="content-header wow fadeIn " data-wow-delay="0.2s" data-wow-duration="2s">Usuario Gobierno</span></h1>
        <h3>Agregar Catástrofe</h3>
      </div>
      <div class="contact-section">
      <div class="container">
        <form>
          <div class="col-md-6 form-line">
              <div class="form-group">
                <label for="filter">Región</label>
                <select class="form-control">
                    <option value="0" selected>Región Metropolitana</option>
                    <option value="1">XV Arica y Parainacota</option>
                    <option value="2">I Tarapacá</option>
                    <option value="3">II Antofagasta</option>
                    <option value="4">III Atacama</option>
                    <option value="5">IV Coquimbo</option>
                    <option value="6">V Valparaíso</option>
                    <option value="7">VI O'Higgins</option>
                    <option value="8">VII Maule</option>
                    <option value="9">VIII Biobío</option>
                    <option value="10">IX La Araucanía</option>
                    <option value="11">XIV Los Ríos</option>
                    <option value="12">X Los Lagos</option>
                    <option value="13">XI Aysén</option>
                    <option value="14">XII Magallanes y Antártica</option>
                </select>
              </div>
              <div class="form-group">
                <label for="comuna">Comuna</label>
                <input type="text" class="form-control" id="comuna" placeholder="Nombre de la Comuna" required>
              </div>
              <div class="form-group">
                <label for="filter">Catástrofe</label>
                <select class="form-control">
                    <option value="0" selected>Maremoto</option>
                    <option value="1">Terremoto</option>
                    <option value="2">Incendio</option>
                    <option value="3">Aluvión</option>
                    <option value="4">Tsunami</option>>
                </select>
              </div>
              <div>
                <button type="button" class="btn btn-default submit"><i class="fa fa-paper-plane" aria-hidden="true"></i>Añadir Catastrofe</button>
              </div>
            </div>    
          </div>
        </form>
      </div>
    </section>
