function loadMenuDetails() {
  let urlParams = new URLSearchParams(window.location.search);
  let id = urlParams.get("id");

  $.ajax({
    url: `./api/get_one_menu.php?id=${id}`,
    method: "GET",
  }).done(function (data) {
    let res = JSON.parse(data);
    let menu = res.data;
    console.log(res.data);

    let menuDetails = `<h2 class="w-100">${menu.title}</h2>
                        <img src="./uploads/${menu.image}" alt="menu-details-img" width="600px">
                        <br />

                        <h5 class="mt-4">Preface</h5>
                        <p class="col-10">${menu.preface}</p>
                        <h5 class="mt-4 mb-4">The Menu - ${menu.servings} serverings</h5>

                        <strong id="tags">Starter</strong>
                        <p>We can decide together</p>
                        <strong id="tags">Main course</strong>
                        <p>Fordi det giver den bedste oplevelse</p>
                        <strong id="tags">Dessert</strong>
                        <p>You can inform your choices</p>`;

    $(".menu-details").append(menuDetails);
  });
}

loadMenuDetails();
