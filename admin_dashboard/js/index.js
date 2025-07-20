// ^ =========> HTML Elements
var nameInput = document.getElementById("name");
var categoryInput = document.getElementById("category");
var descriptionInput = document.getElementById("description");
var priceInput = document.getElementById("price");
var imageInput = document.getElementById("imageInput");
var searchInput = document.getElementById("searchInput");
var addBtn = document.getElementById("addBtn");
var updateBtn = document.getElementById("updateBtn");
// ^ =========> App variables
var nameRegex = /^[A-Z][a-z]{3,}/;
var descriptionRegex = /^[a-z\s]{25,100}$/;

var productList = [];
if (JSON.parse(localStorage.getItem("productsList")) !== null) {
  productList = JSON.parse(localStorage.getItem("productsList"))
  displayAllProducts();
}
var productList = JSON.parse(localStorage.getItem("productsList")) || [];
displayAllProducts();
var updatedIndex; // undefined

// & =========> creat product 
function addProduct() {
  if (
    validate(nameInput, nameRegex) &&
    validate(descriptionInput, descriptionRegex) &&
    imageInput.files.length !== 0
  ) {
    var product = {
      name: nameInput.value,
      category: categoryInput.value,
      price: priceInput.value,
      description: descriptionInput.value,
      imagePath: `../imgs/${imageInput.files[0].name}`,
    };
    productList.push(product);
    localStorage.setItem("productsList", JSON.stringify(productList));
    displayProduct(productList.length - 1);
    clearForm();
  }
}

// ===================> Displaying added product 
function displayProduct(index) {
  console.log(index);
  var productHTML = `
    <div class="col-md-3 col-sm-6">
      <div class="inner shadow px-3 py-4 rounded-3">
        <img
          src="${productList[index].imagePath}"
          class="w-100"
          alt="${productList[index].name}"
        />
        <div class="d-flex justify-content-between align-items-center mt-4">
          <h2 class="h5">${productList[index].name}</h2>
          <span class="h5 fw-bold">${productList[index].price}$</span>
        </div>
        <div class="d-flex gap-2 align-items-center">
          <i class="fa-solid fa-tag"></i>
          <h3 class="h6">${productList[index].category}</h3>
        </div>
        <p class="text-secondary">
         ${productList[index].description}
        </p>
        <button type="button" class="btn btn-outline-warning" onclick='getProductInfo(${index})'>Update</button>
        <button type="button" class="btn btn-outline-danger" onclick='deleteProduct(${index})'>Delete</button>
      </div>
    </div>
    `;
  productsContainer.innerHTML += productHTML;
}

// ===================> Display products
function displayAllProducts() {
  productsContainer.innerHTML = "";
  for (var i = 0; i < productList.length; i++) {
    displayProduct(i);
  }
}
// ===================> Delete Function
function deleteProduct(index) {
  productList.splice(index, 1);
  localStorage.setItem("productsList", JSON.stringify(productList));
  displayAllProducts();
}

// ===================> Update data
function getProductInfo(index) {
  nameInput.value = productList[index].name;
  categoryInput.value = productList[index].category;
  priceInput.value = productList[index].price;
  descriptionInput.value = productList[index].description;
  imgSrc.innerHTML = productList[index].imagePath;
  imgSrcContainer.classList.remove("d-none");
  addBtn.classList.add("d-none");
  updateBtn.classList.remove("d-none");
  updatedIndex = index;
}

// ===================> Update function
function updateProduct() {
  if (
    validate(nameInput, nameRegex) &&
    validate(categoryInput, nameRegex) &&
    validate(priceInput, priceRegex) &&
    validate(descriptionInput, descriptionRegex)
  ) {
    productList[updatedIndex].name = nameInput.value;
    productList[updatedIndex].price = priceInput.value;
    productList[updatedIndex].category = categoryInput.value;
    productList[updatedIndex].description = descriptionInput.value;

    if (imageInput.files.length > 0) {
      productList[
        updatedIndex
      ].imagePath = `./assets/imgs/${imageInput.files[0].name}`;
    }

    localStorage.setItem("productsList", JSON.stringify(productList));
    displayAllProducts();
    clearForm();
    imgSrcContainer.classList.add("d-none");

    addBtn.classList.remove("d-none");
    updateBtn.classList.add("d-none");
  }
}

// ===================> Form clearing 
function clearForm() {
  nameInput.value = "";
  nameInput.classList.remove("is-valid", "is-invalid");
  categoryInput.value = "";
  categoryInput.classList.remove("is-valid", "is-invalid");
  priceInput.value = "";
  priceInput.classList.remove("is-valid", "is-invalid");
  descriptionInput.value = "";
  descriptionInput.classList.remove("is-valid", "is-invalid");
  imageInput.value = null;
  imgSrc.innerHTML = "";
}
// ===================> Validate Function
function validate(element, regex) {
  if (regex.test(element.value)) {
    element.classList.add("is-valid");
    element.classList.remove("is-invalid");
    element.nextElementSibling.nextElementSibling.classList.add("d-none");
    console.log(true);
    return true;
  }
  element.classList.remove("is-valid");
  element.classList.add("is-invalid");
  element.nextElementSibling.nextElementSibling.classList.remove("d-none");
  console.log(false);
  return false;
}
