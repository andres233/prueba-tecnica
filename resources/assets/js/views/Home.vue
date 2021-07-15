<template>
  <div>
    <div class="hero-section h-100">
      <div
        id="carouselExampleSlidesOnly"
        class="carousel slide"
        data-ride="carousel"
      >
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img
              class="d-block w-100"
              src="./images/carrusel1.jpg"
              alt="First slide"
            />
          </div>
          <div class="carousel-item">
            <img
              class="d-block w-100"
              src="./images/carrusel3.jpg"
              alt="Second slide"
            />
          </div>
          <div class="carousel-item">
            <img
              class="d-block w-100"
              src="./images/carrusel4.png"
              alt="Third slide"
            />
          </div>
        </div>
      </div>
    </div>
    <!-- 
        <div class="container-fluid hero-section d-flex align-content-center justify-content-center flex-wrap ml-auto">
            
            <h2 class="title">Welcome to the bigStore</h2>
        </div> -->
    <div class="container-cards">
      <div class="row container-cards">
        <div
          v-for="(product, index) in products"
          @key="index"
          class="card card-products"
          style="width: 18rem"
        >
          <img class="card-img-top h-50" :src="product.image" alt="Card image cap" />
          <div class="card-body">
            <h5 class="card-title">$ {{ product.price }}</h5>
            <p class="card-text">
              {{ product.name }}
            </p>
            <router-link :to="{ path: '/products/' + product.id }">
              <a href="#" class="btn btn-dark">Reservar</a>
            </router-link>
          </div>
        </div>
      </div>
    </div>

    <!-- <div class="container">
      <div class="row">
        <div>
          <div class="row">
            <div
              class="col-md-4 product-box"
              v-for="(product, index) in products"
              @key="index"
            >
              <router-link :to="{ path: '/products/' + product.id }">
                <img
                  :src="product.image"
                  :alt="product.name"
                  class="image-product"
                />
                <h5>
                  <span v-html="product.name"></span>
                  <span class="small-text text-muted float-right"
                    >$ {{ product.price }}</span
                  >
                </h5>
                <button class="col-md-4 btn btn-sm btn-primary float-right">
                  Reservar
                </button>
              </router-link>
            </div>
          </div>
        </div>
      </div>
    </div> -->
  </div>
</template>
<script>
export default {
  data() {
    return {
      products: [],
    };
  },
  mounted() {
    axios
      .get("api/products/")
      .then((response) => {
        this.products = response.data;
      })
      .catch((error) => {
        console.error(error);
      });
  },
};
</script>
<style scoped>
.small-text {
  font-size: 14px;
}
.product-box {
  border: 1px solid #cccccc;
  padding: 10px 15px;
  margin: 10px;
}
.hero-section {
  height: 30vh;
  background: #ababab;
  align-items: center;
  margin-bottom: 20px;
  margin-top: -20px;
}
.title {
  font-size: 60px;
  color: #ffffff;
}

.card-products {
  margin: 5px;
}
.container-cards {
  margin: 5px;
  align-self: center;
  align-items: center;
}
</style>