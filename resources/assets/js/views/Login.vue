<template>
    <div class="fondo">
        <div class="row justify-content-center">
            <div class="col-md-5 card-login">
                <div class="card card-default">
                    <div class="card-header header-login">Login</div>

                    <div class="card-body">
                        <form>
                            <div class="form-group row">
                                <label for="email" class="col-sm-4 col-form-label text-md-right">E-Mail Address</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" v-model="email" required autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" v-model="password" required>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-5">
                                    <button type="submit" class="btn btn-dark" @click="handleSubmit">
                                        Login
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                email : "",
                password : ""
            }
        },
        methods : {
            handleSubmit(e){
                e.preventDefault()
                
                if (this.password.length > 0 && this.email.length>0) {
                    axios.post('api/login', {
                        email: this.email,
                        password: this.password
                      })
                      .then(response => {
                        let is_admin = response.data.user.is_admin
                        localStorage.setItem('user',JSON.stringify(response.data.user))
                        localStorage.setItem('jwt',response.data.token)
                        
                        if (localStorage.getItem('jwt') != null){
                            this.$emit('loggedIn')
                            if(this.$route.params.nextUrl != null){
                                this.$router.push(this.$route.params.nextUrl)
                            }
                            else {
                                if(is_admin== 1){
                                    this.$router.push('admin')
                                }
                                else {
                                    this.$router.push('dashboard')
                                }
                            }
                        }
                      })
                      .catch(function (error) {
                        console.error(error);
                        alert('wrong email or password')
                      });
                }else{
                    alert('todos los campos son requeridos');
                }
            }
        },
    }
</script>

<style scoped>
.fondo {
  background-color: white;
  height: 100%;
  margin-top: -30px;
  background-image: url("./images/fondomano.jpg");
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}
.card-login{
    margin: 13%;
    opacity: 0.7;
}
.header-login{
    background-color: black;
    color: white;
}
</style>