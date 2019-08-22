new Vue({
    el:'#app',
    delimiters: ['${', '}'],
    data: {
        errors:[],
        email:null,
        password:null,
        token: null
    },
    methods: {
        checkForm:function(e) {
            if(this.email && this.password) return true;
            this.errors = [];
            if(!this.email) this.errors.push("Email required.");
            if(!this.password) this.errors.push("Password required.");
            e.preventDefault();
        },
        test:function () {
            let a = document.getElementById('rating');
            this.token = a.dataset.authenticated
        }
}});
