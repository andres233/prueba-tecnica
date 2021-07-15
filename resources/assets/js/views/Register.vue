
<template>
        <div class="fondo">
        <div class="row justify-content-center">
            <div class="col-md-8 card-register">
                <div class="card card-default">
                    <div class="card-header header-register">Register</div>

                    <div class="card-body">
                        <form>
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" v-model="name" required autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" v-model="email" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" v-model="password" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirm Password</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" v-model="password_confirmation" required>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-5">
                                    <button type="submit" class="btn btn-dark" @click="handleSubmit">
                                        Register
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
        props : ['nextUrl'],
        data(){
            return {
                name : "",
                email : "",
                password : "",
                password_confirmation : ""
            }
        },
        methods : {
            handleSubmit(e) {
                e.preventDefault()
                
                if (this.password === this.password_confirmation && this.password.length > 0)
                {
                    if(this.name.length>0 && this.email.length>0){
                    axios.post('api/register', {
                        name: this.name,
                        email: this.email,
                        password: this.password,
                        c_password : this.password_confirmation
                      })
                      .then(response => {
                        localStorage.setItem('user',JSON.stringify(response.data.user))
                        localStorage.setItem('jwt',response.data.token)
                        
                        if (localStorage.getItem('jwt') != null){
                            this.$emit('loggedIn')
                            if(this.$route.params.nextUrl != null){
                                this.$router.push(this.$route.params.nextUrl)
                            }
                            else{
                                this.$router.push('/')
                            }
                        }
                      })
                      .catch(error => {
                        console.error(error);
                      });
                    }else{
                        alert('todos los datos son requeridos')
                    }  
                } else {
                    this.password = ""
                    this.passwordConfirm = ""
                    
                    return alert('Passwords do not match')
                }
            }
        }
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
.card-register{
    margin: 9%;
    opacity: 0.7;
}
.header-register{
    background-color: black;
    color: white;
}
</style>