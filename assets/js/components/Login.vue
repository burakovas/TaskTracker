<template>
    <div class="registerMenu">
        <form id="app" @submit="checkForm" action="#" method="post">

           <p v-if="errors.length">
              <b>Please correct the following error(s):</b>
           <ul>
              <li v-for="error in errors">{{ error }}</li>
           </ul>
           </p>

            <label class="labelRegisterMenu" for="email">Email</label>
            <input class="inputRegisterMenu" id="email" type="email" v-model="email" placeholder="your email"><br>
            <label class="labelRegisterMenu" for="password">Password</label>
            <input class="inputRegisterMenu" id="password" type="password" v-model="password" placeholder="your password"><br>
            <div class="checkbox"><input type="checkbox" name =_remember_me >
            <span class="rememberMeCheckbox">Remember me</span><a class="buttonForgotPassoword" href="#">Forgot Password?</a></div>

            <input class="inputRegisterMenu inputRegisterMenuButton" type='submit' value="Enter login">

        </form>

    </div>

</template>

<script>
    export default {
        data () {
            return {
                errors:[],
                email:null,
                password:null,
            }},
                methods: {
                checkForm:function(e) {
                    if(this.email && this.password) return true;
                    this.errors = [];
                    if(!this.email) this.errors.push("Email required.");
                    if(!this.password) this.errors.push("Password required.");
                    e.preventDefault();
                }
            }}
</script>
