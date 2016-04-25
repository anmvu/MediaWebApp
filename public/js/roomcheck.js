
Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector('#token').getAttribute('value');
new Vue{
	
	el:'#roomcheck',

	data: {
        rooms: { id: '', type_id: '',barcode:'',time_checked:'' },
        submitted: false
    },

	ready: function(){
		this.fetchRooms();
	},

	methods:{
		fetchRooms: function(){
			this.$http.get('/roomcheck',function(rooms){
				this.$set('rooms',rooms);
			});
		},

		onSubmitForm: function(e) {
            e.preventDefault();

            var message = this.newMessage;

            this.messages.push(message);
            this.newMessage = { name: '', message: '' };
            this.submitted = true;

            this.$http.post('api/messages', message);
        }

	}


}