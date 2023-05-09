function myFunction() {
  var x = document.getElementById("myMenu");
  if (x.className === "menu") {
    x.className += " responsive";
  } else {
    x.className = "menu";
  }
}

const filterByColor = document.getElementById("filter-by-color");
const items = document.getElementsByClassName("item");

filterByColor.addEventListener("change", function () {
  const selectedColor = this.value;

  for (let i = 0; i < items.length; i++) {
    const item = items[i];
    if (item.classList.contains(selectedColor)) {
      item.style.display = "block";
    } else {
      item.style.display = "none";
    }
  }
});

const filterBySize = document.getElementById("filter-by-size");

filterBySize.addEventListener("change", function () {
  const selectedSize = this.value;
  const items = document.querySelectorAll(".item");

  items.forEach(function (item) {
    if (item.classList.contains(selectedSize)) {
      item.style.display = "block";
    } else {
      item.style.display = "none";
    }
  });
});

const sortDressesByPrice = (sortOrder) => {
  const items = document.querySelectorAll(".item");
  const sortedItems = Array.from(items).sort((a, b) => {
    const aPrice = parseFloat(
      a.querySelector(".featured-item h6").innerText.slice(1)
    );
    const bPrice = parseFloat(
      b.querySelector(".featured-item h6").innerText.slice(1)
    );
    return sortOrder === "price-low-to-high"
      ? aPrice - bPrice
      : bPrice - aPrice;
  });

  const container = document.querySelector(".container");
  container.innerHTML = "";
  sortedItems.forEach((item) => {
    container.appendChild(item);
  });
};

const filterByPrice = () => {
  const selectBox = document.querySelector("#filter-by-price");
  selectBox.addEventListener("change", (event) => {
    const sortOrder = event.target.value;
    sortDressesByPrice(sortOrder);
  });
};

filterByPrice();
