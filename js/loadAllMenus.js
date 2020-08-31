function loadAllMenus() {
  menus_section.empty();
  $.ajax({
    url: "./api/get_all_menus.php",
    method: "GET",
  }).done(function (data) {
    let res = JSON.parse(data);
    let allHomes = res.data;
    console.log(res);

    $.each(allHomes, function (index, singleMenu) {
      let menu = `<a class="mb-3" href="./menu-details.php?id=${singleMenu.id}">
                      <div class="card mr-3" style="width: 20rem;">
                          <img class="card-img-top" src="./uploads/${singleMenu.image}" alt="Card image">
                          <div class="card-body">
                              <h5 class="card-title">${singleMenu.title}</h5>
                              <p class="card-text">${singleMenu.preface}</p>
                              <hr />
                              <small class="">Chef's name</small>
                          </div>
                      </div>
                    </a>`;
      menus_section.append(menu);
    });
  });
}

//   loadAllMenus()
