<div class="container">
  <div class="row justify-content-center">
    <h3 class="col-12 text-center mt-3 mb-3">Hello Chef! </h3>
    <button id="createmenu-btn" class="btn btn-primary">Create new menu</button>
    <form id="form" class="needs-validaiton" enctype="multipart/form-data" novalidate>
      <div class="form-group">
        <label for="validationCustom01">Menu Title</label>
        <input name="title" type="text" class="form-control title" id="validationCustom01" placeholder="menu title" required>
        <div class="invalid-feedback">
          Please enter menu title.
        </div>
      </div>

      <div class="form-group">
        <label for="exampleFormControlSelect1">Number of Servings</label>
        <select name="servings" class="form-control servings" id="exampleFormControlSelect1">
          <option>1</option>
          <option>2</option>
          <option>3</option>
          <option>4</option>
          <option>5</option>
        </select>
      </div>

      <div class="form-group">
        <label for="exampleFormControlTextarea1">Preface</label>
        <textarea name="preface" class="form-control preface" id="exampleFormControlTextarea1" rows="3" required minlength=20></textarea>
        <div class="invalid-feedback">
          Enter preface text (min 20 charecters.).
        </div>
      </div>

      <div class="form-group">
        <label for="exampleFormControlFile1">Choose image file</label>
        <input name="file" type="file" class="form-control-file imagefile" id="exampleFormControlFile1" required>
        <div class="invalid-feedback">
          Please choose an image file
        </div>
      </div>

      <button id="submit-btn" class="btn btn-block btn-primary">Submit</button>
    </form>

  </div>
</div>

<hr />

<div class="container mt-5 mb-3">
    <div class="row justify-content-center menus-section">

    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script src="js/loadAllMenus.js"></script>
<script src="js/validation.js"></script>
