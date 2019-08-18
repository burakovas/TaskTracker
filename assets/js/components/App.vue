<template>
    <div class="registerMenu">
        <form id="app" @submit="checkForm" action="#" method="post">

           <p v-if="errors.length">
              <b>Please correct the following error(s):</b>
           <ul>
              <li v-for="error in errors">{{ error }}</li>
           </ul>
           </p>

            <label class="labelRegisterMenu" for="name">Name</label>
            <input class="inputRegisterMenu" type="text"  id="name" v-model="name" placeholder="your Name"><br>
            <label class="labelRegisterMenu" for="surname">Surname</label>
            <input class="inputRegisterMenu" id="surname" type="text" v-model="surname" placeholder="your Surname"><br>
            <label class="labelRegisterMenu" for="email">Email</label>
            <input class="inputRegisterMenu" id="email" type="email" v-model="email" placeholder="your email"><br>
            <label class="labelRegisterMenu" for="password">Password</label>
            <input class="inputRegisterMenu" id="password" type="password" v-model="password" placeholder="your password"><br>
            <label class="labelRegisterMenu" for="confirmPassword">Confirm Password</label>
            <input class="inputRegisterMenu" id="confirmPassword" type="password" v-model="confirmPassword" placeholder="confirm your password"><br>
            <input class="inputRegisterMenu inputRegisterMenuButton" type='submit' value="Create account">
        </form>
    </div>

</template>

<script>
    export default {
        data () {
            return {
                errors:[],
                name:null,
                surname:null,
                email:null,
                password:null,
                confirmPassword:null
            }},
                methods: {
                checkForm:function(e) {
                    if(this.name && this.surname && this.email && this.password && this.confirmPassword
                        && this.password === this.confirmPassword) return true;
                    this.errors = [];
                    if(!this.name) this.errors.push("Name required.");
                    if(!this.surname) this.errors.push("Surname required.");
                    if(!this.email) this.errors.push("Email required.");
                    if(!this.password) this.errors.push("Password required.");
                    if(!this.confirmPassword) this.errors.push("Password confirm required.");
                    if(this.password !== this.confirmPassword) this.errors.push("Passwords must match.");
                    e.preventDefault();
                }
            }}
</script>
