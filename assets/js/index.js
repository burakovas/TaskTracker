new Vue({
    el:'#app',
    delimiters: ['${', '}'],
    data: {
        errors:[],
        name:null,
        surname:null,
        email:null,
        password:null,
        confirmPassword:null
    },
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
    }});



