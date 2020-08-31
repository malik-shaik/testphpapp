let create_menu_button = document.querySelector("#createmenu-btn");
let form = document.querySelector("#form");
let menus_section = $(".menus-section");

/* load all menus */
loadAllMenus();

/* Validate form and make ajax call */
$("#form").on("submit", function (evt) {
  evt.preventDefault();

  form.classList.add("was-validated");

  if (form.checkValidity() === false) {
    console.log("invalid form data");
    evt.preventDefault();
    evt.stopPropagation();
  } else {
    let formData = new FormData(this);
    let imagefile = $(".imagefile")[0].files[0];
    formData.append("file", imagefile);

    $.ajax({
      url: "./api/create_menu.php",
      method: "POST",
      data: formData,
      contentType: false,
      processData: false,
    }).done(function (data) {
      console.log(data);
      create_menu_button.style.display = "block";
      form.style.display = "none";
      form.disabled = true;

      loadAllMenus();
    });
  }
});

/* Create-menu-button to display form */
$("#createmenu-btn").click(function (evt) {
  form.style.display = "block";
  form.disabled = false;

  create_menu_button.style.display = "none";
});
